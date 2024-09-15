<?php

 
namespace App\Repositories\Eloquent;

//ICustomerRepository
use App\Models\Collector;
use App\Repositories\ICollectorRepository;


class CollectorRepository   extends BaseRepository implements ICollectorRepository
{

    public function __construct()
    {
        $this->model = new Collector();
    }
    

  
}