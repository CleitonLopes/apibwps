<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Domains\Contracts\Repositories\EmpresaRepository;
use App\Entities\Empresa;
use App\Validators\EmpresaValidator;

/**
 * Class EmpresaRepositoryEloquent
 * @package namespace App\Repositories;
 */
class EmpresaRepositoryEloquent extends BaseRepository implements EmpresaRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Empresa::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
