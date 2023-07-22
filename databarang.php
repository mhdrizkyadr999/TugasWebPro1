<?php 

    Class databarang extends Controller  {
        public function index() {
            
            $data['title'] = 'Data Barang';
            $data['barang'] = $this->model('databarangModel')->getAllBarang();

            $this->view('layouts/header', $data);
            $this->view('databarang/index', $data);
            $this->view('layouts/footer');

        }

        public function tambah() {
            
            $data['title'] = 'Tambah Barang';

            $this->view('layouts/header', $data);
            $this->view('databarang/insert');
            $this->view('layouts/footer');
        }

        public function tambahStore() {
            if($this->model('databarangModel')->tambahDataBarang($_POST) > 0) {
                $_SESSION['status'] = 'Data Berhasil Ditambahkan';
                header('Location: ' . BASEURL . '/databarang');
                exit;
            } else {
                $_SESSION['status'] = 'Data Gagal Ditambahkan';
                header('Location: ' . BASEURL . '/databarang');
                exit;
            }

            // $this->model('databarangModel')->tambahDataBarang($_POST);
            // header('Location: ' . BASEURL . '/databarang');
            // exit;

        }

        public function detail($id) {
            
            $data['title'] = 'Detail Barang';
            $data['barang'] = $this->model('databarangModel')->getDetailBarang($id);

            $this->view('layouts/header', $data);
            $this->view('databarang/detail', $data);
            $this->view('layouts/footer');


        }

        public function update($id) {
            
            $data['title'] = 'Detail Barang';
            $data['barang'] = $this->model('databarangModel')->getDetailBarang($id);

            $this->view('layouts/header', $data);
            $this->view('databarang/update', $data);
            $this->view('layouts/footer');
        }

        public function updateStore() {
            if($this->model('databarangModel')->updateBarang($_POST) > 0) {
                //tambah sebuah session flash message
                $_SESSION['status'] = 'Data Berhasil Diupdate';
                header('Location: ' . BASEURL . '/databarang');
                exit;
            } else {
                $_SESSION['status'] = 'Data Gagal Diupdate';
                header('Location: ' . BASEURL . '/databarang');
                exit;
            }
            
        }

        public function delete($id) {
            
            if($this->model('databarangModel')->deleteBarang($id) > 0) {
                $_SESSION['status'] = 'Data Berhasil Dihapus';
                header('Location: ' . BASEURL . '/databarang');
                exit;
            } else {
                $_SESSION['status'] = 'Data Gagal Dihapus';
                header('Location: ' . BASEURL . '/databarang');
                exit;
            }


        }

    }