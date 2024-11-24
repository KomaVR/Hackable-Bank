<?php
$user_file = 'users.json';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $email = $_POST['email'];

    if (file_exists($user_file)) {
        $users = json_decode(file_get_contents($user_file), true);
    } else {
        $users = [];
    }

    foreach ($users as $user) {
        if ($user['username'] === $username) {
            echo "<script>alert('Username already taken!'); window.location.href = '../register.html';</script>";
            exit();
        }
        if ($user['email'] === $email) {
            echo "<script>alert('Email already registered!'); window.location.href = '../register.html';</script>";
            exit();
        }
    }

    $users[] = ['username' => $username, 'password' => $password, 'email' => $email];
    file_put_contents($user_file, json_encode($users));

    echo "<script>alert('Registration successful!'); window.location.href = '../index.html';</script>";
}
?>
