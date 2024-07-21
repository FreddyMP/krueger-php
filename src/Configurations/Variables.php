<?php

namespace Codevar\kruger\Configurations;

class Variables
{
    public static function db()
    {
        try {
            $host = $_ENV["DB_HOST"];
            $database = $_ENV["DB_DATABASE"];
            $user = $_ENV["DB_USERNAME"];
            $password = $_ENV["DB_PASSWORD"];

            $datos_conexion = ["host"=>$host, "db"=> $database, "user"=>$user, "password"=>$password];

            return $datos_conexion;
            
        } catch (\Throwable $th) {
            return $th;
        }
        
    }
}
