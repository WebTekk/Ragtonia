<?php

namespace App\Service\Contact;

use App\Model\Postalcode;

class ContactFormValidation
{
    /**
     * Validate the Form.
     *
     * Validate the whole input and throws new errors if required. Returns errors.
     *
     * @param array $data All form inputs
     * @param array $errors All errors
     * @return array All errors
     */
    public function validateForm($data, $errors = [])
    {
        // Daten validieren
        $errors = $this->validateInput($data, $errors);

        $errors = $this->preValidateZip($data, $errors);

        return $errors;
    }

    /**
     * Validate input
     * Validate input from the form.
     *
     * @param array $data All data
     * @param array $errors All errors
     * @return array
     */
    protected function validateInput($data, $errors)
    {
        $errors = $this->validateName($data, $errors);

        $errors = $this->validateFirstName($data, $errors);

        $errors = $this->validateEmail($data, $errors);

        $errors = $this->validateComment($data, $errors);

        $errors = $this->validatePlz($data, $errors);

        return $errors;
    }

    /**
     * Validate zip-code
     * Validate zip-code for validate_input function.
     *
     * @see validateInput
     * @param array $data All data
     * @param array $errors All errors
     * @return array
     */
    protected function preValidateZip($data, $errors)
    {
        if (empty($data['land']) && empty($data['plz'])) {
            return $errors;
        }
        $zip = new Postalcode();
        if (!$zip->validateZip($data)) {
            $errors['plz'] = __("Diese Postleitzahl existiert in diesem Land nicht!");
        }
        return $errors;
    }

    /**
     * Validate zip-code
     * Validate zip-code for pre_validate_zip function.
     *
     * @see preValidateZip
     * @param array $data All data
     * @param array $errors All errors
     * @return array
     */
    protected function validatePlz($data, $errors)
    {
        if (empty($data['plz'])) {
            return $errors;
        }
        if (strlen($data['plz']) < 4 || strlen($data['plz']) > 6) {
            $errors['plz'] = __("PLZ ungültig");
        }
        return $errors;
    }

    /**
     * Validate comment
     * Validate comment for validate_input function.
     *
     * @see validateInput
     * @param array $data All data
     * @param array $errors All errors
     * @return array
     */
    protected function validateComment($data, $errors)
    {
        if (empty($data['comment'])) {
            $errors['comment'] = __("fehlt");
        }
        return $errors;
    }

    /**
     * Validate email
     * Validate email for validate_input function.
     *
     * @see validateInput
     * @param array $data All data
     * @param array $errors All errors
     * @return array
     */
    protected function validateEmail($data, $errors)
    {
        if (empty($data['email'])) {
            $errors['email'] = __('fehlt');
            return $errors;
        }
        if (email($data['email']) === false) {
            $errors['email'] = __('falsches E-Mail Format');
        }
        return $errors;
    }

    /**
     * Validate first name
     * Validate first name for validate_input function.
     *
     * @see validateInput
     * @param array $data All data
     * @param array $errors All errors
     * @return array
     */
    protected function validateFirstName($data, $errors)
    {
        if (empty($data['vorname'])) {
            $errors['vorname'] = __('fehlt');
            return $errors;
        }
        if (strlen(trim($data['vorname'])) < 2) {
            $errors['vorname'] = __('zu kurz');
        }
        return $errors;
    }

    /**
     * Validate Name
     * Validate Name for validate_input function.
     *
     * @see validateInput
     * @param array $data All data
     * @param array $errors All errors
     * @return array
     */
    protected function validateName($data, $errors)
    {
        if (empty($data['name'])) {
            $errors['name'] = __("fehlt");
            return $errors;
        }
        if (strlen(trim($data['name'])) < 2) {
            $errors['name'] = __('zu  kurz');
        }
        return $errors;
    }
}
