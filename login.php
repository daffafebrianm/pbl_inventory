<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        body {
            background-color: #f5f5f5;
        }

        .container {
            max-width: 450px;
            background-color: #fff;
            margin: 0 auto;
            padding: 25px;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            margin-top: 100px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .form-control {
            border: 1px solid #ced4da;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Login Inventory</h2>
        <form action="" method="POST">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" class="form-control" name="username" id="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" name="password" id="password" required>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Login</button>

        </form>
        <br>
        Belum Punya Akun ? <a href="register.php" class="" style="margin-top:20px;">Registrasi Disini</a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>


<?php
session_start();

include 'koneksi/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = md5($_POST['password']); // Using MD5 for password hashing

    $query = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
    $result = $db->query($query);
    $data = mysqli_fetch_array($result);

    if ($result->num_rows == 1) {
        $_SESSION['login'] = TRUE;
        $_SESSION['username'] = $username;
        $_SESSION['id'] = $data['id'];
        $_SESSION['level'] = $data['level'];

        // Login berhasil, arahkan ke halaman lain
        header("Location: index.php");
        exit;
    } else {
        echo "Login gagal. Silakan coba lagi.";
    }
}
?>
