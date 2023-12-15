<?php

class Obat extends Controller
{
    public function index()
    {
        $data['judul'] = 'Obat';
        $data['obat'] = $this->model('ObatModel')->getAllObat();
        $this->view('templates/header', $data);
        $this->view('obat/index', $data);
        $this->view('templates/footer');
    }

    public function add()
    {
        if ($this->model('ObatModel')->addObat($_POST) > 0) {
            header('Location: ' . BASEURL . '/obat');
            exit;
        } else {
            header('Location: ' . BASEURL . '/obat');
            exit;
        }
    }

    public function delete($id_obat)
    {
        if ($this->model('ObatModel')->deleteObat($id_obat) > 0) {
            header('Location: ' . BASEURL . '/obat');
            exit;
        } else {
            header('Location: ' . BASEURL . '/obat');
            exit;
        }
    }

    public function getEdit()
    {
        echo json_encode($this->model('ObatModel')->getObatById($_POST['id_obat']));
    }

    public function update()
    {
        if ($this->model('ObatModel')->updateObat($_POST) > 0) {
            header('Location: ' . BASEURL . '/obat');
            exit;
        } else {
            header('Location: ' . BASEURL . '/obat');
            exit;
        }
    }
}
