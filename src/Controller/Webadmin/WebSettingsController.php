<?php
/**
 * App\src\Controller\Webadmin\WebSettingsController.php
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

/**
 * WebSettings Controller
 *
 * @property \App\Model\Table\WebSettingsTable $webSettings
 *
 * @method \App\Model\Entity\AppSetting[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class WebSettingsController extends AppController
{

    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Imagine');
    }
    function beforeFilter(\Cake\Event\Event $event){
        parent::beforeFilter($event);
    
        if(isset($this->Security)  && ($this->action = 'index' || $this->action = 'delete')){
            $this->Security->config('validatePost',false);
            //$this->getEventManager()->off($this->Csrf);
     
        }
    
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $webSettings = $this->WebSettings->find('all',[
            'conditions' => [
                'status' => 0
            ]
        ]);
        $settings = [];
        foreach($webSettings as $key => $r){
            $settings += [str_replace(".","_",$r->keyField) => $r];
        }

        $webSettings = $settings;
        $dataSave = $this->WebSettings->newEntity();
        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->request->data;
            $dataSave = $this->WebSettings->patchEntity($dataSave,$data);
            if(empty($dataSave->errors())){
                foreach($data as $w => $d){
                    $id = $webSettings[$w]['id'];
                    $dataOriginal = $this->WebSettings->get($id);
                    $valueSave = "";
                    if($w == 'Web_Logo'){
                        $source = $d['tmp_name'];
                        if(!empty($source)){
                            $uploadFolder = WWW_ROOT.DS.'img'.DS.'logo';
                            $saveDir = '/webroot/assets/uploaded_data/img/logo';
                            $extension  = pathinfo($d['name'], PATHINFO_EXTENSION);
                            $tmp        = $uploadFolder.'.'. $extension;
                            $saveDir    = $saveDir.'.'.$extension;
                            $width  = 100;
                            $height = 80;
                            $this->Imagine->gdImageSave($source, $tmp,['width'=>$width,'height'=>$height]);
                            $valueSave = $saveDir;
                        }
                    }elseif($w == 'Web_Favico'){
                        $source = $d['tmp_name'];
                        if(!empty($source)){
                            $uploadFolder = WWW_ROOT.DS.'img'.DS.'favico';
                            $saveDir = '/webroot/assets/uploaded_data/img/favico';
                            $extension  = pathinfo($d['name'], PATHINFO_EXTENSION);
                            $tmp        = $uploadFolder.'.'. $extension;
                            $saveDir    = $saveDir.'.'.$extension;
                            $width  = 30;
                            $height = 30;
                            $this->Imagine->gdImageCropAndSave($source, $tmp,['width'=>$width,'height'=>$height]);
                            $valueSave = $saveDir;
                            $dSource = $source;
                            $uploadFolder = WWW_ROOT.'assets'.DS.'uploaded_data'.DS.'img'.DS.'apple-touch-icon-144x144-precomposed';
                            $saveDir = '/webroot/assets/uploaded_data/img/apple-touch-icon-144x144-precomposed';
                            $extension  = pathinfo($d['name'], PATHINFO_EXTENSION);
                            $tmp        = $uploadFolder.'.'. $extension;
                            $saveDir    = $saveDir.'.'.$extension;
                            $width  = 144;
                            $height = 144;
                            $this->Imagine->gdImageCropAndSave($dSource, $tmp,['width'=>$width,'height'=>$height]);

                            
                            $dSource = $source;
                            $uploadFolder = WWW_ROOT.'assets'.DS.'uploaded_data'.DS.'img'.DS.'apple-touch-icon-120x120-precomposed';
                            $saveDir = '/webroot/assets/uploaded_data/img/apple-touch-icon-120x120-precomposed';
                            $extension  = pathinfo($d['name'], PATHINFO_EXTENSION);
                            $tmp        = $uploadFolder.'.'. $extension;
                            $saveDir    = $saveDir.'.'.$extension;
                            $width  = 120;
                            $height = 120;
                            $this->Imagine->gdImageCropAndSave($dSource, $tmp,['width'=>$width,'height'=>$height]);

                            $dSource = $source;
                            $uploadFolder = WWW_ROOT.'assets'.DS.'uploaded_data'.DS.'img'.DS.'apple-touch-icon-114x114-precomposed';
                            $saveDir = '/webroot/assets/uploaded_data/img/apple-touch-icon-114x114-precomposed';
                            $extension  = pathinfo($d['name'], PATHINFO_EXTENSION);
                            $tmp        = $uploadFolder.'.'. $extension;
                            $saveDir    = $saveDir.'.'.$extension;
                            $width  = 114;
                            $height = 114;
                            $this->Imagine->gdImageCropAndSave($dSource, $tmp,['width'=>$width,'height'=>$height]);

                            $dSource = $source;
                            $uploadFolder = WWW_ROOT.'assets'.DS.'uploaded_data'.DS.'img'.DS.'apple-touch-icon-72x72-precomposed';
                            $saveDir = '/webroot/assets/uploaded_data/img/apple-touch-icon-72x72-precomposed';
                            $extension  = pathinfo($d['name'], PATHINFO_EXTENSION);
                            $tmp        = $uploadFolder.'.'. $extension;
                            $saveDir    = $saveDir.'.'.$extension;
                            $width  = 72;
                            $height = 72;
                            $this->Imagine->gdImageCropAndSave($dSource, $tmp,['width'=>$width,'height'=>$height]);
                            

                            $dSource = $source;
                            $uploadFolder = WWW_ROOT.'assets'.DS.'uploaded_data'.DS.'img'.DS.'apple-touch-icon-57x57-precomposed';
                            $saveDir = '/webroot/assets/uploaded_data/img/apple-touch-icon-57x57-precomposed';
                            $extension  = pathinfo($d['name'], PATHINFO_EXTENSION);
                            $tmp        = $uploadFolder.'.'. $extension;
                            $saveDir    = $saveDir.'.'.$extension;
                            $width  = 57;
                            $height = 57;
                            $this->Imagine->gdImageCropAndSave($dSource, $tmp,['width'=>$width,'height'=>$height]);

                        }
                    }elseif($w == 'Google_Secret_File'){
                        $source = $d['tmp_name'];
                        if(!empty($source)){
                            $uploadFolder = WWW_ROOT.DS.'google_utils'.DS.'analytics';
                            $extension  = pathinfo($d['name'], PATHINFO_EXTENSION);
                            if(file_exists($uploadFolder.'.json')){
                                unlink($uploadFolder.'.json');
                            }
                            if(file_exists($uploadFolder.'.p12')){
                                unlink($uploadFolder.'.p12');
                            }
                            $saveDir = '/webroot/google_utils/analytics';
                            $tmp        = $uploadFolder.'.'. $extension;
                            $saveDir    = $saveDir.'.'.$extension;
                            move_uploaded_file($source, $tmp);
                            $valueSave = $saveDir;
                        }
                    }elseif($w == 'Google_Robots'){
                        $source = $d['tmp_name'];
                        if(!empty($source)){
                            $uploadFolder = WWW_ROOT.DS.'robots';
                            if(file_exists($uploadFolder.'txt')){
                                unlink($uploadFolder.'.txt');
                            }
                            $saveDir = '/webroot/robots';
                            $extension  = pathinfo($d['name'], PATHINFO_EXTENSION);
                            $tmp        = $uploadFolder.'.'. $extension;
                            $saveDir    = $saveDir.'.'.$extension;
                            move_uploaded_file($source, $tmp);
                            $valueSave = $saveDir;
                        }
                    }else{
                        $valueSave = $d;
                    }
                    if(!empty($valueSave)){
                        $dataUpdate['id'] = $id;
                        $dataUpdate['valueField'] = $valueSave;
                        $this->WebSettings->save($this->WebSettings->patchEntity($dataOriginal,$dataUpdate,['validate'=>false]));
                    }
                }
                $this->Redis->destroyCacheWebSettings();
                $this->Flash->success(__('The web setting has be saved.'));
                $this->redirect(['action'=>'index']);
            }else{
                $this->Flash->error(__('The web setting could not be saved. Please, try again.'));
            }
            
        }
        $titleModule = "Web Settings";
        $titlesubModule = "Edit ".$titleModule;
        $breadCrumbs = [
            Router::url(['action' => 'index']) => "Edit ".$titleModule,
        ];
        $this->set(compact('titleModule','breadCrumbs','titlesubModule','webSettings','dataSave'));
    }
}
