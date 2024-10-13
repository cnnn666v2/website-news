<?php
session_start();
require($_SERVER['DOCUMENT_ROOT'] . '/technicalphp/db.php');
require($_SERVER['DOCUMENT_ROOT'] . '/technicalphp/error-info.php');
require($_SERVER['DOCUMENT_ROOT'] . '/technicalphp/spawn-html.php');
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Homepage</title>

        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=comment,thumb_down,thumb_up" />
        
        <link href="/css/output.css" rel="stylesheet">
        <link href="/css/fonts.css" rel="stylesheet">
    </head>

    <body class="bg-slate-900">
        <span id="top" class="scroll-smooth"></span>
        <?php include($_SERVER['DOCUMENT_ROOT'] . '/dynamic-html/mobilenavbar.php'); include($_SERVER['DOCUMENT_ROOT'] . '/dynamic-html/navbar.php'); ?>

        <main class="flex flex-row h-full flex-wrap md:flex-nowrap">
            <?php include($_SERVER['DOCUMENT_ROOT'] . '/dynamic-html/sidebar.php'); ?>
            
            <div id="content" class="flex flex-col md:basis-10/12 text-white">
            <?php
            if (isset($_GET['user']) && is_numeric($_GET['user'])) {
                $userId = $_GET['user'];
            
                $stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
                $stmt->execute([$userId]);
                $user = $stmt->fetch();
            
                if ($user) {
                    $username = $user['username'];
                    S_PROFILE_FEED($username);
                } else {
                    E_PROFILE_NOUSER();
                }
            } else {
                E_PROFILE_INVALIDID();
            }
            ?>

            <div class="flex flex-col p-5 m-5 gap-5">
                <div class="flex flex-col md:flex-row gap-10 bg-slate-700 rounded-xl p-5">
                    <img class="border-4 border-slate-800 rounded-lg basis-1/4 self-center md:self-start" src="https://picsum.photos/100" height="100px" width="100px"/>
                    <div class="flex flex-col gap-1 basis-3/4">
                        <div class="flex flex-col md:flex-row gap-3 md:gap-0">
                            <div class="flex flex-col gap-3 md:gap-0">
                                <h1 class="text-3xl">Username: <?php echo $username; ?></h1>
                                <h1 class="text-3xl">Lives in: <span class="text-xl">Poland, Warsaw</span></h1>
                            </div>
                            <div class="flex flex-col md:ml-auto gap-3 md:gap-0">
                                <h1 class="text-3xl">User level: 50</h1>
                                <h1 class="text-3xl">User XP: 500/1950</h1>
                            </div>
                        </div>
                        <h1 class="text-3xl mt-auto">About <?php echo $username; ?>:</h1>
                        <h1 class="text-xl">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin viverra, ipsum mollis sodales mattis, libero elit accumsan turpis, eu dapibus nisl velit sed tellus. Praesent magna lectus, dapibus eget est nec, viverra interdum felis. Proin maximus erat sit amet metus sagittis congue. Sed nulla nisi, faucibus vitae eros ac, pellentesque tristique risus. Cras egestas tincidunt ornare. Nullam semper ornare lacus nec vestibulum. Praesent tempor eros sed pulvinar consectetur. Maecenas sit amet auctor lacus, ut hendrerit mauris. Vivamus posuere lectus sit amet nisi malesuada, ac euismod ipsum faucibus. Integer sodales laoreet orci [READ MORE]</h1>                       
                    </div>
                </div>

                <div class="flex flex-col md:flex-row gap-3">
                    <div class="flex-col bg-blue-900 basis-1/4 p-5 rounded-xl flex md:hidden">
                        <h1 class="text-3xl">Quick links:</h1>
                        <hr>

                        <h2 class="text-2xl mt-2">Category 1:</h2>
                        <a href="#" class="text-lg uppercase underline text-cyan-500 hover:text-cyan-300 w-full">Link</a>
                        <a href="#" class="text-lg uppercase underline text-cyan-500 hover:text-cyan-300 w-full">Link</a>
                        <a href="#" class="text-lg uppercase underline text-cyan-500 hover:text-cyan-300 w-full">Link</a>
                        <hr class="mt-2">

                        <h2 class="text-2xl mt-1">Category 2:</h2>
                        <a href="#" class="text-lg uppercase underline text-cyan-500 hover:text-cyan-300 w-full">Link</a>
                        <a href="#" class="text-lg uppercase underline text-cyan-500 hover:text-cyan-300 w-full">Link</a>
                        <a href="#" class="text-lg uppercase underline text-cyan-500 hover:text-cyan-300 w-full">Link</a>
                        <hr class="mt-2">
                        
                        <h2 class="text-2xl mt-1">Category 3:</h2>
                        <a href="#" class="text-lg uppercase underline text-cyan-500 hover:text-cyan-300 w-full">Link</a>
                        <a href="#" class="text-lg uppercase underline text-cyan-500 hover:text-cyan-300 w-full">Link</a>
                        <a href="#" class="text-lg uppercase underline text-cyan-500 hover:text-cyan-300 w-full">Link</a>
                    </div>

                    <div class="flex flex-col bg-purple-950 basis-3/4 p-5 rounded-xl gap-5">
                        <h1 class="text-3xl"><?php echo $username . '\'s feed:' ?></h1>
                        <div class="bg-orange-800 text-white rounded-md border-l-cyan-500 border-l-4 p-3">
                            <h1 class="text-3xl">Feed title:</h1>
                            <p class="text-xl">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin viverra, ipsum mollis sodales mattis, libero elit accumsan turpis, eu dapibus nisl velit sed tellus. Praesent magna lectus, dapibus eget est nec, viverra interdum felis. Proin maximus erat sit amet metus sagittis congue. Sed nulla nisi, faucibus vitae eros ac, pellentesque tristique risus. Cras egestas tincidunt ornare. Nullam semper ornare lacus nec vestibulum. Praesent tempor eros sed pulvinar consectetur. Maecenas sit amet auctor lacus, ut hendrerit mauris. Vivamus posuere lectus sit amet nisi malesuada, ac euismod ipsum faucibus. Integer sodales laoreet orci, sed elementum diam varius vel. Mauris ac aliquam velit, sit amet fermentum tortor. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Morbi iaculis consequat elit in tempus. Fusce maximus dignissim maximus. </p>
                            <div class="flex flex-row mt-3 justify-between md:justify-start gap-2 md:gap-5">
                                <button class="group border-none text-white uppercase font-bold basis-1/3 md:basis-auto bg-orange-500 md:hover:bg-transparent hover:bg-orange-600 md:bg-transparent rounded-xl md:rounded-none transition-all ease-in-out py-2 md:py-0"><span class="material-symbols-outlined md:group-hover:bg-orange-500 rounded-full md:p-1 transition-all ease-in-out text-3xl md:text-4xl">thumb_up</span><br class="hidden md:block"><span class="text-lg my-autor">250</span></button>
                                <button class="group border-none text-white uppercase font-bold basis-1/3 md:basis-auto bg-orange-500 md:hover:bg-transparent hover:bg-orange-600 md:bg-transparent rounded-xl md:rounded-none transition-all ease-in-out"><span class="material-symbols-outlined md:group-hover:bg-orange-500 rounded-full md:p-1 transition-all ease-in-out text-3xl md:text-4xl">thumb_down</span><br class="hidden md:block"><span class="text-lg my-autor">5.1k</span></button>
                                <button class="group border-none text-white uppercase font-bold basis-1/3 md:basis-auto bg-orange-500 md:hover:bg-transparent hover:bg-orange-600 md:bg-transparent rounded-xl md:rounded-none transition-all ease-in-out"><span class="material-symbols-outlined md:group-hover:bg-orange-500 rounded-full md:p-1 transition-all ease-in-out text-3xl md:text-4xl">comment</span><br class="hidden md:block"><span class="text-lg my-autor">10</span></button>
                            </div>
                        </div>
                    </div>

                    <div class="flex-col bg-blue-900 basis-1/4 p-5 rounded-xl hidden md:flex">
                        <h1 class="text-3xl">Quick links:</h1>
                        <hr>

                        <h2 class="text-2xl mt-2">Category 1:</h2>
                        <a href="#" class="text-lg uppercase underline text-cyan-500 hover:text-cyan-300 w-full">Link</a>
                        <a href="#" class="text-lg uppercase underline text-cyan-500 hover:text-cyan-300 w-full">Link</a>
                        <a href="#" class="text-lg uppercase underline text-cyan-500 hover:text-cyan-300 w-full">Link</a>
                        <hr class="mt-2">

                        <h2 class="text-2xl mt-1">Category 2:</h2>
                        <a href="#" class="text-lg uppercase underline text-cyan-500 hover:text-cyan-300 w-full">Link</a>
                        <a href="#" class="text-lg uppercase underline text-cyan-500 hover:text-cyan-300 w-full">Link</a>
                        <a href="#" class="text-lg uppercase underline text-cyan-500 hover:text-cyan-300 w-full">Link</a>
                        <hr class="mt-2">
                        
                        <h2 class="text-2xl mt-1">Category 3:</h2>
                        <a href="#" class="text-lg uppercase underline text-cyan-500 hover:text-cyan-300 w-full">Link</a>
                        <a href="#" class="text-lg uppercase underline text-cyan-500 hover:text-cyan-300 w-full">Link</a>
                        <a href="#" class="text-lg uppercase underline text-cyan-500 hover:text-cyan-300 w-full">Link</a>

                        <a href="#top" class="text-center mt-auto text-lg uppercase hover:text-cyan-300 w-full">Back to top</a>
                    </div>
                </div>
            </div>
            </div>
        </main>

        <?php include($_SERVER['DOCUMENT_ROOT'] . '/dynamic-html/footer.php'); ?>

        <script type="text/javascript" src="/javascript/hamburger.js"></script>
        <noscript>Please enable javascript for the website to function.</noscript>
    </body>
</html>

<?php
$conn->close();
?>