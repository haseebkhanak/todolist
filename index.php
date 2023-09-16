<?php
            session_start();
            $servername="localhost";
            $username="root";
            $password="";
            $dbname="detail";
            
            $conn=mysqli_connect($servername,$username,$password,$dbname);
            
            if(!$conn)
            {
                echo"Connection fail";
            }
            
            else{

    if($_SERVER['REQUEST_METHOD']=='POST')
    {
        
        if(isset($_POST['Name'])&&($_POST['Email']))
        {
            $name=$_POST['Name'];
            $email=$_POST['Email'];

            $sql="SELECT Email FROM list where Email='$email'";
            $result=mysqli_query($conn,$sql);
            $rows=mysqli_num_rows($result);
    
        if($rows>0)
            {
                echo '<div class="alert alert-danger alert-dismissible">
                <button class="btn-close" data-bs-dismiss="alert"></button>
                Email already exist! Try another email...
                </div>';
            }

    else{
            $sql="INSERT INTO list values(Null,'$name','$email')";
            $result=mysqli_query($conn,$sql);
            if($result){
                // echo"inserted";
                header("location:index1.php");
            }

        else{
            echo"Not inserted".mysqli_error($conn);
        }
        }

        $_SESSION['Name']=$name;
        $_SESSION['Email']=$email;
    }
    } 
 } 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-do list app</title>

     
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

        .main2{
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

        .form-label{
            font-size: 20px;
            font-weight: bolder;
        }

        input[type=text]{
            box-shadow: 5px 5px black;
        }

        input[type=email]{
            box-shadow: 5px 5px black;
        }

        .navbar{
            box-shadow: 0px 8px 8px 0px rgb(135, 142, 146);
        }
    </style>
</head>
<body>

    <div class="container-fluid">
    <nav class="navbar bg-dark navbar-expand-sm">
    <h3 class="d-flex mx-auto">To-Do-List</h3>
    </nav>
    </div>

    <div class="container">

        <div class="main">
        <form action="index.php" method="POST">

            <label for="Name" class="form-label">Enter your name</label>
            <input type="text"class="form-control mt-1" name="Name" id="Name"> <br> <br>

            <label for="Email" class="form-label">Enter your email</label>
            <input type="email"class="form-control mt-1" name="Email" id="Email"> <br>

            <button type="submit" class="btn btn-primary mt-3">Submit</button >
</form>

</div>
</div>
</body>

<script>

    // function addname(){

    //     let input=document.getElementById("Name");
    //     let element=document.getElementById("name");
    //     element.value=input.value;

    // }

    // function addtask(){

    //     let input=document.getElementById("Email");
    //     let element=document.getElementById("email");
    //     element.value+=input.value;

    // }

</script>
</html>