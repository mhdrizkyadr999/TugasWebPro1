<?php 

    class home extends Controller {

        public function index() {

            $this->view('layouts/header');
            $this->view('home');
            $this->view('layouts/footer');

        }

        public function page() {
            echo 'home/page success';
        }

        public function store() {
            echo 'home/store success';
        }

    }