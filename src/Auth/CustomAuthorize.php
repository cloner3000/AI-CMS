<?php
/**
 * App\src\Auth\CustomAuthorize.php
 * Don't Remove this signature if you love code 
 * Code For Easy
 * =================================================================
 * Author   : Ardiansyah Iqbal
 * Email    : aiqbalsyah@gmail.com
 * Github   : aiqbalsyah
 */
namespace App\Auth;

use Cake\Auth\BaseAuthorize;
use Cake\Http\ServerRequest;
use Cake\Utility\Inflector;
use Cake\Routing\Router;
use App\Controller\Component\RedisComponent;
use Cake\Controller\ComponentRegistry;

class CustomAuthorize extends BaseAuthorize
{

    public function authorize($user, ServerRequest $request)
    {
        //Load Cake Component//
        $component = new ComponentRegistry();
        //Load Redis Component//
        $this->UtilitiesCom = new RedisComponent($component);

        $this->request = $request;
        $params = $this->request->params;
        $params += ['_base' => false];
        $url = Router::url($params);
        $params = Router::parse($url);
        $plugin = empty($params['plugin']) ? null : Inflector::camelize($params['plugin']) . '/';
        $prefix = empty($params['prefix']) ? null : $params['prefix'] . '/';
        $path = '/:plugin/:prefix/:controller/:action';
		$path = str_replace(
			[':controller', ':action', ':plugin/', ':prefix/'],
			[Inflector::camelize($params['controller']), $params['action'], $plugin, $prefix],
			'controllers/' . $path
		);
		$path = str_replace('//', '/', $path);
		$path = trim($path, '/');
        $return = $this->UtilitiesCom->readCacheAcos(['Users' => $user],$path,$url);
        return $return;
    }
}