<?php
error_reporting(E_ALL);
ini_set('display_errors', true);

spl_autoload_register(function($class) {
    if (file_exists("$class.php")) {
        require_once "$class.php";
        return true;
    }
});
?>
<!DOCTYPE html>
<html lang='pt-br'>
<header>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Cadastro</title>
    <link href='css/bootstrap.min.css' rel='stylesheet'/>
    <link href='css/style.css' rel='stylesheet'/>
</header>
<body>

<div>
<?php
if ($_GET) {
    $controller = isset($_GET['controller']) ? ((class_exists($_GET['controller'])) ? new $_GET['controller'] : NULL ) : null;
    $method     = isset($_GET['method']) ? $_GET['method'] : null;
    if ($controller && $method) {
        if (method_exists($controller, $method)) {
            $parameters = $_GET;
            unset($parameters['controller']);
            unset($parameters['method']);
            call_user_func(array($controller, $method), $parameters);
        } else {
            echo "Método não encontrado!";
        }
    } else {
        echo "Controller não encontrado!";
    }
} else {
    echo '<div><h1 style="text-align: center">Bredi Tecnologia</h1></div><div style="text-align: center ">';
    echo '<h3>Bem-vindo ao Sistema de Cadastro de Produtos!</h3> <br /><br />';
    echo '<a href="?controller=ProdutosController&method=listar" class="btn btn-success">Vamos Começar!</a></div>';
}
?>
            <div>
                <div>
                    <div
                        <div>
                            <h1 style="text-align: center">Desenvolvido por Rodrigo Stiven</h1>
                        </div>
                    </div>
                </div>
            </div>

</body>
</html>