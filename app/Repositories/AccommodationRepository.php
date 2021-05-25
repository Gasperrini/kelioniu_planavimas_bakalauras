<?php

namespace App\Repositories;

use App\Models\Accommodation;
use App\Traits\UploadAble;
use Illuminate\Http\UploadedFile;
use App\Contracts\AccommodationContract;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Doctrine\Instantiator\Exception\InvalidArgumentException;

/**
 * Class ProductRepository
 *
 * @package \App\Repositories
 */
class AccommodationRepository extends BaseRepository implements AccommodationContract
{
    use UploadAble;

    /**
     * ProductRepository constructor.
     * @param Landmark $model
     */
    public function __construct(Accommodation $model)
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
    public function listAccommodations(string $order = 'id', string $sort = 'desc', array $columns = ['*'])
    {
        return $this->all($columns, $order, $sort);
    }

    /**
     * @param int $id
     * @return mixed
     * @throws ModelNotFoundException
     */
    public function findAccommodationById(int $id)
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
    public function createAccommodation(array $params)
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

        $landmark = Accommodation::create([
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
    public function updateAccommodation(array $params)
    {
        $product = $this->findAccommodationById($params['id']);
        $product->name = $params['name'];
        $product->address = $params['address'];
        $product->save();

        return $product;
    }

    /**
     * @param $id
     * @return bool|mixed
     */
    public function deleteAccommodation($id)
    {
        $product = $this->findAccommodationById($id);

        $product->delete();

        return $product;
    }

    /**
     * @param $slug
     * @return mixed
     */
    public function findAccommodationBySlug($slug)
    {
        $product = Accommodation::where('slug', $slug)->first();

        return $product;
    }
}