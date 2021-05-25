<?php

namespace App\Contracts;

/**
 * Interface ProductContract
 * @package App\Contracts
 */
interface RouteContract
{
    /**
     * @param string $order
     * @param string $sort
     * @param array $columns
     * @return mixed
     */
    public function listRoutes(string $order = 'id', string $sort = 'desc', array $columns = ['*']);

    /**
     * @param int $id
     * @return mixed
     */
    public function findRouteById(int $id);

    /**
     * @param array $params
     * @return mixed
     */
    public function createRoute(array $params);

    /**
     * @param array $params
     * @return mixed
     */
    public function updateRoute(array $params);

    /**
     * @param $id
     * @return bool
     */
    public function deleteRoute($id);

    /**
     * @param $slug
     * @return mixed
     */
    public function findRouteBySlug($slug);
}