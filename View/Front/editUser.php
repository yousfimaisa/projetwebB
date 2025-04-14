<?php
include '../../Controllers/UserC.php';
include '../../Models/User.php'; // ✅ ADD THIS LINE

$UserC = new UserC();


if (isset($_GET['id'])) {
    $user = $UserC->showuser($_GET['id']);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $updatedUser = new User(
        $_POST['id'],
        $_POST['nom'],
        $_POST['prenom'],
        '',  // no password for now
        $_POST['tel']
    );
    $UserC->updateuser($updatedUser, $_POST['id']);
    header('Location: listUsers.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit User</title>
    <link rel="stylesheet" href="css/bootstrap.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Edit User</h2>
        <form method="POST">
            <input type="hidden" name="id" value="<?= $user['id'] ?>">
            <div class="form-group">
                <label>Nom</label>
                <input type="text" name="nom" class="form-control" value="<?= $user['nom'] ?>">
            </div>
            <div class="form-group">
                <label>Prénom</label>
                <input type="text" name="prenom" class="form-control" value="<?= $user['prenom'] ?>">
            </div>
            <div class="form-group">
                <label>Téléphone</label>
                <input type="text" name="tel" class="form-control" value="<?= $user['telephone'] ?>">
            </div>
            <button type="submit" class="btn btn-success">Update</button>
        </form>
    </div>
</body>
</html>
