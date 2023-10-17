<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Member Card Registration</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }

        .card {
            max-width: 400px;
            margin: 50px auto;
            padding: 20px;
            background-color: #e6e6fa;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        .card-header {
            text-align: center;
            background-color: #e6e6fa;
            margin-bottom: 20px;
        }

        .card-info {
            text-align: left;
        }

        .card-info p {
            margin: 10px 0;
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
        }

        .btn1 :hover {
            background-color: #0056b3;
        }

        h2 {
            text-align: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-size: 28px;
            margin-bottom: 20px;
        }
    </style>
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
    // Load member data
        $memberData = file_get_contents("member_data.txt");

        // Explode data per baris dan loop melalui setiap entri
        $members = array_map('str_getcsv', explode("\n", $memberData));
        foreach ($members as $member) {
            // Periksa apakah kunci array ada sebelum mengaksesnya
            $registrationNumber = isset($member[0]) ? $member[0] : '';
            $fullName = isset($member[1]) ? $member[1] : '';
            $email = isset($member[2]) ? $member[2] : '';
            $doctorNotes = isset($member[3]) ? $member[3] : '';
    ?>
        <div class="card">
            <div class="card-header">
                <h2>Member Card</h2>
            </div>
            <div class="card-info">
                <p><strong>Full Name:</strong> <?php echo $fullName; ?></p>
                <p><strong>Email:</strong> <?php echo $email; ?></p>
                <p><strong>Doctor's Notes:</strong> <?php echo $doctorNotes; ?></p>
                <p><strong>Registration Number:</strong> <?php echo $registrationNumber; ?></p>
            </div>
        </div>
    <?php
    }
    ?>
</body>
</html>
