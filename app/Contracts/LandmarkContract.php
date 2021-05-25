<?php

namespace App\Contracts;

/**
 * Interface ProductContract
 * @package App\Contracts
 */
interface LandmarkContract
{
    /**
     * @param string $order
     * @param string $sort
     * @param array $columns
     * @return mixed
     */
    public function listLandmarks(string $order = 'id', string $sort = 'desc', array $columns = ['*']);

    /**
     * @param int $id
     * @return mixed
     */
    public function findLandmarkById(int $id);

    /**
     * @param array $params
     * @return mixed
     */
    public function createLandmark(array $params);

    /**
     * @param array $params
     * @return mixed
     */
    public function updateLandmark(array $params);

    /**
     * @param $id
     * @return bool
     */
    public function deleteLandmark($id);

    /**
     * @param $slug
     * @return mixed
     */
    public function findLandmarkBySlug($slug);
}