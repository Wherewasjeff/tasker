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
<div class="main2">
    <div class="head">
        <div class="hpart">
            <img src="asset/logo.png" href="cau"</img>
        </div>
        <div class="hpart">
            <a href="main.php" class="butt">Home</a>
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
            <div class="logbutt">
                <a href="login.php" class="butt">Log In</a>
            </div>
        </div>
        <div class="hpart2">
            <div class="regbutt">
                <a href="register.php" class="butt2">Sign Up</a>
            </div>
        </div>
    </div>
    <div class="calb">
        <?php
        include 'database.php';

        $sql = "SELECT task_name, description, due_date, task_status FROM tasks ORDER BY due_date";
        $result = $conn->query($sql);

        $current_month = null;

        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                $due_date = new DateTime($row["due_date"]);
                $month = $due_date->format('F Y');

                if ($current_month !== $month) {
                    // We're in a new month, so output the month header
                    echo "<div class='calhead'><div class='name'><p class='nametext'>$month</p></div></div>";
                    echo "<div class='taskcat'><div class='cat'>Name</div><div class='cat'>Description</div><div class='cat'>Due Date</div><div class='cat'>Progress</div></div>";
                    $current_month = $month;
                }

                echo "<div class='task'>";
                echo "<div class='taskpart'>" . $row["task_name"]. "</div>";
                echo "<div class='taskpart'><p class='description'>" . $row["description"]. "</p></div>";
                echo "<div class='taskpart'>" . $row["due_date"]. "</div>";
                echo "<div class='taskpart'><div class='progressbar'>";
                if ($row["task_status"] === 'todo') {
                    echo "<div class='progress inprogress'></div>";
                } elseif ($row["task_status"] === 'done') {
                    echo "<div class='progress done'>Done!</div>";
                }
                echo "</div></div>";
                echo "</div>";
            }
        } else {
            echo "0 results";
        }
        $conn->close();
        ?>
    </div>
</div>
</body>
</html>
