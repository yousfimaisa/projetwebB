<?php
include '../../Controllers/UserC.php';

if (isset($_GET['id'])) {
    $UserC = new UserC();
    $UserC->deleteuser($_GET['id']);
    header('Location: listUsers.php');
    exit();
}
?>
