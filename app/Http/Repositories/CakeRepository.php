<?php

namespace App\Http\Repositories;

use App\Http\Repositories\Interfaces\CakeRepositoryInterface;
use App\Models\Cake;

class CakeRepository implements CakeRepositoryInterface
{

    public function allCakes()
    {
        return Cake::latest()->paginate(10);
    }

    public function storeCake($data)
    {
        return Cake::create($data);
    }

    public function findCake($id)
    {
        return Cake::findOrFail($id);
    }

    public function updateCake($data, $id)
    {
        return Cake::where('id', $id)->update($data);
    }

    public function destroyCake($id)
    {
        return Cake::where('id', $id)->delete();
    }

}
