<?php
session_start();
$con = mysqli_connect('localhost','root','');
$db = mysqli_select_db($con,'project_db');
// $DISTRICT_ID = $_REQUEST['DID'];//DROPDOWN
// $SUB_DIV_ID = $_REQUEST['SDID'];//DROPDOWN
// $PS_ID = $_REQUEST['PSID'];//DROPDOWN
$HOW_COME_PS = $_REQUEST['HOW_COME_PS'];//RADIO BUTTON
$WAIT_TIME = $_REQUEST['WAIT_TIME'];//RANGE
$BEHAVIOR_PI = $_REQUEST['BEHAVIOR_PI'];//TEXT
$FIR = $_REQUEST['FIR'];//RADIO
$COPY_OF_FIR = $_REQUEST['COPY_OF_FIR'];//RADIO

$TIME_TO_SOLVE = $_REQUEST['TIME_TO_SOLVE'];
$PO_NAME = $_REQUEST['PO_NAME'];//TEXT
$PO_DESG = $_REQUEST['PO_DESG'];//DROPDOWN
$SUMMARY = $_REQUEST['SUMMARY'];//TEXT
$RATING = $_REQUEST['RATING'];//RADIO
// $_SESSION['CITY']="$SUB_DIV_ID";
$ct=$_SESSION['city'];
$ps=$_SESSION['ps'];

$fid=$_SESSION['fid'];
$qry = "update feedbackn1 SET HOW_COME_PS='$HOW_COME_PS' , WAIT_TIME='$WAIT_TIME' , BEHAVIOR_PI='$BEHAVIOR_PI' , FIR='$FIR' , COPY_OF_FIR='$COPY_OF_FIR' , RATING='$RATING' , TIME_TO_SOLVE='$TIME_TO_SOLVE' , PO_NAME='$PO_NAME' , PO_DESG='$PO_DESG' , SUMMARY='$SUMMARY' where SUB_DIV_ID='$ct' AND PS_ID='$ps' AND fid=$fid";

mysqli_query($con,$qry);

header("location:thankyou page.html");
?>