<?php
session_start();

include("connections.php");
include("functions.php");

$user_data = check_login($con);

$sql = "SELECT id, username, email, picture FROM login WHERE username = ?";
$stmt = $con->prepare($sql);

if ($stmt) {
    $stmt->bind_param("s", $user_data['username']);
    $stmt->execute();
    $result = $stmt->get_result();

    
    $userData = $result->fetch_assoc();
    
   
    $stmt->close();
} else {
    
    die("Error in database query: " . $con->error);
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="heading.css"></link>
    <title>Document</title>
</head>

<body>
<div class="main">
    <div class="head">
        <div class="hpart">
            <img src="logo.png" href="cau">
        </div>
        <div class="hpart">
            <a href="index.php" class="butt">Home</a>
        </div>
        <div class="hpart">
            <a href="newtask.php" class="butt">Add Task</a>
        </div>
        <div class="hpart">
            <a href="calendar.php" class="butt">Calendar</a>
        </div>
        <div class="hpart">
            <a href="tasks.php" class="butt">Tasks</a>
        </div>
       
        <div class="hpart2">
            
                <a  class="butt">Hello, <?php echo $user_data['username'];?> </a> 
                <?php
        $imagePath = $user_data['picture'];
        echo '<img style="width:50%;" src="' . $imagePath . '" alt="">';
    ?>
        </div>
        <div class="hpart2">
            <div style="width:40%;  transition: background-color 0.3s; "  class="logbutt">
                <a class="butt" href="logout.php">Logout </a>
            </div>
        </div>
       
    </div>
    

</body>
      
        

</html>