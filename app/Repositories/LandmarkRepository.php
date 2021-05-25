<?php

namespace App\Repositories;

use App\Models\Landmark;
use App\Traits\UploadAble;
use Illuminate\Http\UploadedFile;
use App\Contracts\LandmarkContract;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Doctrine\Instantiator\Exception\InvalidArgumentException;

/**
 * Class ProductRepository
 *
 * @package \App\Repositories
 */
class LandmarkRepository extends BaseRepository implements LandmarkContract
{
    use UploadAble;

    /**
     * ProductRepository constructor.
     * @param Landmark $model
     */
    public function __construct(Landmark $model)
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
    public function listLandmarks(string $order = 'id', string $sort = 'desc', array $columns = ['*'])
    {
        return $this->all($columns, $order, $sort);
    }

    /**
     * @param int $id
     * @return mixed
     * @throws ModelNotFoundException
     */
    public function findLandmarkById(int $id)
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
    public function createLandmark(array $params)
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

        $landmark = Landmark::create([
            'name'        =>  $params['name'],
            'address'         =>  $params['address']
        ]);

        $landmark->save();
        
        return $landmark;
    }

    /**
     * @param array $params
     * @return mixed
     */
    public function updateLandmark(array $params)
    {
        $product = $this->findLandmarkById($params['id']);
        $product->name = $params['name'];
        $product->address = $params['address'];
        $product->save();

        return $product;
    }

    /**
     * @param $id
     * @return bool|mixed
     */
    public function deleteLandmark($id)
    {
        $product = $this->findLandmarkById($id);

        $product->delete();

        return $product;
    }

    /**
     * @param $slug
     * @return mixed
     */
    public function findLandmarkBySlug($slug)
    {
        $product = Landmark::where('slug', $slug)->first();

        return $product;
    }
}