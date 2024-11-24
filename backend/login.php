<?php
session_start();
$user_file = 'users.json';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (file_exists($user_file)) {
        $users = json_decode(file_get_contents($user_file), true);

        foreach ($users as $user) {
            if ($user['username'] === $username && password_verify($password, $user['password'])) {
                $_SESSION['username'] = $username;
                header('Location: ../dashboard.php');
                exit();
            }
        }
    }

    echo "<script>alert('Invalid username or password'); window.location.href = '../index.html';</script>";
}
?>
