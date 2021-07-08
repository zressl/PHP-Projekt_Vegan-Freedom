<?php
include "user.php";
session_start();
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=,initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/style.css">
    <link rel="stylesheet" href="../CSS/sign_in.css">
    <title>VEGAN FREEDOM</title>
</head>
<body>
    <nav>
        <div class="top"></div>
        <ul>
            <li><a href="../index.php">HOME</a></li>
            <li><a href="blog.php">BLOG</a></li>
            <li><a href="../index.php"><img src="../logo/peace-symbol.svg" alt=""></a></li>
            <li><a href="events.html">EVENTS</a></li>
            <li><a href="#">SIGN IN</a></li>
        </ul>
    </nav>
    <div class="row">
        <form class="registration" action="" method="POST">
            <h1>Registriere Dich</h1>
            <p class="geschafft"><?php echo $getin; ?></p>
            <input type="text" name="name" id="name" placeholder="Your Name">
            <label for="name"></label>
            <input type="text" name="nickname" id="nickname" placeholder="Your Nickname">
            <label for="nickname"></label>
            <?php if (isset($errorMessage['nicknameR']) && (strlen($errorMessage['nicknameR'])>0)) { ?>
                <p class="error_message"><?php print $errorMessage['nicknameR']; ?></p>
            <?php } ?>
            <input type="email" name="email" id="email" placeholder="Enter Your e-Mail">
            <label for="email"></label>
            <input type="password" name="password" id="password" placeholder="Enter Your Password">
            <label for="password"></label>
            <?php if (isset($errorMessage['passwordR']) && (strlen($errorMessage['passwordR'])>0)) { ?>
                <p class="error_message"><?php print $errorMessage['passwordR']; ?></p>
            <?php } ?>
            <button name="registrierung" type="submit" class="btn">Registrieren</button>
        </form>


        <form action="" class="login" method="POST">
                    <h1>Login</h1>
                        <div class="col-md-8">
                            <input type="text"
                                   name="nickname"
                                   <?php if(isset($errorMessage['nickname'])&& (strlen($errorMessage['nickname'])>0)){ ?> class= "has_error" <?php } ?>
                                   id="nickname"
                                   placeholder="Nickname"
                                   value="<?php if (isset($username)){ print $username;}?>">
                            <?php if (isset($errorMessage['nickname']) && (strlen($errorMessage['nickname'])>0)) { ?>
                                <p class="error_message"><?php print $errorMessage['nickname']; ?></p>
                            <?php } ?>
                        </div>
                        <div class="col-md-8">
                            <input class="form-control<?php if(isset($errorMessage['password'])&& (strlen($errorMessage['password'])>0)){ ?> has_error <?php } ?>"
                                   id="password"
                                   type="password"
                                   name="password"
                                   placeholder="Password"
                                   value="<?php if (isset($password)){ print $password;}?>">
                            <?php if (isset($errorMessage['password']) && (strlen($errorMessage['password'])>0)) { ?>
                                <p class="error_message"><?php print $errorMessage['password']; ?></p>
                            <?php } ?>
                        </div>
                        <div class="col-md-8">
                            <?php if (isset($errorMessage['general']) && (strlen($errorMessage['general'])>0)) { ?>
                                <p class="error_message"><?php print $errorMessage['general']; ?></p>
                            <?php } ?>
                            <input class="btn" type="submit" id="submit" name="submit" value="Login">
                        </div>

                    </div>
        </form>
    </div>  

    <footer>

    </footer>
    <div class="bottom"></div>

</body>
</html>