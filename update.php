<?php
include('config.php'); 

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    try {

        $sql = "SELECT * FROM users WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
    
            ?>
            <form action="update.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
                <label>First Name:</label>
                <input type="text" name="firstname" value="<?php echo $user['firstname']; ?>"><br>
                <label>Last Name:</label>
                <input type="text" name="lastname" value="<?php echo $user['lastname']; ?>"><br>
                <label>Email:</label>
                <input type="text" name="email" value="<?php echo $user['email']; ?>"><br>
                <input type="submit" name="update" value="Update">
            </form>
            <?php
        } else {
            echo "No user found.";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} elseif (isset($_POST['update'])) {

    $id = $_POST['id'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];

    try {

        $sql = "UPDATE users SET firstname = :firstname, lastname = :lastname, email = :email WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':firstname', $firstname, PDO::PARAM_STR);
        $stmt->bindParam(':lastname', $lastname, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);


        if ($stmt->execute()) {
            echo "Record updated successfully.";
        } else {
            echo "Error updating record.";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }


    header("Location: index.php"); 
    exit();
}
?>
