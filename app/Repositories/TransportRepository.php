<?php

namespace App\Repositories;

use App\Models\Transport;
use App\Traits\UploadAble;
use Illuminate\Http\UploadedFile;
use App\Contracts\TransportContract;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Doctrine\Instantiator\Exception\InvalidArgumentException;

/**
 * Class ProductRepository
 *
 * @package \App\Repositories
 */
class TransportRepository extends BaseRepository implements TransportContract
{
    use UploadAble;

    /**
     * ProductRepository constructor.
     * @param Landmark $model
     */
    public function __construct(Transport $model)
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
    public function listTransports(string $order = 'id', string $sort = 'desc', array $columns = ['*'])
    {
        return $this->all($columns, $order, $sort);
    }

    /**
     * @param int $id
     * @return mixed
     * @throws ModelNotFoundException
     */
    public function findTransportById(int $id)
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
    public function createTransport(array $params)
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

        $landmark = Transport::create([
            'name'        =>  $params['name'],
            'address'         =>  $params['address'],
            'email'         =>  $params['email']
        ]);

        $landmark->save();
        
        return $landmark;
    }

    /**
     * @param array $params
     * @return mixed
     */
    public function updateTransport(array $params)
    {
        $product = $this->findTransportById($params['id']);
        $product->name = $params['name'];
        $product->address = $params['address'];
        $product->email = $params['email'];
        $product->save();

        return $product;
    }

    /**
     * @param $id
     * @return bool|mixed
     */
    public function deleteTransport($id)
    {
        $product = $this->findTransportById($id);

        $product->delete();

        return $product;
    }

    /**
     * @param $slug
     * @return mixed
     */
    public function findTransportBySlug($slug)
    {
        $product = Transport::where('slug', $slug)->first();

        return $product;
    }
}