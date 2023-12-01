<?php

namespace App\Repository;

use App\Models\Setting;
use App\Repository\Interfaces\SettingRepositoryInterface;
use Illuminate\Support\Collection;

class SettingRepository implements SettingRepositoryInterface
{
    private $model;

    /**
     * StoreRepository constructor.
     *
     * @param Setting $model
     */
    public function __construct(Setting $model)
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
     * @param Setting  $model
     * @param array $attributes
     * @return object
     */
    public function update(Setting $model, array $attributes): object
    {
        $model->update($attributes);
        return $model;
    }

    public function delete($model_id)
    {
        return $this->model->destroy($model_id);
    }
}
