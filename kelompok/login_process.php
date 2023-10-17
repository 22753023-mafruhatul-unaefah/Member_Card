<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Handle login submission
    $inputMemberNumber = $_POST["memberNumber"];
    $inputFullName = $_POST["fullName"];

    // You may need to implement your own logic for validating login credentials
    // For simplicity, let's assume the data is stored in a file
    $memberData = file_get_contents("member_data.txt");

    // Check if the provided member number and name match any entry
    $loginSuccessful = strpos($memberData, "$inputMemberNumber,$inputFullName") !== false;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Member Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Add Member</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="login_process.php">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="view_members.php">Member</a>
                </li>
                <li class="nav-item">
                    <form method="POST" action="keluar.php">
                        <button class="btn btn-primary" type="submit" onclick="return confirm('Yakin mau keluar MI?')">Logout</button>
                        <a href="javascript:history.back()" class="btn btn-secondary">Back</a>
                    </form>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container mt-5">
        <form action="login_view.php" method="post">
            <h2 class="mb-4">Member Login</h2>
            
            <div class="form-group">
                <label for="fullName">Full Name:</label>
                <input type="text" class="form-control" id="fullName" name="fullName" required>
            </div>

            <div class="form-group">
                <label for="memberNumber">Member Number:</label>
                <input type="text" class="form-control" id="memberNumber" name="memberNumber" required>
            </div>

            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
