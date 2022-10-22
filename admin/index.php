<!DOCTYPE html>
<html lang="en">
<?php include '../core.php';
error_reporting(0);
ini_set('display_errors', 0);
session_start();
if ($_SESSION['role'] != 'admin') {
    header('Location:login.php');
}

$catalog = mysqli_query($con, "SELECT * FROM catalogs");
$soldout = mysqli_query($con, "SELECT * FROM soldout");
$keranjang = mysqli_query($con, "SELECT * FROM keranjang");
$user = mysqli_query($con, "SELECT * FROM user");
$homepage = mysqli_query($con, "SELECT * FROM homepage");
$jumlahcatalogs = mysqli_num_rows($catalog);
$jumlahkeranjang = mysqli_num_rows($keranjang);
$jumlahsoldout = mysqli_num_rows($soldout);
$jumlahuser = mysqli_num_rows($user);

?>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Admin Area</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="index.php">Admin Area</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <div class="input-group">
                <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
            </div>
        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#!">Settings</a></li>
                    <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li><a class="dropdown-item" href="login.php?code=logout">Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Menu</div>
                        <a class="nav-link" href="index.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <a class="nav-link" href="index.php?page=keranjang">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Sparepart di Keranjang
                        </a>
                        <a class="nav-link" href="index.php?page=soldout">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Sparepart Soldout
                        </a>
                        <a class="nav-link" href="index.php?page=user">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Data User
                        </a>
                        <a class="nav-link" href="index.php?page=homepage">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Display Homepage
                        </a>



                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as : Emi</div>
                    This is Important Restricted Area
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Dashboard</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                    <div class="row">
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-primary text-white mb-4">
                                <div class="card-body">Total Jumlah Sparepart Ready</div>
                                <h4 class="card-text text-lg-center"><?= $jumlahcatalogs; ?></h4>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="index.php">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-warning text-white mb-4">
                                <div class="card-body">Total Jumlah Sparepart di Keranjang</div>
                                <h4 class="card-text text-lg-center"><?= $jumlahkeranjang; ?></h4>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="index.php?page=keranjang">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-success text-white mb-4">
                                <div class="card-body">Total Jumlah Sparepart Soldout</div>
                                <h4 class="card-text text-lg-center"><?= $jumlahsoldout; ?></h4>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="index.php?page=soldout">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-danger text-white mb-4">
                                <div class="card-body">Total Jumlah User</div>
                                <h4 class="card-text text-lg-center"><?= $jumlahuser; ?></h4>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="index.php?page=user">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card mb-4">

                        <?php if ($_GET['page'] == '') { ?>

                            <div class="card-header d-md-flex justify-content-between">
                                <i class="fas fa-table me-1"></i>
                                <h4>Sparepart Ready</h4>
                                <button onclick="add()" type="submit" class="btn btn-primary float-right">New Item</button>

                            </div>
                            <script>
                                function add() {
                                    window.open('adder.php?page=');
                                }
                            </script>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Picture</th>
                                            <th>Name</th>
                                            <th>Price</th>
                                            <th>Type</th>
                                            <th>Description</th>
                                            <th>Stock</th>
                                            <th>Operation</th>

                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Picture</th>
                                            <th>Name</th>
                                            <th>Price</th>
                                            <th>Type</th>
                                            <th>Description</th>
                                            <th>Stock</th>
                                            <th>Operation</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php foreach ($catalog as $c) : ?>
                                            <tr>
                                                <td><a type="button" data-bs-toggle="modal" data-bs-target="#exampleModal"><img id="thepics" src="../img/<?= $c['pics'] ?>" alt="" class="tbimage"></a></td>
                                                <td><?= $c['name'] ?></td>
                                                <td><?= $c['price'] ?></td>
                                                <td><?= $c['type'] ?></td>
                                                <td><?= $c['description'] ?></td>
                                                <td><?= $c['stock'] ?></td>
                                                <td>

                                                    <a type="button" href="updater.php?id=<?= $c['id'] ?>" class="btn btn-small btn-primary">Update</a>
                                                    <a href="deleter.php?id=<?= $c['id'] ?>&&table=catalogs&&from=index" class="btn btn-small btn-danger">Delete</a>
                                                </td>

                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>






                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Detail Image</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <center>
                                                    <img src="../img/<?= $c['pics'] ?>" alt="" class="img-responsive">
                                                    <!-- <input type="file" placeholder="Picture">
                                        <input type="text" placeholder="Nama Sparepart">
                                        <input type="text" placeholder="Harga Sparepart">
                                        <input type="text" placeholder="Tipe Sparepart">
                                        <input type="text" placeholder="Deskripsi Sparepart"> -->
                                                </center>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>


                        <?php } elseif ($_GET['page'] == 'keranjang') { ?>


                            <div class="card-header d-md-flex justify-content-between">
                                <i class="fas fa-table me-1"></i>
                                <h4> Sparepart di Keranjang</h4>
                                <button onclick="add()" type="submit" class="btn btn-primary float-right">New Item</button>
                            </div>
                            <script>
                                function add() {
                                    window.open('adder.php?page=keranjang');
                                }
                            </script>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Picture</th>
                                            <th>Name</th>
                                            <th>Price</th>
                                            <th>Type</th>
                                            <th>Description</th>
                                            <th>Jumlah</th>
                                            <th>User</th>
                                            <th>Operation</th>

                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Picture</th>
                                            <th>Name</th>
                                            <th>Price</th>
                                            <th>Type</th>
                                            <th>Description</th>
                                            <th>Jumlah</th>
                                            <th>User</th>
                                            <th>Operation</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php foreach ($keranjang as $c) : ?>
                                            <tr>
                                                <td><a type="button" data-bs-toggle="modal" data-bs-target="#exampleModal"><img id="thepics" src="../img/<?= $c['pics'] ?>" alt="" class="tbimage"></a></td>
                                                <td><?= $c['name'] ?></td>
                                                <td><?= $c['price'] ?></td>
                                                <td><?= $c['type'] ?></td>
                                                <td><?= $c['description'] ?></td>
                                                <td><?= $c['jumlah'] ?></td>
                                                <td><?= $c['user'] ?></td>
                                                <td>

                                                    <a type="button" href="updater.php?id=<?= $c['id'] ?>&&page=keranjang" class="btn btn-small btn-primary">Update</a>
                                                    <a href="deleter.php?id=<?= $c['id'] ?>&&table=keranjang&&from=indexkeranjang" class="btn btn-small btn-danger">Delete</a>
                                                </td>

                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>

                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Detail Image</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <center>
                                                    <img src="../img/<?= $c['pics'] ?>" alt="" class="img-responsive">
                                                    <!-- <input type="file" placeholder="Picture">
                                        <input type="text" placeholder="Nama Sparepart">
                                        <input type="text" placeholder="Harga Sparepart">
                                        <input type="text" placeholder="Tipe Sparepart">
                                        <input type="text" placeholder="Deskripsi Sparepart"> -->
                                                </center>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>



                        <?php } elseif ($_GET['page'] == "soldout") { ?>




                            <div class="card-header d-md-flex justify-content-between">
                                <i class="fas fa-table me-1"></i>
                                <h4>Sparepart Soldout</h4>
                                <button onclick="add()" type="submit" class="btn btn-primary float-right">New Item</button>
                            </div>
                            <script>
                                function add() {
                                    window.open('adder.php?page=soldout');
                                }
                            </script>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Picture</th>
                                            <th>Name</th>
                                            <th>Price</th>
                                            <th>Type</th>
                                            <th>Description</th>
                                            <th>Jumlah</th>
                                            <th>User</th>
                                            <th>Operation</th>

                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Picture</th>
                                            <th>Name</th>
                                            <th>Price</th>
                                            <th>Type</th>
                                            <th>Description</th>
                                            <th>Jumlah</th>
                                            <th>User</th>
                                            <th>Operation</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php foreach ($soldout as $c) : ?>
                                            <tr>
                                                <td><a type="button" data-bs-toggle="modal" data-bs-target="#exampleModal"><img id="thepics" src="../img/<?= $c['pics'] ?>" alt="" class="tbimage"></a></td>
                                                <td><?= $c['name'] ?></td>
                                                <td><?= $c['jumlah'] ?></td>
                                                <td><?= $c['total'] ?></td>
                                                <td><?= $c['tanggal_pembelian'] ?></td>
                                                <td><?= $c['pembeli'] ?></td>

                                                <td>

                                                    <a type="button" href="updater.php?id=<?= $c['id'] ?>" class="btn btn-small btn-primary">Update</a>
                                                    <a href="deleter.php?id=<?= $c['id'] ?>&&table=soldout&&from=indexsoldout" class="btn btn-small btn-danger">Delete</a>
                                                </td>

                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>

                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Detail Image</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <center>
                                                    <img src="../img/<?= $c['pics'] ?>" alt="" class="img-responsive">
                                                    <!-- <input type="file" placeholder="Picture">
                                        <input type="text" placeholder="Nama Sparepart">
                                        <input type="text" placeholder="Harga Sparepart">
                                        <input type="text" placeholder="Tipe Sparepart">
                                        <input type="text" placeholder="Deskripsi Sparepart"> -->
                                                </center>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>



                        <?php } elseif ($_GET['page'] == 'user') { ?>


                            <div class="card-header d-md-flex justify-content-between">
                                <i class="fas fa-table me-1"></i>
                                <h4>  User Account </h4>
                                <button onclick="add()" type="submit" class="btn btn-primary float-right">New Item</button>
                               
                            </div>
                            <script>
                                function add() {
                                    window.open('adder.php?page=user');
                                }
                            </script>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead >
                                        <tr>
                                            <th>Picture</th>
                                            <th>Username</th>
                                            <th>Gender</th>
                                            <th>Age</th>
                                            <th>Password</th>
                                            <th>Operation</th>
                                        </tr>
                                    </thead>
                                    <tfoot >
                                        <tr>
                                            <th>Picture</th>
                                            <th>Username</th>
                                            <th>Gender</th>
                                            <th>Age</th>
                                            <th>Password</th>
                                            <th>Operation</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php foreach ($user as $c) : ?>

                                            <tr class="text-center">
                                                <?php if ($c['pics'] == '') { ?>
                                                    <td><a type="button" data-bs-toggle="modal" data-bs-target="#exampleModal"><img id="thepics" src="../img/download.jfif" alt="" class="tbimage"></a></td>

                                                <?php } else { ?>
                                                    <td><a type="button" data-bs-toggle="modal" data-bs-target="#exampleModal"><img id="thepics" src="../img/<?= $c['pics'] ?>" alt="" class="tbimage"></a></td>
                                                <?php } ?>
                                                <td><?= $c['user'] ?></td>
                                                <td><?= $c['gender'] ?></td>
                                                <td><?= $c['age'] ?></td>
                                                <td><?= $c['password'] ?></td>


                                                <td>
                                                    <a type="button" href="updater.php?id=<?= $c['id'] ?>&&page=user" class="btn btn-small btn-primary">Update</a>
                                                    <a href="deleter.php?id=<?= $c['id'] ?>&&table=user&&from=indexuser" class="btn btn-small btn-danger">Delete</a>
                                                    
                                                </td>
                                               
                                                <style>
                                                    .pwrod {
                                                        background-color: white;
                                                    }
                                                </style>

                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>

                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Detail Image</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <center>
                                                    <img src="../img/<?= $c['pics'] ?>" alt="" class="img-responsive">
                                                    <!-- <input type="file" placeholder="Picture">
                                        <input type="text" placeholder="Nama Sparepart">
                                        <input type="text" placeholder="Harga Sparepart">
                                        <input type="text" placeholder="Tipe Sparepart">
                                        <input type="text" placeholder="Deskripsi Sparepart"> -->
                                                </center>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>




                        <?php } elseif ($_GET['page'] == 'homepage') { ?>


                            <div class="card-header d-md-flex justify-content-between">
                                <i class="fas fa-table me-1"></i>
                                <h4> Homepage Display </h4>
                                <button onclick="add()" type="submit" class="btn btn-primary float-right">New Article</button>
                            </div>
                            <script>
                                function add() {
                                    window.open('adder.php?page=homepage');
                                }
                            </script>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Picture</th>
                                            <th>Title</th>
                                            <th>Text</th>
                                            <th>Key Article</th>
                                            <th>Operation</th>

                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Picture</th>
                                            <th>Title</th>
                                            <th>Text</th>
                                            <th>Key Article</th>
                                            <th>Operation</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php foreach ($homepage as $c) : ?>

                                            <tr>
                                                <?php if ($c['pics'] == '') { ?>
                                                    <td><a type="button" data-bs-toggle="modal" data-bs-target="#exampleModal"><img id="thepics" src="../img/download.jfif" alt="" class="tbimage"></a></td>
                                                <?php } else { ?>
                                                    <td><a type="button" data-bs-toggle="modal" data-bs-target="#exampleModal"><img id="thepics" src="../img/<?= $c['pics'] ?>" alt="" class="tbimage"></a></td>
                                                <?php } ?>
                                                <td><?= $c['title'] ?></td>
                                                <td><?= $c['text'] ?></td>
                                                <td><?= $c['keyz'] ?></td>


                                                <td>
                                                    <a type="button" href="updater.php?id=<?= $c['id'] ?>&&page=user" class="btn btn-small btn-primary">Update</a>
                                                    <a href="deleter.php?id=<?= $c['id'] ?>&&table=homepage&&from=indexhp" class="btn btn-small btn-danger">Delete</a>
                                                  
                                                </td>
                                               

                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>

                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Detail Image</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <center>
                                                    <img src="../img/<?= $c['pics'] ?>" alt="" class="img-responsive">
                                                 
                                                </center>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>



                        <?php } ?>


                    </div>
                </div>
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Your Website 2022</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
</body>

</html>