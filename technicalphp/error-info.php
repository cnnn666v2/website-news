<?php
// # # # # # # # # # # # # # # # # # #
//           LOGIN ERRORS
// # # # # # # # # # # # # # # # # # #

function E_LOGIN_LOGGED() {
        echo '<div class="flex flex-col bg-red-800 text-white p-5 rounded-lg w-auto self-center">
                <h1 class="text-2xl uppercase font-semibold">The following error has occured:</h1>
                <h2 class="text-xl">You are already logged in.</h2>
        </div>';
}


// # # # # # # # # # # # # # # # # # #
//          PROFILE ERRORS
// # # # # # # # # # # # # # # # # # #

function E_PROFILE($error_msg) {
        echo '<div class="flex flex-col bg-red-800 text-white p-5 rounded-lg w-auto self-center">
            <h1 class="text-2xl uppercase font-semibold">The following error has occured:</h1>
            <h2 class="text-xl">' . $error_msg . '</h2>
        </div>';
}
?>