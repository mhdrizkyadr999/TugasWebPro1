<?php 

Class App {
    protected $controller = 'home';
    protected $method = 'index';
    protected $params = [];
    
    public function __construct()
    {
        $url = $this->parseURl();
        
        
        // check if the controller exists
        if(file_exists('../app/controllers/' . $url[0] . '.php')) {
            $this->controller = $url[0];
            unset($url[0]); // remove the controller from the url
        }

        require_once '../app/controllers/' . $this->controller . '.php';
        // // instantiate the controller
        $this->controller = new $this->controller;

        // // check if the method exists
        if(isset($url[1])) {
            if(method_exists($this->controller, $url[1])) {
                $this->method = $url[1]; // set the method
                unset($url[1]); // remove the method from the url
            }
        }

        // // check if there are any parameters
        if(!empty($url)) {
            $this->params = array_values($url); // set the parameters
        }

        // // call the method and pass in the parameters
        call_user_func_array([$this->controller, $this->method], $this->params);

    }

    public function parseURl() {
        if(isset($_GET['url'])) {
            $url = $_GET['url'];
            $url = rtrim($url, '/'); // remove the last slash
            $url = filter_var($url, FILTER_SANITIZE_URL); 
            $url = explode('/', $url);

            return $url;
        }
    }

}