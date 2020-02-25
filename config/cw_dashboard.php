<?php

return [
    'layout' => env('CW_LAYOUT', 'layouts.app'),
    'views' => env('CW_VIEWS', 'dashboard::'),

    'route' => [
        'index' => env('CW_DASHBOARD_INDEX', '')
    ]
];
