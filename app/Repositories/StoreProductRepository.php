<?php


namespace App\Repositories;

use App\Models\StoreProduct as Model;
use Illuminate\Database\Eloquent\Collection;


class StoreProductRepository extends CoreRepository
{

    /**
     * @inheritDoc
     */
    protected function getModelClass()
    {
        return Model::class;
    }

    public function getAllWithPaginate()
    {
        $columns = [
            'id',
            'title',
            'breed',
            'excerpt',
        ];

        $result = $this->startConditions()
            ->select($columns)
            ->orderBy('id', 'DESC')
            ->paginate(4);

        return $result;
    }

    public function getEdit ($id)
    {
        return $this->startConditions()->find($id);
    }
}
