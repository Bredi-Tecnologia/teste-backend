<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="style.css" rel="stylesheet">
</head>

<body>
  <header>
    <h1>Produtos</h1>
  </header>

  <section>
    <div class="novoProdutoModal">

      <h2>Novo produto</h2>
      <div class="novoProdutoEntradas">
        <input type="text" name="" id="nome" placeholder="Nome">
        <select id="categoria">
          <option value="Alimentos">Alimentos</option>
          <option value="Informatica">Informatica</option>
          <option value="Eletrodomesticos">Eletrodomesticos</option>
          <option value="Celulares">Celulares</option>
        </select>
        <input type="text" name="" id="preço" placeholder="Preço">
        <button class="btnCriar" onclick="criarProduto()"> Criar </button>
      </div>
    </div>

    <button class="btnListar" onclick="listarProdutos()">Listar Produtos</button>

    <div class="tabelaProdutos" id="tabelaProdutos">
    </div>
  </section>

  <footer>

  </footer>

</body>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script src="js/index.js"></script>

</html>