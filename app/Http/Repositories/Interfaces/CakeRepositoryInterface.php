<?php

namespace App\Http\Repositories\Interfaces;

Interface CakeRepositoryInterface {
    public function allCakes();
    public function storeCake($data);
    public function findCake($id);
    public function updateCake($data, $id);
    public function destroyCake($id);
}
