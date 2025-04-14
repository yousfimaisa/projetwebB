<?php
include '../../controller/payController.php';

$payController = new payController();

if (isset($_POST['id'], $_POST['typec'], $_POST['cdnumber'], $_POST['bkcode'], $_POST['drcode'])) {
    $id = $_POST['id'];
    $typec = $_POST['typec'];
    $cdnumber = $_POST['cdnumber'];
    $bkcode = $_POST['bkcode'];
    $drcode = $_POST['drcode'];


    // Update the comment in the database
    $result = $payController->updatepay($id,$typec,$cdnumber,$bkcode,$drcode);

    if ($result) {
        header('Location: paytemp.php'); // Redirect back to the blog page
        exit();
    } else {
        echo "Failed to update comment.";
    }
} else {
    echo "Invalid request.";
}
?>
