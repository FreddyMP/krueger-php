<?php
namespace Codevar\kruger\Configurations;
use Rap2hpoutre\FastExcel\FastExcel;

class Utils {

    public static function downLoad_Excel($module, $data){

        $name_file  = $module."_";
        $fecha = date("ymdhis");
        $name_file .=$fecha;

        (new FastExcel($data))->export($name_file.'.xlsx');

        header("Content-Transfer-Encoding: binary");
        header("Content-Type: application/octet-stream");
        header("Content-Disposition: attachment; filename= ".$name_file.'.xlsx');
        readfile($name_file.'.xlsx');

        unlink($name_file.'.xlsx');
    }
}