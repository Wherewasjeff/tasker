<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="calendar.css"></link>
    <title>Document</title>
</head>
<body>
<?php
include 'header.php';
?>

<div class="calb">
        <?php
        include 'api/databaseCalendar.php';

        $sql = "SELECT task_name, description, due_date, task_status FROM tasks ORDER BY due_date";
        $result = $conn->query($sql);

        $current_month = null;

        if ($result->num_rows > 0) {
            
            while($row = $result->fetch_assoc()) {
                $due_date = new DateTime($row["due_date"]);
                $month = $due_date->format('F Y');

                if ($current_month !== $month) {
                   
                    echo "<div class='calhead'><div class='name'><p class='nametext'>$month</p></div></div>";
                    echo "<div class='taskcat'><div class='cat'>Tasks</div><div class='cat'>Description</div><div class='cat'>Due Date</div><div class='cat'>Progress</div></div>";
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
                    echo "<div class='progress done'></div>";
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
