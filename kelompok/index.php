<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Member Card Registration</title>
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
                    <a class="nav-link" href="new_member.php">Add Member</a>
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
        <h1>Selamat Datang di Klinik Kecantikan Lady's Beauty Care</h1>
        <p>Bergabunglah menjadi anggota klinik kami dan nikmati berbagai keuntungan eksklusif dengan Member Card
            Lady's. Dapatkan diskon khusus, layanan prioritas, dan informasi terbaru seputar perawatan kecantikan.</p>
        <h3>Cara Mendapatkan Member Card:</h3>
        <ol>
            <li>Isi formulir pendaftaran di bawah ini.</li>
            <li>Melakukan pembayaran. (transaksi hanya bisa dilakukan di kasir)</li>
            <li>Ambil Member Card di klinik. (hanya bisa diambil secara offline)</li>
        </ol>
    </div>

    <div class="container mt-5">
        <form action="process.php" method="post">
            <h2 class="mb-4">Member Card Registration</h2>

            <div class="form-group">
                <label for="fullName">Full Name:</label>
                <input type="text" class="form-control" id="fullName" name="fullName" required>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>

            <div class="form-group">
                <label for="doctorNotes">Doctor's Notes:</label>
                <textarea class="form-control" id="doctorNotes" name="doctorNotes" rows="3"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
