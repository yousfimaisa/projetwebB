<?php
include '../../controller/payController.php';
$payController = new payController();
$payController->deletepay($_GET["id"]);
header('Location:paytemp.php');
