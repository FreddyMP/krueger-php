<?php
namespace Codevar\kruger\Models;
#use Codevar\kruger\Configurations\Models;
use Illuminate\Database\Eloquent\Model;

    class Prueba extends Model{
        protected $table = 'gente';

        protected $fillable = ['nombre', 'apellido','delete_at'];

    }