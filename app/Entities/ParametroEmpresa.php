<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class ParametroEmpresa extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = ['idparametroempresa', 'idempresa', 'host', 'port', 'user', 'pass', 'db', 'nome', 'urlsitewps'];
    protected $connection = 'mysql-flex-admin';
    protected $table = 'parametro_empresa';

}
