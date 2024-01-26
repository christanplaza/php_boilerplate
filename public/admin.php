<?php
include '../config/db.php'; // Include your database connection file

// Admin user credentials
$username = 'admin';
$password = 'password'; // You should choose a stronger password in a real application

// Hash the password
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// SQL to insert the admin user
$sql = "INSERT INTO users (username, password, role) VALUES (:username, :password, 'admin')";
$stmt = $pdo->prepare($sql);

// Bind parameters and execute the statement
$stmt->bindParam(':username', $username);
$stmt->bindParam(':password', $hashedPassword);

try {
    $stmt->execute();
    echo "Admin user created successfully.";
} catch (PDOException $e) {
    echo "Error creating admin user: " . $e->getMessage();
}
?>
