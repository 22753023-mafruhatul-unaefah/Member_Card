<?php
// edit_member.php

// Check if the registration number is provided in the URL
if (isset($_GET['registrationNumber'])) {
    $registrationNumber = $_GET['registrationNumber'];

    // Load data member
    $memberData = file_get_contents("member_data.txt");

    // Explode data per baris dan loop melalui setiap entri
    $members = array_map('str_getcsv', explode("\n", $memberData));

    // Cari anggota berdasarkan nomor registrasi
    $selectedMember = null;
    foreach ($members as $member) {
        if (isset($member[0]) && $member[0] == $registrationNumber) {
            $selectedMember = $member;
            break;
        }
    }

    if ($selectedMember !== null) {
        // Ambil data anggota
        $fullName = isset($selectedMember[1]) ? $selectedMember[1] : '';
        $email = isset($selectedMember[2]) ? $selectedMember[2] : '';
        $doctorNotes = isset($selectedMember[3]) ? $selectedMember[3] : '';

        // Jika form disubmit, proses pembaruan data
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Update data anggota dengan data baru
            $selectedMember[1] = isset($_POST["fullName"]) ? $_POST["fullName"] : '';
            $selectedMember[2] = isset($_POST["email"]) ? $_POST["email"] : '';
            $selectedMember[3] = isset($_POST["doctorNotes"]) ? $_POST["doctorNotes"] : '';

            // Gabungkan kembali data untuk disimpan ke file
            $members[$registrationNumber - 1] = $selectedMember;
            $updatedMemberData = implode("\n", array_map(function($member) {
                return implode(",", $member);
            }, $members));

            // Simpan data ke file
            file_put_contents("member_data.txt", $updatedMemberData);

            // Redirect to the view_members.php page after updating
            header("Location: view_members.php");
            exit();
        }
    } else {
        // Redirect jika anggota tidak ditemukan
        header("Location: view_members.php");
        exit();
    }
} else {
    // Redirect jika nomor registrasi tidak disediakan
    header("Location: view_members.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Member</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Home</a>
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
                        <button class="btn btn-primary" type="submit"
                            onclick="return confirm('Yakin mau keluar MI?')">Logout</button>
                        <a href="javascript:history.back()" class="btn btn-secondary">Back</a>
                    </form>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container mt-5">
        <form action="" method="post">
            <h2>Edit Member</h2>
            <input type="hidden" name="registrationNumber" value="<?php echo $registrationNumber; ?>">

            <div class="form-group">
                <label for="fullName">Full Name:</label>
                <input type="text" class="form-control" id="fullName" name="fullName" value="<?php echo $fullName; ?>"
                    required>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>" required>
            </div>

            <div class="form-group">
                <label for="doctorNotes">Doctor's Notes:</label>
                <textarea class="form-control" id="doctorNotes" name="doctorNotes"
                    rows="3"><?php echo $doctorNotes; ?></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
            <a href="view_members.php" class="btn btn-secondary">Cancel</a>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
