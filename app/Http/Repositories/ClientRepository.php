<?php

namespace App\Http\Repositories;

use App\Http\Repositories\Interfaces\ClientRepositoryInterface;
use App\Models\Client;

class ClientRepository implements ClientRepositoryInterface
{

    public function allClients()
    {
        return Client::get()->sortBy('email-sent');
    }

    public function storeClient($data)
    {
        return Client::create($data);
    }

    public function findClient($id)
    {
        return Client::findOrFail($id);
    }

    public function updateClient($data, $id)
    {
        return Client::where('id', $id)->update($data);
    }

    public function destroyClient($id)
    {
        return Client::where('id', $id)->delete();
    }

}
