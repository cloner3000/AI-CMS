<?php
/**
 * App\src\Controller\Api\LinksController.php
 * Don't Remove this signature if you love code 
 * Code For Easy
 * =================================================================
 * Author   : Ardiansyah Iqbal
 * Email    : aiqbalsyah@gmail.com
 * Github   : aiqbalsyah
 */
namespace App\Controller\Api;

use App\Controller\AppController;
use Cake\Routing\Router;
use Cake\Utility\Security;
use Cake\Http\Exception\NotFoundException;

class LinksController extends AppController
{

    public function initialize()
    {
        parent::initialize();
    }
    function beforeFilter(\Cake\Event\Event $event){
        parent::beforeFilter($event);
        $this->Security->config('validatePost',false);
        $this->getEventManager()->off($this->Csrf);
     
    }

    public function get($type = null)
    {
        $linksMaps = $this->Redis->readCacheLinksMaps();
        if($type != null){
            if(!empty($linksMaps[$type])){
                $linksMaps = $linksMaps[$type];
                $links = $this->Utilities->linksList($linksMaps);
            }else{
                throw new NotFoundException();
            }
        }else{
            $links = [];
            foreach($linksMaps as $key => $r){
                $links[$key] = $this->Utilities->linksList($r);
            }
        }
        $this->set(compact('links'));
        $this->set('_serialize','links');
    }

}
