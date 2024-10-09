<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "twoja_stara";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$aTitle = [];
$aDesc = [];

$sql = "SELECT title, description FROM articles ORDER BY id DESC LIMIT 10";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $aTitle[] = $row['title'];
        $aDesc[] = (strlen($row['description']) > 250) ? substr($row['description'],0,250).'...' : $row['description'];
    }
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Homepage</title>

        <link href="css/output.css" rel="stylesheet">
        <link href="css/fonts.css" rel="stylesheet">
    </head>

    <body class="bg-slate-900">
        <?php include('dynamic-html/mobilenavbar.php'); include('dynamic-html/navbar.php'); ?>

        <main class="flex flex-row h-full flex-wrap md:flex-nowrap">
            <?php include('dynamic-html/sidebar.php'); ?>

            <div id="content" class="flex flex-col md:basis-10/12">
                <div id="articles" class="basis-full m-5 grid grid-cols-1 grid-rows-6 md:grid-cols-3 md:grid-rows-4 gap-4 text-white">
                    <div class="group bg-purple-950 rounded-xl flex flex-col h-72 md:h-auto bg-[url('https://picsum.photos/400/200')] bg-cover relative">
                        <div class="mt-auto p-2 flex flex-col bg-black bg-opacity-50 group-hover:opacity-25 transition-all ease-in-out rounded-bl-xl rounded-br-xl">
                            <h1 id="AT-1" class="text-xl">Article Title</h1>
                            <h4 id="AD-1">This is A</h4>
                        </div>
                        <a class="w-full h-full absolute" href="#"></a>
                    </div>

                    <div class="group bg-purple-950 rounded-xl flex flex-col bg-[url('https://picsum.photos/400/200')] bg-cover relative">
                        <div class="mt-auto p-2 flex flex-col bg-black bg-opacity-50 group-hover:opacity-25 transition-all ease-in-out rounded-bl-xl rounded-br-xl">
                            <h1 id="AT-2" class="text-xl">Article Title</h1>
                            <h4 id="AD-2">Thi</h4>
                        </div>
                        <a class="w-full h-full absolute" href="#"></a>
                    </div>

                    <div class="group bg-purple-950 rounded-xl flex flex-col bg-[url('https://picsum.photos/400/200')] bg-cover relative">
                        <div class="mt-auto p-2 flex flex-col bg-black bg-opacity-50 group-hover:opacity-25 transition-all ease-in-out rounded-bl-xl rounded-br-xl">
                            <h1 id="AT-3" class="text-xl">Article Title</h1>
                            <h4 id="AD-3">orem</h4>
                        </div>
                        <a class="w-full h-full absolute" href="#"></a>
                    </div>

                    <div id="article-gallery" class="group bg-purple-950 rounded-xl md:col-span-2 md:row-span-2 flex flex-col bg-cover relative">
                        <div class="mt-auto p-2 flex flex-col bg-black bg-opacity-50 group-hover:opacity-25 transition-all ease-in-out rounded-bl-xl rounded-br-xl">
                            <h1 id="gallery-title" class="text-xl">Article Title</h1>
                            <h4 id="gallery-desc">This is Article description lorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem</h4>
                            <p id="gallery-track" class="text-center"># o o o o</p>
                        </div>
                        <div class="w-full h-full absolute flex flex-row">
                            <button class="hover:bg-black h-full w-20 text-3xl font-extrabold rounded-tl-lg rounded-bl-lg" onclick="ChangeGalleryM()"><span class="stroke-text"><</span></button>
                            <a class="w-full h-full" href="#"></a>
                            <button class="hover:bg-black h-full w-20 text-3xl font-extrabold float-right rounded-tr-lg rounded-br-lg" onclick="ChangeGalleryP()"><span class="stroke-text">></span></button>
                        </div>

                        <script type="text/javascript">
                            var galleryTitle = new Array();

                            <?php foreach($aTitle as $key => $val){ ?>
                                galleryTitle.push('<?php echo $val; ?>');
                            <?php } ?>
                        </script>

                        <script text="text/javascript">
                            var galleryDesc = new Array();

                            <?php foreach($aDesc as $key2 => $val2){ ?>
                                galleryDesc.push('<?php echo addslashes($val2); ?>');
                            <?php } ?>
                        </script>
                    </div>

                    <div class="group bg-purple-950 rounded-xl md:row-span-2 md:col-start-3 flex flex-col bg-[url('https://picsum.photos/400/200')] bg-cover relative">
                        <div class="mt-auto p-2 flex flex-col bg-black bg-opacity-50 group-hover:opacity-25 transition-all ease-in-out rounded-bl-xl rounded-br-xl">
                            <h1 id="AT-4" class="text-xl">Article Title</h1>
                            <h4 id="AD-4">This is Article drem</h4>
                        </div>
                        <a class="w-full h-full absolute" href="#"></a>
                    </div>

                    <div class="group bg-purple-950 rounded-xl md:col-span-3 md:row-start-4 flex flex-col bg-[url('https://picsum.photos/800/200')] bg-cover relative">
                        <div class="mt-auto p-2 flex flex-col bg-black bg-opacity-50 group-hover:opacity-25 transition-all ease-in-out rounded-bl-xl rounded-br-xl">
                            <h1 id="AT-5" class="text-xl">Article Title</h1>
                            <h4 id="AD-5">This is lorem</h4>
                        </div>
                        <a class="w-full h-full absolute" href="#"></a>
                    </div>
                </div>
            </div>
        </main>

        <?php include('dynamic-html/footer.php'); ?>

        <script type="text/javascript" src="javascript/articlegallery.js"></script>
        <script type="text/javascript" src="javascript/hamburger.js"></script>
        <noscript>Please enable javascript for the website to function.</noscript>
    </body>
</html>

<?php
$conn->close();
?>