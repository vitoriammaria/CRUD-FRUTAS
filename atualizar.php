<link rel='stylesheet' href='style.css'> 
<?php
include 'db.php';
if (!isset($_GET['id'])) {
    header('Location: listar.php');
    exit;
}
$id = $_GET['id'];

$stmt = $pdo->prepare('SELECT * FROM cliente WHERE id = ?');
$stmt->execute([$id]);
$appointment = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$appointment) {
    header('Location: listar.php');
    exit;
} 
$nome = $appointment['nome'];
$email = $appointment['email'];
$telefone = $appointment['telefone'];
$data_de_nascimento = $appointment['data_de_nascimento'];


?>

<!DOCTYPE html>
<html>
<head>
     <title>Atualizar </title>
</head>
<body>
    <h1>Atualizar </h1>
    <form method="post">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" value="<?php echo $nome ?>" required><br>

        <label for="email">E-mail:</label>
        <input type="email" name="email" value="<?php echo $email?>" required><br>

        <label for="telefone">Telefone:</label>
        <input type="tel" name="telefone" value="<?php echo $telefone?>" required><br>

        <label for="data">Data_de_nascimento:</label>
        <input type="data" name="data_de_nascimento" value="<?php echo $data_de_nascimento?>" required><br>

        <button type="submit">Atualizar</button>
    </form>
</body>
</html>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
$nome = $_POST['nome'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$data_de_nascimento = $_POST['data_de_nascimento'];

//validaçõa dos dados do formulario aqui
$stmt = $pdo->prepare('UPDATE cliente SET nome = ?, email = ?, telefone = ?, data_de_nascimento = ? WHERE id = ?');
$stmt->execute([$nome, $email, $telefone, $data_de_nascimento, $id]);
header('Location: listar.php');
exit;
}
?>
