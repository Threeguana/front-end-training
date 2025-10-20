<?php
session_start();
// jika var session 'role' bukan user atau tidak ada, arahkan ke index.php
if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'user') {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>User Dashboard</title>
        <!-- menyisipkan bootstrap  -->
        <link href="bootstrap/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
        <link rel="stylesheet" href="styleUser.css" />
    </head>
    <body>
        <!-- menyisipkan jquery -->
        <script src="jquery-3.7.1.min.js"></script>
        <script src="script.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

        <!-- sidebar -->
        <div class="d-flex flex-column flex-shrink-0 p-3 text-white sidebar">
            <a href="#" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                <i class="bi bi-joystick me-2 fs-4"></i>
                <span class="fs-4">Game Panel</span>
            </a>
            <hr>
            <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item">
                    <a href="#" class="nav-link text-white" aria-current="page">
                        <i class="bi bi-house-door-fill me-2"></i>
                        <b>Dashboard</b>
                    </a>
                </li>
                <li>
                    <a href="#" class="nav-link text-white">
                        <i class="bi bi-person-fill me-2"></i>
                        My Profile
                    </a>
                </li>
                <li>
                    <a href="#" class="nav-link active">
                        <i class="bi bi-controller me-2"></i>
                        My Games
                    </a>
                </li>
                <li>
                    <a href="#" class="nav-link text-white">
                        <i class="bi bi-gear-fill me-2"></i>
                        Settings
                    </a>
                </li>
            </ul>
            <hr>
            <div class="dropdown">
                <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-person-circle fs-4 me-2"></i>
                    <strong id="username-display"><?= htmlspecialchars($_SESSION['username']); ?></strong>
                </a>
                <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                    <li><a class="dropdown-item" href="logout.php">Sign out</a></li>
                </ul>
            </div>
        </div>

        <!-- main contnt -->
        <main class="main-content">
            <div class="container-fluid">
                <div class="p-4 mb-4 text-white welcome-banner">
                    <h1 id="welcome-heading">
                        Welcome back, <?= htmlspecialchars($_SESSION['username']); ?>!
                    </h1>
                    <p>Ready to jump back into the action?</p>
                </div>
                <div class="card bg-dark text-white">
                    <div class="card-header">
                        <i class="bi bi-cloud-arrow-up-fill"></i>
                        Share Your Screenshots!
                    </div>
                    <div class="card-body">

                        <?php
                        if (isset($_SESSION['upload_errors']) && !empty($_SESSION['upload_errors'])) {
                            echo '<div class="alert alert-danger" role="alert">';
                            echo '<h4 class="alert-heading">Upload Gagal!</h4>';
                            foreach ($_SESSION['upload_errors'] as $error) {
                                echo '<p class="mb-0">' . htmlspecialchars($error) . '</p>';
                            }
                            echo '</div>';

                            // Hapus error dari session setelah ditampilkan
                            unset($_SESSION['upload_errors']);
                        }
                        ?>
                        <form id="upload-form" action="upload.php" method="post" enctype="multipart/form-data">
                            <p>Select images to upload:</p>
                            <input type="file" name="game_images[]" id="image-upload" class="form-control" multiple />
                            <div class="controls mt-2">
                                <button type="submit" class="btn btn-primary">Upload Files</button>
                                <button type="button" id="toggle-images-btn" class="btn btn-secondary">Hide Images</button>
                            </div>
                        </form>
                        <div id="image-preview-container" class="image-preview-container mt-3">
                             <?php
                                //  menampilkan gambar yg sdh ada
                                $upload_dir = 'uploads/';

                                if(is_dir($upload_dir)){
                                    //cari gambar dlm dir
                                    $images = glob($upload_dir . "*.{jpg,jpeg,png,gif,webp}", GLOB_BRACE);

                                    foreach ($images as $img) {
                                        $img_name = basename($img);
                                        echo "<div class='preview-item'><img src='" . htmlspecialchars($upload_dir . $img_name) . "' alt='" . htmlspecialchars($img_name) . "' class='img-thumbnail'/></div>";
                                    }
                                }
                             ?>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </body>
</html>
