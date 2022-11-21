 <?php
 define('BASEPATH', 'public');

 require_once '../backend/connection.php';


$db = new Database();
if(isset($_POST['submit'])){
    $nama = $_POST['name'];
    $nis = $_POST['nis'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if($result = $db->register($nama, $nis, $email, $password)){
        $sukses=true;
    }else{
        $error = $user->getLastError();
    }

}

 //don't delete
// $db = new Database();
// if (isset($_POST['submit'])):
//     $name = $_POST['name'];
//     $nis = $_POST['nis'];
//     $email = $_POST['email'];
//     $password = $_POST['password'];

//     $result = $db->insert($name, $nis, $email, $password);
//     header("Location: signin.php");
// endif;
// ?> 

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
    
    <div class="contents-signup">
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
        <div class="signup">
            <div class="box">
                <div class="image-container">
                    <a href="index.html"><img src="assets/img/tutwuri.png"></a>
                </div>
            </div>
            <div class="box">
                <form method="post">
                    <div class="form-element">
                        <input type="text" name="name" placeholder="name" required>
                    </div>
                    <div class="form-element">
                        <input type="text" name="nis" placeholder="nis" required>
                    </div>
                    <div class="form-element">
                        <input type="email" name="email" placeholder="email" required>
                    </div>
                    <div class="form-element">
                        <input type="password" name="password" placeholder="password" required>
                    </div>
                    <button type="submit" class="btn-signup" name="submit" value="submit">Daftar</button>
                    <h5>Anda sudah mempunyai akun? <a href="signin.php">Masuk</a></h5>
                </form>
            </div>
        </div>
    </div>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <?php if(isset($sukses)==1):?>
        <script src="assets/js/signup.js"></script>
    <?php endif ?>

    
</body>
</html>