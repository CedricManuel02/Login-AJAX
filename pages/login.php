<?php
session_start();
if (isset($_SESSION["user_email"])) {
    header("Location: ../pages/home.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="https://cdn.icon-icons.com/icons2/2699/PNG/512/nvidia_logo_icon_169902.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.2/dist/full.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Login to Nvidia</title>
</head>

<body data-theme="dark">
    <!--Navbar-->

    <nav class="w-full px-10 absolute py-5 shadow-b shadow-md flex items-center justify-between">
        <div class="flex items-center gap-2">
            <img class="w-10" src="https://cdn4.iconfinder.com/data/icons/logos-and-brands/512/235_Nvidia_logo-512.png" alt="logo">
            <h3 class="text-neutral-content font-semibold">Nvidia</h3>
        </div>
        <ul class="flex gap-10 items-center">
            <li class="hover:text-green-600/80 text-neutral-content font-medium text-sm"><a href="#">Home</a></li>
            <li class="hover:text-green-600/80 text-neutral-content font-medium text-sm"><a href="#">About</a></li>
            <li class="hover:text-green-600/80 text-neutral-content font-medium text-sm"><a href="#">Contact</a></li>
            <li class="hover:text-green-600/80 text-neutral-content font-medium text-sm"><a href="#">Shop</a></li>
        </ul>
    </nav>

    <!--Main-->
    <main class="w-full h-screen flex items-center justify-center">
        <div class="card w-96 bg-neutral text-neutral-content rounded-lg">
            <div class="card-body items-center text-center">
                <div class="flex items-center gap-2">
                    <img class="w-10" src="https://cdn4.iconfinder.com/data/icons/logos-and-brands/512/235_Nvidia_logo-512.png" alt="logo">
                    <h2 class="card-title">Login to your account</h2>
                </div>
                <div class="divider my-0"></div>
                <form id="form" class="w-full" method="post">
                    <label class="form-control w-full">
                        <div class="label">
                            <span class="label-text">Email</span>
                        </div>
                        <input type="email" name="email" id="email" placeholder="Enter your email" value="<?php if (isset($_COOKIE["user_email"])) {
                                                                                                                echo $_COOKIE["user_email"];
                                                                                                            } ?>" class="input input-bordered bg-neutral text-neutral-content w-full" required />
                    </label>
                    <label class="form-control w-full">
                        <div class="label">
                            <span class="label-text">Password</span>
                        </div>
                        <input type="password" name="password" id="password" placeholder="Enter your password" class="input input-bordered bg-neutral text-neutral-content w-full" required />
                    </label>
                    <span class="flex items-center justify-between py-2">
                        <div class="form-control">
                            <label class="label cursor-pointer flex gap-2">
                                <span class="label-text">Remember me</span>
                                <input type="checkbox" name="remember_me" class="checkbox checkbox-xs rounded" <?php if (isset($_COOKIE["remember_me"])) {
                                                                                                                    echo "checked";
                                                                                                                } ?>>
                            </label>
                        </div>
                        <a href="#" class="label-text hover:underline hover:text-green-600">Forgot Password?</a>
                    </span>
                    <button id="button" class="w-full btn bg-green-600/80 text-md hover:bg-green-700/80 text-white">
                        Sign in
                    </button>
                </form>
            </div>
        </div>
    </main>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="../javascript/script.js"></script>
</body>

</html>