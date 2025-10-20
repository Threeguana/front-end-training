<?php
session_start();
// jika var session 'role' bukan admin atau tidak ada, arahkan ke index.php
if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'admin') {
    header("Location: index.php");
    exit(); //dihentikan
}
?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin Dashboard</title>
        <!-- menyisipkan bootstrap -->
        <link href="bootstrap/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
        <link rel="stylesheet" href="styleAdmin.css">
    </head>
    <body>
        <!-- sidebar -->
        <div class="d-flex flex-column flex-shrink-0 p-3 text-white sidebar">
            <a href="#" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                <i class="bi bi-joystick me-2 fs-4"></i>
                <span class="fs-4">Game Panel</span>
            </a>
            <hr>
            <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item">
                    <a href="#" class="nav-link text-white">
                        <i class="bi bi-speedometer2 me-2"></i>
                        Dashboard
                    </a>
                </li>
                <li>
                    <a href="#" class="nav-link active">
                        <i class="bi bi-people-fill me-2"></i>
                        Manage Users
                    </a>
                </li>
                <li>
                    <a href="#" class="nav-link text-white">
                        <i class="bi bi-controller me-2"></i>
                        Game List
                    </a>
                </li>
                <li>
                    <a href="#" class="nav-link text-white">
                        <i class="bi bi-server me-2"></i>
                        Server Settings
                    </a>
                </li>
            </ul>
            <hr>
            <div class="dropdown">
                <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-person-circle fs-4 me-2"></i>
                    <!-- // user log out -->
                    <strong><?= htmlspecialchars($_SESSION['username']); ?></strong>
                </a>
                <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                    <li><a class="dropdown-item" href="logout.php">Log out</a></li>
                </ul>
            </div>
        </div>

        <!-- konten utama -->
        <main class="main-content">
            <div class="container-fluid">
                <div class="p-4 mb-4 text-white welcome-banner">
                    <h1 class="display-5">Welcome back, Admin!</h1>
                    <p class="lead">Here's what's happening on your gaming platform today.</p>
                </div>
                <div class="card bg-dark text-white">
                    <div class="card-header fs-5">
                        <i class="bi bi-images me-2"></i>
                        Shared images by users
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <?php
                            // upload gambar
                            $upload_dir = 'uploads/'; //mendefinisikan direktori

                            if (is_dir($upload_dir)) { //mencari file/dir yg cocok
                                $images = glob($upload_dir . "*.{jpg,jpeg,png,gif,webp}", GLOB_BRACE); //untuk mencocokkan beberapa pattern sekaligus.
                                if (!empty($images)) { //diperiksa tidak kosong
                                    foreach ($images as $image) {
                                        $file_name = basename($image);
                                        echo '
                                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 mb-4">
                                            <div class="card h-100 bg-secondary text-white">
                                                <img src="' . htmlspecialchars($image) . '" class="card-img-top" style="height: 200px; object-fit: cover;" alt="' . htmlspecialchars($file_name) . '">
                                                <div class="card-body text-center">
                                                    <p class="card-text small text-truncate" title="' . htmlspecialchars($file_name) . '">
                                                        ' . htmlspecialchars($file_name) . '
                                                    </p>
                                                </div>
                                            </div>
                                        </div>'; //agar dapat menampilkan apa yg user upload
                                    }
                                } else {
                                    // jika tidak ada gambar di dlm dir
                                    echo '<div class="col-12"><p class="text-center">No images have been uploaded yet.</p></div>';
                                }
                            } else {
                                // jika dir upload not found
                                echo '<div class="col-12"><p class="text-center text-danger">Error: The \'uploads\' directory does not exist.</p></div>';
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <!-- bundle bootstrap -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
