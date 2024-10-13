<nav id="mobileNav" class="hidden absolute md:hidden w-full z-10 h-full">
    <div class="fixed w-full flex flex-col bg-slate-900 bg-opacity-80 text-white p-3 uppercase text-2xl gap-2 h-full overflow-y-scroll">
        <button class="p-3 hover:bg-slate-500 hover:text-white rounded-lg font-semibold transition-all ease-in-out w-full text-2xl"  onclick="showMobile()">X</button>
                
        <div class="flex flex-row gap-5 text-center">
        <?php if(isset($_SESSION['usernickname'])) {
            echo '
            <a class="p-3 hover:bg-slate-500 hover:text-white rounded-lg font-semibold transition-all ease-in-out w-full basis-1/2" href="/users/profile.php?user=' . $_SESSION['userID'] . '">Profile</a>
            <a class="p-3 hover:bg-slate-500 hover:text-white rounded-lg font-semibold transition-all ease-in-out w-full basis-1/2" href="/logout.php">Logout</a>
            ';
        } else {
            echo '
            <a class="p-3 hover:bg-slate-500 hover:text-white rounded-lg font-semibold transition-all ease-in-out w-full basis-1/2" href="/login.php">Login</a>
            <a class="p-3 hover:bg-slate-500 hover:text-white rounded-lg font-semibold transition-all ease-in-out w-full basis-1/2" href="/register.php">Register</a>
            ';
        }
        ?>
        </div>
        <hr>

        <a class="p-3 hover:bg-slate-500 hover:text-white rounded-lg font-semibold transition-all ease-in-out w-full" href="/index.php">Homepage</a>
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