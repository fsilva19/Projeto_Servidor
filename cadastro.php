<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de cadastro</title>
</head>
<body>
<?php
    $servername = "sql202.epizy.com";
    $dbname = "	epiz_29704253_baseddos";
    $username = "epiz_29704253";
    $password = "cJitxEXBb5HkIx";

    $user = $_GET["login"];
    $passw = $_GET["senha"];
    $nome = $_GET["nome"];
    $sobrenome = $_GET["sobrenome"];
    $cpf = $_GET["cpf"];
    $idade = $_GET["idade"];

    //fazendo a chamada das funções
    $conexao = conexao($servername, $username, $password, $dbname);
    inserir($user, $nome, $sobrenome, $passw, $cpf, $idade, $conexao);
    function conexao($servername, $username, $password, $dbname){
        $mysqli = mysqli_connect($servername, $username, $password, $dbname);
        if (!$mysqli){
            die("Conexão falhou: ". mysqli_connect_error());
        } else{ echo "Conexão estabelecida com sucesso!";}
        return $mysqli;
    }

    function inserir($user, $nome, $sobrenome, $passw, $cpf, $idade, $conexao){
        $sql = "INSERT INTO clientes (usuario, nome, sobrenome, senha, cpf, idade) 
        VALUES ('$user', '$nome', '$sobrenome', '$passw', '$cpf', '$idade')";
            if(mysqli_query($conexao, $sql)){
                echo "<br>Cadastro realizado com sucesso! ".$nome;
                echo "<br><a href='login.html'>Voltar para página inicial.</a>";
            }
    }

    mysqli_close($conexao);
?>
</body>
</html>