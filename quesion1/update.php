<?php
include 'config.php';
$pdo = pdo_connect();
if (isset($_GET['id'])) {
    if (!empty($_POST['name']) &&!empty($_POST['email']) && !empty($_POST['password']) ) {
        $name = isset($_POST['name']) ? $_POST['name'] : '';
        $email = isset($_POST['email']) ? $_POST['email'] : '';
        $password = isset($_POST['password']) ? $_POST['password'] : '';
      
        $stmt = $pdo->prepare('UPDATE users SET  user_name = ?, user_email = ?, password = ? WHERE user_id = ?');
        $stmt->execute([ $name, $email, $password, $_GET['id']]);
        header('Location: index.php');
    }
    $stmt = $pdo->prepare('SELECT * FROM users WHERE user_id = ?');
    $stmt->execute([$_GET['id']]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$row) {
        exit('user  doesn\'t exist ');
    }
} else {
    exit('No user');
}
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
    <div class="container bg-light ">

<div class=" ">
	<h2 class="text-center">Update User </h2>
    <form action="update.php?id=<?=$row['user_id']?>" method="post">
        
        <label for="name">Name</label>
        <input type="text"  value="<?=$row['user_name']?>" class="form-control" name="name" placeholder="Your Name" id="name">
      
        <label for="email">Email</label>
        <input type="text" value="<?=$row['user_email']?>" class="form-control" name="email" placeholder="example@example.com" id="email">

        <label for="password">password</label>
        <input type="password" value="<?=$row['password']?>" class="form-control" name="password" placeholder="Your password" id="password">
        
        <input type="submit" class=" col-md-2 btn btn-info btn-block mt-3"  value=" Update" name="update">
    </form>
   
</div>
</div>
</body>
</html>