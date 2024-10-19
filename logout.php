<?php
session_start();

if(isset($_SESSION['userID'])) {
    require($_SERVER['DOCUMENT_ROOT'] . '/technicalphp/db.php');
    $user_id = $_SESSION['userID'];
    $status = 'offline';

    $stmt = $pdo->prepare("UPDATE users SET status = :status WHERE id = :user_id");
    $stmt->bindParam(':status', $status, PDO::PARAM_STR);
    $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $stmt->execute();

    if($stmt->execute()) {
        echo 'Success!';
    } else {
        echo 'Failure!';
    }
}

session_unset();
session_destroy();
header('Location: login.php');
exit;
?>