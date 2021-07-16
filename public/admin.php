<?php

$pdo = new PDO('mysql:dbname=otus;user=otus;password=otus;host=otus-mysql');
$statement = $pdo->prepare('SELECT * FROM users');
$statement->setFetchMode(PDO::FETCH_ASSOC);
$statement->execute([]);

$users = $statement->fetchAll();
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
        <table>
            <tr>
                <td>Full name</td>
                <td>Email</td>
                <td>Password</td>
            </tr>
            <?php foreach ($users as $user) : ?>
                <tr>
                    <td><?php echo $user['full_name']; ?></td>
                    <td><?php echo $user['email']; ?></td>
                    <td><?php echo $user['password']; ?></td>
                </tr>
            <?php endforeach; ?>
        </table>

</body>
</html>
