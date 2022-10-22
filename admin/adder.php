<?php
session_start();
if ($_SESSION['role'] != 'admin') {
    header('Location:login.php');
}
include '../core.php';
?>

<head>
    <title>Admin Area</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>

</head>
<script>
    window.onload = function() {

        document.getElementById('opener').click();
    }
</script>
<!-- 
    <script type="text/javascript">
    $(window).on('load', function() {
        $('#exampleModal').modal('show');
    });
</script> -->


<body>
    <a type="button" id="opener" data-bs-toggle="modal" data-bs-target="#exampleModal">Adding... </a>

    <?php if ($_GET['page'] == '') { ?>

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add New Sparepart</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="" method="post" enctype="multipart/form-data">
                            <center>
                                <input type="file" name="pics" placeholder="Picture">
                                <input type="text" name="name" placeholder="Nama Sparepart">
                                <input type="text" name="price" placeholder="Harga Sparepart">
                                <input type="text" name="type" placeholder="Tipe Sparepart">
                                <input type="text" name="descz" placeholder="Deskripsi Sparepart">
                                <input type="text" name="stock" placeholder="Stock Sparepart">
                            </center>
                    </div>
                    <div class="modal-footer">
                        <button name="masukin" type="submit" class="btn btn-secondary" data-bs-dismiss="modal">Add Sparepart</button>
                        </form>
                        <?php
                        if (isset($_POST['masukin'])) {
                            $picss = $_FILES['pics']['name'];
                            $storage = '../img/';
                            $picss = $_FILES['pics']['name'];
                            move_uploaded_file($_FILES['pics']['tmp_name'], $storage . $picss);
                            $name = $_POST['name'];
                            $price = $_POST['price'];
                            $type = $_POST['type'];
                            $desc = $_POST['descz'];
                            $stock = $_POST['stock'];
                            $id = $_GET['id'];
                            mysqli_query($con, "INSERT INTO catalogs (id, pics, name, price, type, description,stock) VALUES ('', '$picss', '$name', '$price', '$type', '$desc','$stock') ");
                            header('Location:index.php');
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>

    <?php } elseif ($_GET['page'] == 'keranjang') { ?>


        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Sparepart Di Keranjang</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="" method="post" enctype="multipart/form-data">
                            <center>
                                <input type="file" name="pics" placeholder="Picture">
                                <input type="text" name="name" placeholder="Nama Sparepart">
                                <input type="text" name="price" placeholder="Harga Sparepart">
                                <input type="text" name="type" placeholder="Tipe Sparepart">
                                <input type="text" name="descz" placeholder="Deskripsi Sparepart">
                                <input type="text" name="jumlah" placeholder="Jumlah Sparepart">
                                <input type="text" name="users" placeholder="Pemilik Keranjang">
                            </center>
                    </div>
                    <div class="modal-footer">
                        <button name="addkeranjang" type="submit" class="btn btn-secondary" data-bs-dismiss="modal">Add</button>
                        </form>

                    <?php } elseif ($_GET['page'] == 'user') { ?>

                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Add User Data</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="" method="post" enctype="multipart/form-data">
                                            <center>
                                                <input type="file" name="pics" placeholder="Picture">
                                                <input type="text" name="name" placeholder="Nama User">
                                                <input type="text" name="age" placeholder="Umur user">

                                                <div class="form-check form-switch form-check-inline">
                                                    <input class="form-check-input" type="checkbox" name="gender" value="Pria" role="switch" id="flexSwitchCheckChecked">
                                                    <label class="form-check-label" for="flexSwitchCheckChecked">Pria</label>
                                                </div>
                                                <div class="form-check form-switch form-check-inline">
                                                    <input class="form-check-input" name="gender" type="checkbox" role="switch" value="Wanita">
                                                    <label class="form-check-label" for="wanita">Wanita</label>
                                                </div>
                                                <input type="text" placeholder="Password user" name="pword">


                                            </center>
                                    </div>
                                    <div class="modal-footer">
                                        <button name="adduser" type="submit" class="btn btn-secondary" data-bs-dismiss="modal">Add</button>
                                        </form>


                                    <?php } elseif ($_GET['page'] == 'homepage') { ?>


                                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Add Display Homepage</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="" method="post" enctype="multipart/form-data">
                                                            <center>
                                                                <input type="file" name="pics" placeholder="Picture">
                                                                <input type="text" name="title" placeholder="Title">
                                                                <input type="text" name="text" placeholder="Text">
                                                                <label for="lang">Key Article</label>
                                                                <select name="key" class="form-select" id="lang">
                                                                    <option  value="carousel">carousel</option>
                                                                    <option value="bottom">bottom</option>
                                                                </select>

                                                            </center>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button name="addhomepage" type="submit" class="btn btn-secondary" data-bs-dismiss="modal">Add</button>
                                                        </form>


                                                    <?php } ?>
                                                    <?php
                                                    if (isset($_POST['addkeranjang'])) {
                                                        $storage = '../img/';
                                                        $picss = $_FILES['pics']['name'];
                                                        move_uploaded_file($_FILES['pics']['tmp_name'], $storage . $picss);
                                                        $name = $_POST['name'];
                                                        $price = $_POST['price'];
                                                        $type = $_POST['type'];
                                                        $desc = $_POST['descz'];
                                                        $id = $_GET['id'];
                                                        mysqli_query($con, "INSERT INTO catalogs (id, pics, name, price, type, description) VALUES('','$picss','$name','$price','$type','$desc')");
                                                        header('Location:index.php?page=keranjang');
                                                    }
                                                    if (isset($_POST['addhomepage'])) {
                                                        $storage = '../img/';
                                                        $picss = $_FILES['pics']['name'];
                                                        move_uploaded_file($_FILES['pics']['tmp_name'], $storage . $picss);
                                                        $title = $_POST['title'];
                                                        $text = $_POST['text'];
                                                        $key = $_POST['key'];
                                                        mysqli_query($con, "INSERT INTO homepage (id, pics, title, text, keyz) VALUES ('','$picss','$title', '$text', '$key')");
                                                        header('Location:index.php?page=homepage');
                                                    }
                                                    if(isset($_POST['adduser'])){
                                                        $storage = '../img/';
                                                        $picss = $_FILES['pics']['name'];
                                                        move_uploaded_file($_FILES['pics']['tmp_name'], $storage . $picss);
                                                        $name=$_POST['name'];
                                                        $age=$_POST['age'];
                                                        $gender=$_POST['gender'];
                                                        $pword=$_POST['pword'];
                                                        mysqli_query($con, "INSERT INTO user (id,pics,user,age,gender,password) VALUES ('','$picss','$name','$age','$gender','$pword')");
                                                        header('Location:index.php?page=user');
                                                    }
                                                    ?>














</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="js/scripts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="assets/demo/chart-area-demo.js"></script>
<script src="assets/demo/chart-bar-demo.js"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
<script src="js/datatables-simple-demo.js"></script>