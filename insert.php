<?php
require 'db.php'; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

  

    
    if ($_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $tmp_name = $_FILES['image']['tmp_name'];
        $image_name = $_FILES['image']['name'];

       
        $upload_dir = 'C:/Users/liepa/Pictures/';



      
        $db = new Database();

       
        if ($db->conn->connect_error) {
            die("Connection failed: " . $db->conn->connect_error);
        }

        
        $sql = "INSERT INTO login (username, email, password, picture) VALUES ('$username', '$email', '$password', '$upload_dir$image_name')";

       
        if ($db->conn->query($sql) === TRUE) {
            $response = array('message' => 'Registration successful!'); 
            echo json_encode($response);
            exit;
            
        } else {
            $response = array('message' => 'Error: ' . $db->conn->error);
            echo json_encode($response);
        }


      
        $db->conn->close();

        
    }
}
?>