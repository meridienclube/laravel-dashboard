<?php

namespace ConfrariaWeb\Dashboard\Models;

use ConfrariaWeb\Widget\Traits\WidgetTrait;
use Illuminate\Database\Eloquent\Model;
use ConfrariaWeb\Dashboard\Models\DashboardWidget;

class Dashboard extends Model
{
    use WidgetTrait;

    protected $fillable = [
        'title', 'user_id'
    ];

}
