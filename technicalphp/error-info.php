<?php
function E_PROFILE_INVALIDID() {
    echo '<div class="flex flex-col bg-red-800 text-white p-5 rounded-lg w-auto self-center">
            <h1 class="text-2xl uppercase font-semibold">The following error has occured:</h1>
            <h2 class="text-xl">Provided invalid user id.</h2>
        </div>';
}

function E_PROFILE_NOUSER() {
    echo '<div class="flex flex-col bg-red-800 text-white p-5 rounded-lg w-auto self-center">
            <h1 class="text-2xl uppercase font-semibold">The following error has occured:</h1>
            <h2 class="text-xl">User not found.<br>
                Are you sure it\'s the <span class="font-semibold">correct</span> id?</h2>
        </div>';
}
?>