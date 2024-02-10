<?php
session_start();
if(!empty($_SESSION['user_name'])){
    header('Location: index.php');
}
include('config/db_connect.php');
if (isset($_POST['submit-login'])) {
    $u_name = $_POST['username'];
    $password = $_POST['password'];
    if (empty($pass) or empty($u_name)) {
        header("Location: login.php?errors=2");
    }
    $query = "SELECT * From users where u_name = '$u_name'";
    $res = mysqli_query($conn, $query);
    $row = mysqli_num_rows($res);

    if ($row > 0) {
        $user_logged = mysqli_fetch_assoc($res);
        $pass_saved = $user_logged['password'];

        if (password_verify($password, $pass_saved)) {

            $_SESSION['user_name'] = $user_logged['u_name'];

            $_SESSION['full_name'] = $user_logged['u_fullname'];
            $_SESSION['u_id'] = $user_logged['u_id'];
            $_SESSION['level'] = $user_logged['level'];
            header('Location: index.php');
        } else {
            header("Location: login.php?errors=1");
            $email = $password  = "";
        }
    } else {
        header("Location: login.php?errors=1");
        $email = $password  = "";
    }
}

?>


<!DOCTYPE html>
<html class="no-js" lang="en" data-theme="light">

<head>
    <meta charset="utf-8" />
    <title>Login</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="icon" type="image/png" sizes="192x192" href="img/logo/title2.png" />
    <!-- <link rel="manifest" href="img/content/favicons/manifest.json" />-->
    <meta name="msapplication-TileColor" content="#ffffff" />
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png" />
</head>

<body style="background-color: pink;">
    <svg xmlns="http://www.w3.org/2000/svg" style="border: 0 !important; clip: rect(0 0 0 0) !important; height: 1px !important; margin: -1px !important; overflow: hidden !important; padding: 0 !important; position: absolute !important; width: 1px !important;" class="root-svg-symbols-element">
        <symbol id="icon-password" viewBox="0 0 22 22">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M11.0002 4.4C9.78087 4.4 8.7924 5.38848 8.7924 6.60782V8.84119H13.208V6.60782C13.208 5.38848 12.2196 4.4 11.0002 4.4ZM14.608 8.84119V6.60782C14.608 4.61528 12.9928 3 11.0002 3C9.00767 3 7.3924 4.61528 7.3924 6.60782V8.84119H6.69994C5.20877 8.84119 3.99994 10.05 3.99994 11.5412V16.303C3.99994 17.7941 5.20877 19.003 6.69994 19.003H15.3005C16.7917 19.003 18.0005 17.7941 18.0005 16.303V11.5412C18.0005 10.05 16.7917 8.84119 15.3005 8.84119H14.608ZM6.69994 10.2412C5.98197 10.2412 5.39994 10.8232 5.39994 11.5412V16.303C5.39994 17.021 5.98197 17.603 6.69994 17.603H15.3005C16.0185 17.603 16.6005 17.021 16.6005 16.303V11.5412C16.6005 10.8232 16.0185 10.2412 15.3005 10.2412H13.908H8.0924H6.69994ZM14.6882 14.6887C15.1166 14.6887 15.464 14.34 15.464 13.9099C15.464 13.4798 15.1166 13.1311 14.6882 13.1311C14.2598 13.1311 13.9125 13.4798 13.9125 13.9099C13.9125 14.34 14.2598 14.6887 14.6882 14.6887ZM10.5494 13.9099C10.5494 14.34 10.2021 14.6887 9.77368 14.6887C9.34526 14.6887 8.99795 14.34 8.99795 13.9099C8.99795 13.4798 9.34526 13.1311 9.77368 13.1311C10.2021 13.1311 10.5494 13.4798 10.5494 13.9099ZM7.31792 14.6887C7.74634 14.6887 8.09365 14.3401 8.09365 13.9099C8.09365 13.4798 7.74634 13.1311 7.31792 13.1311C6.8895 13.1311 6.54219 13.4798 6.54219 13.9099C6.54219 14.3401 6.8895 14.6887 7.31792 14.6887ZM13.0064 13.9099C13.0064 14.34 12.6591 14.6887 12.2307 14.6887C11.8023 14.6887 11.455 14.34 11.455 13.9099C11.455 13.4798 11.8023 13.1311 12.2307 13.1311C12.6591 13.1311 13.0064 13.4798 13.0064 13.9099Z" />
        </symbol>
        <symbol id="icon-user" viewBox="0 0 22 22">
            <path d="M16.484 18.15H5.00017C4.36505 18.15 3.85017 17.6351 3.85017 17V16.2025C3.85017 15.836 4.02482 15.4915 4.3204 15.2749L7.56807 12.8948C8.08356 12.517 8.7404 12.3882 9.36041 12.5432L9.80817 12.6551C10.4212 12.8084 11.0626 12.8084 11.6757 12.6551L12.1235 12.5432C12.7435 12.3882 13.4003 12.517 13.9158 12.8948L17.1638 15.2749C17.4594 15.4915 17.634 15.836 17.634 16.2025V17C17.634 17.6351 17.1192 18.15 16.484 18.15ZM7.46308 7.1289C7.46308 5.33004 8.94917 3.86327 10.7607 3.87355C12.5577 3.88375 14.0211 5.34464 14.0211 7.12917C14.0211 8.92802 12.5351 10.3948 10.7235 10.3845C8.92648 10.3743 7.46308 8.91342 7.46308 7.1289Z" />
        </symbol>
    </svg>
    <div class="page-wrapper">
        <main class="page-auth">
            <div class="page-auth__center">
                <div class="page-auth__screen">
                    <div class="auth-logo">
                    </div>
                    <img class="page-auth__screen-bg auth-bg-image-light" src="img/logo/login.png" alt="#">
                </div>
                <div class="auth-card card">
                    <div class="card__wrapper">
                        <div class="auth-card__left">
                            <div class="auth-card__logo">
                                <div class="auth-logo">
                                </div>
                            </div>
                            <img class="auth-card__bg auth-bg-image-light" src="img/logo/login.png" alt="#">
                        </div>
                        <form class="auth-card__right" action="login.php" method="POST">
                            <div class="auth-card__top">
                                <h1 class="auth-card__title">welcome</h1>
                                <p class="auth-card__text">Hello, please log in to your account
                                    <br>if you are an admin.
                                </p>
                            </div>
                            <?php if (isset($_GET['errors'])) :
                                $errors = "";
                                switch ($_GET['errors']) {
                                    case '1':
                                        $errors = "Username or password incorrect";
                                        break;
                                    case '2':
                                        $errors = "Please complete all information";
                                        break;
                                }
                            ?>
                                <div class="alert alert-danger text-center" role="alert">
                                    <div> <?php echo $errors ?> </div>
                                </div>
                            <?php endif; ?>
                            <div class="auth-card__body">
                                <div class="form-group mb-3">
                                    <div class="input-group input-group--prepend"><span class="input-group__prepend">
                                            <svg class="icon-icon-user">
                                                <use xlink:href="#icon-user"></use>
                                            </svg></span>
                                        <input class="input" name="username" placeholder="Enter Your Username" type="text" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group input-group--prepend"><span class="input-group__prepend">
                                            <svg class="icon-icon-password">
                                                <use xlink:href="#icon-password"></use>
                                            </svg></span>
                                        <input class="input" name="password" placeholder="Enter Your Password" type="password" required>
                                    </div>
                                </div>
                                <div class="auth-card__button mt-5">
                                    <button name="submit-login" class="button button--primary button--block" type="submit"><span class="button__text">Login</span>
                                    </button>
                                </div>

                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <?php require_once("templates/footer.php") ?>

</html>