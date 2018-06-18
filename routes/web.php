<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/welcome', function () {
    return view('welcome');
});


function initRouteConfig($actions) {
    $route = null;
    foreach ($actions as $requestType => $action) {
        foreach ($action as $action => $option) {
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

    return $route;
};

Route::namespace('Api')->group(function () {
    // Controllers Within The "App\Http\Controllers\Admin" Namespace
    Route::prefix('api/v1')->group(function () {
        #Route::post('coins/create', 'CoinsController@create');
        $controllers = ['characters','games'];
        foreach ($controllers as $controller) {
            // this is new and may be not working properly
            Route::prefix($controller)->group(function () use ($controller) {
                $controller = ucfirst(camel_case($controller));
                $routConfigActions = [
                    # Request GET
                    'get' => [
                        # Url-Segment /list
                        'list' => [
                            'controller' => $controller.'Controller',
                            'action' => 'read'
                        ],
                        # Url-Segment /filterbyid
                        'filterbyid' => [
                            'controller' => $controller.'Controller',
                            'action' => 'filterById',
                            'params' => ['{id}' => '[0-9]+'],
                        ],
                        # Url-Segment /filter
                        'filterbysymbol' => [
                            'controller' => $controller.'Controller',
                            'action' => 'filterBySymbol',
                            'params' => ['{symbol}' => '[a-zA-Z0-9]+'],
                        ],
                    ],

                    # Request POST
                    'post' => [
                        # Url-Segment /create
                        'create' => [
                            'controller' => $controller.'Controller',
                            'action' => 'create',
                        ],
                        # Url-Segment /update
                        'update' => [
                            'controller' => $controller.'Controller',
                            'action' => 'update', // @todo change this name to a pretty name
                            'params' => ['{id}' => '[0-9]+'],
                        ],
                    ],

                    # Request DELETE
                    'delete' => [
                        # Url-Segment /delete
                        'delete' => [
                            'controller' => $controller.'Controller',
                            'action' => 'delete',
                            'params' => ['{id}' => '[0-9]+'],
                        ]
                    ]
                ];

                initRouteConfig($routConfigActions);
            });
        }
    });
});


// @
abstract class AbstractFactoryRoute {
    protected $url;
    protected $routNameSpaces;
    protected $routPrefixes;
    protected $routControllers;
    protected $routEndpoints;

    protected function __construct($url = null)
    {
        if (! $this->url) {
            $this->url = $url;
        }
        $this->initRoutSchema();
    }

    /**
     * @return mixed
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param mixed $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

    public function appendUrl()
    {
        // @todo add this later
    }


    protected function __toArray()
    {

    }

    protected function initRoutSchema()
    {
        // @todo usage as below
        $this->buildRoutSchema();
    }

    abstract protected function buildRoutSchema();

    abstract protected function nameSpaces();

    abstract protected function prefixes();

    abstract protected function controllers();

    abstract protected function actions();
}

class ApiRoute extends AbstractFactoryRoute
{
    protected function buildRoutSchema()
    {

    }

    protected function nameSpaces()
    {
        // TODO: Implement nameSpaces() method.
    }

    protected function prefixes()
    {

    }

    protected function controllers()
    {

    }

    protected function actions()
    {

    }
}

/*Route::namespace('Api')->group(function () {
    // Controllers Within The "App\Http\Controllers\Admin" Namespace
    $routPrefixes = [
        'api'
    ];
    foreach($routPrefixes as $prefix) {
        Route::prefix($prefix)->group(function () {
            $routControllers = [
                'coins',
                'incomes',
                'lending',
                'wallets',
            ];
            foreach ($routControllers as $controller) {
                Route::prefix($controller)->group(function () use ($controller) {
                    $routEndpoints = [
                        'filter' => [
                            'action' => [
                                'list' => 'get',
                                'params' => [
                                    '{id}/{name}' => [
                                        'id' => '[0-9]+',
                                        'name' => '[a-z]+'
                                    ]
                                ]
                            ]
                        ],
                        'list' => 'get',
                        'create' => 'post',
                        'update' => 'post',
                        'delete' => 'delete',
                    ];
                    foreach ($routEndpoints as $endpoint => $requestType) {
                        $controllerAction = (string) trim('');
                        // @resultRoutExample /api/coins/list.json -> request: GET
                        if (is_array($requestType)) {
                            if (isset($routEndpoints[$endpoint]['action'])) {
                                $actions = $routEndpoints[$endpoint]['action'];

                            }
                        }
                        else {
                            Route::{$requestType}($endpoint, ucfirst($controller)."Controller@$endpoint");
                        }
                        #Route::{$requestType}($endpoint, ucfirst($controller)."Controller@$endpoint");
                    }
                });
            }
        });
    }
});
*/
