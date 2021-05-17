<?php

require_once 'validation.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Megabit</title>
</head>
<body>
    <div class="container _container">
        <div class="wrapper">
            <header class="header">
                <div class="header__content ">
                    <div class="header__menu menu-header">
                        <nav class="menu-header__body">
                            <div class="menu-header__logo logo-header">
                                <a href="#" class="logo-header__image">
                                    <img src="../icons/Union1.png" alt="">
                                </a>
                                <div class="logo-header__title">pinaple.</div>
                            </div>
                            <ul class="menu-header__list">
                                <li><a href="#" class="menu-header__link">About</a></li>
                                <li><a href="#" class="menu-header__link">How it works</a></li>
                                <li><a href="#" class="menu-header__link">Contact</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </header> 
            <main class="main">
                <div class="main__container _container">
                    <div class="main__wrapper">
                        <div class="main__content content">
                            <div class="content__title">Subscribe to newsletter</div>
                            <div class="content__text">Subscribe to our newsletter and get 10% discount on pineapple glasses.</div>
                            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" id="form" class="content__form form-content"  onSubmit="if (this.email.value == '') {return false;}">
                                <div class="form-content__input">
                                    <input autocomplete="off" type="email" name="email" class="input" id="email" placeholder="Type your email address here…"  onchange="validation(this.value)" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"  >
                                    <button type="submit" class="form-content__btn"><img src="" alt="" class="svg-button"></button>
                                </div>
                                <span class="error" aria-live="polite">
                                <?php
                                echo $msg;
                                ?>
                                </span>

                               

                                <div class="form-content__checkbox checkbox-content">
                                    <label class="checkbox-content__label checkbox">
                                      
                                        <input  class="checkbox-content__input" name="checkbox" type="checkbox" required >
                                        <span class="checkbox-content__text"><span>I agree to <span class="underline">terms of service</span></span></span>
                                    </label>
                                </div>
                            </form>
                        </div>
                        <footer class="footer social">
                            <div class="social__items">
                                    <div class="social__item" id="facebook">
                                        <a href="#" class="social__link">
                                            <img src="" alt="" class="svg-facebook">
                                        </a>
                                    </div>
                                    <div class="social__item" id="instagram">
                                        <a href="#" class="social__link">
                                            <img src="" alt="" class="svg-instagram">
                                        </a>
                                    </div>
                                    <div class="social__item" id="twitter">
                                        <a href="#" class="social__link">
                                            <img src="" alt="" class="svg-twitter">
                                        </a>
                                    </div>
                                    <div class="social__item" id="youtube">
                                        <a href="#" class="social__link">
                                            <img src="" alt="" class="svg-youtube">
                                        </a>
                                    </div>
                            </div>
                        </footer>
                    </div>
                </div>
            </main>   
        </div>
        <section class="backgraund">
            <img src="../img/backgraund.png" alt="" class="backgraundPc">
        </section>
    </div> 
<script src="../js/effectsFocusAndHover.js"></script>
<script src="../js/validation.js"></script>
</body>
</html>