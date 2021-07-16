<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/style.css">
    <title>App</title>
</head>
<body>
<section class="reg">
    <div class="reg-left">
        <img src="img/logo.svg" alt="">
        <div class="reg-left__description">
            <p class="reg-left__subtitle">The passage experienced a surge in popularity during the 1960s when Letraset
                used it on their dry-transfer sheets, and again during the 90s as desktop publishers bundled the text
                with their software.</p>
            <h4>Vincent Obi</h4>
        </div>
    </div>

    <div class="reg-right">
        <div class="reg-right__wrapper">
            <h1 class="reg-right__title">Register Individual Account!</h1>
            <p class="reg-right__subtitle">For the purpose of industry regulation, your details are required.</p>
        </div>

        <form action="register.php" method="post">

            <div class="reg-right__wrapper">
                <label for="fullname">Your fullname*</label>
                <input id="fullname" name="fullname" class="input" placeholder="Enter your fullname" type="text">
                <?php if (isset($_SESSION['errors']['fullname'])) : ?>
                    <?php foreach ($_SESSION['errors']['fullname'] as $errorMessage) : ?>
                        <span class="error"><?php echo $errorMessage; ?></span>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
            <div class="reg-right__wrapper">
                <label for="email">Email address*</label>
                <input id="email" name="email" class="input" placeholder="Enter email address" type="email">
                <?php if (isset($_SESSION['errors']['email'])) : ?>
                    <?php foreach ($_SESSION['errors']['email'] as $errorMessage) : ?>
                        <span class="error"><?php echo $errorMessage; ?></span>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
            <div class="reg-right__wrapper">
                <label for="password">Create password*</label>
                <input id="password" name="password" class="input" placeholder="Enter your password" type="password">
                <?php if (isset($_SESSION['errors']['password'])) : ?>
                    <?php foreach ($_SESSION['errors']['password'] as $errorMessage) : ?>
                        <span class="error"><?php echo $errorMessage; ?></span>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
            <svg class="checkbox-symbol">
                <symbol id="check" viewbox="0 0 12 10">
                    <polyline
                            points="1.5 6 4.5 9 10.5 1"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                    ></polyline>
                </symbol>
            </svg>
            <div class="checkbox-container">
                <input class="checkbox-input" id="conditions" type="checkbox"/>
                <label class="checkbox" for="conditions">
                      <span>
                        <svg width="12px" height="10px">
                          <use xlink:href="#check"></use>
                        </svg>
                      </span>
                    <span>I agree to terms & conditions</span>
                </label>
            </div>
            <button>Register Account</button>

            <?php if (isset($_SESSION['success']) && $_SESSION['success'] === true) : ?>
                <div style="color: green; text-align: center;">You were registered.</div>
            <?php endif; ?>

        </form>

    </div>
</section>
</body>
</html>