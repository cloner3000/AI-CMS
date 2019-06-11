<?php
/**
 * App\src\Controller\Webadmin\ContentsController.php
 * Don't Remove this signature if you love code 
 * Code For Easy
 * =================================================================
 * Author   : Ardiansyah Iqbal
 * Email    : aiqbalsyah@gmail.com
 * Github   : aiqbalsyah
 */
namespace App\Controller\Webadmin;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Routing\Router;
use Cake\Core\Configure;
use Cake\Filesystem\Folder;

class ContentsController extends AppController
{

    private $titleModule = "Konten";
    private $primaryModel = "Contents";


    public function initialize()
    {
        parent::initialize();
        $this->set([
            'titleModule' => $this->titleModule,
            'primaryModel' => $this->primaryModel,
        ]);
    }

    function beforeFilter(\Cake\Event\Event $event){
        parent::beforeFilter($event);
    
        if(isset($this->Security) && $this->request->isAjax() && ($this->action = 'index' || $this->action = 'delete')){
    
            //$this->getEventManager()->off($this->Csrf);
    
        }
        $this->Security->config('validatePost',false);
    
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        if($this->request->is('ajax')){
            $source = $this->{$this->primaryModel};
            $searchAble = [
                $this->primaryModel.'.id',
                $this->primaryModel.'.name',
                'ContentsCategories.name',
            ];
            $data = [
                'source'=>$source,
                'searchAble' => $searchAble,
                'defaultField' => $this->primaryModel.'.id',
                'defaultSort' => 'desc',
                'contain' => [
                    'ContentsCategories'
                ]
                    
            ];
            $dataTable   = $this->Datatables->make($data);  
            $this->set('aaData',$dataTable['aaData']);
            $this->set('iTotalDisplayRecords',$dataTable['iTotalDisplayRecords']);
            $this->set('iTotalRecords',$dataTable['iTotalRecords']);
            $this->set('sColumns',$dataTable['sColumns']);
            $this->set('sEcho',$dataTable['sEcho']);
            $this->set('_serialize',['aaData','iTotalDisplayRecords','iTotalRecords','sColumns','sEcho']);
        }else{
            $titlesubModule = "List ".$this->titleModule;
            $breadCrumbs = [
                Router::url(['action' => 'index']) => $titlesubModule
            ];
            $this->set(compact('breadCrumbs','titlesubModule'));
        }
        
        
    }

    /**
     * View method
     *
     * @param string|null $id Group id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $record = $this->{$this->primaryModel}->get($id, [
            'contain' => [
                'ContentsCategories',
                'ContentsDataAttributes',
                'ContentsDataAttributes.ContentsAttributes',
            ]
        ]);

        $this->set('record', $record);
        $this->set('_serialize',['record']);
        $titlesubModule = "View ".$this->titleModule;
        $breadCrumbs = [
            Router::url(['action' => 'index']) => "List ".$this->titleModule,
            Router::url(['action' => 'view',$id]) => $titlesubModule
        ];
        $this->set(compact('breadCrumbs','titlesubModule'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $record = $this->{$this->primaryModel}->newEntity();
        if ($this->request->is('post')) {
            $data =$this->request->getData();
            $dataToUpload = [];
            $prefix = date('dmyhi');
            $pathFolderAttribute = WWW_ROOT.'assets'.DS.'contents_attributes'.DS.$prefix;
            $saveDir = '/webroot/assets/contents_attributes/'.$prefix;
            foreach($data['contents_data_attributes'] as $key => $cda){
                if($cda['type'] == 'file'){
                    if(!empty($cda['data']['name'])){
                        $extension  = pathinfo($cda['data']['name'], PATHINFO_EXTENSION);
                        $nameFile = rand(1000,200000).'.'.$extension;
                        $saveDir = $saveDir.'/'.$cda['contents_attribute_id'];
                        $pathFolderAttribute = $pathFolderAttribute.DS.$cda['contents_attribute_id'];
                        $data['contents_data_attributes'][$key]['data'] = $saveDir.'/'.$nameFile;
                        $dataToUpload[] = [
                            'data' => $cda['data'],
                            'pathFolderAttribute' => $pathFolderAttribute,
                            'saveDir' => $saveDir,
                            'nameFile' => $nameFile
                        ];
                    }
                }
            }
            $record = $this->{$this->primaryModel}->patchEntity($record, $data);
            if(empty($record->errors())){
                
                foreach($dataToUpload as $key => $cda){
                    $dir = new Folder($cda['pathFolderAttribute'], true, 0755);
                    move_uploaded_file($cda['data']['tmp_name'], $cda['pathFolderAttribute'].DS.$cda['nameFile']);
                }
                if ($this->{$this->primaryModel}->save($record)) {
                    $this->Redis->destroyCacheContentsNodes();
                    $this->Redis->destroyCacheLinksMaps();
                    $this->Flash->success(__($this->Utilities->message_alert($this->titleModule,1)));
    
                    return $this->redirect(['action' => 'index']);
                }
            }
            $this->Flash->error(__($this->Utilities->message_alert($this->titleModule,2)));
        }
        $contentsCategories = $this->{$this->primaryModel}->ContentsCategories->find('list',[
            'conditions' => [
                'status' => 1
            ],
            'order' => [
                'id' => 'ASC',
                'title' => 'ASC'
            ]
        ]);
        $this->set(compact('record','contentsCategories'));
        $titlesubModule = "Tambah ".$this->titleModule;
        $breadCrumbs = [
            Router::url(['action' => 'index']) => "List ".$this->titleModule,
            Router::url(['action' => 'add']) => $titlesubModule
        ];
        $this->set(compact('breadCrumbs','titlesubModule'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Group id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $record = $this->{$this->primaryModel}->get($id, [
            'contain' => [
            ]
        ]);
        $contentsCategories = $this->{$this->primaryModel}->ContentsCategories->find('list',[
            'conditions' => [
                'OR' => [
                    'status' => 1,
                    'id' => $record->contents_category_id
                ]
            ],
            'order' => [
                'id' => 'ASC',
                'title' => 'ASC'
            ]
        ]);
        if (!$this->request->is(['patch', 'post', 'put'])) {
            $contentsAttributes = $this->{$this->primaryModel}->ContentsCategories->ContentsAttributes->find('all',[
                'conditions' => [
                    'contents_category_id' => $record->contents_category_id
                ],
            ])->leftJoinWith('ContentsDataAttributes',function($q) use($id){
                return $q->where([
                    'ContentsDataAttributes.content_id = '.$id,
                ]);
            })->select(
                $this->{$this->primaryModel}->ContentsCategories->ContentsAttributes
            )->select(
                $this->{$this->primaryModel}->ContentsCategories->ContentsAttributes->ContentsDataAttributes
            );
        }
        if ($this->request->is(['patch', 'post', 'put'])) {
            $record = $this->{$this->primaryModel}->patchEntity($record, $this->request->getData());
            $contentsAttributes = $this->{$this->primaryModel}->ContentsCategories->ContentsAttributes->find('all',[
                'conditions' => [
                    'contents_category_id' => $record->contents_category_id
                ],
            ])->leftJoinWith('ContentsDataAttributes',function($q) use($id){
                return $q->where([
                    'ContentsDataAttributes.content_id = '.$id,
                ]);
            })->select(
                $this->{$this->primaryModel}->ContentsCategories->ContentsAttributes
            )->select(
                $this->{$this->primaryModel}->ContentsCategories->ContentsAttributes->ContentsDataAttributes
            );
            $data =$this->request->getData();
            $dataToUpload = [];
            $prefix = date('dmyhi');
            $pathFolderAttribute = WWW_ROOT.'assets'.DS.'contents_attributes'.DS.$prefix;
            $saveDir = '/webroot/assets/contents_attributes/'.$prefix;
            $dataToDelete = [];
            foreach($data['contents_data_attributes'] as $key => $cda){
                if($cda['type'] == 'file'){
                    if(!empty($cda['data']['name'])){
                        $dataToDelete[] = $cda['contents_attribute_id'];
                        $extension  = pathinfo($cda['data']['name'], PATHINFO_EXTENSION);
                        $nameFile = rand(1000,200000).'.'.$extension;
                        $saveDir = $saveDir.'/'.$cda['contents_attribute_id'];
                        $pathFolderAttribute = $pathFolderAttribute.DS.$cda['contents_attribute_id'];
                        $data['contents_data_attributes'][$key]['data'] = $saveDir.'/'.$nameFile;
                        $dataToUpload[] = [
                            'data' => $cda['data'],
                            'pathFolderAttribute' => $pathFolderAttribute,
                            'saveDir' => $saveDir,
                            'nameFile' => $nameFile
                        ];
                    }else{
                        unset($data['contents_data_attributes'][$key]);
                    }
                }else{
                    $dataToDelete[] = $cda['contents_attribute_id'];
                }
            }
            $record = $this->{$this->primaryModel}->patchEntity($record, $data);
            if(empty($record->errors())){
                $this->{$this->primaryModel}->ContentsDataAttributes->deleteAll(['content_id' => $id,'contents_attribute_id IN' => $dataToDelete]);
                foreach($dataToUpload as $key => $cda){
                    $dir = new Folder($cda['pathFolderAttribute'], true, 0755);
                    move_uploaded_file($cda['data']['tmp_name'], $cda['pathFolderAttribute'].DS.$cda['nameFile']);
                }
                if ($this->{$this->primaryModel}->save($record)) {
                    $this->Redis->destroyCacheContentsNodes();
                    $this->Redis->destroyCacheLinksMaps();
                    $this->Flash->success(__($this->Utilities->message_alert($this->titleModule,3)));
    
                    return $this->redirect(['action' => 'index']);
                }
            }
            $this->Flash->error(__($this->Utilities->message_alert($this->titleModule,4)));
        }
        $this->set(compact('record','contentsCategories','contentsAttributes'));
        $titlesubModule = "Edit ".$this->titleModule;
        $breadCrumbs = [
            Router::url(['action' => 'index']) => "List ".$this->titleModule,
            Router::url(['action' => 'edit',$id]) => $titlesubModule
        ];
        $this->set(compact('breadCrumbs','titlesubModule'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Group id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $record = $this->{$this->primaryModel}->get($id);
        if ($this->{$this->primaryModel}->delete($record)) {
            $this->Redis->destroyCacheContentsNodes();
            $this->Redis->destroyCacheLinksMaps();
            $code = 200;
            $message = __($this->Utilities->message_alert($this->titleModule,5));
            $status = 'success';
        } else {
            $code = 99;
            $message = __($this->Utilities->message_alert($this->titleModule,6));
            $status = 'error';
        }
        if($this->request->is('ajax')){
            $this->set('code',$code);
            $this->set('message',$message);
            $this->set('_serialize',['code','message']);
        }else{
            $this->Flash->{$status}($message);
            return $this->redirect(['action' => 'index']);
        }
    }

}
