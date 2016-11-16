<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Empresa;

/**
 * Class EmpresaTransformer
 * @package namespace App\Transformers;
 */
class EmpresaTransformer extends TransformerAbstract
{

    /**
     * Transform the \Empresa entity
     * @param \Empresa $model
     *
     * @return array
     */
    public function transform(Empresa $model)
    {
        return [
            'idempresa'             => $model->idempresa,
            'razaosocial'           => $model->razaosocial,
            'razaolst'              => $model->razaolst,
            'fantasia'              => $model->fantasia,
            'cpfcnpj'               => $model->cpfcnpj,
            'ie'                    => $model->ie,
            'fisicajuridica'        => $model->fisicajuridica,
            'cep'                   => $model->cep,
            'logradouro'            => $model->logradouro,
            'endereco'              => $model->endereco,
            'numero'                => $model->numero,
            'bairro'                => $model->bairro,
            'complemento'           => $model->complemento,
            'idmunicipio'           => $model->idmunicipio,
            'idempresamunicipio'    => $model->idempresamunicipio,
            'site'                  => $model->site,
            'inscricaomunicipal'    => $model->inscricaomunicipal,
            'cnae'                  => $model->cnae,
            'crt'                   => $model->crt,
            'serienfs'              => $model->serienfs,
            'especienfs'            => $model->especienfs,
            'sequencianfs'          => $model->sequencianfs,
            'tipoambientenfs'       => $model->tipoambientenfs,
            'senhanfs'              => $model->senhanfs,
            'regimeempresa'         => $model->regimeempresa,
            'percaliquota_simples'  => $model->percaliquota_simples,
            'datacadastro'          => $model->datacastro,
            'serienfe'              => $model->serienfe,
            'sequencianfe'          => $model->sequencianfe,
            'tipoambientenfe'       => $model->tipoambiente,
            'serienfescan'          => $model->serienfescan,
            'sequencianfescan'      => $model->sequencianfescan,
            'tipoemissaonfe'        => $model->tipoemissaonfe,
            'certificadodigital'    => $model->certificadodigital,
            'senhacertificadodigital'   => $model->senhacertificadodigital,
            'modelodocfiscal'           => $model->modelodocfiscal,
            'diasatrazo'                => $model->diasatrazo,

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
