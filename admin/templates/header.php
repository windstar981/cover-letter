<?php
date_default_timezone_set('Asia/Tokyo'); // Đặt múi giờ cho máy chủ PHP là múi giờ của Việt Nam
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include('config/db_connect.php');
ob_start();
if (!isset($_SESSION['u_id'])) {
    header('Location: login.php');
}
if (isset($_GET['lang'])) {
    $selected_lang = $_GET['lang'];

    // Lưu ngôn ngữ đã chọn vào session
    $_SESSION['lang'] = $selected_lang;
} else {
    // Nếu chưa chọn, kiểm tra xem đã lưu trong session chưa
    $selected_lang = isset($_SESSION['lang']) ? $_SESSION['lang'] : 'vi';
}
require_once "../lang/$selected_lang.php";
require_once "../lang/get_lang.php";
?>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Admin</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/app.css" />
    <link rel="icon" type="image/png" sizes="192x192" href="img/logo/title2.png" />
    <!-- <link rel="manifest" href="img/content/favicons/manifest.json" />-->
    <meta name="msapplication-TileColor" content="#ffffff" />
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png" />
    <meta name="theme-color" content="#ffffff" />
</head>
<svg xmlns="http://www.w3.org/2000/svg" style="border: 0 !important; clip: rect(0 0 0 0) !important; height: 1px !important; margin: -1px !important; overflow: hidden !important; padding: 0 !important; position: absolute !important; width: 1px !important;" class="root-svg-symbols-element">
    <symbol id="icon-home" viewBox="0 0 18 18">
        <path d="M15.2511 9.74455H14.0459V14.0155C14.0459 14.3322 13.9061 14.7273 13.3251 14.7273H10.4417V10.4564H7.55838V14.7273H4.67504C4.09405 14.7273 3.95421 14.3322 3.95421 14.0155V9.74455H2.74897C2.31791 9.74455 2.41018 9.51393 2.70572 9.21212L8.4897 3.49481C8.63027 3.35102 8.8148 3.27984 9.00005 3.27272C9.18531 3.27984 9.36984 3.35031 9.51041 3.49481L15.2937 9.2114C15.5899 9.51393 15.6822 9.74455 15.2511 9.74455Z" />
    </symbol>
    <symbol id="icon-keyboard-down" viewBox="0 0 11 6">
        <path d="M10.6579 1.76106C10.3062 2.12142 6.61033 5.64225 6.61033 5.64225C6.42153 5.8345 6.17583 5.93105 5.93013 5.93105C5.68443 5.93105 5.43873 5.8345 5.25166 5.64225C5.25166 5.64225 1.5541 2.12142 1.20408 1.76106C0.852345 1.4007 0.828207 0.752401 1.20408 0.368765C1.57824 -0.0157329 2.10153 -0.0459065 2.56103 0.368765L5.93013 3.59906L9.29923 0.368765C9.75873 -0.0459065 10.2829 -0.0157329 10.6579 0.368765C11.0338 0.752401 11.0105 1.4007 10.6579 1.76106Z" />
    </symbol>
    <symbol id="icon-password" viewBox="0 0 22 22">
        <path fill-rule="evenodd" clip-rule="evenodd" d="M11.0002 4.4C9.78087 4.4 8.7924 5.38848 8.7924 6.60782V8.84119H13.208V6.60782C13.208 5.38848 12.2196 4.4 11.0002 4.4ZM14.608 8.84119V6.60782C14.608 4.61528 12.9928 3 11.0002 3C9.00767 3 7.3924 4.61528 7.3924 6.60782V8.84119H6.69994C5.20877 8.84119 3.99994 10.05 3.99994 11.5412V16.303C3.99994 17.7941 5.20877 19.003 6.69994 19.003H15.3005C16.7917 19.003 18.0005 17.7941 18.0005 16.303V11.5412C18.0005 10.05 16.7917 8.84119 15.3005 8.84119H14.608ZM6.69994 10.2412C5.98197 10.2412 5.39994 10.8232 5.39994 11.5412V16.303C5.39994 17.021 5.98197 17.603 6.69994 17.603H15.3005C16.0185 17.603 16.6005 17.021 16.6005 16.303V11.5412C16.6005 10.8232 16.0185 10.2412 15.3005 10.2412H13.908H8.0924H6.69994ZM14.6882 14.6887C15.1166 14.6887 15.464 14.34 15.464 13.9099C15.464 13.4798 15.1166 13.1311 14.6882 13.1311C14.2598 13.1311 13.9125 13.4798 13.9125 13.9099C13.9125 14.34 14.2598 14.6887 14.6882 14.6887ZM10.5494 13.9099C10.5494 14.34 10.2021 14.6887 9.77368 14.6887C9.34526 14.6887 8.99795 14.34 8.99795 13.9099C8.99795 13.4798 9.34526 13.1311 9.77368 13.1311C10.2021 13.1311 10.5494 13.4798 10.5494 13.9099ZM7.31792 14.6887C7.74634 14.6887 8.09365 14.3401 8.09365 13.9099C8.09365 13.4798 7.74634 13.1311 7.31792 13.1311C6.8895 13.1311 6.54219 13.4798 6.54219 13.9099C6.54219 14.3401 6.8895 14.6887 7.31792 14.6887ZM13.0064 13.9099C13.0064 14.34 12.6591 14.6887 12.2307 14.6887C11.8023 14.6887 11.455 14.34 11.455 13.9099C11.455 13.4798 11.8023 13.1311 12.2307 13.1311C12.6591 13.1311 13.0064 13.4798 13.0064 13.9099Z" />
    </symbol>
    <symbol id="icon-arrow-down" viewBox="0 0 22 22">
        <path d="M7 8H15L11 13L7 8Z" />
    </symbol>
    <symbol id="icon-logout" viewBox="0 0 22 22">
        <path d="M19 11L13.6667 6.55556V9.22222H7.44444V12.7778H13.6667V15.4444L19 11ZM4.77778 4.77778H11.8889V3H4.77778C3.8 3 3 3.8 3 4.77778V17.2222C3 18.2 3.8 19 4.77778 19H11.8889V17.2222H4.77778V4.77778Z" />
    </symbol>
    <symbol id="icon-settings" viewBox="0 0 22 22">
        <path d="M17.4583 10.999C17.4583 10.0001 18.0734 9.21355 18.9981 8.67266C18.8305 8.11653 18.6105 7.58231 18.3391 7.08047C17.3021 7.35186 16.4632 6.9462 15.7575 6.23961C15.0519 5.53494 14.8357 4.69599 15.1071 3.65802C14.6053 3.38662 14.0711 3.16474 13.5149 3C12.9741 3.9237 11.9961 4.53791 10.999 4.53791C10.0011 4.53791 9.02404 3.9237 8.4822 3C7.92513 3.16474 7.39281 3.38662 6.89097 3.65802C7.16236 4.69599 6.94715 5.53494 6.23961 6.23961C5.53494 6.9462 4.69599 7.35186 3.65802 7.08047C3.38662 7.58231 3.16569 8.11653 3 8.67266C3.9237 9.21355 4.53791 10.0001 4.53791 10.999C4.53791 11.9961 3.9237 12.974 3 13.5159C3.16665 14.072 3.38662 14.6053 3.65802 15.1081C4.69599 14.8367 5.53494 15.0519 6.23961 15.7575C6.94524 16.4641 7.16236 17.3031 6.89097 18.3391C7.39281 18.6105 7.92608 18.8324 8.48316 18.999C9.02404 18.0725 10.002 17.4592 11 17.4592C11.997 17.4592 12.975 18.0734 13.5168 18.999C14.073 18.8314 14.6062 18.6105 15.109 18.3391C14.8376 17.3031 15.0528 16.4641 15.7594 15.7575C16.4651 15.0528 17.304 14.6472 18.341 14.9167C18.6124 14.4148 18.8334 13.8825 19 13.3245C18.0734 12.7826 17.4583 11.9961 17.4583 10.999ZM10.999 14.4767C9.07737 14.4767 7.52041 12.9198 7.52041 10.999C7.52041 9.07737 9.07832 7.51946 10.999 7.51946C12.9207 7.51946 14.4767 9.07832 14.4767 10.999C14.4767 12.9207 12.9207 14.4767 10.999 14.4767Z" />
    </symbol>
    <symbol id="icon-menu" viewBox="0 0 22 22">
        <path d="M3 16C3 15.4477 3.44772 15 4 15H13C13.5523 15 14 15.4477 14 16C14 16.5523 13.5523 17 13 17H4C3.44772 17 3 16.5523 3 16Z" />
        <path d="M3 6C3 5.44772 3.44772 5 4 5H18C18.5523 5 19 5.44772 19 6C19 6.55228 18.5523 7 18 7H4C3.44772 7 3 6.55228 3 6Z" />
        <path d="M3 11C3 10.4477 3.44772 10 4 10H18C18.5523 10 19 10.4477 19 11C19 11.5523 18.5523 12 18 12H4C3.44772 12 3 11.5523 3 11Z" />
    </symbol>
    <symbol id="icon-user" viewBox="0 0 22 22">
        <path d="M16.484 18.15H5.00017C4.36505 18.15 3.85017 17.6351 3.85017 17V16.2025C3.85017 15.836 4.02482 15.4915 4.3204 15.2749L7.56807 12.8948C8.08356 12.517 8.7404 12.3882 9.36041 12.5432L9.80817 12.6551C10.4212 12.8084 11.0626 12.8084 11.6757 12.6551L12.1235 12.5432C12.7435 12.3882 13.4003 12.517 13.9158 12.8948L17.1638 15.2749C17.4594 15.4915 17.634 15.836 17.634 16.2025V17C17.634 17.6351 17.1192 18.15 16.484 18.15ZM7.46308 7.1289C7.46308 5.33004 8.94917 3.86327 10.7607 3.87355C12.5577 3.88375 14.0211 5.34464 14.0211 7.12917C14.0211 8.92802 12.5351 10.3948 10.7235 10.3845C8.92648 10.3743 7.46308 8.91342 7.46308 7.1289Z" />
    </symbol>
    <symbol id="icon-keyboard-right" viewBox="0 0 6 10">
        <path d="M1.69209 0.273249C2.05245 0.624986 5.57328 4.32082 5.57328 4.32082C5.76553 4.50962 5.86208 4.75532 5.86208 5.00102C5.86208 5.24672 5.76553 5.49242 5.57328 5.6795C5.57328 5.6795 2.05245 9.37706 1.69209 9.72707C1.33173 10.0788 0.683431 10.1029 0.299795 9.72707C-0.0847026 9.35292 -0.114876 8.82962 0.299795 8.37012L3.53009 5.00102L0.299795 1.63192C-0.114876 1.17242 -0.0847026 0.648263 0.299795 0.273249C0.683431 -0.102628 1.33173 -0.0793515 1.69209 0.273249Z" />
    </symbol>
    <symbol id="icon-cross" viewBox="0 0 14 14">
        <path d="M4.91 3.992C5.14252 4.21583 7.41432 6.56773 7.41432 6.56773C7.53837 6.68788 7.60068 6.84423 7.60068 7.00058C7.60068 7.15694 7.53837 7.31329 7.41432 7.43234C7.41432 7.43234 5.14252 9.78533 4.91 10.0081C4.67747 10.2319 4.25916 10.2473 4.01162 10.0081C3.76352 9.76997 3.74405 9.43696 4.01162 9.14455L6.09596 7.00058L4.01162 4.85661C3.74405 4.5642 3.76352 4.23065 4.01162 3.992C4.25916 3.75281 4.67747 3.76762 4.91 3.992Z" />
        <path d="M9.08999 3.992C8.85747 4.21583 6.58566 6.56773 6.58566 6.56773C6.46162 6.68788 6.39931 6.84423 6.39931 7.00058C6.39931 7.15694 6.46162 7.31329 6.58566 7.43234C6.58566 7.43234 8.85747 9.78533 9.08999 10.0081C9.32251 10.2319 9.74083 10.2473 9.98837 10.0081C10.2365 9.76997 10.2559 9.43696 9.98837 9.14455L7.90402 7.00058L9.98837 4.85661C10.2559 4.5642 10.2365 4.23065 9.98837 3.992C9.74083 3.75281 9.32251 3.76762 9.08999 3.992Z" />
    </symbol>
    <symbol id="icon-search" viewBox="0 0 18 18">
        <path fill-rule="evenodd" clip-rule="evenodd" d="M12.1184 13.4407C11.1132 14.1763 9.87362 14.6106 8.53259 14.6106C5.17579 14.6106 2.45456 11.8894 2.45456 8.53258C2.45456 5.17577 5.17579 2.45455 8.53259 2.45455C11.8894 2.45455 14.6106 5.17577 14.6106 8.53258C14.6106 9.87378 14.1762 11.1135 13.4404 12.1188C13.4461 12.1242 13.4518 12.1297 13.4574 12.1353L15.2716 13.9495C15.6368 14.3147 15.6368 14.9067 15.2716 15.2719C14.9064 15.6371 14.3144 15.6371 13.9492 15.2719L12.135 13.4577C12.1294 13.4521 12.1238 13.4464 12.1184 13.4407ZM12.874 8.53258C12.874 10.9303 10.9303 12.874 8.53259 12.874C6.13488 12.874 4.19114 10.9303 4.19114 8.53258C4.19114 6.13486 6.13488 4.19113 8.53259 4.19113C10.9303 4.19113 12.874 6.13486 12.874 8.53258Z" />
    </symbol>
    <symbol id="icon-more" viewBox="0 0 25 25">
        <path d="M12.501 10.2273C11.3004 10.2273 10.3261 11.2006 10.3261 12.4012C10.3261 13.6018 11.3004 14.5751 12.501 14.5751C13.7016 14.5751 14.6739 13.6018 14.6739 12.4012C14.6739 11.2006 13.7016 10.2273 12.501 10.2273ZM5.58402 10.2273C4.38343 10.2273 3.40912 11.2006 3.40912 12.4012C3.40912 13.6018 4.38343 14.5751 5.58402 14.5751C6.78461 14.5751 7.75694 13.6008 7.75694 12.4012C7.75694 11.2016 6.78461 10.2273 5.58402 10.2273ZM19.418 10.2273C18.2174 10.2273 17.2431 11.2006 17.2431 12.4012C17.2431 13.6018 18.2174 14.5751 19.418 14.5751C20.6186 14.5751 21.5909 13.6018 21.5909 12.4012C21.5909 11.2006 20.6186 10.2273 19.418 10.2273Z" />
    </symbol>
</svg>
<div class="sidebar-backdrop"></div>
<div class="page-wrapper">
    <header class="header">
        <div class="header__inner">
            <div class="container-fluid">
                <div class="header__row row justify-content-between">
                    <div class="header__col-left col d-flex align-items-center">
                        <div class="header__left-toggle">
                            <button class="header__toggle-menu toggle-sidebar" type="button">
                                <svg class="icon-icon-menu">
                                    <use xlink:href="#icon-menu"></use>
                                </svg>
                            </button>
                            <button class="header__toggle-search toggle-search">
                                <svg class="icon-icon-search">
                                    <use xlink:href="#icon-search"></use>
                                </svg>
                            </button>
                        </div>
                        <div class="header__search">

                        </div>
                    </div>
                    <div class="header__col-right col d-flex align-items-center">


                        <div class="header__profile dropdown">
                            <a class="header__profile-toggle dropdown__toggle" href="#" data-toggle="dropdown">
                                <div class="header__profile-image"><span class="header__profile-image-text">MA</span>
                                    <img src="img/logo/default.png" alt="#" />
                                </div>
                                <div class="header__profile-text"><span><?php echo $_SESSION['full_name'] ?></span>
                                </div><span class="icon-arrow-down">
                                    <svg class="icon-icon-arrow-down">
                                        <use xlink:href="#icon-arrow-down"></use>
                                    </svg></span>
                            </a>
                            <div class="profile-dropdown dropdown-menu dropdown-menu--right"><a href="logout.php" class="profile-dropdown__item dropdown-menu__item" tabindex="0"><span class="profile-dropdown__icon">
                                        <svg class="icon-icon-logout">
                                            <use xlink:href="#icon-logout"></use>
                                        </svg></span><span><?= getLang('logout') ?></span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <aside class="sidebar">
        <div class="sidebar__backdrop"></div>
        <div class="sidebar__container">
            <div class="sidebar__top">
                <div class="container container--sm">
                    <a class="sidebar__logo" href="index.php">
                        <img class="sidebar__logo-icon" src="img/logo/logo.png" alt="#" style="width:100%" />
                    </a>
                </div>
            </div>
            <div class="sidebar__content" data-simplebar="data-simplebar">
                <nav class="sidebar__nav">
                    <ul class="sidebar__menu">
                        <li class="sidebar__menu-item"><a class="sidebar__link" href="#" data-toggle="collapse" data-target="#Auth" aria-expanded="false"><span class="sidebar__link-icon">
                                    <svg class="icon-icon-password">
                                        <use xlink:href="#icon-settings"></use>
                                    </svg></span><span class="sidebar__link-text"><?= getLang('manage_account') ?></span><span class="sidebar__link-arrow">
                                    <svg class="icon-icon-keyboard-down">
                                        <use xlink:href="#icon-keyboard-down"></use>
                                    </svg></span></a>
                            <div class="collapse" id="Auth">
                                <ul class="sidebar__collapse-menu">
                                    <li class="sidebar__menu-item"><a class="sidebar__link <?php if (basename($_SERVER['PHP_SELF']) == "change-pass.php") echo "active" ?>" href="change-pass.php"><span class="sidebar__link-signal"></span><span class="sidebar__link-text"><?= getLang('change_pass') ?></span></a>
                                    </li>
                                    <?php if ($_SESSION['level'] >= 2) : ?>
                                        <li class="sidebar__menu-item"><a class="sidebar__link <?php if (basename($_SERVER['PHP_SELF']) == "manage-users.php") echo "active" ?>" href="manage-users.php"><span class="sidebar__link-signal"></span><span class="sidebar__link-text"><?= getLang('admin') ?></span></a>
                                        </li>
                                    <?php endif; ?>
                                    <li class="sidebar__menu-item"><a class="sidebar__link" href="logout.php"><span class="sidebar__link-signal"></span><span class="sidebar__link-text"><?= getLang('logout') ?></span></a>
                                    </li>

                                </ul>
                            </div>
                        </li>
                        <li class="sidebar__menu-item"><a class="sidebar__link" href="#" data-toggle="collapse" data-target="#lang" aria-expanded="false"><span class="sidebar__link-icon">
                                    <svg class="icon-icon-password">
                                        <use xlink:href="#icon-user"></use>
                                    </svg></span><span class="sidebar__link-text"><?= getLang('lang') ?></span><span class="sidebar__link-arrow">
                                    <svg class="icon-icon-keyboard-down">
                                        <use xlink:href="#icon-keyboard-down"></use>
                                    </svg></span></a>
                            <div class="collapse" id="lang">
                                <ul class="sidebar__collapse-menu">
                                    <li class="sidebar__menu-item"><a class="sidebar__link <?php if ($selected_lang == "vi") echo "active" ?>" href="index.php?lang=vi"><span class="sidebar__link-signal"></span><span class="sidebar__link-text">Viet Nam</span></a>
                                    </li>
                                    <li class="sidebar__menu-item"><a class="sidebar__link <?php if ($selected_lang == "japan") echo "active" ?>" href="index.php?lang=japan"><span class="sidebar__link-signal"></span><span class="sidebar__link-text">Japan</span></a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </aside>

    <body>