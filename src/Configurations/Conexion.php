<?php
namespace Codevar\kruger\Configurations;
use Codevar\kruger\Configurations\Variables;

class Conexion {
    private string $host;

    private string $user;
    private string $password;
    private string $db;
  
    public function conec(){
        try {
            $variable = Variables::db();
            $variable_host = $variable['host'];
            $variable_db = $variable['db'];
            $variable_password = $variable['password'];
            $variable_user = $variable['user'];
    
            $this->host = $variable_host;
            $this->db = $variable_db;
            $this->user = $variable_user;
            $this->password = $variable_password;

            $conn = mysqli_connect($this->host, $this->user, $this->password, $this->db);
            return $conn;
        
        } catch (\Throwable $th) {
            return $th;
        }
    }
}
?>