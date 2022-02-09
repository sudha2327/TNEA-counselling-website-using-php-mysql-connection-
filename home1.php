

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
<?php
            session_start();
            include 'database.php';
            $ID= $_SESSION['userid'];
            $sql=mysqli_query($conn,"SELECT * FROM sudha where userid='$ID' ");
            $row  = mysqli_fetch_array($sql,MYSQLI_ASSOC);
            $name=$_SESSION['firstname'];
            
          
?>
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
        <form action="home1.php" method="post" enctype="multipart/form-data">
            <div class="rando">
                <p class="r1">Collges selection option 🥇
                </p>
            </div>
            <?php
            $sql=mysqli_query($conn,"SELECT firstname,lastname,random from sudha where firstname='$name'" );
            $row=mysqli_fetch_array($sql,MYSQLI_ASSOC);
            $n=$row['firstname'];
            $n2=$row['lastname'];
            $r=$row['random'];
  
        ?>

            <div id="ram"> 
                        <p class="namee">Name    : <p class="namee1"><?php  echo $n," ",$n2; ?></p></p>
                        <p class="dob">Random Number<p class="dob1"><?php echo $r;?></p></p>
                        <p class="li">List Of Colleges(Kindly choose your wish colleges</p>    
                               
            </div>

            <div id="list">
             
            <select id="clgr"   name='choose_category[]'  multiple size=27  name="clg">
     <option>1	University Departments of Anna University, Chennai - CEG Campus</option>
     <option>2	University Departments of Anna University, Chennai - ACT Campus </option>
     <option> 3	University Departments of Anna University, Chennai - SAP Campus</option>
     <option> 4	University Departments of Anna University, Chennai - MIT Campus</option>
     <option> 1013	University College of Engineering, Villupuram</option>
     <option> 1014	University College of Engineering, Tindivanam</option>
     <option> 1015	University College of Engineering, Arni</option>
     <option>1026	University College of Engineering, Kanchipuram </option>
     <option> 1101	Aalim Muhammed Salegh College of Engineering</option>
     <option>1102	Bhajarang Engineering College </option>
     <option> 1104	Pallava Raja College of Engineering</option>
     <option> 1106	Jaya Engineering College</option>
     <option>1106	Jaya Engineering College </option>
     <option>1110	Prathyusha Engineering College </option>
     <option> 1112	R.M.D. Engineering College</option>
     <option> 1114	S.A. Engineering College</option>
     <option> 1115	Sriram Engineering College</option>
     <option> 1116	Sri Venkateswara College of Engineering and Technology</option>
     <option>1118	Vel Tech Multi Tech Dr. Rangarajan Dr. Sakunthala Engineering College </option>
     <option> 1120	Velammal Engineering College</option>
     <option>1121	Sri Venkateswara Institute of Science and Technology </option>
     <option>1122	Vel Tech High Tech Dr. Rangarajan Dr. Sakunthala Engineering College </option>
     <option> 1123	Gojan School of Business and Technology</option>
     <option> 1124	Sams College of Engineering and Technology</option>
     <option>1125	PMR Engineering College </option>
     <option> 1126	JNN Institute of Engineering</option>
     <option>1127	St. Peter's College of Engineering and Technology </option>
     <option> 1128	R.M.K. College of Engineering and Technology</option>
     <option> 1130	Marg Institute of Design & Architecture Swarnabhoomi (Midas)</option>
     <option>1131	Vel Tech </option>
     <option>1132	Rajalakshmi School of Architecture </option>
     <option>1133	Annai Veilankanni's College of Engineering </option>
     <option> 1134	Surya School of Architecture</option>
     <option>1135	Aalim Muhammed Salegh Academy of Architecture </option>
     <option> 1136	Vedhantha Institute of Technology</option>
     <option> 1137	Annai Mira College of Engineering and Technology</option>
     <option>1138	Da Vinci School of Design and Architecture </option>
     <option> 1140	Jeppiaar Institute of Technology</option>
     <option>1141	R.V.S. Padhmavathy College of Engineering & Technology </option>

</select>

<button type="submit" name="send3" id="send3">ADD</button>

</div>


<div class="out">
    <p class="out1"><?php


 $i=0;
    if(isset($_POST['send3'])){
          if(isset($_POST['choose_category'])){

            $a=json_encode(    $_POST['choose_category']);
            $sql=mysqli_query($conn,"UPDATE sudha set clg='$a' where firstname='$name'");
            foreach($_POST['choose_category'] as $ch){
                echo $ch;
               
                echo "<br>";
            }
          }
       
           
    }
 


?>
</p>
</div>

            <div class="send">
                
                  <button type="submit" name="send" id="send1"><a href="home3.php">Send </a></button>


            </div>
</div>


</form>        
    </div>
</div>
</body>
</html>


