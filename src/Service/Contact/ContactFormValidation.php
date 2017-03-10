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

        //  Angaben bei den Checkboxen überprüfen
        $errors = $this->validateOptradioTrue($data, $errors);

        $errors = $this->validateOptradioCheckbox($data, $errors);

        $errors = $this->preValidateZip($data, $errors);

        return $errors;
    }

    /**
     * Check checkboxes
     * Check if any checkbox is set.
     * Validate for function validate_form.
     *
     * @see validateForm()
     * @param array $data All data
     * @param array $errors All errors
     * @return array
     */
    protected function validateOptradioCheckbox($data, $errors)
    {
        if ($data['optradio'] != 'nein' || !empty($data['opradio'])) {
            return $errors;
        }

        $keys = $this->optradioCheckboxKeys();
        $errors = $this->optradioCheckboxLoop($keys, $errors, $data);
        return $errors;
    }

    /**
     * Loop for validateOptradioCheckbox
     *
     * @param $keys
     * @param $errors
     * @param $data
     * @return mixed
     */
    protected function optradioCheckboxLoop($keys, $errors, $data)
    {
        foreach ($keys as $key) {
            if (!empty($data[$key])) {
                $errors['checkbox'] = 'Wenn sie nicht kontaktiert werden möchten, müssen Sie diese Felder nicht anwählen.';
                return $errors;
            }
        }
        return $errors;
    }

    /**
     * Keys for validateOptradioCheckbox
     *
     * @return array
     */
    protected function optradioCheckboxKeys()
    {
        $keys = array(
            'option1',
            'option2',
            'option3',
            'option4',
            'option5',
            'option6',
            'option7'
        );
        return $keys;
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
     * Validate optradio
     * Validate optradio for validate_input function.
     *
     * @see validateInput
     * @param array $data All data
     * @param array $errors All errors
     * @return array
     */
    protected function validateOptradioTrue($data, $errors)
    {
        if (empty($data['optradio'])) {
            return $errors;
        }
        if ($data['optradio'] != "ja") {
            return $errors;
        }

        $errors = $this->validateOptradioDay($data, $errors);

        $errors = $this->validateOptradioDaytime($data, $errors);

        return $errors;
    }

    /**
     * Validate optradio daytime
     * Test if any daytime is activated.
     * Validate for function validate_optradio_true.
     *
     * @see validateOptradioTrue()
     * @param array $data All data
     * @param array $errors All error
     * @return array
     */
    protected function validateOptradioDaytime($data, $errors)
    {
        if (empty($data['option6']) && empty($data['option7'])) {
            $errors['checkbox2'] = __("Bitte wählen Sie um welche Zeit Sie kontaktiert werden möchten");
        }
        return $errors;
    }

    /**
     * Validate optradio day
     * Test if any day is activated.
     * Validate for function validate_optradio_true.
     *
     * @see validateOptradioTrue()
     * @param array $data All data
     * @param array $errors All error
     * @return array
     */
    protected function validateOptradioDay($data, $errors)
    {
        if ($data['optradio'] == 'nein' || empty($data['optradio'])) {
            return $errors;
        }
        $days = $this->optradioArray();
        $errors = $this->optradioLoop($days, $errors, $data);
        return $errors;
    }

    /**
     * Loop for validateOptradioDay
     *
     * @param $days
     * @param $errors
     * @param $data
     * @return mixed
     */
    protected function optradioLoop($days, $errors, $data)
    {
        foreach ($days as $day) {
            if (empty($data[$day])) {
                $errors['checkbox'] = __("Bitte wählen Sie an welchem Tag Sie kontaktiert werden möchten");
            } else {
                unset($errors['checkbox']);
                return $errors;
            }
        }
        return $errors;
    }

    /**
     * Get $days array for validateoptradioDay
     *
     * @return array
     */
    protected function optradioArray()
    {
        $days = array(
            'option1',
            'option2',
            'option3',
            'option4',
            'option5'
        );
        return $days;
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
