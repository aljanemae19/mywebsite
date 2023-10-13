<!DOCTYPE html>
<html>
<head>
    <title>User Page</title>
</head>
<style>
    /* Basic page styling */
body {
    font-family: Arial, sans-serif;
    background-color: #f0f0f0;
    margin: 0;
    padding: 0;
}

h1 {
    background-color: #333;
    color: #fff;
    padding: 10px;
    text-align: center;
}

/* Form styling */
form {
    background-color: #fff;
    padding: 20px;
    margin: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
}

label {
    font-weight: bold;
    display: block;
    margin-bottom: 5px;
}

input[type="text"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 3px;
}

button {
    background-color: #333;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 3px;
    cursor: pointer;
}

button:hover {
    background-color: #555;
}

</style>
<body>
    <h1>User Page</h1>

    <?php
    function getConnection()
    {
        $servername = "localhost";
        $username = "your_username";
        $password = "your_password";
        $dbname = "";
    
        $conn = new mysqli($servername, $username, $password, $dbname);
    
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
    
        return $conn;
    }
    
    // Function to close the database connection
    function closeConnection($conn)
    {
        $conn->close();
    }

    // Handle Add Activity
    if (isset($_POST["add_activity"])) {
        $activity = $_POST["activity"];
        // Add the activity to the database (implement this logic)
    }

    // Handle Edit Activity
    if (isset($_POST["edit_activity"])) {
        $activity_id = $_POST["activity_id"];
        $new_activity = $_POST["new_activity"];
        // Update the activity in the database (implement this logic)
    }

    // Handle Set Activity
    if (isset($_POST["set_activity"])) {
        $user_id = $_POST["user_id"];
        $activity = $_POST["activity"];
        // Set the activity for the user in the database (implement this logic)
    }

    // Display a form to Add Activity
    echo "<form method='post'>";
    echo "<label for='activity'>Add Activity: </label>";
    echo "<input type='text' name='activity' id='activity' required>";
    echo "<button type='submit' name='add_activity'>Add</button>";
    echo "</form>";

    // Display a form to Edit Activity
    echo "<form method='post'>";
    echo "<label for='activity_id'>Activity ID: </label>";
    echo "<input type='text' name='activity_id' id='activity_id' required>";
    echo "<label for='new_activity'>New Activity: </label>";
    echo "<input type='text' name='new_activity' id='new_activity' required>";
    echo "<button type='submit' name='edit_activity'>Edit</button>";
    echo "</form>";

    // Display a form to Set Activity
    echo "<form method='post'>";
    echo "<label for='user_id'>User ID: </label>";
    echo "<input type='text' name='user_id' id='user_id' required>";
    echo "<label for='activity'>Activity: </label>";
    echo "<input type='text' name='activity' id='activity' required>";
    echo "<button type='submit' name='set_activity'>Set</button>";
    echo "</form>";

    // Show all users who have logged in (fetch this data from your database)
    // Display this data in a table or list as needed
    ?>
</body>
</html>
