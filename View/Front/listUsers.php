<?php
include '../../Controllers/UserC.php';

$UserC = new UserC();
$users = $UserC->listusers();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User List</title>
    <link rel="stylesheet" href="css/bootstrap.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">User List</h2>
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Téléphone</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td><?= $user['id'] ?></td>
                    <td><?= $user['nom'] ?></td>
                    <td><?= $user['prenom'] ?></td>
                    <td><?= $user['telephone'] ?></td>
                    <td>
                        <a href="editUser.php?id=<?= $user['id'] ?>" class="btn btn-primary btn-sm">Edit</a>
                        <a href="deleteUser.php?id=<?= $user['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
