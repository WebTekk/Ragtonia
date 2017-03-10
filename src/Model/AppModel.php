<?php

namespace App\Model;

/**
 * Base Model Class
 *
 * Class BaseModel
 */
class AppModel
{
    protected $table = null;

    /**
     * Get User by his id
     *
     * @param int $id User id
     * @return array User date
     */
    public function getById($id)
    {
        $query = db()->newQuery();
        $query->select('*')->from($this->table)->where([
            'id' => $id
        ]);
        $row = $query->execute()->fetch('assoc');
        return $row;
    }

    /**
     * Get all users
     *
     * @return array All users
     */
    public function getAll()
    {
        $query = db()->newQuery();
        $query->select('*')->from($this->table);
        $rows = $query->execute()->fetchAll('assoc');
        return $rows;
    }

    /**
     * Add new user
     *
     * @param array $row New user
     * @return boolean True if row inserted
     */
    public function insert($row)
    {
        $superuser = session()->get('user');
        $row['added_by'] = $superuser;
        $result = db()->insert($this->table, $row);
        return $result;
    }

    /**
     * Update user data
     *
     * @param int $id User id
     * @param array $row Updated user data
     * @return boolean True if  row updated
     */
    public function update($id, $row)
    {
        $result = db()->update($this->table, $row, $id);
        return $result;
    }

    /**
     * Delete user
     *
     * @param int $id User id
     * @return boolean True if user deleted
     */
    public function delete($id)
    {
        $result = db()->delete($this->table, ['id' => $id]);
        return $result;
    }
}
