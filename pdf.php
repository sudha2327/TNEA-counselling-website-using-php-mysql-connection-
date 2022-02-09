<?php
    session_start();
    include 'database.php';
    $ID= $_SESSION['userid'];
    $sql=mysqli_query($conn,"SELECT * FROM sudha where userid='$ID' ");
    $row  = mysqli_fetch_array($sql,MYSQLI_ASSOC);
    $name=$_SESSION['firstname'];
   include "database.php";
   include_once('fpdf184/fpdf.php');
class pdf extends fpdf{

    function Header(){
          
           $this->setFont('Arial','B',13);
           $this->Cell(80);
           $this->Cell(80,10,'Student final Data',1,0,'C');
           $this->Ln(20);
           

    }

    function Footer(){
        $this->SetY(-15);
        $this->SetFont('Arial','I',8);
        $this->Cell(0,10,'Page'.$this->pageNo().'/{nb}',0,0,'C');

    }
}

// $display_heading=array('firstname'=>'firstname','lastname'=>'lastname','age'=>'age','dob'=>'dob','street_name'=>'street_name', 'villagename'=>'villagename','dist_name'=>'dist_name','pincode'=>'pincode','state_name'=>'state_name','nation'=>'nation','userid'=>'userid','pass_word'=>'pass_word','10thmark'=>'10thmark','12thmark'=>'12thmark','10thcut'=>'10thcut','12thcut'=>'12thcut','profile_pic'=>'profile_pic','sign'=>'sign','random'=>'random','clg'=>'clg');
// $result=mysqli_query($conn,"SELECT firstname,lastname,age,dob,userid,pass_word,10thmark,12thmark,10thcut,12thcut,random from sudha where firstname=' $name'") or die("database error".mysqli_error($conn));
// $header=mysqli_query($conn,"SHOW columns FROM sudha where field !='created_on'");

$sql=mysqli_query($conn,"SELECT *  from sudha where firstname='$name'" );
$row=mysqli_fetch_array($sql,MYSQLI_ASSOC);
$n=$row['firstname'];
$n2=$row['lastname'];
// echo "firstname",$n;
// echo "lastname",$n2;
$dob=$row['dob'];
$age=$row['age'];
$ran=$row['random'];
$i=$row['10thmark'];
$j=$row['12thmark'];
$str=$row['street_name'];
$v=$row['villagename'];
$dt=$row['dist_name'];
$p=$row['pincode'];
$st=$row['state_name'];
$nati=$row['nation'];
$jj=json_decode($row['clg']);
$img=mysqli_query($conn,"SELECT profile_pic from sudha where firstname='$name'");
$rows=mysqli_fetch_assoc($img);
       $imgurl='image/'.$rows['profile_pic'];
       $img2=$imgurl;
$pdf=new PDF();
$pdf->AddPage();
$pdf->AliasNbPages();
$pdf->Cell(20,20,'Name :');
$pdf->Cell(20,20,$n.$n2);
$pdf->Ln();
$pdf->Image($img2,120,30,50,50);
$pdf->Ln();
$pdf->Text(11,50,'DoB :');
$pdf->Text(40,50,$dob);
$pdf->Ln();
$pdf->AliasNbPages();
$pdf->Text(11,60,'Random Number:');
$pdf->Text(50,60,$ran);
$pdf->Ln();
$pdf->Text(11,70,'Age:');
$pdf->Text(50,70,$age);
$pdf->Ln();
$pdf->Text(11,80,"Address :");
$pdf->Text(40,80,$str.',');
$pdf->Text(80,80,$v.',');
$pdf->Text(40,85,$dt.',');
$pdf->Text(80,85,$p.',');
$pdf->Text(40,90,$nati);
$pdf->Text(50,120,'Clg Selected:');
$i=10;
$k=20;
foreach($jj as $l){
    $pdf->Cell($i,$k,$l);
    $pdf->ln();
    $i=10;
    $k=10; 
}
$pdf->Ln();





$pdf->Output();

?>