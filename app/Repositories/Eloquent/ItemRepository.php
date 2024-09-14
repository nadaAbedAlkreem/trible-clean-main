<?php
namespace App\Repositories\Eloquent;

use App\Models\Item;
use App\Repositories\INoteRepository;

class ItemRepository extends BaseRepository implements IItemRepository
{
    public function __construct()
    {
        $this->model = new Item();
    }
    
 
}