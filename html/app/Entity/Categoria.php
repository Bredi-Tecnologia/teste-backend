<?php

namespace App\Entity;

use App\Database\Database;

use PDO;

class Categoria
{

  /**
   * Indentificador da categoria
   * @var integer
   */
  public $id;

  /**
   * Nome título da categoria
   * @var string
   */
  public $titulo;

  /**
   * Método que irá cadastrar novas categorias
   * @return boolean
   */
  public function cadastrar()
  {
    // INSERIR CATEGORIA NO BANCO DE DADOS

    $db = new Database('categorias');
    $this->id = $db->insert([
      'titulo' => $this->titulo,
    ]);

    //RETORNAR SUCESSO
    return true;
  }

  /**
   * Método responsável por obter as categorias do banco de dados
   * @param  string $where
   * @param  string $order
   * @param  string $limit
   * @return array
   */
  public static function getCategorias($where = null, $order = null, $limit = null)
  {
    return (new Database('categorias'))->select($where, $order, $limit)
      ->fetchAll(PDO::FETCH_CLASS, self::class);
  }


  /**
   * Método responsável por buscar uma categoria pelo seu id
   * @param  integer $id
   * @return Categoria
   */
  public static function getCategoria($id)
  {
    return (new Database('categorias'))->select('id = ' . $id)
      ->fetchObject(self::class);
  }



  /**
   * Método responsável por atualizar uma categoria
   * @return boolean
   */
  public function atualizar()
  {
    return (new Database('categorias'))->update('id = ' . $this->id, [
      'titulo'    => $this->titulo,
    ]);
  }

  /**
   * Método responsável por excluir uma categoria
   * @return boolean
   */
  public function excluir()
  {
    return (new Database('categorias'))->delete('id = ' . $this->id);
  }
}
