<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    //dados do banco de dados
    $servername = "sql202.epizy.com";
    $dbname = "	epiz_29704253_baseddos";
    $username = "epiz_29704253";
    $password = "cJitxEXBb5HkIx";
    //dados de login
    $nome_usuario = $_GET["nomeuser"];
    $senha = $_GET["pass"];

    //fazendo a chamada das funções
    $conexao = conexao($servername, $username, $password, $dbname);
    login($nome_usuario, $senha, $conexao);

    //fazendo a conexão com o banco
    function conexao($servername, $username, $password, $dbname){
        $mysqli = mysqli_connect($servername, $username, $password, $dbname);
        if (!$mysqli){
            die("Conexão falhou: ". mysqli_connect_error());
        } else{ echo "Conexão estabelecida com sucesso!";}
        return $mysqli;
    }
    //verificando se existe cadastrado
    function login($nome_usuario, $senha, $conexao){
        $sqlverif = "SELECT usuario, senha, nome, sobrenome FROM clientes WHERE usuario='$nome_usuario' AND senha='$senha'" ;
        $verif = mysqli_query($conexao, $sqlverif);
        $row = mysqli_fetch_assoc($verif);
        if(mysqli_num_rows($verif)>0){
            echo "<br>Seja bem vindo, " .$row['nome']." ".$row['sobrenome'];
            echo "<br><a href='login.html'>Voltar para página inicial.</a>";
        }else{
            echo "<br>Usuário não encontrado.";
            echo "<br><a href='login.html'>Voltar para página inicial.</a>";
        }
    }

    
    mysqli_close($conexao);
?>
</body>
</html>
