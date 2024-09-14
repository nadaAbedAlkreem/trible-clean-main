<?php

namespace App\Repositories\Eloquent;

use App\Models\FinancialDetail;
use App\Repositories\IFinancialDetailRepository;



class FinancialDetailRepository extends BaseRepository implements IFinancialDetailRepository
{

    public function __construct()
    {
        $this->model = new FinancialDetail();
    }
  
}