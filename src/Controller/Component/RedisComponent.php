<?php
/**
 * App\src\Controller\Component\RedisComponent.php
 * Don't Remove this signature if you love code 
 * Code For Easy
 * =================================================================
 * Author   : Ardiansyah Iqbal
 * Email    : aiqbalsyah@gmail.com
 * Github   : aiqbalsyah
 */
namespace App\Controller\Component;

use Cake\ORM\TableRegistry;
use Cake\Controller\Component;
use Cake\Cache\Cache;
use Redis;

Class RedisComponent extends Component
{
    public $components = ['Auth','Acl.Acl'];
    public function createCacheHomeUrl($userData)
    {
        $aro_id = $userData->user_group->aro->id;
        $model = "UserGroups";
        $this->Acos = TableRegistry::get('Acos');
        $acos = $this->Acos->find('all')
        ->where(
            [
                'UserPermissions._read' => 1,
                'Acos.status' => 0,
                'Acos.parent_id' => 5,
            ]
        )
        ->select([
                'Acos__id' => 'Acos.id', 
                'Acos__alias' => 'Acos.alias', 
            ]
        )
        ->join([
            [
                'table' => 'aros_acos',
                'alias' => 'UserPermissions',
                'type' => 'LEFT',
                'conditions' => 'Acos.id = (UserPermissions.aco_id) AND UserPermissions.aro_id='.$aro_id,
            ],[
                'table' => 'aros',
                'alias' => 'UserAros',
                'type' => 'LEFT',
                'conditions' => 'UserAros.id = (UserPermissions.aro_id) AND UserAros.model = "UserGroups"',
            ]
        ])
        ->order('Acos.sort ASC')
        ->first();
        $acosChild = $this->Acos->find('all')
        ->where(
            [
                'UserPermissions._read' => 1,
                'Acos.status' => 0,
                'Acos.parent_id' => $acos->id
            ]
        )
        ->select([
                'Acos__id' => 'Acos.id', 
                'Acos__alias' => 'Acos.alias', 
            ]
        )
        ->join([
            [
                'table' => 'aros_acos',
                'alias' => 'UserPermissions',
                'type' => 'LEFT',
                'conditions' => 'Acos.id = (UserPermissions.aco_id) AND UserPermissions.aro_id='.$aro_id,
            ],[
                'table' => 'aros',
                'alias' => 'UserAros',
                'type' => 'LEFT',
                'conditions' => 'UserAros.id = (UserPermissions.aro_id) AND UserAros.model = "'.$model.'"',
            ]
        ])
        ->order('Acos.sort ASC')
        ->first();
        $home_url = ['controller'=>$acos->alias,'action'=>$acosChild->alias];
        Cache::write('home_url_'.$userData->id, $home_url);
        return $home_url;
    }

    public function readCacheUrlHome($userData)
    {
        $home_url = Cache::read('home_url_'.$userData->id);
        if(empty($home_url)){
            return $this->createCacheHomeUrl($userData);
        }else{
            return $home_url;
        }
    }

    public function destroyCacheUrlHome($userData)
    {
        if(!empty($userData->id)){
            Cache::delete('home_url_'.$userData->id);
        }
    }

    public function createCacheSideNav($userData)
    {
        $aro_id = $userData->user_group->aro->id;
        $model = "UserGroups";
        $this->Acos = TableRegistry::get('Acos');
        $sidebarList = $this->Acos->find('list',[
            'valueField' => 'alias',
            'keyField' => 'parent_alias'
        ])->where(
            [
                'UserPermissions._read' => 1,
                'Acos.parent_id' => 5,
                'Acos.status' => 0,
            ]
        )
        
        ->select([
                'Acos__parent_alias' => 'Acos.alias', 
                'Acos__alias' => '(SELECT AcosChild.alias as AcosChild__alias FROM acos as AcosChild WHERE AcosChild.parent_id = Acos.id ORDER BY AcosChild.sort ASC limit 1)',
            ]
        )
        ->join([
            [
                'table' => 'aros_acos',
                'alias' => 'UserPermissions',
                'type' => 'LEFT',
                'conditions' => 'Acos.id = (UserPermissions.aco_id) AND UserPermissions.aro_id='.$aro_id,
            ],[
                'table' => 'aros',
                'alias' => 'UserAros',
                'type' => 'LEFT',
                'conditions' => 'UserAros.id = (UserPermissions.aro_id) AND UserAros.model = "'.$model.'"',
            ]
        ])
        ->order('Acos.sort ASC')->toArray();
        Cache::write('sidebar_'.$userData->id, $sidebarList);
        return $sidebarList;
    }

    public function readCacheSideNav($userData)
    {
        $sidebarList = Cache::read('sidebar_'.$userData->id);
        if(empty($sidebarList)){
            return $this->createCacheSideNav($userData);
        }else{
            return $sidebarList;
        }
    }

    public function destroyCacheSideNav($userData)
    {

        Cache::delete('sidebar_'.$userData->id);
    }

    public function createCacheUserAuth($user)
    {
        Cache::write('auth_user_'.$user->id, $user);
        return $user;
    }

    public function readCacheUserAuth($user)
    {
        $auth = Cache::read('auth_user_'.$user->id);
        if(empty($auth)){
            return $this->createCacheUserAuth($user);
        }else{
            if($user != $auth){
                $this->Auth->setUser($auth);
                return $auth;
            }
            return $auth;
        }
    }

    public function destroyCacheUserAuth($user)
    {
        Cache::delete('auth_user_'.$user->id);
    }

    public function createCacheAppSettings()
    {
        $this->AppSettings = TableRegistry::get('AppSettings');
        $defaultAppSettings = $this->AppSettings->find('list',[
            'keyField' => 'keyField',
            'valueField' => 'valueField'
        ])->toArray();
        Cache::write('app_settings', $defaultAppSettings);
        return $defaultAppSettings;
    }

    public function readCacheAppSettings()
    {
        $default = Cache::read('app_settings');
        if(empty($default)){
            return $this->createCacheAppSettings();
        }else{
            return $default;
        }
    }

    public function destroyCacheAppSettings()
    {
        Cache::delete('app_settings');
    }

    public function createCacheWebSettings()
    {
        $this->WebSettings = TableRegistry::get('WebSettings');
        $defaultWebSettings = $this->WebSettings->find('list',[
            'keyField' => 'keyField',
            'valueField' => 'valueField'
        ])->toArray();
        Cache::write('web_settings', $defaultWebSettings);
        return $defaultWebSettings;
    }

    public function readCacheWebSettings()
    {
        $default = Cache::read('web_settings');
        if(empty($default)){
            return $this->createCacheWebSettings();
        }else{
            return $default;
        }
    }

    public function destroyCacheWebSettings()
    {
        Cache::delete('web_settings');
    }

    public function createCacheLinksMaps()
    {
        $this->LinksMaps = TableRegistry::get('LinksMaps');
        $defaultLinksMaps = $this->LinksMaps->find('all',[
            'conditions' => [
                'LinksMaps.status' => 1
            ],
            'contain' => [
                'Links' => function($q){
                    $q->find('threaded')
                    ->contain([
                        'Contents' => [
                            'joinType' => 'left'
                        ]
                    ])->order(['Links.sort' =>'ASC'])
                    ->where(['Links.status' => 1]);
                    return $q;
                }
            ]
        ])->toArray();
        $links_maps = [];
        foreach($defaultLinksMaps as $key => $r){
            $links_maps[$r['name']] = $r['links'];
        }
        Cache::write('links_maps', $links_maps);
        return $links_maps;
    }

    public function readCacheLinksMaps()
    {
        $default = Cache::read('links_maps');
        if(empty($default)){
            return $this->createCacheLinksMaps();
        }else{
            return $default;
        }
    }

    public function destroyCacheLinksMaps()
    {
        Cache::delete('links_maps');
    }

    public function createCacheContentsNodes()
    {
        $this->ContentsNodes = TableRegistry::get('Contents');
        $contentsNodes = $this->ContentsNodes->find('all',[
            'conditions' => [
                'Contents.status' => 1,
                'Contents.contents_category_id' => 2,
            ],
        ])->toArray();
        Cache::write('contents_nodes', $contentsNodes);
        return $contentsNodes;
    }

    public function readCacheContentsNodes()
    {
        $default = Cache::read('contents_nodes');
        if(empty($default)){
            return $this->createCacheContentsNodes();
        }else{
            return $default;
        }
    }

    public function destroyCacheContentsNodes()
    {
        Cache::delete('contents_nodes');
    }

    public function createCacheAcos($user,$path,$url)
    {
        // dd($user['Users']);
        $rights = $this->Acl->check(["UserGroups" => $user['Users']->user_group],$path);
        
        if($rights == true){
            $method = "allow";
        }else{
            $method = "disallow";
        }
        $url = str_replace("/",".",$url);
        Cache::write('acos_rights.'.$user['Users']->id.$url, $method);
        return $rights;
    }

    public function readCacheAcos($user,$path,$url)
    {
        $url = str_replace("/",".",$url);
        $default = Cache::read('acos_rights.'.$user['Users']->id.$url);
        if((string)$default === ""){
            return $this->createCacheAcos($user,$path,$url);
        }else{
            if($default == "allow"){
                return true;
            }else{
                return false;
            }
        }
    }

    public function deleteCacheAcos($user,$url)
    {
        $url = strtolower(str_replace("/",".",str_replace("controllers","",$url)));
        Cache::delete('acos_rights.'.$user.$url);
    }

    public function deleteAllCacheAcos($user){
        $this->_Redis = new Redis();
        $this->_Redis->connect('127.0.0.1', 6379);
        $keys = $this->_Redis->keys(env('APP_NAME').'cake_acos_rights_'.$user.'*');
        foreach($keys as $key){
            $this->_Redis->delete($key);
        }
        return true;
    } 
    public function clearAcos(){
        $this->_Redis = new Redis();
        $this->_Redis->connect('127.0.0.1', 6379);
        $keys = $this->_Redis->keys(env('APP_NAME').'acos_rights_*');
        $keys = array_merge($keys,$this->_Redis->keys(env('APP_NAME').'sidebar_*'));
        $keys = array_merge($keys,$this->_Redis->keys(env('APP_NAME').'home_url_*'));
        $this->_Redis->delete($keys);
        
        return true;
    }
}