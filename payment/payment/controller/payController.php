<?php
include(__DIR__ . '/../config.php');
include(__DIR__ . '/../Model/pays.php');

class payController
{
    public function listpay()
    {
        $sql = "SELECT * FROM pays";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deletepay($id)
    {
        $sql = "DELETE FROM pays WHERE id = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function addpay($pay)
    {
        var_dump($pay);
        $sql = "INSERT INTO pays  
            VALUES (NULL, :typec, :cdnumber, :drcode, :bkcode, :securitycode, :datee)";
        
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'typec' => $pay->getTypec(),
                'cdnumber' => $pay->getCdnumber(),
                'drcode' => $pay->getDrcode(),
                'bkcode' => $pay->getBkcode(),
                'securitycode' => $pay->getSecuritycode(),
                'datee' => $pay->getDatee()->format('Y-m-d')
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    

    function updatepay($id,$typec,$cdnumber,$bkcode,$drcode)
    {
        var_dump($pay);
        try {
            $sql = "UPDATE pays SET typec = :typec,
                    cdnumber = :cdnumber,
                    drcode = :drcode,
                    bkcode = :bkcode
                    WHERE id = :id";
            $db = config::getConnexion();
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':typec', $typec, PDO::PARAM_STR);
            $stmt->bindParam(':cdnumber', $cdnumber, PDO::PARAM_STR);
            $stmt->bindParam(':drcode', $drcode, PDO::PARAM_STR);
            $stmt->bindParam(':bkcode', $bkcode, PDO::PARAM_STR);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    
            return $stmt->execute();
        }catch (PDOException $e) {
            echo "Error: " . $e->getMessage(); 
        }
    }
    


    function showpay($id)
    {
        $sql = "SELECT * from pays where id = $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();

            $story = $query->fetch();
            return $story;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }



    public function listpays($search_title = null)
{
    $query = "SELECT * FROM pays";
    $db = config::getConnexion();
    
    if ($search_title) {
        // If search term exists, filter by title
        $query .= " WHERE typec LIKE :search_title";
    }

    $stmt =  $db->prepare($query);

    if ($search_title) {
        // Bind the search term with '%' wildcard for partial matching
        $stmt->bindValue(':search_title', '%' . $search_title . '%');
    }

    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}




}











class facController
{
    public function listfac()
    {
        $sql = "SELECT * FROM facs";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deletefac($id)
    {
        $sql = "DELETE FROM facs WHERE id = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function addfac($fac)
    {
       
        var_dump($fac);
      
        $stryid = $fac->getstryid();
        $user = $fac->getuser();
        $message_text = $fac->getmessage_text();
        $voice_file_path = $fac->getvoice_file_path();
        $gif_file_path = $fac->getgif_file_path();
        $message_type = $fac->getmessage_type();
        $likes = $fac->getlikes();
    
        // Ensure all required fields are not NULL (optional, depending on your requirements)
        if ($stryid === null || $user === null || $message_text === null || $message_type === null) {
            echo "Some required fields are missing.";
            return;
        }
    
        // Handle case for text, voice, or gif message type
        if ($message_type !== 'text' && $message_type !== 'voice' && $message_type !== 'gif') {
            echo "Invalid message type.";
            return;
        }
    
        // Debugging: Log values for troubleshooting
        error_log("stryid: $stryid, user: $user, message_text: $message_text, message_type: $message_type, likes: $likes");
    
        // SQL query with column names explicitly listed
        $sql = "INSERT INTO facz 
                (stryid, user, message_text, voice_file_path, gif_file_path, message_type, dates, likes) 
                VALUES (:stryid, :user, :message_text, :voice_file_path, :gif_file_path, :message_type, NOW(), :likes)";
        
        // Database connection
        $db = config::getConnexion();
        try {
            // Prepare the query
            $query = $db->prepare($sql);
    
            // Execute the query with the provided data
            $query->execute([
                'stryid' => $stryid,
                'user' => $user,
                'message_text' => $message_text,
                'voice_file_path' => $voice_file_path, // May be NULL
                'gif_file_path' => $gif_file_path,     // May be NULL
                'message_type' => $message_type,
                'likes' => $likes
            ]);
    
            // Debugging: Confirm successful execution
            echo 'fac successfully added.';
        } catch (Exception $e) {
            // Log the error for debugging purposes
            error_log("Error: " . $e->getMessage());
    
            // Display user-friendly error message
            echo 'An error occurred while adding the fac. Please check the logs for more details.';
        }
    }
    
    

    public function updatefac($id, $message_tex) {
        try {
            $sql = "UPDATE facz SET message_text = :message_text WHERE id = :id";
            $db = config::getConnexion();
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':message_text', $message_text, PDO::PARAM_STR);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    
            return $stmt->execute();
        } catch (Exception $e) {
            echo "Error updating fac: " . $e->getMessage();
            return false;
        }
    }

    function showfac($id)
    {
        $sql = "SELECT * from facz where id = $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();

            $fac = $query->fetch();
            return $fac;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }


    function showfaclist($stryid)
    {
        $sql = "SELECT * from facz where stryid = :stryid";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute(['stryid' => $stryid]);
    
            // Fetch all facs with the specified stryid
            $facs = $query->fetchAll(PDO::FETCH_ASSOC);
            return $facs;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    public function getfacById($id) {
        // Fetch fac by ID
        $query = "SELECT * FROM facz WHERE id = :id";
        $db = config::getConnexion();
        $stmt =$db->prepare($query);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
}