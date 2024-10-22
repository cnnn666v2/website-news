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

            $stmt = $pdo->prepare("UPDATE users SET last_seen = CURRENT_TIMESTAMP WHERE id = :user_id");
            $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        
            if ($stmt->execute()) {
                echo json_encode(['status' => 'success', 'message' => 'Status changed to: '. $status]);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Failed to update the status.']);
            }
        } else { echo 'Error occured! 3'; exit; }
    } else { echo 'Error occured! 2'; exit; }
} else { echo 'Error occured 1!'; exit; }
?>