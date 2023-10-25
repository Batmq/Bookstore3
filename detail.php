<?php
require "settings/init.php";
?>
<!DOCTYPE html>
<html lang="da">
<head>
    <meta charset="utf-8">

    <title>Sigende titel</title>

    <meta name="robots" content="All">
    <meta name="author" content="Udgiver">
    <meta name="copyright" content="Information om copyright">

    <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="css/styles.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.typekit.net/ozj7xgt.css">


    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body class="bgInsert">

<div class="container mt-5">
    <?php
    $produkter = $db->sql("SELECT * FROM produkter WHERE bogID = 102");
    foreach($produkter as $produkt) {

        ?>

        <div class="row p-5 border border-5 rounded-3 bgBogVisning">
            <div class="col-4">
               <img class="img-fluid" src="uploads/<?php echo $produkt->bogBillede; ?>">
            </div>
            <div class="col-8 ps-3">
             <div class="row">
                 <div class="col-12">
                     <h1><?php echo $produkt->bogNavn; ?></h1>
                 </div>
                 <div class="col-12 fs-4">
                     <p> af <?php echo $produkt->bogForfatter; ?> </p>
                 </div>
                 <div class="col-12">
                     <?php echo $produkt->bogBeskrivelse; ?>
                 </div>
             </div>
                <div class="row mt-4">
                    <div class="col-6">
                        <p>Forlag:</p>
                    </div>
                    <div class="col-6">
                        <?php echo $produkt->bogForlag; ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <p>Udgivelsedato:</p>
                    </div>
                    <div class="col-6">
                        <?php echo $produkt->bogDato; ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <p>Kategori:</p>
                    </div>
                    <div class="col-6">
                        <?php echo $produkt->bogKategori; ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <p>Type:</p>
                    </div>
                    <div class="col-6">
                        <?php echo $produkt->bogType; ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <p>ISBN:</p>
                    </div>
                    <div class="col-6">
                        <?php echo $produkt->bogISBN; ?>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-12 fw-bolder">
                        <p><?php echo $produkt->bogPris; ?> kr. </p>
                    </div>
                </div>
            </div>

        </div>


        <?php
    }
    ?>
</div>

<script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
