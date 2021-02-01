<?php

namespace Modules\Website\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Website extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'created_at',
		'updated_at'
    ];
    
    protected static function newFactory()
    {
        return \Modules\Website\Database\factories\WebsiteFactory::new();
    }
}
