<?php

namespace App\Repository;

use App\Models\Cart;
use App\Repository\Interfaces\CartRepositoryInterface;
use Illuminate\Support\Collection;

class CartRepository implements CartRepositoryInterface
{
    private $model;

    /**
     * StoreRepository constructor.
     *
     * @param Cart $model
     */
    public function __construct(Cart $model)
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
     *  @param int $count
     *  @param bool $paginate
     *  @param array $relations
     * @return object
     */
    public function getAllCart(int $count, bool $paginate,array $relations): object
    {
        if ($paginate == true) {
            return $this->model->with($relations)->where('user_id' , auth()->user()->id)->paginate($count);
        }
        return $this->model->with($relations)->where('user_id' , auth()->user()->id)->get();
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
     * @param Cart  $model
     * @param array $attributes
     * @return object
     */
    public function update(Cart $model, array $attributes): object
    {
        $model->update($attributes);
        return $model;
    }

    public function delete($model_id)
    {
        return $this->model->destroy($model_id);
    }
}
