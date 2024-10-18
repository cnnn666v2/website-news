<?php
session_start();
require($_SERVER['DOCUMENT_ROOT'] . '/technicalphp/db.php');
$user_id = $_SESSION['userID'];
$feed_id = $_POST['feed_id'];
$author_id = $_POST['author_feed_id'];
$action = $_POST['action'];

if (!$user_id || !$feed_id || !$author_id || ($action !== 'like' && $action !== 'dislike')) {
    echo "Invalid request.";
    exit;
}

$check_stmt = $pdo->prepare("SELECT action FROM user_likes_dislikes WHERE user_id = :user_id AND feed_id = :feed_id");
$check_stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
$check_stmt->bindParam(':feed_id', $feed_id, PDO::PARAM_INT);
$check_stmt->execute();
$existing_action = $check_stmt->fetchColumn();

if ($existing_action) {
    if ($existing_action === $action) {
        $delete_stmt = $pdo->prepare("DELETE FROM user_likes_dislikes WHERE user_id = :user_id AND feed_id = :feed_id");
        $delete_stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $delete_stmt->bindParam(':feed_id', $feed_id, PDO::PARAM_INT);
        $delete_stmt->execute();

        if ($action === 'like') {
            $update_stmt = $pdo->prepare("UPDATE user_posts SET likes = likes - 1 WHERE id = :feed_id");
        } else {
            $update_stmt = $pdo->prepare("UPDATE user_posts SET dislikes = dislikes - 1 WHERE id = :feed_id");
        }
        $update_stmt->bindParam(':feed_id', $feed_id, PDO::PARAM_INT);
        $update_stmt->execute();

        echo "You have removed your $action.";
    } else {
        $update_action_stmt = $pdo->prepare("UPDATE user_likes_dislikes SET action = :new_action WHERE user_id = :user_id AND feed_id = :feed_id");
        $update_action_stmt->bindParam(':new_action', $action, PDO::PARAM_STR);
        $update_action_stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $update_action_stmt->bindParam(':feed_id', $feed_id, PDO::PARAM_INT);
        $update_action_stmt->execute();

        if ($action === 'like') {
            $adjust_counts_stmt = $pdo->prepare("UPDATE user_posts SET likes = likes + 1, dislikes = dislikes - 1 WHERE id = :feed_id");
        } else {
            $adjust_counts_stmt = $pdo->prepare("UPDATE user_posts SET likes = likes - 1, dislikes = dislikes + 1 WHERE id = :feed_id");
        }
        $adjust_counts_stmt->bindParam(':feed_id', $feed_id, PDO::PARAM_INT);
        $adjust_counts_stmt->execute();

        echo "You have switched to $action.";
    }
} else {
    $insert_stmt = $pdo->prepare("INSERT INTO user_likes_dislikes (user_id, feed_id, action) VALUES (:user_id, :feed_id, :action)");
    $insert_stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $insert_stmt->bindParam(':feed_id', $feed_id, PDO::PARAM_INT);
    $insert_stmt->bindParam(':action', $action, PDO::PARAM_STR);
    $insert_stmt->execute();

    if ($action === 'like') {
        $update_stmt = $pdo->prepare("UPDATE user_posts SET likes = likes + 1 WHERE id = :feed_id");
    } else {
        $update_stmt = $pdo->prepare("UPDATE user_posts SET dislikes = dislikes + 1 WHERE id = :feed_id");
    }
    $update_stmt->bindParam(':feed_id', $feed_id, PDO::PARAM_INT);
    $update_stmt->execute();

    echo "You have $action'd this post.";
}
header('Location: /users/profile.php?user='. $author_id .'#post'. $feed_id);
?>