<div>
    <h1 style="text-align: center">Cadastre ou Altere</h1>
</div>
<div class="container ">
    <form action="?controller=ProdutosController&<?php echo isset($produto->id) ? "method=atualizar&id={$produto->id}" : "method=salvar"; ?>" method="post" >
            <div class="card-body">
            </div>
            <div class="form-group form-row">
                <label class="col-sm-2 col-form-label text-right">Nome:</label>
                <input type="text" class="form-control col-sm-8" name="nome" id="nome" value="<?php
                echo isset($produto->nome) ? $produto->nome : null;
                ?>" />
            </div>
            <div class="form-group form-row">
                <label class="col-sm-2 col-form-label text-right">Preço:</label>
                <input type="text" class="form-control col-sm-8" name="preco" id="preco" value="<?php
                echo isset($produto->preco) ? $produto->preco : null;
                ?>" />
            </div>
            <div class="form-group form-row">
                <label class="col-sm-2 col-form-label text-right">Categoria:</label>
                <input type="text" class="form-control col-sm-8" name="categoria_id" id="categoria_id" value="<?php
                echo isset($produto->categoria_id) ? $produto->categoria_id : null;
                ?>" />
            </div>
            <div class="card-footer">
                <input type="hidden" name="id" id="id" value="<?php echo isset($produto->id) ? $produto->id : null; ?>" />
                <button class="btn btn-success" type="submit">Salvar</button>
                <input class="btn btn-primary" type="reset" value="Limpar"</input>
                <a class="btn btn-danger" href="?controller=ProdutosController&method=listar">Cancelar</a>
            </div>
        </div>
    </form>
</div>