<?php

class UserModel {
    private $table = 'users';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }
    public function getAllUser()
    {
       $this->db->query('SELECT * FROM ' . $this->table);
       return $this->db->resultSet();
    }

    public function getUserById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->single();

    }

    public function addUser($userData)
{
    $hashedPassword = password_hash($userData['password'], PASSWORD_DEFAULT);

    $query = "INSERT INTO $this->table (nama, username, jenis_kelamin, role, email, password, alamat, domisili) VALUES (:nama, :username, :jenis_kelamin, :role, :email, :password, :alamat, :domisili)";

    $this->db->query($query);
    $this->db->bind('nama', $userData['nama']);
    $this->db->bind('username', $userData['username']);
    $this->db->bind('jenis_kelamin', $userData['jenis_kelamin']);
    $this->db->bind('role', $userData['role']);
    $this->db->bind('email', $userData['email']);
    $this->db->bind('password', $hashedPassword);
    $this->db->bind('alamat', $userData['alamat']);
    $this->db->bind('domisili', $userData['domisili']);

    // Execute the prepared statement
    $this->db->execute();

    return $this->db->rowCount();
}

    // public function addUser($userData)
    // {
    //     $hashedPassword = password_hash($userData['password'], PASSWORD_DEFAULT);

    // // Perform the INSERT operation
    // $query = "INSERT INTO $this->table (nama, username, jenis_kelamin, role, email, password, alamat, domisili) VALUES (:nama, :username, :jenis_kelamin, :role, :email, :password, :alamat, :domisili)";
    // $this->db->query($query);
    // $this->db->bind('nama', $userData['nama']);
    // $this->db->bind('username', $userData['username']);
    // $this->db->bind('jenis_kelamin', $userData['jenis_kelamin']);
    // $this->db->bind('role', $userData['role']);
    // $this->db->bind('email', $userData['email']);
    // $this->db->bind('password', $hashedPassword);
    // $this->db->bind('alamat', $userData['alamat']);
    // $this->db->bind('domisili', $userData['domisili']);
    // $this->db->execute();

    // return $this->db->rowCount();
    // }

    public function getUserByUsername($username)
    {
        $this->db->query('SELECT * FROM '.$this->table. ' WHERE username=:username');
        $this->db->bind('username', $username);
        $user = $this->db->single();

        if ($user) {
            $user['password'] = password_hash($user['password'], PASSWORD_DEFAULT);
        }

        return $user;
    }
    
    public function deleteUser($id)
    {
        $query = "DELETE FROM users WHERE id = :id";

        $this->db->query($query);
        $this->db->bind('id', $id);
        $this->db-> execute();

        return $this->db->rowCount();

    }

    public function updateUser($userData)
    {
        $hashedPassword = password_hash($userData['password'], PASSWORD_DEFAULT);

        $query = "UPDATE $this->table SET nama = :nama, username = :username, jenis_kelamin = :jenis_kelamin, role = :role, email = :email, password = :password, alamat = :alamat, domisili = :domisili WHERE id = :id";

        $this->db->query($query);
        $this->db->bind('nama', $userData['nama'] );
        $this->db->bind('username', $userData['username'] );
        $this->db->bind('jenis_kelamin', $userData['jenis_kelamin'] );
        $this->db->bind('role', $userData['role'] );
        $this->db->bind('email', $userData['email'] );
        $this->db->bind('password', $hashedPassword);
        $this->db->bind('alamat', $userData['alamat'] );
        $this->db->bind('domisili', $userData['domisili'] );
        $this->db->bind('id', $userData['id'] );
        

        $this->db->execute();

        return $this->db->rowCount();
    }

}