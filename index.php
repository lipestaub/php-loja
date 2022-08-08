<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="icon" href="../recursos/carrinho.ico">
    <title>Azamon</title>
</head>

<menu>
    <?php
    session_start();

    if (!isset($_SESSION['perfil']) || $_SESSION['perfil'] == 0) {
    ?>
        <a href="../index.php">Home</a>
        <a href="telas/login.php">Entrar</a>
        <a href="telas/autoCadastroCliente.php">Cadastre-se</a>
        <a href="telas/carrinho.php">Meu Carrinho</a>
        <a href="telas/buscaProdutos.php">Buscar Produtos</a>
        <a href="../controle/controleLogout.php">Sair</a>         
    <?php
    }
    elseif ($_SESSION['perfil'] == 1) {
    ?>
        <a href="../index.php">Home</a>
        <a href="telas/login.php">Entrar/Cadastrar-se</a>
        <a href="telas/carrinho.php">Meu Carrinho</a>
        <a href="telas/buscaProdutos.php">Buscar Produtos</a>
        <a href="telas/cadastroProdutos.php">Cadastrar Produtos</a>
        <a href="telas/cadastroClientes.php">Cadastrar Clientes</a>
        <a href="telas/cadastroFuncionarios.php">Cadastrar Funcionarios</a>
        <a href="../controle/controleLogout.php">Sair</a>
    <?php
    }
    ?>
</menu>

<body>
    
</body>
</html>