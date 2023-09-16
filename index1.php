
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To do list</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
    
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">

    <style>
       
        .main{
            margin-top: 50px;
            width: 400px;
            margin-left: 360px;
        }

        
        .container-fluid{
            margin: 0;
            padding: 0;
        }

        h3{
            font-family: Sofia, serif;
            color: white;
            font-size: 40px;
            font-weight: bolder;
            text-shadow: 2px 2px rgb(245, 51, 51);
            
        }

        .con{
            width:300px;
            margin:auto;
            margin-left: 480px;
            font-size: 25px;
            font-weight: bolder;
            color:red;
        }

        .form-label{
            font-size: 20px;
            font-weight: bolder;
        }

        input[type=text]{
            box-shadow: 5px 5px black;
        }

    .task-item {
        width: 200px;
        height: 40px;
        background-color: black;
        color: white;
        padding: 5px;
        font-size:20px;
    }

    .task-item:hover {
        background-color: green;
        cursor: pointer;
    }

    </style>
</head>
<body>

    <div class="container-fluid">
    <nav class="navbar bg-dark navbar-expand-sm">
    <h3 class="d-flex mx-auto">To-Do-List</h3>
    </nav>
    </div>

    <div class="container mt-3">
        <div class="con">
    <?php
    session_start();
    echo("Welcome". " " .$_SESSION['Name']);
    ?>
    </div>
    </div> 

    <div class="container">
    <div class="main">

    <form action="index1.php" method="POST">
        <label for="Task" class="form-label">Enter Tasks</label>
        <input type="text"class="form-control mt-1" name="Task" id="Task"> <br>
        <input type="hidden" name="Id">
        <button type="submit" class="btn btn-success mt-3">Add Task</button>     
</form>
<br>

<div id="task">

<?php

            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "detail";

            $conn = mysqli_connect($servername, $username, $password, $dbname);

            if (!$conn) {
                echo "Connection fail";
            } 
            
            else {
                // echo "Connection successful";
                if ($_SERVER['REQUEST_METHOD'] == 'POST') { 

                    if(isset($_POST['Task']))
                    {
                    $task = $_POST['Task'];
                    $email=$_SESSION['Email'];

                    $sql = "INSERT INTO tasks values(Null,'$email','$task')";
                    $result = mysqli_query($conn, $sql);

                    if ($result) {
                        // echo "inserted";
                        $sql = "SELECT * from tasks where Email='$email'";
                        $result = mysqli_query($conn, $sql);
                        $rows = mysqli_num_rows($result);
                    
                        if ($rows > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                //Each task item is wrapped in a form
                                echo '<form action="index2.php" method="POST" class="task-form">';
                                echo '<input type="hidden" name="Id" value="' . $row['Id'] . '">';
                                echo '<div class="task-item">' . $row['Task'] . '</div>';
                                echo '<button type="submit" class="btn btn-danger btn-sm">Delete</button>';
                                echo '</form>';
                                echo '<br>';
                            }
                        }
                    
                        }
                
                        // header("location:index.php");
                    } else {
                        echo "Not inserted" . mysqli_error($conn);
                    }
                }
                    
                }
            

            ?>
        </div>
</div>
</div>

</body>

</html>
