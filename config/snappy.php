<?php

return [
    'pdf' => [
        'enabled' => true,
        'binary'  => base_path('vendor\wemersonjanuario\wkhtmltopdf-windows\bin\64bit\wkhtmltopdf'),
        'timeout' => false,
        'options' => [],
        'env'     => [],
    ],

    'image' => [
        'enabled' => true,
        'binary'  => base_path('vendor\wemersonjanuario\wkhtmltoimage-windows\bin\64bit\wkhtmltoimage'),
        'timeout' => false,
        'options' => [
            'enable-local-file-access' => true,
            'keep-relative-links' => true,
        ],
        'env'     => [],
    ],
];
