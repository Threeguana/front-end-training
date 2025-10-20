<?php
session_start();

// hanya boleh diakses oleh pengguna yg sudah login dan punya role
if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'user') {
    header("Location: index.php");
    exit();
}

// proses upload file
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['game_images'])) {
    $upload_dir = 'uploads/'; //menentukan directory

    if (!is_dir($upload_dir)) { //jika dir tdk ada, akan dibuat direktori scr otomatis
        mkdir($upload_dir, 0755, true);
    }

    // Daftar tipe MIME gambar yang diizinkan untuk validasi
    $allowed_mime_types = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
    // Siapkan array untuk menampung pesan error
    $upload_errors = [];

    // menghitung jml file
    $file_count = count($_FILES['game_images']['name']);

    for ($i = 0; $i < $file_count; $i++) {
        $file_name = basename($_FILES['game_images']['name'][$i]);
        $file_tmp  = $_FILES['game_images']['tmp_name'][$i];
        $file_error = $_FILES['game_images']['error'][$i];

        // Lewati jika tidak ada file yang dipilih (input kosong)
        if ($file_error === UPLOAD_ERR_NO_FILE) {
            continue;
        }

        // periksa apa ada error saat proses
        if ($file_error === 0) {
            // Validasi tipe file menggunakan MIME type untuk keamanan
            $finfo = finfo_open(FILEINFO_MIME_TYPE);
            $mime_type = finfo_file($finfo, $file_tmp);
            finfo_close($finfo);

            if (in_array($mime_type, $allowed_mime_types)) {
                // Jika tipe file valid, pindahkan file
                move_uploaded_file($file_tmp, $upload_dir . $file_name);
            } else {
                $upload_errors[] = "File '$file_name' ditolak. Hanya file dengan format (JPG, PNG, GIF, WebP) yang diizinkan.";
            }
        } else {
            $upload_errors[] = "Terjadi masalah saat mengunggah file '$file_name'.";
        }
    }

    // Jika ada error yang terkumpul, simpan di session untuk ditampilkan di halaman user.php
    if (!empty($upload_errors)) {
        $_SESSION['upload_errors'] = $upload_errors;
    }
}
header("Location: user.php");
exit();
?>
