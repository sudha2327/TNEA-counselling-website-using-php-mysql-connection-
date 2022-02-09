<?php
session_start();
if(isset($_POST['save'])){
    
    include 'database.php';
    $userid=$_POST['username'];
    $password=$_POST['password'];
    echo "username",$userid;
    //php inj....
    $userid=stripcslashes($userid);
    $password=stripcslashes($password);
    $userid=mysqli_real_escape_string($conn,$userid);
    $password=mysqli_real_escape_string($conn,$password);
  
    echo "password",$password;
    $sql=mysqli_query($conn,"SELECT * FROM sudha where userid='$userid' and pass_word='$password' ");
    $row=mysqli_fetch_array($sql,MYSQLI_ASSOC);
    $c=mysqli_num_rows($sql);

    if($c==1){
      
        echo "connected successfully.... ☣️";
          $_SESSION['userid']=$row['userid'];
          $_SESSION['pass_word']=$row['pass_word'];
          $_SESSION['firstname']=$row['firstname'];
          header("location:home.php");
    }
    else{

        echo " Invalid password/userid... 🧑‍🚀";
        
    }
}


?>