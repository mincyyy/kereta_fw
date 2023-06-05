<?php 

/**
 * menghubungkan database dan sistem yang dibuat
 * PDO
 */

 class Database 
 {
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $dbname = DB_NAME;

    private $dbh;
    private $stmt;
    private $error;

     public function __construct()
     {
         $dsn = 'mysql:host='.$this->host.';dbname='.$this->dbname;
        
         $options = [
             PDO::ATTR_PERSISTENT => true,
             PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
         ];

         try {
            //  Buat instance PDO
            $this->dbh = new PDO($dsn, $this->user, $this->pass, $options);
         } catch (PDOException $e) {
            //  Setting error
            $this->error = $e->getMessage();
            echo $this->error;
         }
     }

    //  Query
     public function query($sql)
     {
         $this->stmt = $this->dbh->prepare($sql);
     }

    //  Bind value
    public function bind($params, $value, $type = null)
    {
        if (is_null($type)) {
            switch (true) {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                break;

                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;

                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;

                default:
                    $type = PDO::PARAM_STR;
                    break;
            }
        }

        $this->stmt->bindValue($params, $value, $type);
    }

    // Method execute
    public function execute()
    {
        return $this->stmt->execute();
    }

    // Mengembalikan banyak data
    public function resultSet()
    {
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }

    // Mengembalikan satu data
    public function single()
    {
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_OBJ);
    }

    // Mengembalikan row count
    public function rowCount()
    {
        $this->execute();
        return $this->stmt->rowCount();
    }


 }
 