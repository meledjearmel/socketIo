<?php 

namespace Database;

use PDO;

class Database {

        private $dbname;
        private $dbuser;
        private $dbpass;
        private $dbhost;
        private $pdo;

        public function __construct($dbname = 'socketIo', $dbuser = 'root', $dbpass = 'armel06743632@', $dbhost = 'localhost')
        {
            $this->dbname = $dbname;
            $this->dbuser = $dbuser;
            $this->dbpass = $dbpass;
            $this->dbhost = $dbhost;
        }

        public function getDBname()
        {
            return $this->dbname;
        }

        private function getPDO ()
        {
            if ($this->pdo == null) {
                try {
                    $this->pdo = new PDO('mysql:dbname='. $this->dbname . ';host=' . $this->dbhost, $this->dbuser, $this->dbpass, [
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
                    ]);
                } catch (\Throwable $th) {
                    echo 'DataBase isn\'t connected';
                    die();
                }
            }
            return $this->pdo;
        }

        public function query($table, $fields = '*')
        {
            if (is_array($fields)) {
                $fields = implode(', ', $fields);
            }

            $req = $this->getPDO()->query('SELECT ' . $fields . ' FROM ' . $table);
            return $req->fetchAll();
        }
    }