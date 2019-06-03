<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
 *
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */
use Cake\Http\Middleware\CsrfProtectionMiddleware;
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;
use Cake\Routing\Route\DashedRoute;
use Cake\Core\Configure;

/**
 * The default class to use for all routes
 *
 * The following route classes are supplied with CakePHP and are appropriate
 * to set as the default:
 *
 * - Route
 * - InflectedRoute
 * - DashedRoute
 *
 * If no call is made to `Router::defaultRouteClass()`, the class used is
 * `Route` (`Cake\Routing\Route\Route`)
 *
 * Note that `Route` does not do any inflections on URLs which will result in
 * inconsistently cased URLs when used with `:plugin`, `:controller` and
 * `:action` markers.
 *
 * Cache: Routes are cached to improve performance, check the RoutingMiddleware
 * constructor in your `src/Application.php` file to change this behavior.
 *
 */
Router::defaultRouteClass(DashedRoute::class);

Router::scope('/', function (RouteBuilder $routes) {
    // Register scoped middleware for in scopes.
    $routes->registerMiddleware('csrf', new CsrfProtectionMiddleware([
        'httpOnly' => true
    ]));

    /**
     * Apply a middleware to the current route scope.
     * Requires middleware to be registered via `Application::routes()` with `registerMiddleware()`
     */
    $routes->applyMiddleware('csrf');
    $contentsNodes = Configure::read('contentsNodes');
    $defaultWebSettings = Configure::read('defaultWebSettings');
    if(!empty($contentsNodes)){
        foreach($contentsNodes as $key => $node){
            $explodeParams = explode(":",$node['node']);
            $controller = !empty($explodeParams[0]) ? $explodeParams[0] : '';
            $action = !empty($explodeParams[1]) ? $explodeParams[1] : 'index';
            if($node['slug'] == $defaultWebSettings['Web.FirstPage']){
                $routes->connect('/', ['controller' => $controller, 'action' => $action],['_name'=>'home']);
            }
            $routes->connect('/'.$node['slug'], ['controller' => $controller, 'action' => $action,'slug'=>$node['slug']],['pass'=>['slug'],'_name'=>$node['title']]);
        }
    }else{
        $routes->connect('/', ['controller' => 'Pages', 'action' => 'checkSlug'],['pass'=>['slug'],'_name'=>'home']);
    }
    $routes->connect('/:slug', ['controller' => 'Pages', 'action' => 'checkSlug'],['pass'=>['slug'],'_name'=>'checkSlug']);
    $routes->connect('/:content_category/:slug', ['controller' => 'Pages', 'action' => 'checkSlug'],['pass'=>['content_category','slug',],'_name'=>'checkSlugCategories']);

    /**
     * Connect catchall routes for all controllers.
     *
     * Using the argument `DashedRoute`, the `fallbacks` method is a shortcut for
     *
     * ```
     * $routes->connect('/:controller', ['action' => 'index'], ['routeClass' => 'DashedRoute']);
     * $routes->connect('/:controller/:action/*', [], ['routeClass' => 'DashedRoute']);
     * ```
     *
     * Any route class can be used with this method, such as:
     * - DashedRoute
     * - InflectedRoute
     * - Route
     * - Or your own route class
     *
     * You can remove these routes once you've connected the
     * routes you want in your application.
     */

    Router::prefix('webadmin', function ($routes) {
        $routes->addExtensions(['pdf']);
        
        $routes->connect('/', ['controller' => 'Default', 'action' => 'index']);
        $routes->connect('/upload-media', ['controller' => 'Default', 'action' => 'uploadMedia']);
        $routes->connect('/logout', ['controller' => 'Default', 'action' => 'logout']);
        $routes->connect('/edit-profile', ['controller' => 'Default', 'action' => 'editProfile']);
        $routes->fallbacks(DashedRoute::class);
    });
    $routes->fallbacks(DashedRoute::class);
});

/**
 * If you need a different set of middleware or none at all,
 * open new scope and define routes there.
 *
 * ```
 * Router::scope('/api', function (RouteBuilder $routes) {
 *     // No $routes->applyMiddleware() here.
 *     // Connect API actions here.
 * });
 * ```
 */
