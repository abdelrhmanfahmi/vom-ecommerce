<?php

namespace App\Repository;

use App\Models\Store;
use App\Repository\Interfaces\StoreRepositoryInterface;
use Illuminate\Support\Collection;

class StoreRepository implements StoreRepositoryInterface
{
    private $model;

    /**
     * StoreRepository constructor.
     *
     * @param Store $model
     */
    public function __construct(Store $model)
    {
        $this->model = $model;
    }

    /**
     *  @param int $count
     *  @param bool $paginate
     *  @param array $relations
     * @return object
     */
    public function all(int $count, bool $paginate,array $relations): object
    {
        if ($paginate == true) {
            return $this->model->with($relations)->paginate($count);
        }
        return $this->model->with($relations)->get();
    }

    /**
     * @param array $attributes
     * @return object
     */
    public function create(array $attributes): object
    {
        return $this->model->create($attributes);
    }

    /**
     * @param int $model_id
     * @return object
     */
    public function find($model_id): ?object
    {
        return $this->model->findOrFail($model_id);
    }

    /**
     * @param Store  $model
     * @param array $attributes
     * @return object
     */
    public function update(Store $model, array $attributes): object
    {
        $model->update($attributes);
        return $model;
    }

    public function delete($model_id)
    {
        return $this->model->destroy($model_id);
    }

}
