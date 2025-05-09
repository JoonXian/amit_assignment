<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Member List</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css">
</head>
<body>

    <div class="container my-5">
        <h2>List of Members</h2>
        <a class="btn btn-primary" href="../php/create.php" role="button">New Member</a>
        <a class="btn" href="../html/Accessories.html">← Back to Home</a>
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "myshop";

                //Create connection
                $conn = new mysqli($servername, $username, $password, $dbname);

                //Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                //read all  from db table
                $sql = "SELECT * FROM clients";
                $result = $conn->query($sql);

                if (!$result) {
                    die('Invalid Query: ' . $conn->error);
                }

                //read data of each row
                while ($row = $result->fetch_assoc()) {
                    echo " 
                    <tr>
                    <td>$row[id]</td>
                    <td>$row[name]</td>
                    <td>$row[email]</td>
                    <td>$row[phone]</td>
                    <td>$row[address]</td>
                    <td>
                        <a class='btn btn-primary btn-sm' href='edit.php?id=$row[id]'>Edit</a> 
                        <a class='btn btn-danger btn-sm' href='delete.php?id=$row[id]'>Delete</a>
                    </td>
                </tr>
                    ";
                }

                $conn->close();
                ?>

            </tbody>
        </table>
    </div>
</body>
</html>