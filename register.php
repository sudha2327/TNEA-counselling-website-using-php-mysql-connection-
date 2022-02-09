<?php

include('database.php');
$userid=$_POST['userid'];

$sql=mysqli_query($conn,"SELECT * FROM sudha where userid='$userid'");
if(mysqli_num_rows($sql)>0){
    echo "User id alredy available...";
    exit;
}else{
    if(isset($_POST['savee'])){
        $firstname=$_POST['name1'];
        $lastname=$_POST['name2'];
        $age=$_POST['age'];
        $dob=$_POST['dob'];
        $street_name=$_POST['addre1'];
        $villagename=$_POST['addre2'];
        $dist_name=$_POST['addre3'];
        $pincode=$_POST['addre4'];
        $state_name=$_POST['addre5'];
        $nation=$_POST['addre6'];
        $userid=$_POST['userid'];
        $pass_word=$_POST['pass'];
        $iithmark=$_POST['xth'] ;
        $xithmark=$_POST['iith'];
        $iithcut=$_POST['cutx'];
        $xithcut=$_POST['cutii'];
        $profile_pic =$_POST['img1'];
        $filename=$_FILES['img1']['name'];
        $imageType=strtolower(pathinfo($filename,PATHINFO_EXTENSION));

        $exe=array("jpg","jpeg","png","gif");

        if(in_array($imageType,$exe)){
            if(move_uploaded_file($_FILES['img1']['tmp_name'],'image/'.$filename)){
                $sql="INSERT INTO sudha(firstname,lastname,age,dob,street_name,villagename,dist_name,pincode,state_name,nation,userid,pass_word,10thmark,12thmark,10thcut,12thcut,profile_pic,sign)VALUES('$firstname','$lastname','$age','$dob','$street_name','$villagename','$dist_name','$pincode','$state_name','$nation','$userid','$pass_word','$iithmark','$xithmark','$iithcut','$xithcut','$filename','')";
    
                $s=mysqli_query($conn,$sql);
                echo "inserted successfully....";
            }else{
                echo "some error in iside of function";
            }
        }else{
            echo "error in imagetype";
        }
        // $sign=$_POST['hey'];
      
    
        if($s){
            echo "recoder successfully... 👍";
            header ("Location: login.html?status=success");
        }else{
            echo ("error varuthuu... 😧");
        }
    
    
    }
    
    
    
    
}


?>


