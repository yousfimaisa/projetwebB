<?php
include '../../controller/payController.php';
$payController = new payController();
$pay=$payController->showpay($_GET["id"]);

$payController->deletepay($_GET["id"]);
header('Location:paytemp.php');
