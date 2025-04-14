<?php

require_once __DIR__ . '/../config.php';

class userC
{

    public function listusers()
    {
        $sql = "SELECT * FROM user";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deleteuser($ide)
    {
        $sql = "DELETE FROM user WHERE id = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $ide);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }


    function adduser($user)
{
    $sql = "INSERT INTO user (nom, prenom, telephone)
            VALUES (:nom, :prenom, :telephone)";
    $db = config::getConnexion();
    try {
        $query = $db->prepare($sql);
        $query->execute([
            'nom' => $user->getNom(),
            'prenom' => $user->getPrenom(),
            'telephone' => $user->getTel()
        ]);
    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
    }
}


    function showuser($id)
    {
        $sql = "SELECT * from user where id = $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $user = $query->fetch();
            return $user;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    function updateuser($user, $id)
{
    try {
        $db = config::getConnexion();
        $query = $db->prepare(
            'UPDATE user SET 
                nom = :nom, 
                prenom = :prenom, 
                telephone = :telephone
            WHERE id = :id'
        );

        $query->execute([
            'id' => $id,
            'nom' => $user->getNom(),
            'prenom' => $user->getPrenom(),
            'telephone' => $user->getTel(),
        ]);

        echo $query->rowCount() . " record(s) UPDATED successfully.";
    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
    }
}

}
