<?php
echo "<nav class='w-full px-10 absolute py-5 shadow-b bg-base-100 shadow-md flex items-center justify-between'>
        <div class='flex items-center gap-2'>
            <img class='w-10' src='https://cdn4.iconfinder.com/data/icons/logos-and-brands/512/235_Nvidia_logo-512.png' alt='logo'>
            <h3 class='text-neutral-content font-semibold'>Nvidia</h3>
        </div>
        <div class='flex gap-4'>
        <ul class='flex gap-10 items-center'>
            <li class='hover:text-green-600/80 text-neutral-content font-medium text-sm'><a href='#'>Home</a></li>
            <li class='hover:text-green-600/80 text-neutral-content font-medium text-sm'><a href='#'>About</a></li>
            <li class='hover:text-green-600/80 text-neutral-content font-medium text-sm'><a href='#'>Contact</a></li>
            <li class='hover:text-green-600/80 text-neutral-content font-medium text-sm'><a href='#'>Shop</a></li>
        </ul>";
        if(isset($_SESSION["user_email"])) {
            echo "<p>". htmlspecialchars($_SESSION["user_email"]) ."</p>";
        }
    echo "</div></nav>";

?>