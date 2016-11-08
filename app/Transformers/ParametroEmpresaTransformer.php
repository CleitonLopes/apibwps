<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\ParametroEmpresa;

/**
 * Class ParametroEmpresaTransformer
 * @package namespace App\Transformers;
 */
class ParametroEmpresaTransformer extends TransformerAbstract
{

    /**
     * Transform the \ParametroEmpresa entity
     * @param \ParametroEmpresa $model
     *
     * @return array
     */
    public function transform(ParametroEmpresa $model)
    {
        return [
            'idparametroempresa'         => $model->idparametroempresa,
            'idempresa'                  => $model->idempresa
        ];
    }
}
