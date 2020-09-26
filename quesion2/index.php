<html>
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../assest/cs/slick.css" />
    <link rel="stylesheet" type="text/css" href="../assest/cs/slick-theme.css" />
    <link rel="stylesheet" id="myStyleSheet" href="../assest/cs/css.css">
</head>
<body>
<div class="container bg-light">


<div class="container bg-dark">

<div class="row">

<?php
/*$globals*/
/*     ويتم استدعائها باي مكان في الصفحة حتى من خارج الدوال   global تقوم بتعريف المتغيرات        */

function name() {
  $GLOBALS['z'] = "Name in global is Sara";
}
name();
echo "<br>  <br>";

?>
<div>
<h1 class="text-light">$_GLOBAL</h1>
</div>
<h2 class="text-light">
<br>
<br>
<?php echo  $z;  ?></h2>
</div>
</div>
<div class="container bg-info">
    

<div class="row">
<h1>$_SERVER</h1>
<h3 class="text-light">


<?php
/*$server*/
/*           هذا المصفوفه تكون جلوبل ويتم استخدامها من اي صفحة وتحتوي هذا المصفوفة على هذا البيانات (headers, paths, and script locations.) */
echo "PHP_SELF=> ".$_SERVER['PHP_SELF'];//يضهر موقع الملف +
echo "<br>";
echo "SERVER_NAME =>".$_SERVER['SERVER_NAME'];// اسم السيرفر
echo "<br>";
echo "HTTP_HOST =>".$_SERVER['HTTP_HOST'];//اسم الهوست
echo "<br>";
echo "HTTP_USER_AGENT => ".$_SERVER['HTTP_USER_AGENT'];//يجيب معلومات المتصفح
echo "<br>";
echo "SCRIPT_NAME =>".$_SERVER['SCRIPT_NAME'];//مسار الملف
echo "<br>";

/////////////////////////
?>
</h3>
</div>
</div>
<div class="container bg-danger">
<div class="row">
<h1>$_FILES   :     
</h1>
<br>
<br><br>
<br>
<form action="index.php" method="post"
enctype="multipart/form-data">
<label for="file">Filename:</label>
<input type="file" name="file" id="file" />
<br />
<input type="submit" name="submit" value="Submit" />
</form>
</body>
</html>
<h3 class="text-light">
<?php
if(isset($_FILES["file"])){
if ($_FILES["file"] > 0)
  {
    echo '<br>';
    echo '<br>';

  echo "Files is : ";
  print_r($_FILES);
  }
}?>
</h3>
</div>
</div>
<div class="container bg-dark">
<div class="row">
<h1 class="text-light">Session     :</h1>

<h3 class="text-light">

<?php
session_start();
// Set session variables
$_SESSION["password"] = "123456";
$_SESSION["user-name"] = "Ahmed";
echo '<br>';
echo '<br>';
print_r($_SESSION);
?>
</h3>
</div>
</div>
<div class="container bg-info">

<div class="row">
<h1>Cookies</h1>
<h3 class="text-light">
<?php

setrawcookie($_SERVER['PHP_SELF']);
echo '<br>';
print_r($_COOKIE);

?>
</h3>
</div>
</div>
<div class="container bg-danger">
<div class="row">
<h1>ENV</h1>
<h3 class="text-light">

<?php
$_ENV["MYENV"]=$_SERVER['PHP_SELF'];
echo "</br>".$_ENV["MYENV"];
?>
</h3>
</div>
</div>
<!-- request-->
<div class="container bg-dark">

<div class="row">
<h1 class="text-light">$_REQUEST</h1>
<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
<label for="name" class="modal-label text-light">Name</label>
 <input type="text" class="form-control col-md-6" name="name">
 <label for="name" class="modal-label text-light" >password</label>
<input class="form-control col-md-6" type="password" name="pass">
  <input type="submit" value="submit">
</form>
<?php
/*$_REQUEST*/
//$_REQUEST it used for collecting data after submitting and it contains the data of $_post ,$_get and $_COOKIE
//see the example below
?> 
<h2 class="text-light">

<?php 

if(isset($_REQUEST['name'])){
    echo '<br>';

    echo"REQUEST Name";
    echo $_REQUEST['name'];
     }
?></h2>



</div>
</div>
<div class="container bg-info">

<div class="row">
<h1>POST</h1>
<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
<label for="name" class="modal-label text-light">Email</label>
 <input type="text" class="form-control col-md-6" name="email">
 <input type="submit" value="send" name="send">
</form>
<h3 class="text-light">
<?
/*$_POST*/
/*PHP super global variable which is used to collect form data after submitting an HTML form with method="post". $_POST is also widely used to pass variables. */
if(isset($_POST['email'])){
    echo $_POST['email'];
    echo"hhhh";

}

  ?>
  </h3>
</div>
</div>

<div class="container bg-danger">

<div class='row'>
<h1>GET      :</h1>
<br>
<br>
<br>
<a class="text-light text-center" href="<?php echo $_SERVER['PHP_SELF'];?>?subject=PHP&web=coding academy"> $GET Array</a>
<h3 class="text-light">

<?php
if(isset($_GET['subject'])){
echo "Study " . $_GET['subject'] . " at " . $_GET['web'];
}

?>
</h3>
</div>
</div>
<div class="container bg-dark text-light">
    <h1>Session function</h1>

    <?php
    
// THE SESSION_ID is used to set the session id for the current session and it can be used by writting the 
// session_id('string id')<< passing a string id to the function and then starting the session or dioing what ever witht he param
$id ="Eradah";
//session_abort();
session_id($id);
echo session_id($id);
$val="regster";
session_register('val');
function session_is_registered($val)
{
    if (isset($_SESSION[$val]))
echo "true" ;
   else
    echo "fales";
}
    
    
    ?>
</div>
</div>
</body>
</html>