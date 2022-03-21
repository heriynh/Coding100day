<?php
session_start();

$conn = mysqli_connect("localhost", "root", "", "tokoh");

//Form login
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $querylogin = mysqli_query($conn, "SELECT * FROM login WHERE username='$username' AND password='$password'");
    $cekdatabase = mysqli_num_rows($querylogin);

    if ($cekdatabase > 0) {
        $_SESSION['login'] = 'true';
        header("location:index.php");
    } else {
        header("location:login.php");
    }
}
