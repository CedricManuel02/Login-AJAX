<?php
session_start();
if (!isset($_SESSION["user_email"])) {
    header("Location: ../pages/login.php");
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

    <?php include "../components/Navbar.php"; ?>

    <!--Main-->
    <main class="w-full h-screen flex flex-col gap-2 items-center justify-center">
        <h3>Welcome <?php echo $_SESSION["user_email"] ?></h3>
        <div class="flex gap-4">
            <a class="btn btn-default" href="../action/signout.php">Log out</a>
            <label for="my_modal_6" class="btn">Create</label>
            <input type="checkbox" id="my_modal_6" class="modal-toggle" />
            <div class="modal" role="dialog">
                <div class="modal-box">
                    <h3 class="text-lg font-bold">Create Product!</h3>
                    <p class="py-4">This modal works with a hidden checkbox!</p>
                    <form id="form-product" method="post">
                        <label class="form-control w-full">
                            <div class="label">
                                <span class="label-text">Product</span>
                            </div>
                            <input id="product_name" name="product_name" type="text" placeholder="Enter product" class="input input-bordered w-full" required />
                        </label>
                        <label class="form-control w-full">
                            <div class="label">
                                <span class="label-text">Product</span>
                            </div>
                            <input id="product_price" name="product_price" type="number" placeholder="Enter product price" class="input input-bordered w-full" required />
                        </label>
                        <div class="py-4 flex gap-2 justify-end">
                            <label for="my_modal_6" class="btn">Close!</label>
                            <button class="btn" type="submit" id="form-submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
        <div id="product-table">
            <!--Table -->
        <div class="overflow-x-auto">
            <table class="table">
                <!-- head -->
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Date Created</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        include "../action/product-table.php";
                    ?>
                </tbody>
            </table>
        </div>
        </div>
    </main>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="../javascript/script.js"></script>
</body>

</html>