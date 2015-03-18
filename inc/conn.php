<?php
    $sql_servername = 'localhost';
    $sql_username = 'jwiebeca_cpsc304';
    $sql_password = 'P[q!O%e;q4z7';
    $sql_database = 'jwiebeca_cpsc304';
    
    // Create connection
    $dsn = "mysql:host=$sql_servername;dbname=$sql_database";
    $options = array(
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
    ); 

    $db = new PDO($dsn, $sql_username, $sql_password, $options);
    
    /* Base database wrapper. extend for each table */
    abstract class Repo 
    {
        protected $db;
        protected $table;

        public function __construct(PDO $db, $table_name) {
            $this->db = $db;
            $this->table = $table_name;
        }

        public abstract function insert($obj); 
        public abstract function save($obj);
        public abstract function byId($id); 

        public function all() {
            $query = $this->db->prepare(sprintf('SELECT * FROM `%s`', $this->table));
            $query->execute();
            $rows  = $query->fetchAll(PDO::FETCH_CLASS);
            return $rows;
        }
    }
