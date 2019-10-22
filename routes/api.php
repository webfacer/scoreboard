<?php

$routes = [
    'characters',
    'games',
    'matches',
    'players',
    'teams',
];

Route::namespace('Auth')->group(function () {
    Route::post('login', 'LoginController@login');
});

Route::namespace('Api')->group(function () use ($routes) {
    // Controllers Within The "App\Http\Controllers\Admin" Namespace
    Route::prefix('v1')->group(function () use ($routes) {

        foreach ($routes as $controller) {
            Route::prefix($controller)->group(function () use ($controller) {
                $controllerName = \Illuminate\Support\Str::camel($controller);

                $routConfigActions = [
                    'get' => [
                        'list' => [
                            'controller' => $controllerName.'Controller',
                            'action' => 'read'
                        ],
                        'findbyid' => [
                            'controller' => $controllerName.'Controller',
                            'action' => 'findById',
                            'params' =>  ['{id}' => '[0-9]+']
                        ]
                    ],
                    'post' => [
                        'create' => [
                            'controller' => $controllerName.'Controller',
                            'action' => 'create',
                        ],
                        'update' => [
                            'controller' => $controllerName.'Controller',
                            'action' => 'update',
                            'params' =>  ['{id}' => '[0-9]+']
                        ]
                    ],

                    # Request DELETE
                    'delete' => [
                        # Url-Segment /delete
                        'delete' => [
                            'controller' => $controllerName.'Controller',
                            'action' => 'delete',
                            'params' => ['{id}' => '[0-9]+'],
                        ]
                    ]
                ];

                //initRoutConfig($routConfigActions);
                foreach ($routConfigActions as $requestType => $actions) {
                    foreach ($actions as $action => $option) {
                        $endpoint = $action;
                        if (isset($option['params'])) {
                            $params = $option['params'];
                            foreach ($params as $paramKey => $param) {
                                $endpoint .= '/'.$paramKey;
                            }
                        }

                        $route = Route::{$requestType}($endpoint, $option['controller'].'@'.$option['action']);
                        if (isset($params)) {
                            $route->where($params);
                        }
                        unset($params);
                    }
                }
            });
        }
    });
});
