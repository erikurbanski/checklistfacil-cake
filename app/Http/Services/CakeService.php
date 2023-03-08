<?php

namespace App\Http\Services;

use App\Http\Repositories\Interfaces\CakeRepositoryInterface;

class CakeService
{
    protected CakeRepositoryInterface $interface;

    public function __construct(CakeRepositoryInterface $interface)
    {
        $this->interface = $interface;
    }

    public function allCakes()
    {
        return $this->interface->allCakes();
    }

    public function storeCake($data)
    {
        return $this->interface->storeCake($data);
    }

    public function findCake($id)
    {
        return $this->interface->findCake($id);
    }

    public function updateCake($data, $id)
    {
        return $this->interface->updateCake($data, $id);
    }

    public function destroyCake($id)
    {
        return $this->interface->destroyCake($id);
    }

}
