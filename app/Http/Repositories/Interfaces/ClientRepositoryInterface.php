<?php

namespace App\Http\Repositories\Interfaces;

Interface ClientRepositoryInterface {
    public function allClients();
    public function storeClient($data);
    public function findClient($id);
    public function updateClient($data, $id);
    public function destroyClient($id);
}
