<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Menu extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = ['idmenu', 'idparametroempresa', 'label', 'data', 'tipopermissao', 'alpha', 'campo', 'camposuperior', 'visivel', 'imagemicone', 'labelicone', 'nomeview', 'nivelmenu'];
    protected $connection = 'mysql-flex-admin';
    protected $table = 'menu';
    protected $primaryKey = 'idparametroempresa';

}
