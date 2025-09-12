<?php
session_start();
include "koneksi.php";

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $level    = $_POST['level']; // ambil level dari select

    // cek username, password, dan level
    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password' AND level='$level'";
    $result = mysqli_query($koneksi, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $row['username'];
        $_SESSION['level']    = $row['level'];

        // redirect sesuai level
        if ($row['level'] == 'admin') {
            header("Location: admin.php");
        } elseif ($row['level'] == 'operator') {
            header("Location: operator.php");
        } elseif ($row['level'] == 'user') {
            header("Location: user.php");
        }
        exit();
    } else {
        echo "<script>alert('Login gagal! Username, Password, atau Level salah!'); window.location='login.php';</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Login Multi User</title>
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background: linear-gradient(135deg, #1e3c72, #2a5298);
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
    }
    .login-box {
      background: #fff;
      padding: 40px;
      border-radius: 15px;
      width: 350px;
      box-shadow: 0px 8px 20px rgba(0,0,0,0.2);
      text-align: center;
    }
    h2 {
      margin-bottom: 10px;
      color: #333;
    }
    input, select {
      width: 100%;
      padding: 12px;
      margin: 10px 0;
      border: 1px solid #ddd;
      border-radius: 8px;
      outline: none;
    }
    button {
      width: 100%;
      padding: 12px;
      background: #2a5298;
      color: #fff;
      border: none;
      border-radius: 8px;
      cursor: pointer;
      transition: 0.3s;
    }
    button:hover {
      background: #1e3c72;
    }
  </style>
</head>
<body>
  <div class="login-box">
    <h2>Login Multi User</h2>
    <form action="" method="post">
      <input type="text" name="username" placeholder="Username" required>
      <input type="password" name="password" placeholder="Password" required>
      <select name="level" required>
        <option value="">-- Pilih Level --</option>
        <option value="admin">Admin</option>
        <option value="operator">Operator</option>
        <option value="user">User</option>
      </select>
      <button type="submit" name="login">Masuk</button>
    </form>
  </div>
</body>
</html>