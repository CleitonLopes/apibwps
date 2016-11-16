<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Empresa extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
                'idempresa',
                'razaosocial',
                'razaolst',
                'fantasia',
                'cpfcnpj',
                'ie',
                'fisicajuridica',
                'cep',
                'logradouro',
                'endereco',
                'numero',
                'bairro',
                'complemento',
                'idmunicipio',
                'idempresamunicipio',
                'site',
                'inscricaomunicipal',
                'cnae',
                'crt',
                'serienfs',
                'especienfs',
                'sequencianfs',
                'tipoambientenfs',
                'senhanfs',
                'regimeempresa',
                'percaliquota_simples',
                'datacadastro',
                'serienfe',
                'sequencianfe',
                'tipoambientenfe',
                'serienfescan',
                'sequencianfescan',
                'tipoemissaonfe',
                'certificadodigital',
                'senhacertificadodigital',
                'modelodocfiscal',
                'diasatrazo'
    ];

    protected $connection = 'mysql';
    protected $table = 'empresa';
    protected  $primaryKey = 'idempresa';



}
