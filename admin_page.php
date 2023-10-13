<!DOCTYPE html>
<html>
<head>
    <title>Admin Page</title>
    <link rel="stylesheet" type="text/css" href="admin.css">
</head>
<body>
    <h1>Admin Page</h1>

    <?php
    // Include the DBUtil.php file to establish a database connection
    include_once("include/DBUtil.php");
    $conn = getConnection(); // Establish the database connection

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['new_status'])) {
        // Handle the form submission for updating status
        $new_status = $_POST['new_status'];

    }

    $sql = "SELECT * FROM users";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table>";
        echo "<tr><th>Email</th><th>Status</th><th>Edit Status</th></tr>";
        while ($row = $result->fetch_assoc()) {

            echo "<tr>";
            echo "<td>" . $row["email"] . "</td>";
            echo "<td><span>" . $row["status"] . "</span></td>";
            echo "<td><button onclick=\"editStatus()\">Edit</button></td>";
            echo "</tr>";
        }
        echo "</table>";
    }

    closeConnection();
    ?>

    <script>
        function editStatus() {
            const newStatus = prompt("Enter new status (active/inactive):");
            if (newStatus !== null) {
                document.getElementById("status_").textContent = newStatus;

                const form = document.createElement("form");
                form.method = "post";
                form.action = "admin_page.php"; // Change to the appropriate URL

                const new_status_input = document.createElement("input");
                new_status_input.type = "hidden";
                new_status_input.name = "new_status";
                new_status_input.value = newStatus;
                form.appendChild(new_status_input);

                document.body.appendChild(form);
                form.submit();
            }
        }
    </script>
</body>
</html>
