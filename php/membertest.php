<h2>List of Members</h2>
<a class="btn btn-primary" href="../php/create.php" role="button">New Member</a>
<br>
<table class="table">
    <thead>
        <tr>
            <th>ID</th><th>Name</th><th>Email</th><th>Phone</th><th>Address</th><th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $conn = new mysqli("localhost", "root", "", "myshop");
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $sql = "SELECT * FROM clients";
        $result = $conn->query($sql);
        if (!$result) {
            die('Invalid Query: ' . $conn->error);
        }
        while ($row = $result->fetch_assoc()) {
            echo "
            <tr>
                <td>{$row['id']}</td>
                <td>{$row['name']}</td>
                <td>{$row['email']}</td>
                <td>{$row['phone']}</td>
                <td>{$row['address']}</td>
                <td>
                    <a class='btn btn-primary btn-sm' href='edit.php?id={$row['id']}'>Edit</a>
                    <a class='btn btn-danger btn-sm' href='delete.php?id={$row['id']}'>Delete</a>
                </td>
            </tr>";
        }
        $conn->close();
        ?>
    </tbody>
</table>
