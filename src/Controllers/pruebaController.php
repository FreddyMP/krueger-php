<?php
namespace Codevar\kruger\Controllers;
use Codevar\kruger\Models\Prueba;
use Codevar\kruger\Configurations\Front;
use Codevar\kruger\Configurations\Utils;
use Dompdf\Dompdf;

class pruebaController{ 

    #Show all
    public static function show_all(int $skip = null, int $paginate = 10){
       
        if($skip == null){
            $pruebas = Prueba::take($paginate)->whereNull("delete_at")->get();
        }else{
            $skip = $skip * $paginate;
            $pruebas = Prueba::skip($skip)->take($paginate)->whereNull("delete_at")->get();
        }
        
        $forsearch = Prueba::whereNull("delete_at")->get();
        $dato = [$pruebas,$forsearch];

        Front::view_font('index', $dato);
    }

    #show specific id
    public static function show_id(int $id){

        $pruebas = Prueba::find($id);
        Front::view_font('prueba/update', $pruebas);
        
    }

    #show with filters
    public function show_search(array $fields, array $values){

        
    }
    
    #show form create
    public static function create(){
        Front::view_font('prueba/create');
    }

    public static function insert(){
        try {
            prueba::create([
                "nombre"=> $_POST["nombre"],
                "apellido"=> $_POST["apellido"]
            ]);
            header("location:http://127.0.0.1:3000/");

        } catch (\Throwable $th) {

            return "Se genero un error: ".$th;
        }   
    }

    public function update(){
        try {
            $id = $_POST["id"];
            $prueba = prueba::find($id);
            $prueba->update([
                "apellido"=>$_POST["apellido"],
                "nombre"=>$_POST["nombre"]
            ]);

            $prueba->save();
            header("location:http://127.0.0.1:3000/");

        } catch (\Throwable $th) {

            return "Se genero un error: ".$th;

        }
    }

    public static function logic_delete(int $id){
        try {
            $fecha = date("Y-m-d H:i:s");   
            $prueba = prueba::find($id);
            $prueba->update([
                "delete_at"=>$fecha
            ]);
            header("location:http://127.0.0.1:3000/");

        } catch (\Throwable $th) {

            return "Se genero un error: ".$th;

        }
    }

    public function delete(){
        try {

            prueba::destroy(874);
            return "Eliminado correctamente";

        } catch (\Throwable $th) {

            return "Se genero un error: ".$th;

        }
    }

    #Download Excel
    public static function excel_download(int $skip = null, int $paginate = 10){
        if($skip == null){
            $pruebas = Prueba::take($paginate)->whereNull("delete_at")->get();
        }else{
            $skip = $skip * $paginate;
            $pruebas = Prueba::skip($skip)->take($paginate)->whereNull("delete_at")->get();
        }
        Utils::downLoad_Excel("pruebas", $pruebas);
    }



    #Download pdf
    public static function pdf_download(int $skip = null, int $paginate = 10){

        if($skip == null){
            $pruebas = Prueba::take($paginate)->whereNull("delete_at")->get();
        }else{
            $skip = $skip * $paginate;
            $pruebas = Prueba::skip($skip)->take($paginate)->whereNull("delete_at")->get();
        }

        $dompdf = new Dompdf();
    
        $dompdf->render();
        $dompdf->stream();
    }

    
}