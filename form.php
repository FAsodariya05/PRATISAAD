<!DOCTYPE html>
<html lang="en">
<?php
session_start();
if(!(isset($_COOKIE['police_station']))){
  header("location:index.html");
}
$con=mysqli_connect('localhost','root','');
$db=mysqli_select_db($con,'project_db');
$ps=$_POST['PSID'];
$ct=$_SESSION['city'];
$fid=$_SESSION['fid'];
$qry="UPDATE feedbackn1 set PS_ID='$ps' where SUB_DIV_ID='$ct' AND fid=$fid";

mysqli_query($con,$qry);
$_SESSION['ps']="$ps";
?>
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Feedback Form</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="feather.css">
  <link rel="stylesheet" href="themify-icons.css">
  <link rel="stylesheet" href="vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="select2.min.css">
  <link rel="stylesheet" href="select2-bootstrap.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="GP_logo.png" />
  <style>
    .card {

      position: relative;
      display: flex;
      flex-direction: column;
      min-width: 0;
      word-wrap: break-word;
      background-color: #fff;
      background-clip: border-box;
      border: 1px solid #e3e3e3;
      border-radius: 20px;
      align-content: center;
    }
    .option{
      font-size: 150%;
    }
   
  </style>
</head>

<body>
  <div class="container-scroller">
    <!-- partial:../../partials/_navbar.html -->

    <!-- partial -->

    <div class="row justify-content-center">
      <div class="main-panel">
        <div class="content-wrapper">


          <div class="card">
            <div class="card-body">
              <center><img src="GP_logo.png" alt="logo" height="15%" width="15%"></center><br><br>
              <center><h2><font style="font-family:Cambria"><b>Feedback Form</b></h2></font></center>
              <!-- <form class="forms-sample" action="insert_data.php" method="POST"> -->
                <!-- <div class="form-group">
                  <label for="DISTRICT_ID" style="font-size: 120%">Select District </label>
                  <select class="form-control" name="DID" style="color: black" style="font-size: 150%">
                    
                  </select>
                </div> -->                    
              <form class="forms-sample" action="insert_data.php" method="POST">
                <div class="form-group" style="padding-left:5%; padding-right:5%">
                  <label for="How_come_ps" style="font-size: 100%"><b>How did you Come To The Police Station?</b></label>
                  <select class="form-control" name="HOW_COME_PS" style="color: black; font-size: 100%; width:80%">
                    <option>Select</option>
                    <option>Through a Person Known to a Police Officer</option>
                    <option>With a Neighbour / Local Leader</option>
                    <option>On Your Own</option>
                  </select>
                </div>

                <div class="form-group" style="padding-left:5%; padding-right:5%">
                  <label for="WAIT_TIME"style="font-size: 100%"><b>How much time you had to wait to be heard?</b></label>
                  <select class="form-control" NAME="WAIT_TIME" style="color: black; font-size: 100%; width:80%"style="font-size: 100%">
                    <option>Select</option>
                    <option>More Than 15 Minutes</option>
                    <option>15 Minutes</option>
                    <option>10 Minutes</option>
                    <option>5 Minutes</option>
                    <option>Immediately</option>
                  </select>
                </div>

                <div class="form-group" style="padding-left:5%; padding-right:5%">
                  <label style="font-size: 100%">
                    <b>Was an FIR registered?</b>
                  </label>
                  <br><br>
                  <div style="padding-left:2%; padding-right:5%">
                    <label for="FIR" style="font-size: 100%"> 
                      <input type="radio" id="FIR" name="FIR" value="yes">Yes</input>

                    </label>
                  </div>
                  <div style="padding-left:2%; padding-right:5%">
                    <label for="FIR" style="font-size: 100%">
                      <input type="radio" id="FIR" name="FIR" value="no">No</input>
                    </label>
                  </div>
                </div>

                <div class="form-group" style="padding-left:5%; padding-right:5%">
                  <label style="font-size: 100%">
                    <b>Were you given a copy of FIR?</b>
                  </label>
                  <br><br>
                  <div style="padding-left:2%; padding-right:5%"><label for="COPY_OF_FIR" style="font-size: 100%">
                    <input type="radio" id="COPY_OF_FIR" name="COPY_OF_FIR" value="yes">Yes</input><br>
                    </label>
                  </div>
                  
                  <div style="padding-left:2%; padding-right:5%">
                    <label for="COPY_OF_FIR" style="font-size: 100%">
                      <input type="radio" id="COPY_OF_FIR" name="COPY_OF_FIR" value="no">No</input>
                    </label>
                  </div>
                </div>

                
                <div class="form-group" style="padding-left:5%; padding-right:5%">
                  <label for="PO_NAME"style="font-size: 100%"><b>What is the name of police inspector?</b></label>
                  <input type="text" class="form-control" NAME="PO_NAME">
                </div>
                <div class="form-group" style="padding-left:5%; padding-right:5%">
                  <label for="PO_DESG" style="font-size: 100%; color:black"><b>What was the designation of the officer you interacted with</b></label>
                  <select class="form-control" id="PO_DESG" name="PO_DESG"style="color: black;font-size: 100%">
                    <option>Select</option>
                    <option>Constable</option>
                    <option>Head_Constable</option>
                    <option>SI</option>
                    <option>PSI</option>
                    <option>SHO</option>
                  </select>
                </div>
                <div class="form-group" style="padding-left:5%; padding-right:5%">
                  <label for="BEHAVIOUR_PI"style="font-size: 100%"><b>How was the behaviour of police inspector?</b></label>
                  <input type="text" class="form-control" NAME="BEHAVIOR_PI">
                </div>
                <div class="form-group" style="padding-left:5%; padding-right:5%">
                  <label for="TIME_TO_SOLVE" style="font-size: 100%; color:black"><b>Time to solve the case</b></label>
                  <select class="form-control" id="TIME_TO_SOLVE" name="TIME_TO_SOLVE" style="color: black;font-size: 100%">
                    <option>Select</option>
                    <option>0-1 Days</option>
                    <option>2-3 Days</option>
                    <option>3-5 Days</option>
                    <option>6-10 Days</option>
                    <option>11-30 Days</option>
                  </select>
                </div>
                <div class="form-group" style="padding-left:5%; padding-right:5%">
                  <label style="font-size: 100%">
                    <b>How would you rate your overall experience?</b>
                  </label>
                  <br><br>
                  <div style="padding-left:2%; padding-right:5%">
                    <label for="RATING" style="font-size: 100%">
                      <input type="radio" id="RATING" name="RATING" value="Excellent" > Excellent 😍</input>
                    </label>
                        </div>
                  <div style="padding-left:2%; padding-right:5%">
                    <label for="RATING" style="font-size: 100%">
                      <input type="radio" id="RATING" name="RATING" value="Good" > Good 😃</input>
                    </label>
                  </div>
                  <div style="padding-left:2%; padding-right:5%">
                    <label for="RATING" style="font-size: 100%">
                      <input type="radio" id="RATING" name="RATING" value="Average" > Average 😐</input>
                    </label>
                  </div>
                  <div style="padding-left:2%; padding-right:5%">
                    <label for="RATING" style="font-size: 100%">
                      <input type="radio" id="RATING" name="RATING" value="Bad" > Poor 🙁</input>
                    </label>
                  </div>
                  <div style="padding-left:2%; padding-right:5%">
                    <label for="RATING" style="font-size: 100%">
                      <input type="radio" id="RATING" name="RATING" value="Very Bad" > Very Poor 😢</input>
                    </label>
                  </div>
                </div>
                <div class="form-group" style="padding-left:5%; padding-right:5%">
                  <label for="SUMMARY" style="font-size: 100%"><b>Any additional comments</b></label>
                  <textarea class="form-control" name="SUMMARY" rows="4"></textarea>
                </div>

                <div style="width:500px ;padding-left:6%">
                <input type="submit" class="btn btn-primary mr-2" width="50px" value="Submit">
                <button class="btn btn-light" width="50%">Cancel</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
</body>

</html>