<?php
session_start();
require($_SERVER['DOCUMENT_ROOT'] . '/technicalphp/db.php');
require($_SERVER['DOCUMENT_ROOT'] . '/technicalphp/error-info.php');

$error_msg = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(!isset($_SESSION['usernickname'])) {
        $username = $_POST['uname'];
        $password = $_POST['pass'];

        // Hash the input password with SHA-256 before comparison
        $hashed_password = hash('sha256', $password);

        // Check if user exists
        $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->execute([$username]);
        $user = $stmt->fetch();

        if ($user && $user['password'] === $hashed_password) {
            $_SESSION['usernickname'] = $username;
            $_SESSION['userID'] = $user['id'];

            $stmt = $pdo->prepare("UPDATE users SET last_seen = CURRENT_TIMESTAMP WHERE id = :id");
            $stmt->bindParam(':id', $user_id, PDO::PARAM_INT);

            if ($stmt->execute()) {
                echo "Success";
            } else {
                echo "Failure";
            }

            header('Location: /index.php');
            exit;
        } else {
            $error_msg = '<p class="text-red-600 text-center font-semibold">Invalid username or password!</p>';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Login</title>

        <link href="/css/output.css" rel="stylesheet">
        <link href="/css/fonts.css" rel="stylesheet">
    </head>

    <body class="bg-slate-900">
        <?php include($_SERVER['DOCUMENT_ROOT'] . '/dynamic-html/mobilenavbar.php'); include($_SERVER['DOCUMENT_ROOT'] . '/dynamic-html/navbar.php'); ?>

        <main class="flex flex-col h-full flex-wrap md:flex-nowrap w-full">
            <?php
            if(isset($_SESSION['usernickname'])) {
                E_LOGIN_LOGGED();
            }
            ?>
            <div class="w-full flex justify-center my-3">
                <h1 class="text-white text-center w-1/2 text-3xl uppercase">I have 2 sides:</h1>
            </div>
            <div class="flex flex-row w-full justify-center p-10 pt-0">
                <form method="POST" class="flex flex-col text-white bg-slate-800 m-5 p-5 basis-1/4 mr-0 rounded-l-xl mt-0">
                    <h1 class="text-3xl text-center">Welcome!</h1>
                    <?php echo $error_msg ?>

                    <h2 class="text-2xl mt-7">Username:</h2>
                    <input placeholder="Enter username..." name="uname" type="text" class="text-lg my-4 p-2 rounded-xl bg-slate-600 placeholder-gray-400 focus:border-none" required>

                    <h2 class="text-2xl">Password:</h2>
                    <input placeholder="Enter password..." name="pass" type="password" class="text-lg my-4 p-2 rounded-xl bg-slate-600 placeholder-gray-400 focus:border-none" required>
                    <p class="text-gray-400">Forgot password? <a href="#" class="text-cyan-500 underline hover:text-cyan-300">Click here</a></p>

                    <button type="submit" class="text-xl px-2 py-3 text-center mt-5 rounded-xl uppercase border-2 border-white hover:bg-white hover:text-black transition-all ease-in-out">Login</button>
                </form>
                <div class="flex flex-col text-white bg-slate-700 m-5 p-5 ml-0 basis-1/4 rounded-r-xl mt-0">
                    <div class="flex flex-row">
                        <p><span class="text-3xl normal-case"><span class="text-red-600">Red</span>Tech</span> is a website that, Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean finibus quam et nisl porta, ac aliquet est dictum. Phasellus ut mollis erat. Sed eu turpis sollicitudin, vulputate nisl vitae, lobortis mi.</p>
                    </div>

                    <div class="flex flex-col mt-auto gap-2">
                        <p class="text-2xl uppercase">Wanna join us?</p>
                        <a class="px-2 py-3 text-center uppercase hover:bg-white hover:text-black border-2 rounded-xl border-white text-xl transition-all ease-in-out" href="/register.php">Register</a>
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