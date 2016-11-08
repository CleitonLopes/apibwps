<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\EmpresaConfiguracaoRepository;
use App\Entities\EmpresaConfiguracao;
use App\Validators\EmpresaConfiguracaoValidator;

/**
 * Class EmpresaConfiguracaoRepositoryEloquent
 * @package namespace App\Repositories;
 */
class EmpresaConfiguracaoRepositoryEloquent extends BaseRepository implements EmpresaConfiguracaoRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return EmpresaConfiguracao::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return EmpresaConfiguracaoValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
