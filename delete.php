<?php
    require_once 'connect.php';
    $id = $_GET['id'];
    $state = $PDO->prepare('DELETE FROM todos WHERE id = ?');
    $delete = $state->execute([$id]);
    if ($delete) {
        header('Location: index.php');
        exit();
    } else {
        echo 'Error, Not Deleted';
    }
?>
