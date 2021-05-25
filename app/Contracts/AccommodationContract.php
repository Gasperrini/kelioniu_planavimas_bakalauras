<?php

namespace App\Contracts;

/**
 * Interface ProductContract
 * @package App\Contracts
 */
interface AccommodationContract
{
    /**
     * @param string $order
     * @param string $sort
     * @param array $columns
     * @return mixed
     */
    public function listAccommodations(string $order = 'id', string $sort = 'desc', array $columns = ['*']);

    /**
     * @param int $id
     * @return mixed
     */
    public function findAccommodationById(int $id);

    /**
     * @param array $params
     * @return mixed
     */
    public function createAccommodation(array $params);

    /**
     * @param array $params
     * @return mixed
     */
    public function updateAccommodation(array $params);

    /**
     * @param $id
     * @return bool
     */
    public function deleteAccommodation($id);

    /**
     * @param $slug
     * @return mixed
     */
    public function findAccommodationBySlug($slug);
}