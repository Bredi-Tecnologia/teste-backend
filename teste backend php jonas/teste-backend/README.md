# Teste back-end PHP, MYSQL, HTML, CSS e JAVASCRIPT

# IMPORTANTE
```sh 
Prazo de entrega: 12/03/2021
```

# Regras
 - Orientação a objetos.
 - Indentação e comentários (caso precise).
 - Criação do banco de dados.
 - Criar crud (visualizar, cadastrar, alterar e excluir).

# Cenário

 - Um cliente precisa em seu painel de controle um módulo simples de cadastro de produto, em que cada produto está relacionado a uma tabela chamada 'categorias' (script da tabela categorias está abaixo) :
 ```sh
   CREATE TABLE `categorias` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `titulo` VARCHAR(190) NOT NULL,
  PRIMARY KEY (`id`)
  )
  ENGINE=InnoDB;
  INSERT INTO `categorias` (`id`, `titulo`) VALUES (4, 'Alimentos');
  INSERT INTO `categorias` (`id`, `titulo`) VALUES (5, 'Informática');
  INSERT INTO `categorias` (`id`, `titulo`) VALUES (2, 'Eletrodomésticos');
  INSERT INTO `categorias` (`id`, `titulo`) VALUES (3, 'Celulares');
 ```


# Deveres
 - Tela de cadastro de produtos (listar, editar e excluir).
 - Criar a tabela de produtos com os seguintes campos => (id, categoria_id, nome, preço).
 - Caso necessário utilize javascript no layout, será um diferencial.

# Conclusão
- Após finalizar solicite um pull request nesse repositório ou envie um e-mail para contato@bredi.com.br com os seus dados.
