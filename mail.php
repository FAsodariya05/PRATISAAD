<?php
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

date_default_timezone_set("Asia/Kolkata");

$email = $_POST["email"];
$_SESSION['email'] = $email;

// Database Connection
$con = mysqli_connect('localhost', 'root', '', 'project_db');
if (!$con) {
    die("Database connection failed: " . mysqli_connect_error());
}

// Generate OTP
$otp = mt_rand(100000, 999999);

// PHPMailer Setup
$mail = new PHPMailer(true);

try {
    $mail->isSMTP();                                            
    $mail->Host       = 'smtp.gmail.com';                     
    $mail->SMTPAuth   = true;                                   
    $mail->Username   = 'foramasodariya2005@gmail.com';                    
    $mail->Password   = 'For@masodariya2405'; 
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            
    $mail->Port       = 465;                                    

    $mail->setFrom('foramasodariya2005@gmail.com', 'Foram Asodariya');
    $mail->addAddress($email);             

    $mail->isHTML(true);
    $mail->Subject = 'OTP for Login';
    $mail->Body    = "<b>{$otp}</b> is your OTP. Do not share it with anyone.";
    $mail->AltBody = $otp;

    if ($mail->send()) {
        echo 'OTP Sent Successfully!';
    } else {
        echo "Mailer Error: " . $mail->ErrorInfo;
        exit();
    }

} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    exit();
}

// Check if email exists in DB
$qry1 = "SELECT * FROM user_otp1 WHERE email='$email'";
$result = mysqli_query($con, $qry1);

if (mysqli_num_rows($result) > 0) {
    // Update OTP
    $qry2 = "UPDATE user_otp1 SET OTP = '$otp' WHERE email='$email'";
    mysqli_query($con, $qry2);
} else {
    // Insert new OTP entry
    $qry2 = "INSERT INTO user_otp1 (email, OTP) VALUES ('$email', '$otp')";
    mysqli_query($con, $qry2);
}

// Insert OTP expiration record
$result = mysqli_query($con, "INSERT INTO otp_expire (otp, is_expired, create_at) VALUES ('$otp', 0, '" . date("Y-m-d H:i:s") . "')");

if (!empty(mysqli_insert_id($con))) {
    header("Location: OTP.html");
    exit();
} else {
    echo "OTP could not be saved!";
}

?>
