<?php
session_start();
require($_SERVER['DOCUMENT_ROOT'] . '/technicalphp/db.php');

if(isset($_SESSION['userID'])) {
    if($_POST['user_id'] == $_SESSION['userID']) {
        if($_POST['status'] === 'online' || $_POST['status'] === 'offline' || $_POST['status'] === 'away') {
            $user_id = $_POST['user_id'];
            $status = $_POST['status'];
        
            $stmt = $pdo->prepare("UPDATE users SET status = :status WHERE id = :user_id");
            $stmt->bindParam(':status', $status, PDO::PARAM_STR);
            $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
            $stmt->execute();
        
            echo "Status updated to " . $status;
        } else { echo 'Error occured! 3'; exit; }
    } else { echo 'Error occured! 2'; exit; }
} else { echo 'Error occured 1!'; exit; }
?>