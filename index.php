<?php 
define('BASEPATH','public');
require_once "connection.php";

$db = new Database();
    if(!isset($_SESSION['login'])){
        header("Location: signin.php");
         exit;
    }
    
    if(isset($_POST['logout'])){
            $db->logout();
    }
?>
<!DOCTYPE html>
<html lang="en" id="home">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <title>E-Voting</title>
</head>
<body>
    <header>
        <nav>
            <div class="nav-container">
                <div class="logo">
                    <h3>
                        <a href="#home" class="page-scroll">Beranda</a>
                    </h3>
                </div>
                <ul class="menu">
                    <li class="list-menu">
                        <h5><?= $_SESSION['nama']?></h5> 
                    </li>
                    <li class="list-menu">
                        <form action="" method="post">
                            <button type="submit" class="btn-logout" name='logout'>Logout</button>
                        </form>
                    </li>
                
                </ul>

                <div class="hamburger-container">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
        </nav>
    </header>

    <main>

        <div class="jumbotron">
            <div class="container">
                <div class="box">
                    <img src="assets/img/tutwuri.png" alt="">
                </div>
                <div class="box">
                    <div class="item">
                        <h4>Pilkasis! </h4><i class="fa-solid fa-box-open"></i>
                    </div>
                    <p>Memilih <span>suara</span> adalah bentuk <span>komitmen</span> kami terhadap <span>diri sendiri</span>, <span>orang lain</span>, <span>negara</span> dan <span>dunia</span> ini!</p>
                    <a href="#bodyCard" class="btn-choice page-scroll">Ayo Pilih!</a>
                </div>
                <div class="box">
                    <img src="assets/img/tutwuri.png" alt="">
                </div>
            </div>
        </div>

        <div class="contents" id="bodyCard">

            <?php 
                $query = "SELECT * FROM kandidat";
                $result = mysqli_query($db->db,$query);
            if(mysqli_num_rows($result)>0){

            
            while($row = mysqli_fetch_assoc($result)){?>
            <div class="card">
                <div class="image">
                    <img src="assets/img/<?=$row['foto']?>" alt="">
                </div>
                <div class="desc">
                    <div class="top">
                        <h5><?= $row['nama']?></h5>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing.......</p>
                    </div>
                    <div class="bottom" data-id="<?= $row['id'] ?>" data-count="<?= $row['count'] ?>">
                        <div class="left">
                            <h5>Read more</h5>
                        </div>
                        <div class="right">
                            <div class="box">
                                <i class="fa-solid fa-greater-than"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box-nail">
                    <i class="fa-solid fa-pencil"></i>
                </div>
            </div>
            <?php
             } 
            }
            ?>
        </div>

        <div class="container-menu">
            <ul class="menu-mobile">
                <li class="list-menu">
                    <h5><?= $_SESSION['nama'] ?></h5>
                </li>
                <li class="list-menu">
                    <button type="submit" class="btn-logout">Logout</button>
                </li>
            </ul>
        </div>

    </main>

    <footer>
        <div class="container">
            <h5> <strong>Copyright &copy; 2022 <a href="#">Kelompok 4</a>.</strong> All rights reserved.</h5>
        </div>
    </footer>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="assets/js/scripts.js"></script>
</body>
</html>