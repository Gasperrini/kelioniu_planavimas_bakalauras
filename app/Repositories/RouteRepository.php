<?php

namespace App\Repositories;

use App\Models\Route;
use App\Traits\UploadAble;
use Illuminate\Http\UploadedFile;
use App\Contracts\RouteContract;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Doctrine\Instantiator\Exception\InvalidArgumentException;

/**
 * Class ProductRepository
 *
 * @package \App\Repositories
 */
class RouteRepository extends BaseRepository implements RouteContract
{
    use UploadAble;

    /**
     * ProductRepository constructor.
     * @param Route $model
     */
    public function __construct(Route $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }

    /**
     * @param string $order
     * @param string $sort
     * @param array $columns
     * @return mixed
     */
    public function listRoutes(string $order = 'id', string $sort = 'desc', array $columns = ['*'])
    {
        return $this->all($columns, $order, $sort);
    }

    /**
     * @param int $id
     * @return mixed
     * @throws ModelNotFoundException
     */
    public function findRouteById(int $id)
    {
        try {
            return $this->findOneOrFail($id);

        } catch (ModelNotFoundException $e) {

            throw new ModelNotFoundException($e);
        }

    }

    /**
     * @param array $params
     * @return Product|mixed
     */
    public function createRoute(array $params)
    {
        /*try {
            $collection = collect($params);

            $featured = $collection->has('featured') ? 1 : 0;
            $status = $collection->has('status') ? 1 : 0;

            //$merge = $collection->merge(compact('status', 'featured'));

        $product = new Landmark($merge->all());

            $product->save();
            return $product;

        } catch (QueryException $exception) {
            throw new InvalidArgumentException($exception->getMessage());
        }*/

        $route = Route::create([
            'name'        =>  $params['name'],
            'start_point'         =>  $params['start_point'],
            'end_point'         =>  $params['end_point'],
            'start_time'         =>  $params['start_time'],
            'end_time'         =>  $params['end_time']
        ]);

        $route->save();
        
        return $route;
    }

    /**
     * @param array $params
     * @return mixed
     */
    public function updateRoute(array $params)
    {
        $product = $this->findRouteById($params['id']);
        $product->name = $params['name'];
        $product->start_point = $params['start_point'];
        $product->end_point = $params['end_point'];
        $product->start_time = $params['start_time'];
        $product->end_time = $params['end_time'];
        $product->save();

        return $product;
    }

    /**
     * @param $id
     * @return bool|mixed
     */
    public function deleteRoute($id)
    {
        $product = $this->findRouteById($id);

        $product->delete();

        return $product;
    }

    /**
     * @param $slug
     * @return mixed
     */
    public function findRouteBySlug($slug)
    {
        $product = Route::where('slug', $slug)->first();

        return $product;
    }
}