<?php
session_start();
require('technicalphp/db.php');


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if($_POST['cpass'] != $_POST['pass']) {
        echo '<h1 style="color:white">Passwords do not match<?h1>';
    } else {
        $username = $_POST['uname'];
        $password = hash('sha256', $_POST['pass']);
    
        // Check if username exists
        $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->execute([$username]);
        
        if ($stmt->rowCount() > 0) {
            echo "Username already taken!";
        } else {
            // Insert user into database
            $stmt = $pdo->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
            if ($stmt->execute([$username, $password])) {
                header('Location: login.php');
                exit;
            } else {
                echo '<div class="flex flex-col absolute bg-black bg-opacity-70 justify-center w-full h-full">
                    <div class="flex flex-col rounded-xl bg-red-800 text-white gap-2 p-5 w-1/4 self-center mx-auto">
                        <h1 class="text-2xl">An error has occured!</h1>
                        <h1 class="text-2xl">Please try again later.</h1>
                    </div>
                </div>';
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Register</title>

        <link href="css/output.css" rel="stylesheet">
        <link href="css/fonts.css" rel="stylesheet">
    </head>

    <body class="bg-slate-900">
        <?php include('dynamic-html/mobilenavbar.php'); include('dynamic-html/navbar.php'); ?>

        <main class="flex flex-col h-full flex-wrap md:flex-nowrap w-full">
            <div class="w-full flex justify-center my-3">
                <h1 class="text-white text-center w-1/2 text-3xl uppercase">I have 2 sides:</h1>
            </div>
            <div class="flex flex-row w-full justify-center p-10 pt-0">
                <form method="POST" class="flex flex-col text-white bg-slate-800 m-5 p-5 basis-1/4 mr-0 rounded-l-xl mt-0">
                    <h1 class="text-3xl text-center">Join us!</h1>

                    <h2 class="text-2xl mt-7">Username:</h2>
                    <input placeholder="Enter username..." type="text" name="uname" class="text-lg my-4 p-2 rounded-xl bg-slate-600 placeholder-gray-400 focus:border-none" required>

                    <h2 class="text-2xl">Password:</h2>
                    <input placeholder="Enter password..." type="password" name="pass" class="text-lg my-4 p-2 rounded-xl bg-slate-600 placeholder-gray-400 focus:border-none" required>

                    <h2 class="text-2xl">Confirm password:</h2>
                    <input placeholder="Repeat password..." type="password" name="cpass" class="text-lg my-4 p-2 rounded-xl bg-slate-600 placeholder-gray-400 focus:border-none" required>

                    <button type="submit" class="text-xl px-2 py-3 text-center mt-5 rounded-xl uppercase border-2 border-white hover:bg-white hover:text-black transition-all ease-in-out">Register</button>
                </form>
                <div class="flex flex-col text-white bg-slate-700 m-5 p-5 ml-0 basis-1/4 rounded-r-xl mt-0">
                    <div class="flex flex-row">
                        <p><span class="text-3xl normal-case"><span class="text-red-600">Red</span>Tech</span> is a website that, Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean finibus quam et nisl porta, ac aliquet est dictum. Phasellus ut mollis erat. Sed eu turpis sollicitudin, vulputate nisl vitae, lobortis mi.</p>
                    </div>

                    <div class="flex flex-col mt-auto gap-2">
                        <p class="text-2xl uppercase">Already joined?</p>
                        <a class="px-2 py-3 text-center uppercase hover:bg-white hover:text-black border-2 rounded-xl border-white text-xl transition-all ease-in-out" href="login.php">Login</a>
                    </div>
                </div>
            </div>
        </main>
        
        <?php include('dynamic-html/footer.php'); ?>

        <script type="text/javascript" src="javascript/hamburger.js"></script>
        <noscript>Please enable javascript for the website to function.</noscript>
    </body>
</html>

<?php
$conn->close();
?>