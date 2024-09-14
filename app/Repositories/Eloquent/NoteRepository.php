<?php

namespace App\Repositories\Eloquent;

use App\Models\Note;
use App\Repositories\INoteRepository;

class NoteRepository extends BaseRepository implements INoteRepository
{
    public function __construct()
    {
        $this->model = new Note();
    }
    
 
}