<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Member Card Registration</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #e6e6fa;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .member-card {
            border: 1px solid #ddd;
            padding: 15px;
            border-radius: 8px;
            margin-top: 20px;
        }

        .btn1 {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            text-align: center;
            text-decoration: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 20px;
        }

        .btn1:hover {
            background-color: #0056b3;
        }

        h1 {
            text-align: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-size: 28px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <!-- Navigation bar -->
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

    <h2>Selamat Anda Telah Menjadi Member Lady's Beauty Care </h2>

    <!-- Form submission handling and Member Card display -->
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Handle form submission
        $fullName = $_POST["fullName"];
        $email = $_POST["email"];
        $doctorNotes = $_POST["doctorNotes"];

        // Check if the email is already registered
        $memberData = file_get_contents("member_data.txt");
        $existingEmails = array_column(array_map('str_getcsv', explode("\n", $memberData)), 2);

        if (in_array($email, $existingEmails)) {
            echo "<div class='container mt-5'>";
            echo "<p class='text-danger'>Email already registered. Please use a different email.</p>";
            echo "</div>";
        } else {
            // Get the last registration number
            $lastRegistrationNumber = file_get_contents("una.txt");

            // Increment the registration number
            $registrationNumber = $lastRegistrationNumber + 1;

            // Save the new registration number
            file_put_contents("una.txt", $registrationNumber);

            // Data member
            $memberData = "$registrationNumber,$fullName,$email,$doctorNotes\n";

            // Save member data to file
            file_put_contents("member_data.txt", $memberData, FILE_APPEND | LOCK_EX);

            // Display Member Card details
            echo "<div class='container mt-5'>";
            echo "<h2>Member Card Details:</h2>";
            echo "<div class='member-card'>";
            echo "<p><strong>Full Name:</strong> $fullName</p>";
            echo "<p><strong>Email:</strong> $email</p>";
            echo "<p><strong>Doctor's Notes:</strong><br>$doctorNotes</p>";
            echo "<p><strong>Registration Number:</strong> $registrationNumber</p>";
            
        }
    }
    ?>

    <!--
