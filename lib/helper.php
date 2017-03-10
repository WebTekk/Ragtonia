<?php

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\ParameterBag;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Session\Storage\NativeSessionStorage;
use Symfony\Component\HttpFoundation\Session\Storage\Handler\NativeFileSessionHandler;
use Symfony\Component\Translation\Translator;
use Symfony\Component\Translation\MessageSelector;
use Symfony\Component\Translation\Loader\MoFileLoader;
use Monolog\Logger;
use Monolog\Handler\RotatingFileHandler;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\RouteCollection;
use Cake\Database\Connection;
use Cake\Database\Driver\Mysql;
use League\Plates\Engine;
use Odan\Plates\Extension\PlatesDataExtension;
use Symfony\Component\Routing\Route;
use MatthiasMullie\Minify;
use Symfony\Component\Cache\Adapter\FilesystemAdapter;

/**
 * Generates a normalized URI for the given path.
 *
 * @param string $path A path to use instead of the current one
 * @param boolean $full return absolute or relative url
 * @return string The normalized URI for the path
 */
function baseurl($path = '', $full = false)
{
    $scriptName = request()->server->get('SCRIPT_NAME');
    $baseUri = dirname(dirname($scriptName));
    $result = str_replace('\\', '/', $baseUri) . $path;
    $result = str_replace('//', '/', $result);
    if ($full === true) {
        $result = hosturl() . $result;
    }
    return $result;
}

/**
 * Returns current url
 *
 * @return string URL
 */
function hosturl()
{
    $server = request()->server->all();
    $host = $server['SERVER_NAME'];
    $port = $server['SERVER_PORT'];
    $result = (isset($server['HTTPS']) && $server['HTTPS'] != "off") ? "https://" : "http://";
    $result .= ($port == '80' || $port == '443') ? $host : $host . ":" . $port;
    return $result;
}

/**
 * Request function.
 * Create request variable.
 *
 * @return Request Request
 */
function request()
{
    static $request = null;
    if ($request === null) {
        $request = Request::createFromGlobals();
    }
    return $request;
}

/**
 * Response function.
 * Create response variable.
 *
 * @return Response Response
 */
function response()
{
    static $response = null;
    if ($response === null) {
        $response = new Response('', 200);
    }
    return $response;
}


/**
 * Get or set config options
 *
 * @return ParameterBag
 */
function config()
{
    static $config = null;
    if ($config === null) {
        $config = new ParameterBag();
    }
    return $config;
}

/**
 * Session.
 * Replace $_SESSION.
 *
 * @return null|Session
 */
function session()
{
    static $session = null;
    if ($session === null) {
        $storage = new NativeSessionStorage(array(), new NativeFileSessionHandler());
        $session = new Session($storage);
        session()->start();
    }
    return $session;
}

/**
 * Monolog Logger
 *
 * Create an error log from error messages in en external errer.log data. Returns Logdata.
 *
 * @return Logger Logger
 */
function logger()
{
    static $logger = null;
    if ($logger === null) {
        $logger = new Logger('app');
        // create a log channel
        $logFile = __DIR__ . '/../tmp/logs/errors/error.log';
        $handler = new Monolog\Handler\RotatingFileHandler($logFile, 0, Logger::DEBUG, true, 0775);
        $logger->pushHandler($handler);
    }
    return $logger;
}

function iplogger()
{
    static $logger = null;
    if ($logger === null) {
        $logger = new Logger('Ip');
        // create a log channel
        $logFile = __DIR__ . '/../tmp/logs/ips/ip.log';
        $handler = new Monolog\Handler\RotatingFileHandler($logFile, 0, Logger::DEBUG, true, 0775);
        $logger->pushHandler($handler);
    }
    return $logger;
}

/**
 * Create mail
 *
 * Combine important informations with the message '$nachricht'. Returns mail.
 *
 * @return PHPMailer Returns full mail
 */
function mailer()
{
    $mail = null;
    if ($mail === null) {
        $mail = new PHPMailer();

        $config = config()->get('mail');
        $mail->CharSet = $config['charset'];
        $mail->isSMTP(); // Set mailer to use SMTP
        $mail->Host = $config['host']; // Specify main and backup SMTP servers
        $mail->SMTPAuth = $config['SMTPAuth']; // Enable SMTP authentication
        $mail->Username = $config['username']; // SMTP username
        $mail->Password = $config['pw'];/*$config['pw'];*/ // SMTP password
        $mail->Port = $config['port']; // TCP port to connect to
        $mail->SMTPSecure = $config['SMTPSecure']; // SMTPSecure
        $mail->SMTPDebug = $config['SMTPDebug'];
        $mail->Debugoutput = 'html';
        $mail->Timeout = 10;
    }
    return $mail;
}

/**
 * Create a connection to a database.
 *
 * @return Connection
 */
function db()
{
    static $db = null;
    if ($db === null) {
        $config = config()->get("db");
        $driver = new Mysql([
            'host' => $config['host'],
            'port' => $config['port'],
            'database' => $config['database'],
            'username' => $config['username'],
            'password' => $config['password'],
            'encoding' => $config['encoding'],
            'charset' => $config['charset'],
            'collation' => $config['collation'],
            'prefix' => '',
            'flags' => [
                // Enable exceptions
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                // Set default fetch mode
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]
        ]);
        $db = new Connection([
            'driver' => $driver
        ]);
    }
    return $db;
}

/**
 * Dispatcher.
 *
 * @param Request $request
 * @param Response $response
 * @param RouteCollection $routes
 */
function dispatch(Request $request, Response $response, RouteCollection $routes)
{
    // Find matching route
    $pathInfo = $request->getPathInfo();
    $context = new RequestContext();
    $requestContext = $context->fromRequest($request);

    $matcher = new UrlMatcher($routes, $requestContext);
    $match = $matcher->match($pathInfo);
    // Add attributes
    $request->attributes->add($match);

    //try {
    // Call event
    $action = $match['controller'];

    $parts = explode(':', $action);
    $object = new $parts[0]();

    $function = array($object, 'callAction');
    $responseNew = call_user_func_array($function, [$parts[1], $request, $response]);
    if ($responseNew instanceof Response) {
        $response = $responseNew;
    }
    //} catch (Exception $ex) {
    //    logger()->error($ex->getFile() . $ex->getLine() . $ex->getMessage());
    //    $response = new Response("500 Server Error", '500');
    //}

    $session = session();
    if ($session && $session->isStarted()) {
        $session->save();
    }

    $response->send();
}

function call_action($match)
{
    $request = request();
    $response = response();
    $action = $match['controller'];
    $parts = explode(':', $action);
    $object = new $parts[0]();
    $function = array($object, $parts[1]);
    $responseNew = call_user_func($function, [$request, $response]);
    return $responseNew;
}

/**
 * Create new Route
 *
 * @param $methods
 * @param $path
 * @param $controller
 * @return Route
 */
function route($methods, $path, $controller)
{
    return new Route(baseurl($path), ['controller' => $controller], [], [], '', [], (array)$methods);
}

/**
 * @return Engine|null
 */
function view()
{
    static $engine = null;
    if ($engine === null) {
        $config = config();
        $engine = new Engine($config->get('viewPath'), null);
        $engine->loadExtension(new PlatesDataExtension());

        $engine->addFolder('view', $config->get("viewPath"));
        //$engine->addFolder('css', $config->get("publicCssPath"));
        //$engine->addFolder('js', $config->get("publicJsPath"));
    }
    return $engine;
}

/**
 * Get Translator Object.
 *
 * @return Translator
 */
function translator()
{
    static $translator = null;
    if ($translator === null) {
        $session = session();
        $locale = $session->get('lang');
        $resource = __DIR__ . "/../resources/locale/" . $locale . "_messages.mo";
        $translator = new Translator($locale, new MessageSelector());
        $translator->setFallbackLocales(array('en_US'));
        $translator->addLoader('mo', new MoFileLoader());
        $translator->addResource('mo', $resource, $locale);
        $translator->setLocale($locale);
    }
    return $translator;
}

/**
 * Translate function for the template.
 *
 * @param string $message
 * @param null $context
 * @return string
 */
function __($message, $context = null)
{
    $translated = translator()->trans($message);
    $context = array_slice(func_get_args(), 1);
    if (!empty($context)) {
        $translated = vsprintf($translated, $context);
    }
    return $translated;
}

/**
 * Read Assets function.
 *
 * @param mixed $file
 * @return string
 */
function asset($file)
{
    $view = view();

    $config = config();
    $cache = new FilesystemAdapter('', 0, $config->get('assets')['cachePath']);
    $assets = [];

    $minify = $config->get('assets')['minify'];
    foreach ((array)$file as $fileNew) {
        $fileName = $view->make($fileNew)->path();
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION);
        $cacheKey = sha1($fileNew . $minify . filemtime($fileName));
        $cacheItem = $cache->getItem($cacheKey);
        if (!$cacheItem->isHit()) {
            $content = '';
            if ($fileType == "js") {
                $content = asset_js($fileName, $minify);
            }
            if ($fileType == "css") {
                $content = asset_css($fileName, $minify);
            }
            $cacheItem->set($content);
            $cache->save($cacheItem);
        }
        $assets[] = $cacheItem->get();
    }
    $result = implode("\n", $assets);
    return $result;
}

/**
 * Minimise JS.
 * Minimise default JavaScript file.
 *
 * @param string $fileName Name of default JS file
 * @param bool $minify Minify js if true
 * @return string JavaScript code
 */
function asset_js($fileName, $minify)
{
    if ($minify) {
        $minifier = new Minify\JS($fileName);
        $content = $minifier->minify();
    } else {
        $content = file_get_contents($fileName);
    }
    $asset = sprintf("<script type='application/javascript'>%s</script>", $content);
    return $asset;
}

/**
 * Minimise CSS.
 * Minimise default CSS file.
 *
 * @param string $fileName Name of default CSS file
 * @param bool $minify Minify css if true
 * @return string CSS code
 */
function asset_css($fileName, $minify)
{
    if ($minify) {
        $minifier = new Minify\CSS($fileName);
        $content = $minifier->minify();
    } else {
        $content = file_get_contents($fileName);
    }
    $asset = sprintf("<style>%s</style>", $content);
    return $asset;
}

/**
 * Remove path tree
 *
 * @param string $delete Path to delete
 * @return bool true if directory removed
 */
function rrmdir($delete)
{
    $files = array_diff(scandir($delete), array('.', '..'));
    foreach ($files as $file) {
        (is_dir("$delete/$file")) ? rrmdir("$delete/$file") : unlink("$delete/$file");
    }
    return rmdir($delete);
}

function getLastRoute()
{
    $request = request();
    $ref = $request->headers->get("referer");

    $expRef = explode('/', $ref);
    $lastRoute = $expRef[count($expRef) - 1];
    $newRoute = '/' . $lastRoute;
    return $newRoute;
}
