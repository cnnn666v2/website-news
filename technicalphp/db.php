<?php
$hsname = "localhost";
$huser = "root";
$hpass= "";
$hdbname = "twoja_stara";

$conn = mysqli_connect($hsname, $huser, $hpass, $hdbname);

try {
    $pdo = new PDO("mysql:host=$hsname;dbname=$hdbname", $huser, $hpass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>