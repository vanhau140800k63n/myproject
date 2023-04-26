<?php

namespace App\Repositories\Eloquent;

use App\Models\Order;
use App\Repositories\Eloquent\BaseRepository;
use App\Repositories\OrderRepositoryInterface;

class OrderRepository extends BaseRepository implements OrderRepositoryInterface
{
    private $order;

    public function __construct()
    {
        $this->order = new Order();
    }
}
