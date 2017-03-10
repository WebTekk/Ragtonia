<?php

namespace App\Model;

/**
 * User Model
 *
 * Class User
 */
class User extends AppModel
{
    protected $table = 'login';

    /**
     * Login check.
     * Test if login data is correct.
     *
     * @param $data
     * @return bool
     */
    public function checkLogin($data)
    {
        $query = db()->newQuery();
        $query->select('*')->from($this->table)->where([
            'username' => $data['username'],
        ]);
        $row = $query->execute()->fetch('assoc');

        if (password_verify($data['password'], $row['password'])) {
            return true;
        }
        return false;
    }

    /**
     * Check row.
     * Check if username already exists.
     *
     * @param array $data All data.
     * @return bool
     */
    public function checkEntry($data)
    {
        $query = db()->newQuery();
        $query->select('*')->from($this->table)->where([
            'username' => $data['username']
        ]);
        $row = $query->execute()->fetch('assoc');

        if (empty($row)) {
            return false;
        }
        return true;
    }

    /**
     * Get username by id.
     * Get username by his id.
     *
     * @param int $id
     * @return array|false
     */
    public function getUsernameById($id)
    {
        $query = db()->newQuery();
        $query->select('username')->from($this->table)->where(['id' => $id]);
        $row = $query->execute()->fetch('assoc');
        return $row;
    }
}
