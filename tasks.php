<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="tasks.css"></link>
    <title>Document</title>
</head>
<body>
<?php
include 'header.php';
?>

<div class="main">
    <div class="row">
<div class="search-container">
        <img style="height: 50%; width: 6%;"src="search.png" alt="Search Icon" class="search-icon">
        <input type="text" class="search" placeholder="Search...">
    </div>
    </div>
    <div style="margin-top:5%;" class="row">
        <div class="task-box">
            <div style="justify-content:space-between;" class="row">
                <div class="status">
                    <div style="margin-top: 2%;" class="row">
                        <h1>To Do</h1>
                    </div>
                </div>
                <div style="background: #60A42C;" class="status">
                    <div style="margin-top: 2%;" class="row">
                        <h1>Done</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    

</body>
</html>