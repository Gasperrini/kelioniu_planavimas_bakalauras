<?php

namespace App\Contracts;

/**
 * Interface ProductContract
 * @package App\Contracts
 */
interface TransportContract
{
    /**
     * @param string $order
     * @param string $sort
     * @param array $columns
     * @return mixed
     */
    public function listTransports(string $order = 'id', string $sort = 'desc', array $columns = ['*']);

    /**
     * @param int $id
     * @return mixed
     */
    public function findTransportById(int $id);

    /**
     * @param array $params
     * @return mixed
     */
    public function createTransport(array $params);

    /**
     * @param array $params
     * @return mixed
     */
    public function updateTransport(array $params);

    /**
     * @param $id
     * @return bool
     */
    public function deleteTransport($id);

    /**
     * @param $slug
     * @return mixed
     */
    public function findTransportBySlug($slug);
}