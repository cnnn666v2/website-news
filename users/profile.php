<?php
session_start();
require('../technicalphp/db.php');
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Homepage</title>

        <link href="../css/output.css" rel="stylesheet">
        <link href="../css/fonts.css" rel="stylesheet">
    </head>

    <body class="bg-slate-900">
        <?php include('../dynamic-html/mobilenavbar.php'); include('../dynamic-html/navbar.php'); ?>

        <main class="flex flex-row h-full flex-wrap md:flex-nowrap">
            <?php include('../dynamic-html/sidebar.php'); ?>

            <div id="content" class="flex flex-col md:basis-10/12 text-white">
                <h1>Username: <?php $_GET['user']; ?></h1>
            </div>
        </main>

        <?php include('../dynamic-html/footer.php'); ?>

        <script type="text/javascript" src="../javascript/hamburger.js"></script>
        <noscript>Please enable javascript for the website to function.</noscript>
    </body>
</html>

<?php
$conn->close();
?>