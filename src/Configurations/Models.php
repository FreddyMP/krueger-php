<?php

namespace Codevar\kruger\Configurations;
#use Codevar\kruger\Configurations\Conexion;

class Models{
    public function create_table(string $table, array $fiels){

    }

    public static function get_table(string $table , array $fields){

        $conec = new Conexion;
        $conn = $conec->conec();

        $fields_string = "";
        $fields_return = [];
        foreach($fields as $field){
            if($field != end($fields)){
                $fields_string .= $field.", "; 
            }else{
                $fields_string .= $field; 
            }
        }
        
        $query = $conn->query("select $fields_string from $table");
        
    
        while($row = mysqli_fetch_assoc($query)){
            array_push($fields_return, $row );
        }
    
       return $fields_return;
    
    }
}
 