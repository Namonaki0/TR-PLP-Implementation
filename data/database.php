<?php
class DatabaseConnection
{
    private $conn;

    public function __construct($servername, $username, $password, $dbname)
    {
        try {
            $this->conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
            $this->conn = null;
        }
    }

    public function connect()
    {
        return $this->conn;
    }

    public function fetchProducts()
    {
        try {
            $stmt = $this->conn->prepare("SELECT * FROM products");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error fetching products: " . $e->getMessage();
            return null;
        }
    }

    public function close()
    {
        $this->conn = null;
    }
}
