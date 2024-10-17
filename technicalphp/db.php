<?php
$servername = "localhost";
$huser = "root";
$password = "";
$dbname = "twoja_stara";

$conn = mysqli_connect($servername, $huser, $password, $dbname);

try {
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $huser, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>