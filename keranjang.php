<?php
include 'header.php';
include 'addons.html';
include 'core.php';
session_start();
if ($_SESSION['logins'] != 'true') {
    header('Location:login.php');
}
$keranjangs = mysqli_query($con, "SELECT * FROM keranjang WHERE user LIKE '$_SESSION[uname]'");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang <?= $_SESSION['uname'] ?></title>
</head>

<body>
    <div class="head  d-flex justify-content-between">
        <h1 class="cats">Keranjang </h1>
        <a style="text-decoration:none;color:white" class="spbtn" href="logout.php">Log Out</a>
    </div>
    <div class="sizebox">
        <ul>
            <?php foreach ($keranjangs as $k) : ?>
                <div class="borders row d-flex align-items-center justify-content-between text-center">
                    <img src="img/<?= $k['pics'] ?>" alt="" class="col pick">
                    <!-- <div class="textx justify-content-center d-flex"> -->
                        <h3 class="col"><?= $k['name'] ?></h2>
                            <h6 class="col">Rp. <?= $k['price'] ?></h6>
                            <h6 class="col"><?= $k['type'] ?></h6>
                            <h6 class="col"><?= $k['jumlah'] ?> pcs</h6>
                            <button class="col btn btn-danger btn-sm"><a style="text-decoration:none;color:white" href="deleter.php?id=<?= $k['id'] ?>">Remove</a></button>
                    <!-- </div> -->
                </div><?php endforeach; ?>
        </ul>
    </div>


    <style>.textx{
        margin-top: 10px; height: 50px;
    }
        .pick {
            width: 150;
            height: 100; margin-right: 10px;
        }

        .spbtn {
            background-color: #ccbf2f;
            color: white;
        }

        .delbtn {
            background-color: #040054;
        }

        .borders {
            border: solid 2px #040054;
            border-radius: 25px;
            padding: 10px;
            font-family: 'Segoe UI';
            font-weight: 900;
            margin: 10px;
        }

        .sizebox {
            width: 70%;
            height: auto;
            left: 15%;
            position: absolute;
            top: 12%;
            padding: 16px;
            display: grid;
            /* grid-template-columns: 60px 60px;
            grid-template-columns: repeat(5, auto);
            grid-template-rows: repeat(5, auto);
            grid-gap: 10px;

            padding: 5px; */
        }

        .head {
            position: absolute;
            top: 0%;
            width: 100%;
            height: 10%;
            left: 0%;
            background-color: #ccbf2f;
            padding: 7px;
        }

        .cats {
            font-family: "Arial";
            font-size: 50px;
            margin: 0;
            font-weight: 400;
            color: white;
        }

        body {
            background-color: #ffffff;
        }
    </style>
</body>

</html>