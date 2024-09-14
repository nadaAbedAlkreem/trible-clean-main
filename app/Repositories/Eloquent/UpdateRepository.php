<?php
 
namespace App\Repositories\Eloquent;

use App\Models\Update;
use App\Repositories\IUpdateRepository;

class UpdateRepository extends BaseRepository implements IUpdateRepository
{
    public function __construct()
    {
        $this->model = new Update();
    }
    
 
}