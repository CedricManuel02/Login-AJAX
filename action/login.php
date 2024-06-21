<?php
session_start();
// include the database
header('Content-Type: application/json');
include "../database/database.php";


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["email"], $_POST["password"])) {

    // sanitize the email
    $email = htmlspecialchars($_POST["email"]);
    $password = htmlspecialchars($_POST["password"]);

    if (empty($email) || empty($password)) {
        $res = ["status" => 401, "message" => "Fields are required"];
        echo json_encode($res);
        exit();
    } else if (empty($email)) {
        $res = ["status" => 401, "message" => "Email is required"];
        echo json_encode($res);
        exit();
    } else if (empty($password)) {
        $res = ["status" => 401, "message" => "Password is required"];
        echo json_encode($res);
        exit();
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $res = ["status" => 401, "message" => "Email is invalid"];
        echo json_encode($res);
        exit();
    } else {

        // query
        $query = "SELECT * FROM tbl_user WHERE user_email = ? AND user_password = ?";
        $stmt = mysqli_prepare($connection, $query);

        if (!$stmt) {
            $res = ["status" => 401, "message" => "Can't execute query"];
            echo json_encode($res);
            exit();
        }

        mysqli_stmt_bind_param($stmt, "ss", $email, $password);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if (!$result) {
            $res = ["status" => 401, "message" => "Something went wrong, please try again"];
            echo json_encode($res);
            exit();
        }


        if(mysqli_num_rows($result) === 0){
            $res = ["status" => 401, "message" => "Incorrect email or password"];
            echo json_encode($res);
            exit();
        }

        $res = ["status" => 200, "message" => "Successfully logged in"];
        echo json_encode($res);

        $_SESSION["user_email"] = $email;

        if(isset($_POST["remember_me"]) && $_POST["remember_me"] === "on"){
            setcookie("user_email", $email, time() + 3600, "/");
            setcookie("remember_me", "on", time() + 3600, "/");
        }else{
            setcookie("user_email", "", time() - 3600, "/");
            setcookie("remember_me", "", time() - 3600, "/");
        }

        mysqli_stmt_close($stmt);
        mysqli_close($connection);
        exit();
    }
}
