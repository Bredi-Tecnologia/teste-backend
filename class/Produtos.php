<?php
class Produtos
{
    // Connection
    private $conn;

    // Table
    private $db_table = "produtos";

    // Columns
    public $id;
    public $nome;
    public $categoria_id;
    public $preço;


    // Db connection
    public function __construct($db)
    {
        $this->conn = $db;
    }


    public function createOne()
    {
        $sql = "INSERT INTO $this->db_table VALUES (null, ?,?,? )";

        $stmt = $this->conn->prepare($sql);

        if ($stmt->execute(array($this->categoria_id, $this->nome, $this->preço))) {
            return true;
        }
        //print_r( $stmt ->errorInfo());
        return false;
    }

    public function listAll()
    {
        $sql = "SELECT * FROM " . $this->db_table;

        $stmt = $this->conn->prepare($sql);

        $stmt->execute();

        // $info= $sql->fetchAll();

        return $stmt;
    }

    public function updateOne()
    {
        $sql = "UPDATE 
                    ". $this->db_table ."
                SET
                    nome = ?, 
                    categoria_id = ?, 
                    preço = ? 
                WHERE
                    id = ?";
        
        $stmt = $this->conn->prepare($sql);

        $this->nome=htmlspecialchars(strip_tags($this->nome));
        $this->categoria_id=htmlspecialchars(strip_tags($this->categoria_id));
        $this->preço=htmlspecialchars(strip_tags($this->preço));
        $this->id=htmlspecialchars(strip_tags($this->id));

        $stmt->bindParam(1, $this->nome);
        $stmt->bindParam(2, $this->categoria_id);
        $stmt->bindParam(3, $this->preço);
        $stmt->bindParam(4, $this->id);


        if($stmt->execute()){
            return true;
            }
            //print_r( $stmt ->errorInfo());
            return false;
    }

    public function deleteOne()
    {
        $sql = "DELETE FROM $this->db_table WHERE id = :id";

        $stmt = $this->conn->prepare($sql);

        $stmt->bindParam(":id", $this->id);

        return $stmt->execute();
    }
}