<!DOCTYPE html>
<?php
include 'core.php';
include 'addons.html'
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Scarica gratis il nostro Template HTML/CSS GARAGE. Se avete bisogno di un design per il vostro sito web GARAGE può fare per voi. Web Domus Italia">
	<meta name="author" content="Web Domus Italia">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
	
    <title>Catalog Spareparts</title>
</head>
<body>
    <?php $detail=mysqli_query($con, "SELECT * FROM catalogs WHERE id LIKE $_GET[id]");
    $carry = mysqli_fetch_assoc($detail);
     ?>
    <script>
    AOS.init();
    </script>
    <div class="head d-inline"><span>
        <h1 class="cats"><?=$carry['name'] ?></h1> 
        
        </span>
    </div>


    <div class="sizebox" >
        
    </div>



    <style>
        .spbtn{background-color: #ccbf2f; color: white;}
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