<?php
$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    $hashedUsername = md5($username);
    $hashedPassword = md5($password);

    $validUserHash = '456f5ab514996123d37d06d2e85d30e9'; // md5 hash of a valid username
    
    $isValidUser = ($hashedUsername === $validUserHash);

    if ($isValidUser) {
        if ($hashedPassword === md5('correct_password_here')) {
            $message = "✅ Login Successful!";
        } elseif ($hashedPassword === $oldPassHash) {
            $message = "⚠ Warning: old password.";
        } else {
            $message = "⚠ Wrong password has been entered.";
        }
    } else {
        $message = "❌ Error! Wrong username/password provided.<br><br>Please try again!";
    }
}
?>
