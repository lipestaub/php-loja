<?php

include "../conexao/conectar.php";

$operacao = trim($_POST['operacao']);

if ($operacao == "cadastroCliente") {    
    foreach ($_POST as $key=>$value) {
        if (empty(trim($value))) {
            $camposVazios .= "$key, ";
        }
    }

    $camposVazios = substr($camposVazios, 0, -2);

    if ($camposVazios != null && !empty($camposVazios)) {
        echo "<script>alert('Preencha corretamente os campos " . $camposVazios . "!'); window.location.href = '../telas/autoCadastroCliente.php';</script>";
    }
    else {
        $camposInvalidos = "";
        $numeroErros = 0;

        $perfil = 0;
        $nome = trim($_POST['nome']);
        $documento = trim($_POST['documento']);
        $telefone = trim($_POST['telefone']);
        $email = trim($_POST['email']);
        $senha = trim($_POST['senha']);

        if (strlen($nome) < 3) {
            $camposInvalidos .= "\\nO nome deve ter no mínimo 3 caracteres!";
            $numeroErros += 1;
        }

        if (strlen($documento) != 11) {
            $camposInvalidos .= "\\nO CPF deve ter 11 dígitos!";
            $numeroErros += 1;
        }

        if (strlen($telefone) < 9) {
            $camposInvalidos .= "\\nO telefone deve ter no mínimo 9 dígitos!";
            $numeroErros += 1;
        }

        if (strlen($senha) < 6) {
            $camposInvalidos .= "\\nA senha deve ter no mínimo 6 caracteres!";
            $numeroErros += 1;
        }

        if (mysqli_num_rows(mysqli_query($conexao, "SELECT id FROM pessoa WHERE email='$email'")) > 0) {
            $camposInvalidos .= "\\nO e-mail $email já está cadastrado!";
            $numeroErros += 1;
        }

        if (mysqli_num_rows(mysqli_query($conexao, "SELECT id FROM pessoa WHERE documento='$documento'")) > 0) {
            $camposInvalidos .= "\\nO CPF $documento já está cadastrado!";
            $numeroErros += 1;
        }

        if ($numeroErros > 0) {
            echo "<script>alert('Foram identificados " . $numeroErros . " erro(s):\\n" . $camposInvalidos . "'); window.location.href = '../telas/autoCadastroCliente.php';</script>";
        }
        else {
            $query = "INSERT INTO pessoa (nome, documento, telefone, email, senha, perfil) ";
            $query .= "VALUES ('$nome', '$documento', '$telefone', '$email', '$senha', $perfil)";

            $insert = mysqli_query($conexao, $query);
            
            if ($insert) {
                echo "<script>alert('" . $nome . ", seu cadastro foi efetuado com sucesso!'); window.location.href = '../telas/login.php';</script>";
            }
            else {
                echo "<script>alert('Algo deu errado!'); window.location.href = '../telas/autoCadastroCliente.php';</script>";
            }
        }

    }
}