<?php

class User extends Controller
{
    public function index()
    {
        $data['judul'] = 'User';
        $data['user'] = $this->model('UserModel')->getAllUser();
        $this->view('templates/header', $data);
        $this->view('user/index', $data);
        $this->view('templates/footer');
    }


    public function add()

    {
        if( $this->model('UserModel')->addUser($_POST) > 0 )
        {
            header('Location: ' . BASEURL . '/user');
            exit;
        } else {
            header('Location: ' . BASEURL . '/user');
            exit;
        }
    }

    public function delete($id)
    {
        if( $this->model('UserModel')->deleteUser($id) > 0)
        {
            header('Location: ' . BASEURL . '/user');
            exit;
        } else {
            header('Location: ' . BASEURL . '/user');
            exit;
        }
    }

    public function getEdit()
    {
       echo json_encode($this->model('UserModel')->getUserById($_POST['id']));
    }

    public function update()
    {
        if( $this->model('UserModel')->updateUser($_POST) > 0 )
        {
            header('Location: ' . BASEURL . '/user');
            exit;
        } else {
            header('Location: ' . BASEURL . '/user');
            exit;
        }
    }
}