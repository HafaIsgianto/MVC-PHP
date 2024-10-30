<?php
require_once 'config/Database.php';
require_once 'app/controllers/usercontroller.php';
$dbConnection = getDBConnection();
$id=isset($_GET['id'])?intval($_GET['id']):1;
$controller = new UserController($dbConnection);
$controller->show($id);

if (isset($_GET['message'])) {
    echo '<div class="alert alert-success" role="alert">' . htmlspecialchars($_GET['message']) . '</div>';
}
?>
