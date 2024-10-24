<nav id="mainbar" class="w-full py-4 md:py-1 bg-slate-800 text-white list-none flex flex-row sticky top-0 z-10">
    <h1 class="text-center self-center text-2xl normal-case ml-5"><span class="text-red-600">Red</span>Tech</h1>
    <div class="m-2 md:flex flex-row gap-4 text-lg uppercase content-center hidden w-full">
        <a class="p-3 text-gray-300 hover:bg-slate-700 hover:text-white rounded-lg font-semibold text-lg transition-all ease-in-out ml-4" href="/index.php">Homepage</a>
        <a class="p-3 text-gray-300 hover:bg-slate-700 hover:text-white rounded-lg font-semibold text-lg transition-all ease-in-out" href="#">News</a>
        <a class="p-3 text-gray-300 hover:bg-slate-700 hover:text-white rounded-lg font-semibold text-lg transition-all ease-in-out" href="#">Users</a>
        <a class="p-3 text-gray-300 hover:bg-slate-700 hover:text-white rounded-lg font-semibold text-lg transition-all ease-in-out" href="#">Games</a>
        <?php
        if(isset($_SESSION['usernickname'])) {
            echo '<a class="p-3 hover:bg-white hover:text-black border-2 border-white font-semibold text-base transition-all ease-in-out ml-auto" href="/users/profile.php?user=' . $_SESSION['userID'] . '">' . 'Welcome, ' . $_SESSION['usernickname'] . '</a>
            <a class="p-3 hover:bg-white hover:text-black border-2 border-white font-semibold text-base transition-all ease-in-out" href="/logout.php">Logout</a>';
        } else {
            echo '<a class="p-3 ml-auto hover:bg-white hover:text-black border-2 border-white font-semibold text-base transition-all ease-in-out" href="/login.php">Login</a>
            <a class="p-3 hover:bg-white hover:text-black border-2 border-white font-semibold text-base transition-all ease-in-out" href="/register.php">Register</a>';
        }
        ?>
    </div>
    <button class="md:hidden flex flex-col gap-2 ml-auto mr-5 w-9 self-center" onclick="showMobile()"><span class="border-2 border-white"></span><span class="border-2 border-white"></span><span class="border-2 border-white"></span></button>
</nav>