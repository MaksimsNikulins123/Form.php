<?php
require_once 'connect.php';
$msg = $email = $date = $domain = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $msg = test_input($msg);
    $email = test_input($_POST["email"]);
    $date = test_input((date("Y-m-d H:i:s")));
    $emailArray = explode("@",$email);
    $domain = ($emailArray[1]);
};

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

if(count($_POST) > 0){
    if(strlen($email) <= 0) {
                $msg = 'Email address is required';
    } else if (strlen($email) >= 1) {
        if(preg_match("/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,8})+$/", $email)) {
            $emailArray = explode(".",$email);
                if($emailArray[count($emailArray) -1] === 'co') {
                    $msg = 'We are not accepting subscriptions from Colombia emails';
                }  else if(isset($_POST['checkbox']) && strlen($_POST['checkbox']) > 0) {
                   
                    mysqli_query($connect, "INSERT INTO `subscriberegistration` (`id`, `date`, `email`, `domain`) VALUES (NULL, '$date', '$email', '$domain')"); 
                    header("Location: http://localhost/Megabit3/php/registration.php");
                }else {
                    $msg = 'You must accept the terms and conditions';
                }
        } else {
            $msg = 'Please provide a valid e-mail address';
            }
    }
} else {
    $msg = '';
    }

?>

