<?php

class Database
{
    private $db_host = "localhost";
    private $db_user = "root";
    private $db_pass = "";
    private $db_name = "studentportal";
    private $mysqli;
    private $result = array();
    private $conn = false;

    public function __construct()
    {
        if (!$this->conn) {
            $this->mysqli = new mysqli($this->db_host, $this->db_user, $this->db_pass, $this->db_name);
            $this->conn = true;
            if ($this->mysqli->connect_error) {
                die("Connection failed: " . $this->mysqli->connect_error);
            }
        }
    }

    public function query($sql)
    {
        $query = $this->mysqli->query($sql);
    
        if ($query === false) {
            die("Query failed: " . $this->mysqli->error . "<br>SQL: " . $sql);
        } elseif ($query instanceof mysqli_result) {
            // For SELECT queries
            $this->result = $query->fetch_all(MYSQLI_ASSOC);
            return true;
        } else {
            // For non-SELECT queries (INSERT, UPDATE, DELETE)
            return true;
        }
    }
     
    
    

    public function insert($table, $params = array())
    {
        $columns = implode(', ', array_keys($params));
        $values = "'" . implode("', '", array_values($params)) . "'";

        $sql = "INSERT INTO $table ($columns) VALUES ($values)";
        $this->query($sql);

        return $this->mysqli->insert_id;
    }

    public function update($table, $params = array(), $where = null)
    {
        $set = implode(', ', array_map(function ($key, $value) {
            return "$key = '$value'";
        }, array_keys($params), array_values($params)));

        $sql = "UPDATE $table SET $set";
        if ($where != null) {
            $sql .= " WHERE $where";
        }

        $this->query($sql);

        return $this->mysqli->affected_rows;
    }

    public function delete($table, $where = null)
    {
        $sql = "DELETE FROM $table";
        if ($where != null) {
            $sql .= " WHERE $where";
        }

        $this->query($sql);

        return $this->mysqli->affected_rows;
    }

    public function select($table, $columns = "*", $where = null, $order = null, $limit = null)
    {
        $sql = "SELECT $columns FROM $table";
        if ($where != null) {
            $sql .= " WHERE $where";
        }
        if ($order != null) {
            $sql .= " ORDER BY $order";
        }
        if ($limit != null) {
            $sql .= " LIMIT $limit";
        }

        $this->query($sql);

        return $this->result;
    }

    public function getResult()
    {
        return $this->result;
    }

    public function close()
    {
        $this->mysqli->close();
    }
}

?>
