<?php
/**
 * App\src\Controller\Api\WebSettingsController.php
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

class WebSettingsController extends AppController
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

    public function get()
    {
        $websettings = $this->defaultWebSettings;
        $this->set(compact('websettings'));
        $this->set('_serialize','websettings');
    }

}
