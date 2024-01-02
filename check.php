<?php
require_once 'connect.php';
if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $state = $PDO->prepare('UPDATE todos SET completed = ? WHERE id = ?');
    if (isset($_POST['completed'])) {
        $state->execute([1, $id]);
    } else {
        $state->execute([0, $id]);
    }
    header('Location: index.php');
    exit();
}
?>
