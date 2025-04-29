<h2>Update Admin Profile</h2>

<?php
// You can replace this with real session or database-fetching logic
$adminId = 1; // hardcoded for example
$conn = new mysqli("localhost", "root", "", "myshop");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$result = $conn->query("SELECT * FROM admins WHERE id = $adminId");
$admin = $result->fetch_assoc();
$conn->close();
?>

<form method="POST" action="process_profile.php" class="mb-4">
    <input type="hidden" name="id" value="<?php echo $admin['id']; ?>">
    <div class="mb-3">
        <label class="form-label">Username</label>
        <input type="text" class="form-control" name="username" value="<?php echo $admin['username']; ?>" required>
    </div>
    <div class="mb-3">
        <label class="form-label">New Password</label>
        <input type="password" class="form-control" name="password" required>
    </div>
    <button type="submit" class="btn btn-primary">Update Profile</button>
</form>
