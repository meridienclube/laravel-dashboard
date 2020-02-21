<?php

namespace ConfrariaWeb\Dashboard\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class DashboardWidget extends Pivot
{

    public $incrementing = true;

    protected $casts = [
        'options' => 'collection',
    ];
}