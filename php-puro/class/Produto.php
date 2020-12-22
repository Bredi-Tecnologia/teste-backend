<?php


class Produto
{
    public $id;
    public $nome;
    public $categoria;
    public  $preco;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @return mixed
     */
    public function getCategoria()
    {
        return $this->categoria;
    }

    /**
     * @return mixed
     */
    public function getPreco()
    {
        return $this->preco;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @param mixed $nome
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    /**
     * @param mixed $categoria
     */
    public function setCategoria($categoria)
    {        //para executar com xampp Windows
        include($_SERVER['DOCUMENT_ROOT'].$_SERVER['REQUEST_URI']."app/db_config.php");

        $stmt = $conn->query("SELECT * FROM categorias where id=$categoria");

        foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $p) {
            $this->categoria = $p['titulo'];
        }
    }

    /**
     * @param mixed $preco
     */
    public function setPreco($preco)
    {
        $this->preco = $preco;
    }

    public static function allProdutos()
    {
        //para executar com xampp Windows
        include($_SERVER['DOCUMENT_ROOT'].$_SERVER['REQUEST_URI']."app/db_config.php");

        $stmt = $conn->query('SELECT * FROM produtos order by id desc');
        $produtos = array();
        foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $p){
            $prod = new Produto();
            $prod->setId($p['id']);
            $prod->setCategoria($p['categoria_id']);
            $prod->setNome($p['nome']);
            $prod->setPreco($p['preco']);

            array_push($produtos, $prod);
        }
        return $produtos;

    }

    public static function allCategorias()
    {
        //para executar com xampp Windows
        include($_SERVER['DOCUMENT_ROOT'].$_SERVER['REQUEST_URI']."app/db_config.php");

        $stmt = $conn->query('SELECT * FROM categorias');
        $categorias = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $categorias;
    }

    public static function criarProduto($nome, $categoria, $preco)
    {
        //para executar com xampp Windows
        include($_SERVER['DOCUMENT_ROOT'].$_SERVER['REQUEST_URI']."app/db_config.php");

       $stmt = $conn->prepare("INSERT  INTO produtos (nome, categoria_id, preco) VALUES (:nome,:categoria,:preco)");
       $stmt->bindParam(':nome',$nome);
       $stmt->bindParam(':categoria', $categoria);
       $stmt->bindParam(':preco', $preco);
       $stmt->execute();
    }

    public static function editarProduto($id, $nome, $categoria, $preco)
    {
        //para executar com xampp Windows
        include($_SERVER['DOCUMENT_ROOT'].$_SERVER['REQUEST_URI']."app/db_config.php");

        $stmt = $conn->prepare("UPDATE produtos SET nome = :nome, categoria_id = :categoria, preco = :preco WHERE id = :id");
        $stmt->bindParam(':id',$id);
        $stmt->bindParam(':nome',$nome);
        $stmt->bindParam(':categoria', $categoria);
        $stmt->bindParam(':preco', $preco);
        $stmt->execute();

    }

    public static function deletaProduto($id)
    {
        //para executar com xampp Windows
        include($_SERVER['DOCUMENT_ROOT'].$_SERVER['REQUEST_URI']."app/db_config.php");

        $stmt = $conn->prepare("DELETE FROM produtos WHERE id= :id");
        $stmt->bindParam(':id',$id);
        $stmt->execute();
    }
}