<?php
return [
    'dashboard' => [
        'type' => 2,
        'description' => 'Админ-панель',
    ],
    'cabinet' => [
        'type' => 2,
        'description' => 'Кабинет',
    ],
    'employer' => [
        'type' => 1,
        'description' => 'Работодатель',
        'ruleName' => 'userRole',
        'children' => [
            'cabinet',
        ],
    ],
    'aspirant' => [
        'type' => 1,
        'description' => 'Соискатель',
        'ruleName' => 'userRole',
        'children' => [
            'cabinet',
        ],
    ],
    'admin' => [
        'type' => 1,
        'description' => 'Администратор',
        'ruleName' => 'userRole',
        'children' => [
            'dashboard',
            'cabinet',
            'aspirant',
            'employer',
        ],
    ],
];
