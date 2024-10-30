<?php
require_once 'app/models/user.php';
class UserController
{
    private $userModel;
    public function __construct($dbConnection)
    {
        $this->userModel = new User($dbConnection);
    }
    public function index() {
        $users = $this->userModel->getAllUsers();
        if (!$users) {
            $users = []; 
        }
        require_once 'app/views/userview.php';
        
    }
    public function show($id)
    {
        $user = $this->userModel->getUserById($id);

        if (!$user) {
            echo "User not found";
            return;
        }
        require_once 'app/views/userview.php';
    }
}

