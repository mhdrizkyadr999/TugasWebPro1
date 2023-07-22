<?php 

class Database {
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $db_name = DB_NAME;

    private $dbh; // database handler
    private $stmt; // statement

    public function __construct() {

        //Koneksi Ke database 
        //Data Source Name
        $dsn = 'mysql:host='.$this->host.';dbname='.$this->db_name;

        //optimasi database
        $option = [
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];

        try {
            $this->dbh = new PDO($dsn, $this->user, $this->pass, $option);
        } catch(PDOException $e) {
            die($e->getMessage());
        }
    }

    public function query($query) {
        $this->stmt = $this->dbh->prepare($query);
    }

    //binding data => menghindari sql injection jika ada inputan user
    //parameter $param untuk field data yang akan di binding
    //parameter $value untuk menampung data yang akan di binding
    //type untuk menentukan tipe data yang akan di binding
    public function bind($param, $value, $type = null) {
        if(is_null($type)) { //jika tipe data null 
            switch(true) { //switch dibuat true agar bisa masuk ke case
                case is_int($value) :
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value) :
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value) :
                    $type = PDO::PARAM_NULL;
                    break;
                default :
                    $type = PDO::PARAM_STR;
            }
        }

        $this->stmt->bindValue($param, $value, $type);
    }
    
    public function execute() {
        $this->stmt->execute();
    }

    //jika data yang ditampilkan lebih dari satu
    public function resultSet() {
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    //jika data yang ditampilkan hanya satu
    public function single() {
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function rowCount() {
        return $this->stmt->rowCount();
    }
}


/* 
1. Koneksi Database
2. Menyiapkan Query (Buat Query)
3. Binding Data 
4. Eksekusi Query
5. Tampilkan Hasil Query
*/

?>