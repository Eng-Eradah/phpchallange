<?php
include 'config.php';
$pdo = pdo_connect();
if( isset($_POST["sign"])){
if ( !empty($_POST['name']) &&!empty($_POST['email']) && !empty($_POST['password']) ) {
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';
   $id=null;
    $stmt = $pdo->prepare('INSERT INTO users VALUES (?, ?, ?, ?)');
    $stmt->execute([$id, $name, $email, $password]);
    echo '<script>alert("Created Acount Successfully!");</script>';
   
}else{
    echo'<script>alert("fill the inputs data!");</script>';
}}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Pdo challange</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">	</head>
	<body>
    <div class="container bg-light">
    
	<h2>Create Acount</h2>
    <form action="insert.php" method="post">
    <div class="form-group">

        <label for="name" class="modal-label">Name</label>
        <input type="text" class="form-control" name="name" placeholder="Your Name" id="name">
        </div>
        <div class="form-group">

        <label for="email" class="modal-label">Email</label>
        <input type="text" class="form-control" name="email" placeholder="example@example.com" id="email">
        </div>
        <div class="form-group">

        <label for="password" class="modal-label">password</label>
        <input type="password" class="form-control" name="password" placeholder="Your password" id="password">
        </div>
        <div class="form-group">
        <input type="submit" class=" col-md-2 btn btn-primary btn-block"  value="Sign Up" name="sign">
        </div>
    </form>
   
</div>
    
</div>
</body>
</html>