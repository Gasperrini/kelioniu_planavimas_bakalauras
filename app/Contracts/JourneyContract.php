<?php

namespace App\Contracts;

/**
 * Interface CategoryContract
 * @package App\Contracts
 */
interface JourneyContract
{
    /**
    * @param $slug
    * @return mixed
    */
    public function findBySlug($slug);

    public function findJourneyById(int $id);

    public function deleteJourney($id);
}