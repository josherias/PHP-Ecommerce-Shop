<?php

require_once("config/config.php");

class Database
{
    /*   assigning constants from config.php file as properties */
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PWD;
    private $dbname = DB_NAME;

    /* default class properties */
    private $connection;
    private $error;
    private $stmt;
    private $dbconnected = false;


    /* class methods */




    /* constructor */
    public function __construct()
    {
        /*  dsn */
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;

        //seting options/attributes as an array
        $options = array(
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );


        try {
            //set PDO Connection 
            $this->connection = new PDO($dsn, $this->user, $this->pass, $options);
            $this->dbconnected = true;
        } catch (PDOException $e) {
            $this->error = $e->getMessage() . "<br>";
            $this->dbconnected = false;
        }
    }

    /* destructor function */
    public function __destruct()
    {
        $this->closeConnection();
    }



    /* function to close the databaese connection */
    public function closeConnection()
    {
        if ($this->connection != null) {
            $this->connection = null;
        }
    }



    /* function to show errors if any */
    public function getError()
    {
        return $this->error;
    }
    /* check for connection */
    public function isConnected()
    {
        return $this->dbconnected;
    }

    /* prepare stmt with query*/
    public function query($query)
    {
        $this->stmt = $this->connection->prepare($query);
    }

    /* function to bind the values using prep statemnts  */
    public function bind($param, $value, $type = null)
    {


        //if type isnt passed, then chose type automatically
        if (is_null($type)) {
            switch (true) {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
                    break;
            }
        }

        $this->stmt->bindValue($param, $value, $type);
    }

    /* Execute the prepared statement */
    public function execute()
    {
        return $this->stmt->execute();
    }

    /* getthe result set as an array of objects */
    public function resultset()
    {
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /* Get Record row count  */
    public function rowCount()
    {
        return $this->stmt->rowCount();
    }

    /* get single record*/
    public function single()
    {
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }
}
