<?php
session_start();error_reporting(0);
ini_set('display_errors', 0);
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
    <a type="button" id="opener" data-bs-toggle="modal" data-bs-target="#exampleModal">Updating... </a>
    <div class="spinner-border text-dark"></div>
    <?php
    if ($_GET['page'] == '') { 
        $prev=mysqli_query($con, "SELECT * FROM catalogs WHERE id LIKE '$_GET[id]'");
        $x=mysqli_fetch_assoc($prev);
        ?>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Update Sparepart Info</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="" method="post" enctype="multipart/form-data">
                            <center>
                                <input type="file" name="pics" value="Picture">
                                <input type="text" name="name" value="<?=$x['name'] ?>">
                                <input type="text" name="price" value="<?=$x['price'] ?>">
                                <input type="text" name="type" value="<?=$x['type'] ?>">
                                <input type="text" name="descz" value="<?=$x['description'] ?>">
                                <input type="text" name="stock" value="<?=$x['stock'] ?>">
                            </center>
                    </div>
                    <div class="modal-footer">
                        <button name="update" type="submit" class="btn btn-secondary" data-bs-dismiss="modal">Update</button>
                        </form>

                    <?php } elseif ($_GET['page'] == 'user') { 
                        $prev=mysqli_query($con, "SELECT * FROM user WHERE id LIKE '$_GET[id]'");
        $x=mysqli_fetch_assoc($prev);
        ?>
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Update User Data</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="" method="post" enctype="multipart/form-data">
                                            <center>
                                                <input type="file" name="pics" value="Picture">
                                                <input type="text" name="name" value="<?=$x['userz'] ?>">
                                                <input type="text" name="age" value="<?=$x['age'] ?>">

                                                <div class="form-check form-switch form-check-inline">
                                                    <input class="form-check-input" type="checkbox" name="gender" value="Pria" role="switch" id="flexSwitchCheckChecked">
                                                    <label class="form-check-label" for="flexSwitchCheckChecked">Pria</label>
                                                </div>
                                                <div class="form-check form-switch form-check-inline">
                                                    <input class="form-check-input" name="gender" type="checkbox" role="switch" value="Wanita">
                                                    <label class="form-check-label" for="wanita">Wanita</label>
                                                </div>
                                                <input type="text" value="<?=$x['password'] ?>" name="pword">


                                            </center>
                                    </div>
                                    <div class="modal-footer">
                                        <button name="updateuser" type="submit" class="btn btn-secondary" data-bs-dismiss="modal">Update</button>
                                        </form>


                                    <?php } elseif ($_GET['page'] == "keranjang") { 
                                         $prev=mysqli_query($con, "SELECT * FROM keranjang WHERE id LIKE '$_GET[id]'");
                                         $x=mysqli_fetch_assoc($prev);


                                        ?>


                                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Update Sparepart Di Keranjang</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="" method="post" enctype="multipart/form-data">
                                                            <center>
                                                                <input type="file" name="pics" value="Picture">
                                                                <input type="text" name="name" value="<?=$x['name'] ?>">
                                                                <input type="text" name="price" value="<?=$x['price'] ?>">
                                                                <input type="text" name="type" value="<?=$x['type'] ?>">
                                                                <input type="text" name="descz" value="<?=$x['description'] ?>">
                                                                <input type="text" name="jumlah" value="<?=$x['jumlah'] ?>">
                                                                <input type="text" name="users" value="<?=$x['user'] ?>">
                                                            </center>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button name="updatekeranjang" type="submit" class="btn btn-secondary" data-bs-dismiss="modal">Update</button>
                                                        </form>



                                                    <?php } ?>

                                                    <?php
                                                    if (isset($_POST['update'])) {
                                                        $picss = $_FILES['pics']['name'];
                                                        if ($picss == '') {
                                                            $name = $_POST['name'];
                                                            $price = $_POST['price'];
                                                            $type = $_POST['type'];
                                                            $desc = $_POST['descz'];
                                                            $stock = $_POST['stock'];
                                                            $id = $_GET['id'];
                                                            mysqli_query($con, "UPDATE catalogs SET name='$name', price='$price', type='$type', description='$desc', stock='$stock' WHERE id LIKE '$id' ");
                                                            header('Location:index.php');
                                                        } else {
                                                            $storage = '../img/';
                                                            $picss = $_FILES['pics']['name'];
                                                            move_uploaded_file($_FILES['pics']['tmp_name'], $storage . $picss);
                                                            $name = $_POST['name'];
                                                            $price = $_POST['price'];
                                                            $type = $_POST['type'];
                                                            $stock = $_POST['stock'];
                                                            $desc = $_POST['descz'];
                                                            $id = $_GET['id'];
                                                            mysqli_query($con, "UPDATE catalogs SET pics='$picss', name='$name', price='$price', type='$type', description='$desc', stock='$stock' WHERE id LIKE '$id' ");
                                                            header('Location:index.php'); 
                                                        }
                                                    }

                                                    if (isset($_POST['updatekeranjang'])) {
                                                        $picss = $_FILES['pics']['name'];
                                                        if ($picss == '') {
                                                            $name = $_POST['name'];
                                                            $price = $_POST['price'];
                                                            $type = $_POST['type'];
                                                            $desc = $_POST['descz'];
                                                            $jumlah = $_POST['jumlah'];
                                                            $users = $_POST['users'];
                                                            $id = $_GET['id'];
                                                            mysqli_query($con, "UPDATE keranjang SET name='$name', price='$price', type='$type', description='$desc', jumlah='$jumlah', user='$users' WHERE id LIKE '$id' ");
                                                            header('Location:index.php?page=keranjang');
                                                        } else {
                                                            $storage = '../img/';
                                                            $picss = $_FILES['pics']['name'];
                                                            move_uploaded_file($_FILES['pics']['tmp_name'], $storage . $picss);
                                                            $name = $_POST['name'];
                                                            $price = $_POST['price'];
                                                            $type = $_POST['type'];
                                                            $desc = $_POST['descz'];
                                                            $id = $_GET['id'];
                                                            mysqli_query($con, "UPDATE keranjang    SET pics='$picss', name='$name', price='$price', type='$type', description='$desc', jumlah='$jumlah', user='$users' WHERE id LIKE '$id' ");
                                                            header('Location:index.php?page=keranjang'); 
                                                        }
                                                    }



                                                    if (isset($_POST['updateuser'])) {
                                                        $picss = $_FILES['pics']['name'];
                                                        if ($picss == '') {
                                                            $name = $_POST['name'];
                                                            $age = $_POST['age'];
                                                            $gender = $_POST['gender'];
                                                            $pword = $_POST['pword'];
                                                            $id = $_GET['id'];
                                                            mysqli_query($con, "UPDATE user SET user='$name', age='$age', gender='$gender', password='$pword' WHERE id LIKE '$id' ");
                                                            header('Location:index.php?page=user');
                                                        } else {
                                                            $storage = '../img/';
                                                            $picss = $_FILES['pics']['name'];
                                                            move_uploaded_file($_FILES['pics']['tmp_name'], $storage . $picss);
                                                            $name = $_POST['name'];
                                                            $age = $_POST['age'];
                                                            $gender = $_POST['gender'];
                                                            $pword = $_POST['pword'];
                                                            $id = $_GET['id'];
                                                            mysqli_query($con, "UPDATE user SET pics='$picss', user='$name', age='$age', gender='$gender', password='$pword' WHERE id LIKE '$id' ");
                                                            header('Location:index.php?page=user');
                                                        }
                                                    }
                                                   


                                                    ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="js/scripts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="assets/demo/chart-area-demo.js"></script>
<script src="assets/demo/chart-bar-demo.js"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
<script src="js/datatables-simple-demo.js"></script>