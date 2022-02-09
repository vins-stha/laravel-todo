<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    //
    const TASK_STATES = [
        'NOT-STARTED' => 'Not Started',
        'ONGOING' => 'Ongoing',
        'COMPLETED'=>'Completed'
    ];

    protected $fillable = [
        'name',
        'descriptions',
        'status',
        'user_id'
    ];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }
}
