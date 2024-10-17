<?php
// # # # # # # # # # # # # # # # # # #
//          PROFILE INFO
// # # # # # # # # # # # # # # # # # #

function I_PROFILE($error_msg) {
    echo '<div class="flex flex-col bg-blue-800 text-white p-5 rounded-lg w-auto self-center">
        <h1 class="text-2xl uppercase font-semibold">Profile notice:</h1>
        <h2 class="text-xl">' . $error_msg . '</h2>
    </div>';
}
?>