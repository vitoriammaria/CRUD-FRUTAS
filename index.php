<?php
require_once 'db.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
<link rel='stylesheet' href='style.css'> 
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="">
    <title>Quitanda</title>
</head>
<body>
    <div class="container-formulario">
        <h1>cliente</h1>
    <?php
if (isset($_POST['submit'])){
$nome=$_POST['nome'];
$email=$_POST['email'];
$telefone=$_POST['telefone'];
$data_de_nascimento=$_POST['data'];


    $stmt = $pdo->prepare('INSERT INTO cliente(nome, email, telefone, data_de_nascimento)
    VALUES (:nome, :email, :telefone, :data_de_nascimento)');
    $stmt->execute(['nome'=> $nome, 
    'email'=>$email,
    'telefone'=>$telefone, 'data_de_nascimento'=> $data_de_nascimento]);

    if($stmt->rowcount()){
        echo '<span>Cadasto feito com sucesso!</span>';
    }else{
        '<span>Erro ao cadastrar. tente novamente mais tarde.</span>';
    }
}
if(isset($erro)){
    echo '<span>' . $erro .'</span>';
}

?>
<form method="post">
    <label for="nome">Nome:</label>
    <input type="text" name="nome" required><br>
        
    <label for="email">Email:</label>
    <input type="email" name="email" required><br>
        
    <label for="telefone">Telefone:</label>
    <input type="text" name="telefone" required><br>
        
    <label for="data">Data De Nascimento:</label>
    <input type="date" name="data" required><br>
    <div>
        <button type="submit" name="submit" value="agendar">concluir</button>
        <button><a href='frutas.php'>cadastro frutas</a></button>
        <button><a href='listar.php'>Lista</a></button>
        <div>
</form>
    </div>
</body>
</html>