<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;  
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class FinancialDetail extends Model
{
    use HasFactory , SoftDeletes;

    protected $fillable = ['sales', 'expenses', 'profit'  ];

 
}    
