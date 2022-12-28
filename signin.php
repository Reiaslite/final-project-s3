<?php 

 
    define('BASEPATH','public');
    require_once 'connection.php';
    //jika sudah login tidak bisa kembali kehalaman login
    // if (isset($_SESSION['login'])) {
    //     header("Location: index.php");
    // }

    //Login
    $db = new Database();
    if (isset($_POST['submit'])) {
        $name = $_POST['username'];
        $password = $_POST['password'];
        
        $result = $db->login($name, $password);
        var_dump($_SESSION['role']);
        if ($result === true){
            $_SESSION['login'] = true;
            if ($_SESSION['role']=='admin') {
                header("Location: admin/users/index.php");
                exit;
            } 
            header("Location: index.php");
           
            exit;
        } else if ($result === false) {
            echo "<script>
                alert('Kamu telah memilih kandidat, atau email/password salah');
            </script>";
        }
}
  

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/styles.css">
    <title>Document</title>
</head>
<body>
    
    <div class="contents-signin">
        <div class="colors">
            <div class="color"></div>
            <div class="color"></div>
            <div class="color"></div>
            <div class="color"></div>
            <div class="color"></div>
            <div class="color"></div>
            <div class="color"></div>
            <div class="color"></div>
        </div>
        <div class="signin">
            <div class="box">
                <div class="image-container">
                    <img src="assets/img/tutwuri.png">
                </div>
            </div>
            <div class="box">
                
                <form  method="post">
                    <div class="form-element">
                        <input type="email" name="username" placeholder="Email" required>
                    </div>
                    <div class="form-element">
                        <input type="password" name="password" placeholder="password" required>
                    </div>
                    <button type="submit" class="btn-signin" name = "submit">Masuk</button>
                    <h5>Anda belum mempunyai akun? <a href="signup.php">Daftar</a></h5>
                </form>
            </div>
        </div>
    </div>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- <script src="assets/js/signin.js"></script> -->
</body>
</html>