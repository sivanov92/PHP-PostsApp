<?php
class News
{
    public $title;
    public $description;

    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = 'news';
    private $tablename = 'news';
    private $conn;
    public function __construct()
    {
        $this->conn = new mysqli($this->servername, $this->username, $this->password,$this->dbname);

        // Check connection
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
        echo "Connected successfully";
    }
    public function __destruct()
    {
        $this->conn->close();
    }
    public function AddNews()
    {
        $sql = "INSERT INTO ".$this->tablename." (title, description)
          VALUES ('".$this->title."', '".$this->description."')";

        if ($this->conn->query($sql) === true) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $this->conn->error;
        }
    }
    public function UpdateNews($id)
    {
        $sql = "UPDATE ".$this->tablename." SET name='".$this->title."' , description = '".$this->description."' WHERE id=".$id;
    
        if ($this->conn->query($sql) === true) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . $this->conn->error;
        }
    }
    public function DeleteNews($id)
    {

// sql to delete a record
        $sql = "DELETE FROM ".$this->tablename." WHERE id=".$id;

        if ($this->conn->query($sql) === true) {
            echo "Record deleted successfully";
        } else {
            echo "Error deleting record: " . $this->conn->error;
        }
    }
    public function TotalPages($page, $itemsOnPage)
    {
        //Check
        $cnt=0;
        $sql = "SELECT * FROM ".$this->tablename;
        $result = $this->conn->query($sql);
    
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $cnt++;
            }
        }
        $total_rows = $cnt;
        return ceil($total_rows / $itemsOnPage);
    }
    public function GetNews($page, $itemsOnPage)
    {
        //Results Array
        $results = array();

        $offset = ($page-1) * $itemsOnPage;
        //Get Results
        $sql = "SELECT * FROM ".$this->tablename." LIMIT ".$itemsOnPage." OFFSET ".$offset;
        $result = $this->conn->query($sql);
        if (!$result) {
            echo $sql;
            trigger_error('Invalid query: ' . $this->conn->error);
        }
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $innerarray = array('id'=>$row['id'],'title'=>$row['title'],'description'=>$row['description']);
                array_push($results, $innerarray);
            }
        }
        return $results;
    }
}
