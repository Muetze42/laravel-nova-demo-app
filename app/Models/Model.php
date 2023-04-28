<?php

namespace App\Models;

use App\Traits\ReadOnlyTrait;

class Model extends \Illuminate\Database\Eloquent\Model
{
    use ReadOnlyTrait;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array<string>|bool
     */
    protected $guarded = [];
}
