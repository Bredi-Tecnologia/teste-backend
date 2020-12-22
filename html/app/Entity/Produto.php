<?php

namespace App\Entity;

use App\Database\Database;

use PDO;

class Produto
{

  /**
   * Indentificador do produto
   * @var integer
   */
  public $id;

  /**
   * Nome do produto
   * @var string
   */
  public $nome;

  /**
   * Preço do produto
   * @var float
   */
  public $preco;

  /**
   * Categoria do produto
   * @var string
   */
  public $categoria_id;

  /**
   * Método que irá cadastrar novos produtos
   * @return boolean
   */
  public function cadastrar()
  {
    // INSERIR PRODUTO NO BANCO DE DADOS
    $db = new Database('produtos');

    $db = new Database('produtos');
    $this->id = $db->insert([
      'nome' => $this->nome,
      'preco' => $this->preco,
      'categoria_id' => $this->categoria_id
    ]);

    //RETORNAR SUCESSO
    return true;
  }

  /**
   * Método responsável por obter os produtos do banco de dados
   * @param  string $where
   * @param  string $order
   * @param  string $limit
   * @return array
   */
  public static function getProdutos($where = null, $order = null, $limit = null)
  {
    return (new Database('produtos'))->select($where, $order, $limit)
      ->fetchAll(PDO::FETCH_CLASS, self::class);
  }


  /**
   * Método responsável por buscar um produto pelo seu ID
   * @param  integer $id
   * @return Produto
   */
  public static function getProduto($id)
  {
    return (new Database('produtos'))->select('id = ' . $id)
      ->fetchObject(self::class);
  }



  /**
   * Método responsável por atualizar um produto
   * @return boolean
   */
  public function atualizar()
  {
    return (new Database('produtos'))->update('id = ' . $this->id, [
      'nome'    => $this->nome,
      'preco' => $this->preco,
      'categoria_id' => $this->categoria_id,
    ]);
  }

  /**
   * Método responsável por excluir um produto
   * @return boolean
   */
  public function excluir()
  {
    return (new Database('produtos'))->delete('id = ' . $this->id);
  }
}
