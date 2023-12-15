<?php

class Database {
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $db_name = DB_NAME;

    private $dbh;
    private $stmt;

    public function __construct()
    {
        $dsn = 'mysql:host=' . $this->host . ';dbname=' .$this->db_name;

        $option = [
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE=> PDO::ERRMODE_EXCEPTION
        ];

        try {
            $this->dbh = new PDO($dsn, $this->user, $this->pass, $option);
        } catch (PDOException $e) {
            die($e->getMessage());
        }  
    }

    public function query($query)
    {
        $this->stmt = $this->dbh->prepare($query);
    }

    public function bind($param, $value, $type = null)
    {
        if( is_null($type) ) {
            switch( true ) {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default :
                        $type = PDO::PARAM_STR;  
            }
        }
        $this->stmt->bindValue($param, $value, $type);
    }   

    public function execute()
    {
        $this->stmt->execute();
    }

    public function resultSet()
    {
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function single()
    {
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function rowCount()
    {
        return $this->stmt->rowCount();
    }
}

// class Model
// {
//     protected $db;

//     public function __construct()
//     {
//         // Initialize your database connection here
//         $this->db = new Database(); // Replace with your database connection code
//     }
// }

// class Session
// {
//     public static function init()
//     {
//         if (session_status() == PHP_SESSION_NONE) {
//             session_start();
//         }
//     }

//     public static function set($key, $value)
//     {
//         self::init();
//         $_SESSION[$key] = $value;
//     }

//     public static function get($key)
//     {
//         self::init();
//         return isset($_SESSION[$key]) ? $_SESSION[$key] : null;
//     }

//     public static function destroy()
//     {
//         self::init();
//         session_unset();
//         session_destroy();
//     }

//     // You can add more session-related functions as needed
// }