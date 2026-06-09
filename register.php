<?php
session_start();
require "function.php";

$errors = $_SESSION['errors'] ?? [];
unset($_SESSION['errors']);

if (isset($_POST["register"])) {
    if (register($_POST) > 0) {
        echo "
        <script>
        alert('Registrasi akun berhasil! Silahkan login dengan akun yang telah dibuat.');
        document.location.href = 'login.php';
        </script>
        ";
    } else {
        echo "
        <script>
        alert('Registrasi akun gagal');
        document.location.href = 'register.php';
        </script>
        ";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Register Akun</title>
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
                    <h1>Register Sunshine</h1>
                    <p>Silahkan masukkan nama, email, dan password</p>
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
                    <input name="nama" type="text" required autocomplete="off" placeholder="Nama Lengkap" class="input-lr" />
                    <input name="email" type="text" required autocomplete="off" placeholder="Email" class="input-lr" />
                    <div class="password-container">
                        <input name="pass" type="password" required autocomplete="off" placeholder="Kata Sandi" class="input-lr toggle-password" />
                        <i class="fas fa-eye eye-icon"></i>
                    </div>
                    <div class="password-container">
                        <input name="pass2" type="password" required autocomplete="off" placeholder="Konfirmasi Kata Sandi" class="input-lr toggle-password" />
                        <i class="fas fa-eye eye-icon"></i>
                    </div>

                      <input name="register" type="submit" value="Register" class="submit-lr" />
                    <div class="l-register">
                        <div>Anda sudah memiliki akun?</div>
                        <a class="btn-l-register" href="login.php">Login</a>
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