<?php
session_start();

if (!isset($_SESSION["usuario"])) {
    exit;
}

echo "bem vindo, " . $_SESSION["usuario"] . "! Esta é a página de dashboard.";
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Dashboard</title>
</head>
<body>
    <a href="logout.php">Sair</a>
</body>
</html>