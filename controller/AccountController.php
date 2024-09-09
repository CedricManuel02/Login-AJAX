<?php
class AccountController extends Helper
{
    private $connection;

    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    public function login()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["email"], $_POST["password"])) {
            $user_email = htmlspecialchars($_POST["email"]);
            $user_password = htmlspecialchars($_POST["password"]);

            if (empty($user_email) || empty($user_password)) {
                $this->sendStatusCode(400, "Fields are required");
            } else if (empty($user_email)) {
                $this->sendStatusCode(400, "Email is required");
            } else if (empty($user_password)) {
                $this->sendStatusCode(400, "Password is required");
            } else if (!filter_var($user_email, FILTER_VALIDATE_EMAIL)) {
                $this->sendStatusCode(400, "Email is Invalid");
            } else {
                // query
                $query = "SELECT * FROM tbl_user WHERE user_email = ? AND user_password = ?";
                $stmt = mysqli_prepare($this->connection, $query);

                if (!$stmt) {
                    $this->sendStatusCode(500, "Can't execute query");
                }

                mysqli_stmt_bind_param($stmt, "ss", $user_email, $user_password);
                mysqli_stmt_execute($stmt);

                $result = mysqli_stmt_get_result($stmt);

                if (!$result) {
                    $this->sendStatusCode(500, "Something went wrong, please try again");
                }


                if (mysqli_num_rows($result) === 0) {
                    $this->sendStatusCode(401, "Incorrect email or password, please try again");
                }



                $_SESSION["user_email"] = $user_email;

                if (isset($_POST["remember_me"]) && $_POST["remember_me"] === "on") {
                    setcookie("user_email", $user_email, time() + 3600, "/", "", true, true);
                    setcookie("remember_me", "on", time() + 3600, "/", "", true, true);
                } else {
                    setcookie("user_email", "", time() - 3600, "/");
                    setcookie("remember_me", "", time() - 3600, "/");
                }
                mysqli_stmt_close($stmt);
                $this->sendStatusCode(200, "Successfully logged in");
            }
        } else{
            $this->sendStatusCode(400, "Invalid request or missing parameters");
        }
    }

    public function logout(){
        session_unset();
        session_destroy();
        header("Location: ../pages/login.php");
        exit();
    }
}
