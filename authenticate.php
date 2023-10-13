<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include_once("include/DBUtil.php");
    $conn = getConnection();

    $email = $_POST["email"];
    $password = $_POST["password"];

    $sql = "SELECT * from users where email = '".$email."' and password = '".$password."'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    if ($row["email"] == $email && $row["password"] == $password) {
        $_SESSION['user_id'] = $row["user_id"];
        $_SESSION['role'] = $row["role"];

        if ($row["role"] == "admin") {
            header("Location: admin_page.php");
        } elseif ($row["role"] == "staff") {
            header("Location: userpage.php");
        } else {
            header("Location: index.html");
        }
    } else {
        header("Location: index.html");
    }

    closeConnection();
}