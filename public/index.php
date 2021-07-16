<?php session_start(); ?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Test</title>
</head>
<body>
<form action="register.php" method="post">
    <?php if (isset($_SESSION['success']) && $_SESSION['success'] === true) : ?>
        <div>
            Thank you for registration!
            You will receive an email where you will need to confirm your email address.
            Please check your inbox.
        </div>
    <?php endif; ?>
    <label for="">
        <input type="text" class="test1" name="fullName" value="<?php echo $_SESSION['fullName']['value'] ?? ''; ?>">
        <?php if (!empty($_SESSION['errors']['fullName'])) : ?>
            <?php foreach ($_SESSION['errors']['fullName'] as $error) : ?>
                <span><?php echo $error; ?></span>
            <?php endforeach; ?>
        <?php endif ?>
    </label>
    <label for="">
        <input type="text" class="test2" name="email" value="<?php echo $_SESSION['email']['value'] ?? ''; ?>">
        <?php if (!empty($_SESSION['errors']['email'])) : ?>
            <?php foreach ($_SESSION['errors']['email'] as $error) : ?>
                <span><?php echo $error; ?></span>
            <?php endforeach; ?>
        <?php endif ?>
    </label>
    <label for="">
        <input type="text" class="test3" name="password" value="<?php echo $_SESSION['password']['value'] ?? ''; ?>">
        <?php if (!empty($_SESSION['errors']['password'])) : ?>
            <?php foreach ($_SESSION['errors']['password'] as $error) : ?>
                <span><?php echo $error; ?></span>
            <?php endforeach; ?>
        <?php endif ?>
    </label>
    <button type="submit">Send</button>
</form>
</body>
</html>