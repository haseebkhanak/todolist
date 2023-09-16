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
            $Id=$_POST['Id'];
            $email=$_SESSION['Email'];
            $sql="DELETE From tasks where Id=$Id and Email='$email'";
            $result=mysqli_query($conn,$sql);
                
            if($result){
                header("location:index1.php");
            }

        else{
            echo"Not Deleted".mysqli_error($conn);
        }
    }
}
?>