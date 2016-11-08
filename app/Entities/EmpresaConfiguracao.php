<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class EmpresaConfiguracao extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = ['idempresaconfiguracao', 'idparametroempresa', 'configuracao', 'valor'];
    protected $connection = 'mysql-flex-admin';
    protected $table = 'empresa_configuracao';
    protected $primaryKey = 'idparametroempresa';

}
