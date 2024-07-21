<?php
    namespace Codevar\kruger\Configurations;
    
    class Controllers{

        public static function all(array $Model){
            return $Model;
        }
        public static function find_id(array $Model, $id){
            $data = [];
            foreach ($Model as $Modelo){
                if($Modelo["id"] == $id){
                    array_push($data, $Modelo);
                }
            }
            return $data;
        }
        public static function search(array $Model, $fields, $values){
            
        }
    }
?>