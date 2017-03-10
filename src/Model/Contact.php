<?php
/**
 * Created by PhpStorm.
 * User: marc.wilhelm
 * Date: 19.12.2016
 * Time: 15:07
 */

namespace App\Model;

/**
 * From Model
 * Save form message
 *
 * Class Form
 */
class Contact extends AppModel
{
    /**
     * Save to database.
     * Bind parameters and save all formular inputs to database.
     *
     * @see db
     * @param array $data All form inputs
     * @return boolean True if successful
     */
    public function saveMessage($data)
    {
        db()->insert('form', [
            'email' => $data['email'],
            'vorname' => $data['vorname'],
            'name' => $data['name'],
            'strasse' => $data['strasse'],
            'nr' => $data['nr'],
            'plz' => $data['plz'],
            'ort' => $data['ort'],
            'land' => $data['land'],
            'nachricht' => $data['comment'],
            'newsletter' => $data['newsletter']
        ]);
        return true;
    }
}
