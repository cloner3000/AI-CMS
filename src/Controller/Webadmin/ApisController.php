<?php
/**
 * App\src\Controller\Webadmin\ApisController.php
 * Don't Remove this signature if you love code 
 * Code For Easy
 * =================================================================
 * Author   : Ardiansyah Iqbal
 * Email    : aiqbalsyah@gmail.com
 * Github   : aiqbalsyah
 */
namespace App\Controller\Webadmin;

use App\Controller\AppController;
use Cake\Routing\Router;
use Cake\Utility\Security;

class ApisController extends AppController
{

    public function initialize()
    {
        parent::initialize();
        $this->Auth->allow([
            'getToken',
            'uploadMedia'
        ]);
    }
    function beforeFilter(\Cake\Event\Event $event){
        parent::beforeFilter($event);
            $this->Security->config('validatePost',false);
            $this->getEventManager()->off($this->Csrf);
     
    }

    public function getToken(){
        $this->autoRender = false;
        $key = 'thisScriptJu5tF0RTest123thisScriptJu5tF0RTest123';
        $value = 'valueSampleOfTestvalueSampleOfTestvalueSampleOfTest'.rand(10000,300000);
        $result = Security::hash($value, 'sha1', true);
        echo $result;
    }

    public function uploadMedia()
    {
        $data = $this->request->data['file'];
        $uploadFolder = WWW_ROOT.'assets'.DS.'img'.DS.'media/'.$data['name'];
        $saveDir = '/assets/img/media/'.$data['name'];
        $extension  = pathinfo($data['name'], PATHINFO_EXTENSION);
        move_uploaded_file($data['tmp_name'],$uploadFolder);
        $url = Router::url($saveDir,true);
        return $this->response->withType('application/json')->withStringBody(json_encode(['default' => $url]));
    }

}
