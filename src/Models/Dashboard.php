<?php

namespace ConfrariaWeb\Dashboard\Models;

use Illuminate\Database\Eloquent\Model;
use ConfrariaWeb\Historic\Traits\HistoricTrait;
use ConfrariaWeb\Option\Traits\OptionTrait;

class Dashboard extends Model
{
    use HistoricTrait;
    use OptionTrait;

    protected $fillable = [
        'title', 'user_id'
    ];

    public function widgets()
    {
        return $this->belongsToMany('ConfrariaWeb\Widget\Models\Widget')
            ->withPivot('id', 'options', 'order');
    }
}
