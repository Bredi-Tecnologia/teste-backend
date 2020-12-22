<main>

  <section>
    <a href="index.php">
      <button class="btn btn-dark mt-4">
        Voltar
      </button>
    </a>

    <h2 class="mt-3">
      Cadastrar produtos
    </h2>

    <form method="post">
      <div class="form-group">
        <div class="mb-3">
          <label for="nome" class="form-label">Nome</label>
          <input name="nome" type="text" class="form-control" id="nome" placeholder="Nome do produto">
        </div>

        <div class="mb-3">
          <label for="preco" class="form-label">Preço</label>
          <input name="preco" type="number" class="form-control" id="preco" placeholder="Preço do produto">
        </div>

        <div class="mb-3">
          <label for="categoria" class="form-label">Categoria</label>
          <select name="categoria" class="form-select" aria-label="Default select example">
            <option selected>Selecionar</option>
            <!-- <option value="1">One</option>
            <option value="2">Two</option>
            <option value="3">Three</option> -->
          </select>
        </div>

        <div class="d-grid gap-2 col-6 mx-auto mt-4">
          <button type="submit" class="btn btn-success">Enviar</button>
        </div>
      </div>
    </form>
  </section>

</main>