<?php 

include 'config.php';
include 'db.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;



function check_login($link)
{
    if (isset($_SESSION['id'])) {
        $id = $_SESSION['id'];
        $query = "SELECT id, fname, lname, username, email, bonus, currency, gender, plan, password, con_password, image, phone, country, referral, profit, balanceloss, balancelive, balancemine, totalwon, walletbalance, upgrade, pin, last_access, btc_wallet, eth_wallet, ltc_wallet FROM users WHERE id = $id LIMIT 1";
        $result = mysqli_query($link, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            $user_data = mysqli_fetch_assoc($result);

              if ($user_data) {
    $username = $user_data['username'];

    // Check if 'profit' field exists in $user_data
    if (isset($user_data['profit'])) {
        $profit = $user_data['profit'];
    }

    // Check for other fields in $user_data
    if (isset($user_data['fname'])) {
        $field1_value = $user_data['fname'];
        // Perform actions based on $field1_value
    }
    // Check for other fields in $user_data
    if (isset($user_data['lname'])) {
        $field1_value = $user_data['lname'];
        // Perform actions based on $field1_value
    }
    // Check for other fields in $user_data
    if (isset($user_data['bonus'])) {
        $field1_value = $user_data['bonus'];
        // Perform actions based on $field1_value
    }
     // Check for other fields in $user_data
    if (isset($user_data['email'])) {
        $field1_value = $user_data['email'];
        // Perform actions based on $field1_value
    }
     // Check for other fields in $user_data
    if (isset($user_data['currency'])) {
        $field1_value = $user_data['currency'];
        // Perform actions based on $field1_value
    }
     // Check for other fields in $user_data
    if (isset($user_data['gender'])) {
        $field1_value = $user_data['gender'];
        // Perform actions based on $field1_value
    }
     // Check for other fields in $user_data
    if (isset($user_data['plan'])) {
        $field1_value = $user_data['plan'];
        // Perform actions based on $field1_value
    }
      // Check for other fields in $user_data
    if (isset($user_data['phone'])) {
        $field1_value = $user_data['phone'];
        // Perform actions based on $field1_value
    }
      // Check for other fields in $user_data
    if (isset($user_data['country'])) {
        $field1_value = $user_data['country'];
        // Perform actions based on $field1_value
    }
      // Check for other fields in $user_data
    if (isset($user_data['referral'])) {
        $field1_value = $user_data['referral'];
        // Perform actions based on $field1_value
    }
     // Check for other fields in $user_data
    if (isset($user_data['balanceloss'])) {
        $field1_value = $user_data['balanceloss'];
        // Perform actions based on $field1_value
    }
    // Check for other fields in $user_data
    if (isset($user_data['balancelive'])) {
        $field1_value = $user_data['balancelive'];
        // Perform actions based on $field1_value
    }
     // Check for other fields in $user_data
    if (isset($user_data['balancemine'])) {
        $field1_value = $user_data['balancemine'];
        // Perform actions based on $field1_value
    }
      // Check for other fields in $user_data
    if (isset($user_data['totalwon'])) {
        $field1_value = $user_data['totalwon'];
        // Perform actions based on $field1_value
    }
    // Check for other fields in $user_data
    if (isset($user_data['walletbalance'])) {
        $field1_value = $user_data['walletbalance'];
        // Perform actions based on $field1_value
    }
    // Check for other fields in $user_data
    if (isset($user_data['upgrade'])) {
        $field1_value = $user_data['upgrade'];
        // Perform actions based on $field1_value
    }
    // Check for other fields in $user_data
    if (isset($user_data['btc_wallet'])) {
        $field1_value = $user_data['btc_wallet'];
        // Perform actions based on $field1_value
    }
    // Check for other fields in $user_data
    if (isset($user_data['eth_wallet'])) {
        $field1_value = $user_data['eth_wallet'];
        // Perform actions based on $field1_value
    }
    // Check for other fields in $user_data
    if (isset($user_data['ltc_wallet'])) {
        $field1_value = $user_data['ltc_wallet'];
        // Perform actions based on $field1_value
    }

}
            // Check for other fields and perform actions accordingly

            return $user_data;
        }
    }

    // Redirect to login if not logged in
    header("Location: ../auth/login.php");
    die;
}


function random_num($length)
{
    $text = "";
    if ($length < 5) {
        $length = 5;
    }
    $len = rand(4, $length);
    for ($i = 0; $i < $len; $i++) {
        $text .= rand(0, 9);
    }
    return $text;
}

	
function text_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}


function sendAdminMail($email, $name, $subject, $body){
  global $sitemail, $sitename,$siteurl;
  require_once "../PHPMailer/PHPMailer.php";
    require_once '../PHPMailer/Exception.php';
  $mail = new PHPMailer;
  $mail->setFrom($sitemail);
  $mail->FromName = $sitename;
  $mail->addAddress("$email", "$name");
  $mail->isHTML(true);
  $mail->Subject = $subject;
  $mail->Body = $body;
  $send = $mail->send();
  return $send;
}

function sendMail($email, $name, $subject, $body){
	global $sitemail, $sitename,$siteurl;
	
	require_once "../PHPMailer/PHPMailer.php";
    require_once '../PHPMailer/Exception.php';

    $mail = new PHPMailer;
    $mail->setFrom($sitemail);
    $mail->FromName = $sitename;
    $mail->addAddress("$email", "$name");
    $mail->isHTML(true);
    $mail->Subject = $subject;
    $mail->Body = ' <!DOCTYPE html>
    <html lang="en" xmlns="">
    <head>
    <meta charset="utf-8"> 
    <meta name="viewport" content="width=device-width"> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
    <meta name=""> 
    <link rel="stylesheet" type="text/css" href="mail.css">
    <title></title> 
    </head>
    <body width="100%" style="margin: 0; padding: 0 !important; mso-line-height-rule: exactly; ">
    <center style="width: 100%; ">
      <div style="display: none; font-size: 1px;max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden; mso-hide: all; font-family: sans-serif;">
      &zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;
      </div>
      <div style="max-width: 600px; margin: 0 auto;" class="email-container">

        <table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="margin: auto;">
          <tr>
            <td valign="top" class="" style="padding: 1em 2.5em 0 2.5em;">
              <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%">
                <tr>
                  <td class="logo" style="text-align: center;">
                    <h1><img src="'.$siteurl.'/logo/logo-light.png"></h1>
                  </td>
                </tr>
              </table>
            </td>
          </tr>
          <tr>
            <td valign="middle" class="hero" style="padding: 2em 0 4em 0;">
              <table>
                <tr>
                  <td>
                    <div class="text" style="color: black; font-size: 17px; padding: 0 2.5em; text-align: justify;">
                      '.$body.'
                    </div>
                  </td>
                </tr>
              </table>
            </td>
          </tr>
          <tr>
            <td valign="middle" class="hero" style="; ">
              <table>
                <tr>
                  <td>
                    <div class="text" style="color: black; font-weight: bold; padding: 0 2.5em; text-align: center;">
                      <p>'.$sitemail.'. All Rights Reserved</p>
                    </div>
                  </td>
                </tr>
              </table>
            </td>
          </tr>
        </table>
      </div>
    </center>


    </body>
  </html>';
    $send = $mail->send();
    return $send;
}


function customAlert($case, $content){
    switch ($case) {
      case 'success':
        $mesg =  '<script type="text/javascript">
          $(document).ready(function() {
              swal({
                  title: "Success",
                  text: " '.$content.' ",
                  icon: "success",
                  button: "Ok",
                  timer: 5000
              });    
          });
        </script>';
        break;

        case 'error':
          $mesg = '<script type="text/javascript">
              $(document).ready(function() {
                  swal({
                      title: "Error",
                      text: " '.$content.' ",
                      icon: "error",
                      button: "Ok",
                      timer: 5000
                  });    
              });
          </script>';
        break;
      default:
        break;
    }
  return $mesg;
}

function pageRedirect($sec, $route){
  $c = "<meta http-equiv='refresh' Content='".$sec."; url=".$route." ' />";
  return $c;
}


function getRandomStrings() {
    $rnumbs = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $tnumbs = str_shuffle($rnumbs);
    $tnumbs = substr($tnumbs, 0, 30);
    return $tnumbs;
  }




?>