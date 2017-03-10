<?php

namespace App\Model;

/**
 * Postalcode Model
 *
 * Class Postalcode
 */
class Postalcode extends AppModel
{
    /**
     * Validate postalecode.
     *
     * Makes a new database connection if the land is in $land. Return if zipcode exists.
     *
     * @param array $data All form inputs
     * @return bool True if zip exists
     */
    public function validateZip($data)
    {
        $zip = array(
            'ch',
            'CH',
            'Schweiz',
            'Switzerland',
            'swiss',
            'suisse'
        );
        if (!in_array($data['land'], $zip)) {
            return true;
        }
        $query = db()->newQuery();
        $query->from('postalcodes');
        $query->select([
            'number' => $data['plz']
        ]);
        $query->where([
            'number' => $data['plz'],
            'country' => 'CH'
        ]);
        $postalcodeRow = $query->execute();
        $isNotEmpty = !empty($postalcodeRow);
        return $isNotEmpty;
    }
}
