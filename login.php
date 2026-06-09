<?php
session_start();
require "function.php";

$errors = $_SESSION['errors'] ?? [];
unset($_SESSION['errors']);

if (isset($_POST["login"])) {
    login($_POST);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login Akun</title>
    <link rel="stylesheet" href="css/style.css" type="text/css" />
    <link
        href="https://fonts.googleapis.com/css2?family=Lexend:wght@100..900&family=Playpen+Sans:wght@100..800&display=swap"
        rel="stylesheet" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"
        integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer" />
</head>

<body>
    <div class="container-lr">
        <div class="left-lr" data-aos="fade-right" data-aos-duration="1000">
            <img src="img/aset/foto-bersama-2.png" alt="">
        </div>
        <div class="lr">
            <div class="login-register">
                <div class="title-lr" data-aos="fade-down" data-aos-duration="1000">
                    <h1>Login Sunshine</h1>
                    <p>Silahkan masukkan email dan password</p>
                </div>

                <form action="" method="post" class="form-lr" data-aos="fade-up" data-aos-duration="1000">


                    <?php if (!empty($errors)): //(cek dulu) namun hasilnya [] karna gada eror 
                    ?>
                        <div class="errors">
                            <?php foreach ($errors as $error): ?>
                                <div class="error"><?= htmlspecialchars($error) ?></div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>


                    <input name="email" type="text" required autocomplete="off" placeholder="Email" class="input-lr" />

                    <div class="password-container">
                        <input name="pass" type="password" required autocomplete="off" placeholder="Kata Sandi" class="input-lr toggle-password" />
                        <i class="fas fa-eye eye-icon"></i>
                    </div>

                    <input name="login" type="submit" value="Login" class="submit-lr" />

                    <div class="l-register">
                        <div>Anda belum memiliki akun?</div>
                        <a class="btn-l-register" href="register.php">Register</a>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <script src="js/pass.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>

</body>

</html>