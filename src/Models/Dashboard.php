<?php

namespace ConfrariaWeb\Dashboard\Models;

use ConfrariaWeb\Widget\Traits\WidgetTrait;
use Illuminate\Database\Eloquent\Model;
class Dashboard extends Model
{
    use WidgetTrait;

    protected $fillable = [
        'title', 'user_id'
    ];

    public function widgets()
    {
        return $this->morphToMany('ConfrariaWeb\Widget\Models\Widget', 'widgetgable')
            ->using('ConfrariaWeb\Dashboard\Models\DashboardWidget')
            ->withPivot(['id', 'order', 'options'])
            ->withTimestamps();
    }

/*
    public function widgets()
    {
        return $this->belongsToMany('ConfrariaWeb\Widget\Models\Widget')
            ->using('ConfrariaWeb\Dashboard\Models\DashboardWidget')
            ->withPivot('id', 'options', 'order');
    }
*/
}
