<?php
            session_start();
            include 'database.php';
            $ID= $_SESSION['userid'];
            $sql=mysqli_query($conn,"SELECT * FROM sudha where userid='$ID' ");
            $row  = mysqli_fetch_array($sql,MYSQLI_ASSOC);
            
          
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
<title>Home page</title>

<link rel="stylesheet" href="index3.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="assests/css/style.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

</head>
<body>

<selectio id="main">
    <nav>
        <a href="#" class="logo">
            <img src="ShangriLaSkyCaptain.jpg" alt="logo_of_mine">
        </a>
        <span class="menuspace"></span>

        <ul class="menu">
            <li><a href="#">Home</a></li>
            <li><a href="#">Collges</a></li>
            <li><a href="#">download</a></li>
            <li><a href="profile">profile</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>
</selectio>
<div id="main2">
    <div class="signup-form">
        <form action="home3.php" method="post" enctype="multipart/form-data">
            <div class="rando">
                <p class="r1">Acknowledgment 📝</p>
            </div>
           
            
            <?php
                        $name=$_SESSION['firstname'];
                        $img=mysqli_query($conn,"SELECT profile_pic from sudha where firstname='$name'");
                        $rows=mysqli_fetch_assoc($img);
                               $imgurl='image/'.$rows['profile_pic'];
                               $img2=$imgurl;

                        ?>
 <?php
            $sql=mysqli_query($conn,"SELECT firstname, lastname,dob,10thmark,12thmark from sudha where firstname='$name'" );
            $row=mysqli_fetch_array($sql,MYSQLI_ASSOC);
            $n=$row['firstname'];
            $n2=$row['lastname'];
           // echo "firstname",$n;
           // echo "lastname",$n2;
           $dob=$row['dob'];
           $i=$row['10thmark'];
           $j=$row['12thmark'];
          
        ?>

<div class="ckc">
<p class="head">Kindly check all the check box <p>
<div id="tic">
<input type="checkbox"  id="1">
<label for="1">I am aware of onlince counselling so , if i got any issues in my college, i wont drop my case about Svs tech company</label>
</br><input type="checkbox" id="2">
<label for="2">I have uploaded my realistic document in this portal</lable>
</br>
<input type="checkbox" id="3">
<label for="3">I not upload any fake person document in corresponding place</label>
</br>
<input type="checkbox" id="4">
<label for="4">i will check my mail and mobile notification everyday for glimpse portal noti</lable>
</br>
<input type="checkbox" id="5">
<label for="5">Once i fallen from 1st round i will not be suffer and i would wait for next round selection</lable>
</br>
<input type="checkbox" id="6">
<label for="6">I am ready to Acknowledge all the detatils is my personal data</label>
</div>


</div>


<div id="ram1"> 
  <div class="bro">
                            <p class="namee">Name    : <p class="namee1"><?php  echo $n," ",$n2   ?></p>
                                </p>
                                <!-- <p class="dob">Date Of Birth :<p class="dob1"><?php echo $dob;?></p></p>
                                <p class="xith">10 th mark :<p class="xith1"><?php echo $i;?> /500</p></p>
                                <p class="iith">12th mark  :<p class="iith1"><?php echo $j;?>/1200</p></p> -->
                             </div> 
                             
 
     <div class="rani">
      
     </div>

     <div class="send">
     <button type="submit" name="send5" id="send5" >Send ➡️</button>
         <?php
               if(isset($_POST['send5'])){
                   header("Location:pdf.php");
               }
         ?>
     </div>
</div>


</form>        
</div>
</div>
</body>
</html>