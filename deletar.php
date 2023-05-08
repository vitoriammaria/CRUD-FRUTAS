<link rel='stylesheet' href='style.css'> 
<?php
include 'db.php';

if(!isset($_GET['id'])){
    header('location: listar.php');
    exit;
}

$id = $_GET['id'];
$stmt = $pdo->prepare('SELECT * FROM cliente WHERE id = ?');
$stmt->execute([$id]);
$appointment = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$appointment) {
    header('location: listar.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
$stmt =$pdo->prepare('SELECT * FROM cliente WHERE id = ?');
$stmt->execute([$id]);
header('location:listar.php');
exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Deletar </title>
</head>
<body>
<h1>Deletar </h1>
<p>tem certeza que deseja deletar de
    <?php echo $appointment['nome']; ?> 
    <?php echo $appointment['email']; ?> 
    <?php echo $appointment['telefone']; ?> 
   em <?php echo date('d/m/y',strtotime($appointment['data_de_nascimento'])); ?></p>   
<form method="post">
    <button type="submit">sim</button>
    <button href="listar.php">Não</button>
</form>
</body>
</html>
