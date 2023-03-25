<?php

require_once "../config.php";

// SESSION USER LOGIN
if (isset($_SESSION["ssLogin"])) {
    $userSession = $_SESSION["ssUser"];
    $resultSession = $koneksi->query("SELECT * FROM tbl_user WHERE username = '$userSession' ");
    $rowSession = mysqli_fetch_assoc($resultSession);
    $idSession = $rowSession["id"];
}

$title = " Tambah Program Kerja";
require_once "../template/header.php";
require_once "../template/navbar.php";
require_once "../template/sidebar.php";


?>


<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-2">Program Kerja</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="./proker.php">Program Kerja</a></li>
                <li class="breadcrumb-item active">Tambah Program Kerja</li>
            </ol>

            <!doctype html>
            <html lang="en">

            <head>
                <meta charset="utf-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="initial-scale=1,user-scalable=no,maximum-scale=1,width=device-width">
                <meta name="mobile-web-app-capable" content="yes">
                <meta name="apple-mobile-web-app-capable" content="yes">
                <link rel="stylesheet" href="./resources/ol.css">
                <link rel="stylesheet" href="resources/fontawesome-all.min.css">
                <link rel="stylesheet" href="./resources/ol-layerswitcher.css">
                <link rel="stylesheet" href="./resources/qgis2web.css">
                <style>
                    .ol-geocoder.gcd-gl-container {
                        top: 135px !important;
                        left: .5em !important;
                        width: 2.1em !important;
                        height: 2.1em !important;
                    }

                    .ol-geocoder .gcd-gl-container {
                        width: 2.1em !important;
                        height: 2.1em !important;
                    }

                    .ol-geocoder .gcd-gl-control {
                        width: 2.1em !important;
                    }

                    .ol-geocoder .gcd-gl-expanded {
                        width: 15.625em !important;
                        height: 2.1875em;
                    }

                    .ol-touch .ol-geocoder.gcd-gl-container {
                        top: 180px !important;
                    }

                    .ol-geocoder .gcd-gl-btn {
                        width: 1.375em !important;
                        height: 1.375em !important;
                        top: .225em !important;
                        background-image: none !important;
                    }
                </style>
                <style>
                    .search-layer {
                        top: 170px;
                        left: .5em;
                    }

                    .ol-touch .search-layer {
                        top: 230px;
                    }
                </style>
                <style>
                    html,
                    body {
                        background-color: #ffffff;
                    }

                    .ol-control button {
                        background-color: #f8f8f8 !important;
                        color: #000000 !important;
                        border-radius: 0px !important;
                    }

                    .ol-zoom,
                    .geolocate,
                    .gcd-gl-control .ol-control {
                        background-color: rgba(255, 255, 255, .4) !important;
                        padding: 3px !important;
                    }

                    .ol-scale-line {
                        background: none !important;
                    }

                    .ol-scale-line-inner {
                        border: 2px solid #f8f8f8 !important;
                        border-top: none !important;
                        background: rgba(255, 255, 255, 0.5) !important;
                        color: black !important;
                    }
                </style>

                <style>
                    .geolocate {
                        top: 65px;
                        left: .5em;
                    }

                    .ol-touch .geolocate {
                        top: 80px;
                    }
                </style>
                <link href="resources/ol-geocoder.min.css" rel="stylesheet">
                <style>
                    .tooltip {
                        position: relative;
                        background: rgba(0, 0, 0, 0.5);
                        border-radius: 4px;
                        color: white;
                        padding: 4px 8px;
                        opacity: 0.7;
                        white-space: nowrap;
                    }

                    .tooltip-measure {
                        opacity: 1;
                        font-weight: bold;
                    }

                    .tooltip-static {
                        background-color: #ffcc33;
                        color: black;
                        border: 1px solid white;
                    }

                    .tooltip-measure:before,
                    .tooltip-static:before {
                        border-top: 6px solid rgba(0, 0, 0, 0.5);
                        border-right: 6px solid transparent;
                        border-left: 6px solid transparent;
                        content: "";
                        position: absolute;
                        bottom: -6px;
                        margin-left: -7px;
                        left: 50%;
                    }

                    .tooltip-static:before {
                        border-top-color: #ffcc33;
                    }

                    .measure-control {
                        top: 100px;
                        left: .5em;
                    }

                    .ol-touch .measure-control {
                        top: 130px;
                    }
                </style>
                <style>
                    html,
                    body,
                    #map {
                        width: 100%;
                        height: 100%;
                        padding: 0;
                        margin: 0;
                    }
                </style>
                <title></title>
            </head>

            <body>
                <div id="map">
                    <div id="popup" class="ol-popup">
                        <a href="#" id="popup-closer" class="ol-popup-closer"></a>
                        <div id="popup-content"></div>
                    </div>
                </div>
                <div class="row">
                    <div>
                        <iframe src="http://localhost/projectcrudweb-maps/" width="100%" height="700px"></iframe>
                    </div>
                </div>
                <script src="resources/qgis2web_expressions.js"></script>
                <script src="resources/polyfills.js"></script>
                <script src="./resources/functions.js"></script>
                <script src="./resources/ol.js"></script>
                <script src="./resources/ol-layerswitcher.js"></script>
                <script src="resources/ol-geocoder.js"></script>
                <script src="layers/BatasProvinsi_1.js"></script>
                <script src="layers/KabupatenPohuwato_2.js"></script>
                <script src="layers/KabupatenBoalemo_3.js"></script>
                <script src="layers/KabupatenGorontaloUtara_4.js"></script>
                <script src="layers/KabupatenGorontalo_5.js"></script>
                <script src="layers/KotaGorontalo_6.js"></script>
                <script src="layers/KabupatenBoneBolango_7.js"></script>
                <script src="styles/BatasProvinsi_1_style.js"></script>
                <script src="styles/KabupatenPohuwato_2_style.js"></script>
                <script src="styles/KabupatenBoalemo_3_style.js"></script>
                <script src="styles/KabupatenGorontaloUtara_4_style.js"></script>
                <script src="styles/KabupatenGorontalo_5_style.js"></script>
                <script src="styles/KotaGorontalo_6_style.js"></script>
                <script src="styles/KabupatenBoneBolango_7_style.js"></script>
                <script src="./layers/layers.js" type="text/javascript"></script>
                <script src="./resources/Autolinker.min.js"></script>
                <script src="./resources/qgis2web.js"></script>
            </body>

            </html>



            <?php
            require_once "../template/footer.php";
            ?>