<?php
// edit_member.php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the registration number from the form
    $registrationNumber = $_POST["registrationNumber"];

    // Load data member
    $memberData = file_get_contents("member_data.txt");

    // Explode data per baris
    $members = array_map('str_getcsv', explode("\n", $memberData));

    // Cari anggota berdasarkan nomor registrasi
    $selectedMemberIndex = null;
    foreach ($members as $index => $member) {
        if (isset($member[0]) && $member[0] == $registrationNumber) {
            $selectedMemberIndex = $index;
            break;
        }
    }

    if ($selectedMemberIndex !== null) {
        // Ambil data anggota
        $fullName = isset($_POST["fullName"]) ? $_POST["fullName"] : '';
        $email = isset($_POST["email"]) ? $_POST["email"] : '';
        $doctorNotes = isset($_POST["doctorNotes"]) ? $_POST["doctorNotes"] : '';

        // Update data anggota dengan data baru
        $members[$selectedMemberIndex][1] = $fullName;
        $members[$selectedMemberIndex][2] = $email;
        $members[$selectedMemberIndex][3] = $doctorNotes;

        // Gabungkan kembali data untuk disimpan ke file
        $updatedMemberData = implode("\n", array_map('csv', $members));

        // Simpan data ke file
        file_put_contents("member_data.txt", $updatedMemberData);
    }

    // Redirect to the view_members.php page after updating
    header("Location: view_members.php");
    exit();
}

// Continue with the rest of the edit_member.php page...
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Members</title>
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
        <h2>Member List</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Registration Number</th>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Doctor's Notes</th>
                    <th>Action</th> <!-- New column for edit button -->
                </tr>
            </thead>
            <tbody>
                <?php
                // Load data member
                $memberData = file_get_contents("member_data.txt");

                // Explode data per baris dan loop melalui setiap entri
                $members = array_map('str_getcsv', explode("\n", $memberData));
                foreach ($members as $member) {
                    // Periksa apakah kunci array ada sebelum mengaksesnya
                    $registrationNumber = isset($member[0]) ? $member[0] : '';
                    $fullName = isset($member[1]) ? $member[1] : '';
                    $email = isset($member[2]) ? $member[2] : '';
                    $doctorNotes = isset($member[3]) ? $member[3] : '';

                    // Tampilkan baris tabel
                    echo "<tr>";
                    echo "<td>{$registrationNumber}</td>";
                    echo "<td>{$fullName}</td>";
                    echo "<td>{$email}</td>";
                    echo "<td>{$doctorNotes}</td>";
                    echo "<td><a href='edit_member.php?registrationNumber={$registrationNumber}' class='btn btn-warning'>Edit</a></td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
        <a href="login_view.php" class="btn btn-primary">View Member Card</a>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
