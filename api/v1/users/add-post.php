<?php
session_start();
require($_SERVER['DOCUMENT_ROOT'] . '/technicalphp/db.php');

if(isset($_SESSION['userID'])) { 
    $pauthor = $_SESSION['userID'];
    $ptitle = $_POST['feed-title'];
    $pcontent = $_POST['feed-input'];
    //$pcurrdate = date("d-m-Y");

    $stmt = $pdo->prepare("INSERT INTO user_posts (author_id, title, content, created_at, likes, dislikes) VALUES (:author_id, :title, :content, CURRENT_TIMESTAMP, 0, 0)");
    $stmt->bindParam(':author_id', $pauthor, PDO::PARAM_INT);
    $stmt->bindParam(':title', $ptitle, PDO::PARAM_STR);
    $stmt->bindParam(':content', $pcontent, PDO::PARAM_STR);
    //$stmt->bindParam(':created_at', $pcurrdate, PDO::PARAM_STR);

    if ($stmt->execute()) {
        echo json_encode(['status' => 'success', 'message' => 'Post created successfully!']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to create post.']);
    }
} else { echo 'Error occured 1!'; exit; }
?>