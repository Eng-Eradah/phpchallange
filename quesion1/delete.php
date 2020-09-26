<?php
include 'config.php';
$pdo = pdo_connect();
$massage = '';
if (isset($_GET['id'])) {
    $stmt = $pdo->prepare('SELECT * FROM users WHERE user_id = ?');
    $stmt->execute([$_GET['id']]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$row) {
        exit('user doesn\'t exist');
    }
    if (isset($_GET['sure'])) {
        if ($_GET['sure'] == 'yes') {
            $stmt = $pdo->prepare('DELETE FROM users WHERE user_id = ?');
            $stmt->execute([$_GET['id']]);
            $massage = 'You are deleted the user !';
            header('Location: index.php');
        } else {
            header('Location: index.php');
            exit;
        }
    }
} else {
    exit('No user!');
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
    <div class="container bg-lighr">
     
<div class=" text-center">
	<h2>Delete Contact #<?=$row['user_id']?></h2>
    <?php if ($massage): ?>
    <p><?=$massage?></p>
    <?php else: ?>
	<p>Are you sure you want to delete contact #<?=$row['user_id']?>?</p>
    <div class="yesno">
        <a href="delete.php?id=<?=$row['user_id']?>&sure=yes" class="btn btn-primary">Yes</a>
        <a href="delete.php?id=<?=$row['user_id']?>&sure=no" class="btn btn-danger">No</a>
    </div>
    <?php endif; ?>
</div>
   
</div>
</body>
</html>
