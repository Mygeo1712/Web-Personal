<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = htmlspecialchars($_POST['name']);
    $jurusan = htmlspecialchars($_POST['jurusan']);
    $instagram = htmlspecialchars($_POST['instagram']);
    
    // Validasi file foto
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["photo"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Periksa apakah file adalah gambar
    $check = getimagesize($_FILES["photo"]["tmp_name"]);
    if ($check !== false && ($imageFileType == "jpg" || $imageFileType == "png" || $imageFileType == "jpeg")) {
        if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
            // Simpan data ke file teks
            $data = "Nama: $name, Jurusan: $jurusan, Instagram: $instagram, Foto: $target_file" . PHP_EOL;
            file_put_contents("data.txt", $data, FILE_APPEND);

            echo "Data berhasil dikirim!";
        } else {
            echo "Terjadi kesalahan saat mengunggah foto.";
        }
    } else {
        echo "File harus berupa gambar jpg, jpeg, atau png.";
    }
}
?>
