<?php

namespace App\Service\Contact;

use App\Model\Contact;
use App\Service\AppService;
use Exception;

class ContactForm extends AppService
{
    /**
     * Index function for ContactForm
     *
     * @param $post
     * @param $files
     * @return array
     * @throws Exception
     */
    public function submitForm($post, $files)
    {
        $validation = new ContactFormValidation();
        $errors = array();
        $default = $this->defaultData();

        if (!$post) {
            return ['data' => $default, 'errors' => $errors];
        }

        $data = $this->map($post, $files);

        // Validation
        $errors = $validation->validateForm($data, $errors);

        // Ermitteln ob Fehler vorhanden sind
        if (!empty($errors)) {
            $errors['main'] = __("Bitte überprüfen Sie Ihre Eingabe");
            return ['errors' => $errors];
        } else {
            // save Formular Data to Database
            $message = new Contact();
            $message->saveMessage($data);
            if ($this->sendMailMessage($data)) {
                return ['errors' => []];
            }
            throw new Exception('Error: Mail not send.');
        }
    }

    /**
     * Create default array.
     *
     * Creates an array with default data to overwrite $data. Returns default data.
     *
     * @return  array Default data
     */
    protected function defaultData()
    {
        $default = array(
            'name' => '',
            'vorname' => '',
            'strasse' => '',
            'nr' => '',
            'plz' => '',
            'ort' => '',
            'land' => '',
            'handy' => '',
            'email' => '',
            'comment' => '',
            'newsletter' => '',
            'success' => '',
            'pdf' => ''
        );
        return $default;
    }

    /**
     * Send mail.
     *
     * Create and send the final mail with header, content and attachement. Returns mail.
     *
     * @see createEmailMessage
     * @see mailer
     * @param array $data All form inputs
     * @return boolean True if mail is send
     */
    protected function sendMailMessage($data)
    {
        $mail = mailer();
        $config = config()->get('mail');
        $mail->setFrom($config['from_email']);
        // Add a recipient
        $mail->addAddress($config['to_email'], $config['name']);
        if ($data['fileToUpload']['tmp_name']) {
            // Add attachments
            $mail->addAttachment($data['fileToUpload']['tmp_name'], $data['fileToUpload']['name']);
        }
        $mail->Subject = 'ContactForm';
        $mail->AltBody = '';
        $mail->Body = $this->createEmailMessage($data);
        $mail->Debugoutput = function ($str) {
            logger()->debug($str);
        };
        return $mail->send();
    }

    /**
     * Create mail message.
     *
     * Gets all form data and transform to a mail message. Returns mail content.
     *
     * @param array $data All form inputs
     * @return string Message for mail
     */
    protected function createEmailMessage($data)
    {
        $nachricht = "\nName: " . $data['name'] . "\nVorname: " . $data['vorname'] . "\nStrasse/Nr: " . $data['strasse'] . " " . $data['nr'] . "\nPLZ/Ort: " . $data['plz'] . " " . $data['ort'] . "\nLand: " . $data['land'] .
            "\nHandy: " . $data['handy'] . "\nEmail: " . $data['email'] . "\nKategorie: " . $data['selectproblem'] . "\nNachricht: " . $data['comment'] . "\nNewsletter: " . $data['newsletter'];
        $nachricht = wordwrap($nachricht, 70);
        return $nachricht;
    }

    /**
     * Map file data.
     *
     * Map file name and file path.
     *
     * @param $file
     * @return array
     */
    protected function mapFileData($file)
    {
        $result = array();
        if (isset($file['fileToUpload'])) {
            $result['fileToUpload']['name'] = $file['fileToUpload']->getClientOriginalName();
            $result['fileToUpload']['tmp_name'] = $file['fileToUpload']->getRealPath();
        }
        return $result;
    }

    /**
     * Map $post and $file to $data.
     *
     * @param $post
     * @param $file
     * @return array
     */
    protected function map($post, $file)
    {
        $default = $this->defaultData();
        $files = $this->mapFileData($file);
        $data = array_replace_recursive($default, $post, $files);
        $data = $this->mapNewsletter($data);
        return $data;
    }

    /**
     * Map newsletter
     * Map newsletter for function map_form_data.
     *
     * @see mapFormData()
     * @param array $data All data
     * @return array
     */
    protected function mapNewsletter($data)
    {
        if (empty($data['newsletter'])) {
            $data['newsletter'] = "nicht erwünscht";
            return $data;
        }
        $data['newsletter'] = "erwünscht";
        return $data;
    }
}
