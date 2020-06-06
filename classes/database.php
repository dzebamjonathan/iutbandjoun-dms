<?php

// namespace App;

// do this for connection
class DB {
    protected $db_host = "localhost";
    protected $db_user= "root";
    protected $db_password= "";
    protected $db_name ="iutstudentsdb";

    protected $connection;

    public function __construct() {
        $this->connect(); 
    }

    public function connect() {
        try {
            $this->connection = new mysqli($this->db_host, $this->db_user, $this->db_password, $this->db_name);
            return $this->connection;
        } catch(Exception $e) {
            throw $e;
        }
    }

    // function to create our input params
    public function prepareParams($data, $update = false) {
         // "id, name, email, password,  "
        if($update == true) {
            $values = '';
            foreach($data as $column => $value) {
                if(empty($value)) {
                    $values .= $column . " = " . $value . ", ";
                }else {
                    $values .= "'$value'" . ", ";
                }
                // print var_dump($value) . "<br>";
            }
        } else {
            $values ="null, ";
            foreach($data as $column => $value) {
                if(empty($value)) {
                    $values .= 'null, ';
                }else {
                    $values .= "'$value'" . ", ";
                }
                // print var_dump($value) . "<br>";
            }
        }

        $values = rtrim($values, ', ');

        return $values;
    }

    public function insert(array $data, string $table_name) {

        $params = $this->prepareParams($data);

        $query = "INSERT INTO $table_name VALUES($params)";

        // die($query);

        // query the database
        if($result = $this->connection->query($query)) {
            if(!$this->connection->commit()) {
                print("could not insert into table");
            }
            return $result;
        }

        die(print_r($this->connection->error_list));
    }

    // Function to update table in database
    

    public function update($data, $table_name, $condition) {
        $params = $this->prepareParams($data);

        $query = "UPDATE $table_name SET $params WHERE $condition";

        // query the database
        if($result = $this->connection->query($query)) {
            print "Data updated";
        }
    }

    // function to handle selection of data from table
    public function selectAll($table_name) {

        $query = "SELECT * FROM $table_name";
        
        if($result = $this->connection->query($query)) {
            // data has been retrieved from the database
            $output = array();

            while($row = $result->fetch_object()) {
                array_push($output, $row);
            }

            // free the result set.
            $result->close();
            return $output;
        }else {
            die('Error: could not query the database');
        }
    }

    public function selectWhere($table_name, $condition) {

        $query = "SELECT * FROM $table_name WHERE $condition";

        if($result = $this->connection->query($query)) {

            $output = array();

            while($row = $result->fetch_object()) {
                array_push($output, $row);
            }

            $result->close();

            if(sizeof($output) == 1) {
                // return first element
                return $output[0];
            }
            
            return $output;
        }
    }

    public function lastInsertedId($table_name, $column_name) {
    
        $query = "SELECT MAX($column_name) FROM $table_name";

        if($result = $this->connection->query($query)) {
        
            return (int) $result->fetch_array()["MAX($column_name)"];
        }else {

            print "something went wrong";
            die(print_r($this->connection->error_list));
        }
    }
}

