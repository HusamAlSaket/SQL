<?php  
include 'config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    try {

        $sql = "DELETE FROM users WHERE id=$id";

        $conn->exec($sql);
        header("Location: index.php"); 
        exit();
    } catch(PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }
} else {
    echo "ID not provided.";
}

?>
