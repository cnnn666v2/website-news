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
        <nav id="mobileNav" class="hidden absolute md:hidden w-full z-10 h-full">
            <div class="fixed w-full flex flex-col bg-slate-900 bg-opacity-80 text-white p-3 uppercase text-2xl gap-2 h-full overflow-y-scroll">
                <button class="p-3 hover:bg-slate-500 hover:text-white rounded-lg font-semibold transition-all ease-in-out w-full text-2xl"  onclick="showMobile()">X</button>
                
                <div class="flex flex-row gap-5 text-center">
                    <a class="p-3 hover:bg-slate-500 hover:text-white rounded-lg font-semibold transition-all ease-in-out w-full basis-1/2" href="#">Login</a>
                    <a class="p-3 hover:bg-slate-500 hover:text-white rounded-lg font-semibold transition-all ease-in-out w-full basis-1/2" href="#">Register</a>
                </div>
                <hr>

                <a class="p-3 hover:bg-slate-500 hover:text-white rounded-lg font-semibold transition-all ease-in-out w-full" href="#">Homepage</a>
                <a class="p-3 hover:bg-slate-500 hover:text-white rounded-lg font-semibold transition-all ease-in-out w-full" href="#">News</a>
                <a class="p-3 hover:bg-slate-500 hover:text-white rounded-lg font-semibold transition-all ease-in-out w-full" href="#">Blog</a>
                <a class="p-3 hover:bg-slate-500 hover:text-white rounded-lg font-semibold transition-all ease-in-out w-full" href="#">Games</a>
                <hr>

                <h1 class="font-bold text-center text-gray-400">Trending</h1>
                <a class="p-3 hover:bg-slate-500 hover:text-white rounded-lg font-semibold transition-all ease-in-out w-full" href="#">#Żukowska</a>
                <a class="p-3 hover:bg-slate-500 hover:text-white rounded-lg font-semibold transition-all ease-in-out w-full" href="#">#Poland</a>
                <a class="p-3 hover:bg-slate-500 hover:text-white rounded-lg font-semibold transition-all ease-in-out w-full" href="#">#Tanks</a>
                <a class="p-3 hover:bg-slate-500 hover:text-white rounded-lg font-semibold transition-all ease-in-out w-full" href="#">#Infantry</a>
                <a class="p-3 hover:bg-slate-500 hover:text-white rounded-lg font-semibold transition-all ease-in-out w-full" href="#">#Minecraft</a>
                <hr>

                <h1 class="font-bold text-center text-gray-400">Hardware</h1>
                <a class="p-3 hover:bg-slate-500 hover:text-white rounded-lg font-semibold transition-all ease-in-out w-full" href="#">CPU's</a>
                <a class="p-3 hover:bg-slate-500 hover:text-white rounded-lg font-semibold transition-all ease-in-out w-full" href="#">GPU's</a>
                <a class="p-3 hover:bg-slate-500 hover:text-white rounded-lg font-semibold transition-all ease-in-out w-full" href="#">RAM's</a>
                <a class="p-3 hover:bg-slate-500 hover:text-white rounded-lg font-semibold transition-all ease-in-out w-full" href="#">SSD's</a>
                <a class="p-3 hover:bg-slate-500 hover:text-white rounded-lg font-semibold transition-all ease-in-out w-full" href="#">Others('s)</a>
            </div>
        </nav>

        <nav id="mainbar" class="w-full py-4 md:py-1 bg-slate-800 text-white list-none flex flex-row sticky top-0 z-10">
            <h1 class="text-center self-center text-2xl normal-case ml-5"><span class="text-red-600">Red</span>Tech</h1>
            <div class="m-2 md:flex flex-row gap-4 text-lg uppercase content-center hidden w-full">
                <a class="p-3 text-gray-300 hover:bg-slate-700 hover:text-white rounded-lg font-semibold text-lg transition-all ease-in-out" href="#">Homepage</a>
                <a class="p-3 text-gray-300 hover:bg-slate-700 hover:text-white rounded-lg font-semibold text-lg transition-all ease-in-out" href="#">News</a>
                <a class="p-3 text-gray-300 hover:bg-slate-700 hover:text-white rounded-lg font-semibold text-lg transition-all ease-in-out" href="#">Blog</a>
                <a class="p-3 text-gray-300 hover:bg-slate-700 hover:text-white rounded-lg font-semibold text-lg transition-all ease-in-out" href="#">Games</a>
                <a class="p-3 ml-auto hover:bg-white hover:text-black border-2 border-white font-semibold text-base transition-all ease-in-out" href="#">Login</a>
                <a class="p-3 hover:bg-white hover:text-black border-2 border-white font-semibold text-base transition-all ease-in-out" href="#">Register</a>
            </div>
            <button class="md:hidden flex flex-col gap-2 ml-auto mr-5 w-9 self-center" onclick="showMobile()"><span class="border-2 border-white"></span><span class="border-2 border-white"></span><span class="border-2 border-white"></span></button>
        </nav>

        <main class="flex flex-row h-full flex-wrap md:flex-nowrap">
            <nav id="sidebar" class="h-full bg-slate-700 basis-2/12 text-gray-300 hidden md:block">
                <div class="flex flex-col gap-2 m-3">
                    <h1 class="text-xl text-white uppercase font-semibold">Trending</h1>
                    <a class="hover:text-white hover:bg-slate-500 px-4 py-2 rounded-xl text-basic transition-all ease-in-out" href="#">#Żukowska</a>
                    <a class="hover:text-white hover:bg-slate-500 px-4 py-2 rounded-xl text-basic transition-all ease-in-out" href="#">#Poland</a>
                    <a class="hover:text-white hover:bg-slate-500 px-4 py-2 rounded-xl text-basic transition-all ease-in-out" href="#">#Tanks</a>
                    <a class="hover:text-white hover:bg-slate-500 px-4 py-2 rounded-xl text-basic transition-all ease-in-out" href="#">#Infantry</a>
                    <a class="hover:text-white hover:bg-slate-500 px-4 py-2 rounded-xl text-basic transition-all ease-in-out" href="#">#Minecraft</a>
                </div>
                <hr>
                <div class="flex flex-col gap-2 m-3">
                    <h1 class="text-xl text-white uppercase font-semibold">Hardware</h1>
                    <a class="hover:text-white hover:bg-slate-500 px-4 py-2 rounded-xl text-basic transition-all ease-in-out" href="#">CPU's</a>
                    <a class="hover:text-white hover:bg-slate-500 px-4 py-2 rounded-xl text-basic transition-all ease-in-out" href="#">GPU's</a>
                    <a class="hover:text-white hover:bg-slate-500 px-4 py-2 rounded-xl text-basic transition-all ease-in-out" href="#">RAM's</a>
                    <a class="hover:text-white hover:bg-slate-500 px-4 py-2 rounded-xl text-basic transition-all ease-in-out" href="#">SSD's</a>
                    <a class="hover:text-white hover:bg-slate-500 px-4 py-2 rounded-xl text-basic transition-all ease-in-out" href="#">Other('s)</a>
                </div>
                <hr>
                <div class="flex flex-col gap-1 m-3">
                    <a class="group hover:text-white hover:bg-slate-500 px-4 py-2 rounded-xl text-basic transition-all ease-in-out" href="#">You<span class="group-hover:bg-red-400 rounded-md group-hover:p-1 group-hover:font-bold transition-all ease-in-out">Tube</span></a>
                    <a class="group hover:text-white hover:bg-slate-500 px-4 py-2 rounded-xl text-basic transition-all ease-in-out" href="#"><span class="group-hover:bg-blue-600 group-hover:p-1 group-hover:font-semibold transition-all ease-in-out">Facebook</span></a>
                    <a class="group hover:text-white hover:bg-slate-500 px-4 py-2 rounded-xl text-basic transition-all ease-in-out" href="#"><span class="group-hover:bg-blue-400 group-hover:p-1 group-hover:font-semibold rounded-xl transition-all ease-in-out">Twitter</span></a>
                </div>
            </nav>

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

        <footer class="p-5 text-white bg-slate-800 flex flex-col gap-3 border-t-4 border-slate-400">
            <div class="flex flex-col md:flex-row w-full gap-3 text-center md:text-left justify-between lg:justify-start">
                <div class="basis-1/6 flex flex-col text-gray-500 gap-1">
                    <h1 class="uppercase text-3xl md:text-2xl text-white">Contact:</h1>
                    <p class="px-2 py-1 rounded-lg transition-all ease-in-out">Addres: *IMAGINE HERE IS AN ADRES*, Poland</p>
                    <p class="px-2 py-1 rounded-lg transition-all ease-in-out">Phone: +48 213 742 069</p>
                    <p class="px-2 py-1 rounded-lg transition-all ease-in-out">Open: Md - Fd, 8:00 - 16:00</p>
                </div>

                <div class="basis-1/6 flex flex-col text-gray-500 gap-1">
                    <h1 class="uppercase text-3xl md:text-2xl text-white">Projects:</h1>
                    <a class="hover:bg-slate-700 px-2 py-1 rounded-lg hover:text-gray-400 hover:font-semibold transition-all ease-in-out" href="#">Xitter</a>
                    <a class="hover:bg-slate-700 px-2 py-1 rounded-lg hover:text-gray-400 hover:font-semibold transition-all ease-in-out" href="#">DisntCord</a>
                    <a class="hover:bg-slate-700 px-2 py-1 rounded-lg hover:text-gray-400 hover:font-semibold transition-all ease-in-out" href="#">MeTube</a>
                </div>
                
                <div class="basis-1/6 flex flex-col text-gray-500 gap-1">
                    <h1 class="uppercase text-3xl md:text-2xl text-white">Languages:</h1>
                    <a class="hover:bg-slate-700 px-2 py-1 rounded-lg hover:text-gray-400 hover:font-semibold transition-all ease-in-out" href="#">Polski</a>
                    <a class="hover:bg-slate-700 px-2 py-1 rounded-lg hover:text-gray-400 hover:font-semibold transition-all ease-in-out" href="#">English</a>
                    <a class="hover:bg-slate-700 px-2 py-1 rounded-lg hover:text-gray-400 hover:font-semibold transition-all ease-in-out" href="#">Deutsch</a>
                    <a class="hover:bg-slate-700 px-2 py-1 rounded-lg hover:text-gray-400 hover:font-semibold transition-all ease-in-out" href="#">Cestina</a>
                </div>

                <div class="basis-1/6 flex flex-col text-gray-500 gap-1">
                    <h1 class="uppercase text-3xl md:text-2xl text-white">Social Media:</h1>
                    <a class="hover:bg-slate-700 px-2 py-1 rounded-lg hover:text-gray-400 hover:font-semibold transition-all ease-in-out" href="#">YouTube</a>
                    <a class="hover:bg-slate-700 px-2 py-1 rounded-lg hover:text-gray-400 hover:font-semibold transition-all ease-in-out" href="#">Facebook</a>
                    <a class="hover:bg-slate-700 px-2 py-1 rounded-lg hover:text-gray-400 hover:font-semibold transition-all ease-in-out" href="#">Instagram</a>
                    <a class="hover:bg-slate-700 px-2 py-1 rounded-lg hover:text-gray-400 hover:font-semibold transition-all ease-in-out" href="#">Twitter</a>
                    <a class="hover:bg-slate-700 px-2 py-1 rounded-lg hover:text-gray-400 hover:font-semibold transition-all ease-in-out" href="#">Mastodon</a>
                </div>
            </div>

            <div class="flex flex-col md:flex-row gap-5 text-center">
                <h5 class="bg-slate-700 text-gray-400  rounded-lg p-2 text-lg">Copyright (C) 2024 | Cnnn666</h5>
                <button class="bg-purple-800 py-2 md:py-auto px-2 uppercase hover:font-semibold hover:bg-purple-500 rounded-lg transition-all ease-in-out text-lg">Contact us</button>
                <a class="bg-blue-700  p-2 uppercase hover:bg-blue-500 rounded-lg transition-all ease-in-out text-lg" href="#">Privacy Policy</a>
                <a class="bg-blue-700  p-2 uppercase hover:bg-blue-500 rounded-lg transition-all ease-in-out text-lg" href="#">Terms of Service</a>
            </div>
        </footer>

        <script type="text/javascript" src="javascript/articlegallery.js"></script>
        <script type="text/javascript" src="javascript/hamburger.js"></script>
        <noscript>Please enable javascript for the website to function.</noscript>
    </body>
</html>

<?php
$conn->close();
?>