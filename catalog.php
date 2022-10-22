<!DOCTYPE html>
<?php
error_reporting(0);
ini_set('display_errors', 0);
include 'core.php';
include 'addons.html';
$query = mysqli_query($con, "SELECT * FROM catalogs");
$id = $_GET['id'];
?>
<html lang="en">

<?php include 'header.php'; ?>
<title>Catalogs</title>
<div class="head  d-flex justify-content-between">
        <h1 class="cats">Catalogs </h1>
            <a style="text-decoration:none;color:white" class="spbtn" href="logout.php" >Log Out</a>
    </div>
    <?php if ($_GET['page'] == '') { ?>

        <div class="sizebox">
            <?php

            foreach ($query as $q) :
            ?>

                <div class="card" style="width: 18rem;" data-aos="fade-up" data-aos-duration="2000">
                    <img src="<?= "img/" . $q['pics'] ?>" class="imgcardz" alt="...">
                    <div class="card-body text-center">
                        <h5 class="card-title"><?= $q['name'] ?></h5>

                        <p class="card-text d-inline"><?= $q['description'] ?> | Stock : <?=$q['stock'] ?></p>


                        <a href="catalog.php?id=<?= $q['id'] ?>&&page=detail" class="btn spbtn d-grid gap-2">Buy</a>
                       <form action="" method="post"> <button name="chart"  type="submit" class="btn col-lg-12 spbtn"><i style="color:#fff" class="fa fa-dark fa-cart-shopping"></i>&nbsp;Add to Chart</button>
                       </form> </div>
        <?php
        if(isset($_POST['chart'])){
            mysqli_query($con,'INSERT INTO keranjang ()');

        }
        ?>
                </div>
                <style>.imgcardz{width: auto; height: 200px;}</style>

            <?php endforeach; ?>
        </div>
        <script>
            function charts() {
                Swal.fire(
                    'Success',
                    'Sparepart ditambahkan ke keranjang',
                    'success'
                )
            }
        </script>


    <?php } elseif ($_GET['page'] == 'detail') { ?>

        <?php $detail = mysqli_query($con, " SELECT * FROM catalogs WHERE id = '$id' ");
        $d = mysqli_fetch_assoc($detail);

        ?>

        <div class="d-flex justify-content-around pt-lg-5">
            <div class="card rounded" style="width: 58rem;" data-aos="fade-in" data-aos-duration="2000">
                <img src="<?= "img/" . $d['pics'] ?>" class="img-fluid rounded" alt="...">
                <div class="card-body text-center">
                    <h5 class="card-title"><?= $d['name'] ?></h5>
                    <h5 class="card-title">Rp.<?= $d['price'] ?></h5>
                    <p class="card-text"><?= $d['description'] ?></p>
                    <a href="detailer.php?id=<?= $d['id'] ?>" class="btn spbtn d-grid">Buy</a>
                    <a href="detailer.php?id=<?= $d['id'] ?>" class="btn spbtn col-lg-12">Keranjang <span> <i class="fa fa-cart-shopping"></i> </a></span>
                </div>
            </div>
        </div>

    <?php } ?>






    <style>
        .spbtn {
            background-color: #ccbf2f;
            color: white;
        }

        .sizebox {
            width: 90%;
            height: auto;
            left: 2.7%;
            position: absolute;
            top: 12%;
            padding: 16px;
            display: grid;
            grid-template-columns: 60px 60px;
            grid-template-columns: repeat(5, auto);
            grid-template-rows: repeat(5, auto);
            grid-gap: 10px;

            padding: 5px;
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