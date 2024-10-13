<?php
include ('config.php');
try{
    $sql ="SELECT id,firstname,lastname,email FROM users";
    $stmt = $conn->query($sql);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if(count($result)>0){
        echo "<table border ='1' cellpadding='10' cellspacing='0'>
        <tr>
        <th>ID</th>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>email</th>
        <th>Action</th>
        </tr>";
        foreach($result as $row){
        echo "<tr>
        <td>" .$row['id']. "</td>
        <td>" .$row['firstname']. "</td>
        <td>" .$row['lastname']. "</td>
        <td>" .$row['email']. "</td>
        <td>
        <a href='delete.php?id=" . $row['id'] . "' class='btn btn-danger btn-sm'>Delete</a>
        <a href='update.php?id=" . $row['id'] . "' class='btn btn-warning btn-sm'>Update</a>
        </td>
        </tr>";
    }
        echo "</table>";
        
        
        
    }





}catch(PDOException $e){
echo $sql . "<br>" .$e -> getMessage();
}






?>