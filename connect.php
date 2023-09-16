<?php
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
    echo"Connection successfull";
    if($_SERVER['REQUEST_METHOD']=='POST')
    {
        $name=$_POST['Name'];
        $sql="INSERT INTO list values($name)";
        $result=mysqli_query($conn,$sql);
        if($result){
            echo"inserted";
        }

        else{
            echo"Not inserted".mysqli_error($conn);
        }
    }
}

$sql="CREATE TABLE list(
    Id int auto_increment Primary key,
    Name varchar(100),
    Email varchar(100) unique
)";

$result=mysqli_query($conn,$sql);
if($result)
{
    echo"Table created";
}

else{
    echo"Table not created";
}

$sql="CREATE TABLE tasks(
    Id int auto_increment primary key,
    Email varchar(100),
    Task varchar(100),
    Foreign key(Email) references list(Email)
)";

$result=mysqli_query($conn,$sql);
if($result)
{
    echo"Table created";
}

else{
    echo"Table not created";
}
?>