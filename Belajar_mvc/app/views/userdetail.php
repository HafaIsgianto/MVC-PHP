<?php



include_once 'C:/xampp/htdocs/Belajar_mvc/config/Database.php';
require_once 'C:/xampp/htdocs/Belajar_mvc/app/models/user.php';



$dbConnection = getDBConnection(); 
$userModel = new User($dbConnection); 


if (isset($_GET['id'])) {
    $userId = $_GET['id'];
    $user = $userModel->getUserById($userId);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pengguna</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Detail Pengguna</h1>
        
        <?php if ($user): ?>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Informasi Pengguna</h5>
                    <p class="card-text"><strong>ID:</strong> <?= htmlspecialchars($user['id']); ?></p>
                    <p class="card-text"><strong>Nama:</strong> <?= htmlspecialchars($user['name']); ?></p>
                    <p class="card-text"><strong>Email:</strong> <?= htmlspecialchars($user['email']); ?></p>
                    <a href="/Belajar_mvc/proses/edit.php?id=<?= $user['id']; ?>" class="btn btn-warning">Edit</a>
                    <a href="/Belajar_mvc/index.php" class="btn btn-secondary">Kembali</a>
                </div>
            </div>
        <?php else: ?>
            <div class="alert alert-danger mt-3">Pengguna tidak ditemukan.</div>
        <?php endif; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

