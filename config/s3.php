<?php

return  [
    'setting' => [
        'key' => env('AWS_ACCESS_KEY_ID', ''),
        'secret' => env('AWS_SECRET_ACCESS_KEY', ''),
        'region' => env('AWS_DEFAULT_REGION', ''),
        'bucket' => env('AWS_BUCKET', ''),
        'endpoint' => env('AWS_ENDPOINT', ''),
        'use_path_style_endpoint' => env('AWS_USE_PATH_STYLE_ENDPOINT', false),
        'root' => env('AWS_ROOT', ''),
        'visibility' => env('AWS_VISIBILITY', 'public'),
    ],

    'default_file' => [
        'image' => 'image.png',
        'ms-excel' => 'ms-excel.png',
        'ms-power-point' => 'ms-power-point.png',
        'ms-word' => 'ms-word.png',
        'pdf' => 'pdf.png',
        'profile' => 'profile.png',
        'profile-female' => 'profile-female.png',
        'profile-male' => 'profile-male.png',
        'video' => 'video.png',
    ],
];
