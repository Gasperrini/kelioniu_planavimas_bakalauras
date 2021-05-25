<?php

namespace App\Repositories;

use App\Models\Journey;
use App\Contracts\JourneyContract;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Doctrine\Instantiator\Exception\InvalidArgumentException;

/**
 * Class CategoryRepository
 *
 * @package \App\Repositories
 */
class JourneyRepository extends BaseRepository implements JourneyContract
{
    /**
     * CategoryRepository constructor.
     * @param Category $model
     */
    public function __construct(Journey $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }

    public function findBySlug($slug)
    {
        $journey = Journey::where('slug', $slug)->first();

        return $journey;
    }
}

