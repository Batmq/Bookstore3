<?php

require "settings/init.php";



if(!empty($_POST["data"])){

    $data = $_POST["data"];

    $sql = "INSERT INTO produkter (bogNavn, bogBeskrivelse, bogForfatter, bogForlag, bogDato, bogType, bogPris, bogKategori, bogISBN) VALUES(:bogNavn, :bogBeskrivelse, :bogForfatter, :bogForlag, :bogDato, :bogType, :bogPris, :bogKategori, :bogISBN)";
    $bind = [
        ":bogNavn" => $data["bogNavn"],
        ":bogBeskrivelse" => $data["bogBeskrivelse"],
        ":bogForfatter" => $data["bogForfatter"],
        ":bogDato" => $data["bogDato"],
        ":bogForlag" => $data["bogForlag"],
        ":bogType" => $data["bogType"],
        ":bogPris" => $data["bogPris"],
        ":bogKategori" => $data["bogKategori"],
        ":bogISBN" => $data["bogISBN"]
    ];

    /*sql skal indeholder en sql sætning og bind, som er dem vi har lavet ovenover*/
    $db -> sql($sql, $bind, false);


}


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
    <script src="https://cdn.tiny.cloud/1/yz25l80g4c2pvmvsajtmlykwglnzhll3fz81r5ey6kj9ml5i/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>


    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>


    <div class="container">
        <div class="row">
            <div class="col-12 text-center p-5 OverskriftFont display-1">
                Bookstore
            </div>
        </div>
    </div>



    <form method="post" action="insert.php">

        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6">

                    <div class="row gy-3">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="bogNavn">Title</label>
                                <input class="form-control" type="text" name="data[bogNavn]" id="bogNavn" placeholder="Title" value="">
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label for="bogForfatter">Forfatter</label>
                                <input class="form-control" type="text" name="data[bogForfatter]" id="bogForfatter" placeholder="Forfatter" value="">
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label for="bogForlag">Forlag</label>
                                <input class="form-control" type="text" name="data[bogForlag]" id="bogForlag" placeholder="Forlag" value="">
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label for="bogDato">Udgivelse</label>
                                <input class="form-control" type="text" name="data[bogDato]" id="bogDato" placeholder="Dato for udgivelse" value="">
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label for="bogType">Indbinding</label>
                                <input class="form-control" type="text" name="data[bogType]" id="bogType" placeholder="Hæfte, indbundet, ebook, lydbog" value="">
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label for="bogISBN">ISBN</label>
                                <input class="form-control" type="number" name="data[bogISBN]" id="bogISBN" placeholder="ISBN nummer" value="">
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label for="bogKategori">Kategori</label>
                                <input class="form-control" type="text" name="data[bogKategori]" id="bogKategori" placeholder="fx. samfund, fantasy, science, romance" value="">
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label for="bogPris">Pris</label>
                                <input class="form-control" type="number" step="0.1" name="data[bogPris]" id="bogPris" placeholder="Pris" value="">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6">

                    <div class="row gy-3">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="bogBeskrivelse">Resume</label>
                                <textarea class="form-control" name="data[bogBeskrivelse]" id="bogBeskrivelse" placeholder="Beskrivelse af bogen"></textarea>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

            <div class="row justify-content-center mb-5">
                <div class="col-12 col-md-6 gy-5">
                    <button class="form-control btn" type="submit" id="btnSubmit">Opret bog</button>
                </div>
            </div>





        </div>

    </form>

    <script>
        const submitButton = document.querySelector("#btnSubmit")

        submitButton.addEventListener("click", alertBox )


        function alertBox() {
            alert("Bogen er nu oprettet");

        }

    </script>



    <script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        tinymce.init({
            selector: 'textarea',
        });
    </script>


    <script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

