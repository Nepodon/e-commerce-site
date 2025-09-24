<?php
$user = require_once '../app/UserControl.php';

// Fetch user data
    if(!isset($_SESSION['user_id'])) {
        echo "<script>";
        echo "alert('Please login to change aaccount details!');"; // Display the alert
        echo "window.location.href = 'signin.php';"; // Redirect using JavaScript
        echo "</script>";
        exit();
    }
$user_id = $_SESSION['user_id'];
$res = $user->getUserDataById($user_id);
$data = $res ? $res->fetch_assoc() : null;

// Handle form submission
$message = "";
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST['username'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $address = $_POST['address'] ?? '';
    $success = true;

    if ($username && $username !== $data['name']) {
        // Update username if changed (implement updateName if needed)
        // $success = $user->updateName($user_id, $username) && $success;
    }
    if ($phone && $phone !== $data['phone']) {
        $success = $user->updatePhone($user_id, $phone) && $success;
    }
    if ($address && $address !== $data['address']) {
        $success = $user->updateAddress($user_id, $address) && $success;
    }
    $message = $success ? "Details updated successfully." : "Failed to update details.";
    // Refresh data
    $res = $user->getUserDataById($user_id);
    $data = $res ? $res->fetch_assoc() : null;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Account Settings</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .account-form { max-width: 400px; margin: 2em auto; padding: 2em; border: 1px solid #ccc; border-radius: 8px; }
        .account-form label { display: block; margin-top: 1em; }
        .account-form input { width: 100%; padding: 0.5em; margin-top: 0.2em; }
        .account-form button { margin-top: 1.5em; padding: 0.7em 2em; }
        .message { color: green; margin-bottom: 1em; }
    </style>
</head>
<body>
    <div class="account-form">
        <h1>Account Settings</h1>
        <?php if ($message): ?>
            <div class="message"><?= htmlspecialchars($message) ?></div>
        <?php endif; ?>
        <form method="post">
            <label for="username">Name</label>
            <input type="text" id="username" name="username" value="<?= htmlspecialchars($data['name'] ?? '') ?>" required>

            <label for="phone">Phone</label>
            <input type="text" id="phone" name="phone" value="<?= htmlspecialchars($data['phone'] ?? '') ?>" required>

            <label for="address">Address</label>
            <input type="text" id="address" name="address" value="<?= htmlspecialchars($data['address'] ?? '') ?>" required>

            <button type="submit">Update</button>
        </form>
    </div>
</body>
</html>