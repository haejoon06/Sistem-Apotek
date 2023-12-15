<?php

// require_once 'UserModel.php';
// class AuthModel extends Model
// {
//     private $userModel;

//     public function __construct()
//     {
//         parent::__construct();
//         Session::init();
//         $this->userModel = new UserModel();
//     }

//     public function run()
//     {
//         if (isset($_POST['submit'])) {
//             $username = $_POST['username'];
//             $password = $_POST['password'];

//             $user = $this->userModel->getUserByUsername($username);

//             if ($user) {
//                 // Use password_verify to check the entered password against the hashed password
//                 if (password_verify($password, $user['password'])) {
//                     Session::set('role', $user['role']);
//                     Session::set('loggedIn', true);
//                     Session::set('username', $username);
//                     // Do not store the password in the session for security reasons
//                     header('location: ' . BASEURL . 'home/index');
//                     exit();
//                 } else {
//                     Session::set('loggedIn', false);
//                     header('location: ' . BASEURL);
//                     exit();
//                 }
//             } else {
//                 // User not found
//                 Session::set('loggedIn', false);
//                 header('location: ' . BASEURL);
//                 exit();
//             }
//         } else {
//             // Form not submitted
//             header('location: ' . BASEURL);
//             exit();
//         }
//     }
// }
?>
