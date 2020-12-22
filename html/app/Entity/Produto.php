<?php

namespace App\Entity;

class Produto
{

  /**
   * Indentificador de do produto
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
  public $categoria;

  /**
   * Método que irá cadastrar novos produtos
   * @return boolean
   */
  public function cadastrar()
  {
    
  }
}
