<?php

namespace App\Http\Services;

use App\Http\Repositories\Interfaces\ClientRepositoryInterface;

class ClientService
{
    protected ClientRepositoryInterface $interface;

    public function __construct(ClientRepositoryInterface $interface)
    {
        $this->interface = $interface;
    }

    public function allClients()
    {
        return $this->interface->allClients();
    }

    public function storeClient($data)
    {
        return $this->interface->storeClient($data);
    }

    public function findClient($id)
    {
        return $this->interface->findClient($id);
    }

    public function updateClient($data, $id)
    {
        return $this->interface->updateClient($data, $id);
    }

    public function destroyClient($id)
    {
        return $this->interface->destroyClient($id);
    }

}
