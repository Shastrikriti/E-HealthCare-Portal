<?php
session_start();
$con=mysqli_connect("localhost","root","","healthcare");
if(isset($GET['bill'])){
  $pid = $_SESSION['pid'];
        $output='';
        $query=mysqli_query($con,"select p.pid,p.ID,p.fname,p.lname,p.doctor,p.appdate,p.apptime,p.disease,p.allergy,p.prescription,a.docFees from prestb p inner join appointmenttb a on p.ID=a.ID and p.pid = '$pid' and p.ID = '".$_GET['ID']."'");
        while($row = mysqli_fetch_array($query)){
 echo '<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
  </head>
  <body style="background-color:#000C40;color:white;text-align:center;padding-top:50px;">
  <div class="container" style="text-align:left;">
  <center><h3>Search Results</h3></center><br>

  ';
  while($row = mysqli_fetch_array($query)){
    $output .= '
    
    <label> Bill No : </label>HMS_'.$row["pid"].$row["ID"].'<br/><br/>
    <label> Patient : </label>'.$row["fname"].' '.$row["lname"].'<br/><br/>
    <label> Doctor : </label>'.$row["doctor"].'<br/><br/>
    <label> Appointment Date : </label>'.$row["appdate"].'<br/><br/>
    <label> Appointment Time : </label>'.$row["apptime"].'<br/><br/>
    <label> Disease : </label>'.$row["disease"].'<br/><br/>
    <label> Allergies : </label>'.$row["allergy"].'<br/><br/>
    <label> Prescription : </label>'.$row["prescription"].'<br/><br/>
    <label> Fees Paid : </label>$'.$row["docFees"].'<br/>
    
    ';

  }
  
  return $output;
}

    // if(isset($_GET['bill'])){
     
    //     $pid = $_SESSION['pid'];
    //     $output='';
    //     $query=mysqli_query($con,"select p.pid,p.ID,p.fname,p.lname,p.doctor,p.appdate,p.apptime,p.disease,p.allergy,p.prescription,a.docFees from prestb p inner join appointmenttb a on p.ID=a.ID and p.pid = '$pid' and p.ID = '".$_GET['ID']."'");
    //     while($row = mysqli_fetch_array($query)){
    //       $output .= '
          
    //       <label> Bill No : </label>HMS_'.$row["pid"].$row["ID"].'<br/><br/>
    //       <label> Patient : </label>'.$row["fname"].' '.$row["lname"].'<br/><br/>
    //       <label> Doctor : </label>'.$row["doctor"].'<br/><br/>
    //       <label> Appointment Date : </label>'.$row["appdate"].'<br/><br/>
    //       <label> Appointment Time : </label>'.$row["apptime"].'<br/><br/>
    //       <label> Disease : </label>'.$row["disease"].'<br/><br/>
    //       <label> Allergies : </label>'.$row["allergy"].'<br/><br/>
    //       <label> Prescription : </label>'.$row["prescription"].'<br/><br/>
    //       <label> Fees Paid : </label>$'.$row["docFees"].'<br/>
          
    //       ';
      
    //     }
        
    //     return $output;
    //   }


  }




  
echo '</tbody></table></div> 
<div><a href="doctor-panel.php" class="btn btn-light">Go Back</a></div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
  </body>
</html>';
?>