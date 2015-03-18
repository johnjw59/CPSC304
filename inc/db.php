<?php
    class Database extends PDO 
    {
        public function __construct($host = null, $user = null, $pass = null, $db = null) {
            try {
                parent::__construct("mysql:dbname=$db;host=$host", $user, $pass);

                $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $this->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_CLASS);
                $this->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, 'SET NAMES utf8');
            } 
            catch (PDOException $e) {
                die('Database Error');
            }
        }
    }

    /* Base object for representing database rows, could be extended with whatever */
    class DBObject { }

    abstract class Repo 
    {
        protected $db;
        protected $table;
        protected $class_name;

        public function __construct(Database $db, $table_name, $class_name = 'DBObject') {
            $this->db = $db;
            $this->table = $table_name;
            $this->class_name = $class_name;
        }

        /* prepares a query */
        protected function prepare($query_str) {
            $query = $this->db->prepare($query_str);
            $query->setFetchMode(PDO::FETCH_CLASS, $this->class_name);
            return $query;
        }

        public abstract function insert($obj); 
        public abstract function save($obj);
        public abstract function byId($id); 

        public function all() {
            $query  = $this->prepare(sprintf('SELECT * FROM %s', $this->table));
            $query->execute();
            return $query->fetchAll();
        }
    }
