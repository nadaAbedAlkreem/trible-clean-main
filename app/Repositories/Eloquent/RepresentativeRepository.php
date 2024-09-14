<?php
 
namespace App\Repositories\Eloquent;

use App\Models\Representative;
use App\Repositories\IRepresentativeRepository;

class RepresentativeRepository extends BaseRepository implements IRepresentativeRepository
{
    public function __construct()
    {
        $this->model = new Representative();
    }
    
 
}