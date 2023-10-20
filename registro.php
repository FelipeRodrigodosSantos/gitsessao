<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST["usuario"];
    $senha = password_hash($_POST["senha"], PASSWORD_BCRYPT);
    $email = $_POST["email"];

    try {
        $pdo = new PDO("mysql:host=localhost;dbname=autenticacao", "root", "");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOExeption $e) {
        die("Erro na conexão com o banco de dados: " . $e->getMessage());
    }

    // Insira os dados na tabela 'users'
    $stmt = $pdo->prepare("INSERT INTO usuarios (usuario, senha, email) VALUES (?, ?, ?)");
    $stmt->execute([$usuario, $senha, $email]);

    $_SESSION["usuario"] = $usuario;
    header("location:dashboard.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Document</title>
</head>
<body>
    <h2>Cadastro</h2>
    <form method="post">
        <input type="text" name="usuario" placeholder="Nome de Usuário" required><br>
        <input type="password" name="senha" placeholder="Senha" required><br>
        <input type="email" name="email" placeholder="Email" required><br>
        <input type="submit" value="cadastrar">
</form>
</body>
</html>