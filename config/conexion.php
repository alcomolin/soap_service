<?php
class Init
{
    protected $dbh;

    protected function connection()
    {
        try {
            // Create PDO instance
            $connect = $this->dbh = new PDO('mysql:host=localhost;dbname=ejerciciopractico', 'root', '');
            return $connect;
        } catch (Exception $e) {
            print  "Error!: " . $e->getMessage();
            die();
        }
    }

    public function set_names()
    {
        return $this->dbh->query("SET NAME 'utf8'");
    }
}
