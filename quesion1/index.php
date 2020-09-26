<?php
include 'config.php';
$pdo = pdo_connect();
$stmt = $pdo->prepare('SELECT * FROM users ORDER BY user_id ');
$stmt->execute();
$row = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
    <h1 class="text-center"> User Informatio</h1>
    <a href="insert.php" class="btn btn-info mb-2"> Add User</a>
    <br>
    <div class="text-center">
    <table class="table table-striped table-inverse table-responsive ">
        <thead class="thead-inverse">
            <tr>
                <th>#</th>
                <th>User Name</th>
                <th>User Email</th>
                <th>User password</th>
                <th clo-span="2">action</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($row as $row){ ?>

                <tr>
                <td><?=$row['user_id']?></td>
                <td><?=$row['user_name']?></td>
                <td><?=$row['user_email']?></td>
                <td><?=$row['password']?></td>
               
                <td class="actions">
                    <a href="update.php?id=<?=$row['user_id']?>" class="edit btn btn-primary">update</a>
                    <a href="delete.php?id=<?=$row['user_id']?>" class="trash btn btn-danger">delete</a>
                </td>
                </tr>
            <?php } ?>
            </tbody>
    </table>
    </div>
</div>
    
</div>
</body>
</html>