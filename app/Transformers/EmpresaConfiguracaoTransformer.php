<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\EmpresaConfiguracao;

/**
 * Class EmpresaConfiguracaoTransformer
 * @package namespace App\Transformers;
 */
class EmpresaConfiguracaoTransformer extends TransformerAbstract
{

    /**
     * Transform the \EmpresaConfiguracao entity
     * @param \EmpresaConfiguracao $model
     *
     * @return array
     */
    public function transform(EmpresaConfiguracao $model)
    {
        return [
            'idempresaconfiguracao'         => $model->idempresaconfiguracao,
            'idparametroempresa'            => $model->idparametroempresa,
            'configuracao'                  => $model->configuracao,
            'valor'                         => $model->valor,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
