<?php
/**
 * App\src\Controller\Webadmin\DefaultController.php
 * Don't Remove this signature if you love code 
 * Code For Easy
 * =================================================================
 * Author   : Ardiansyah Iqbal
 * Email    : aiqbalsyah@gmail.com
 * Github   : aiqbalsyah
 */
namespace App\Controller\Webadmin;

use App\Controller\AppController;
use Cake\Auth\DefaultPasswordHasher;
use Cake\Routing\Router;

class DefaultController extends AppController
{

    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
        if(php_sapi_name() !== 'cli'){
            $this->Auth->allow(['index','logout','editProfile','activitiesLog','uploadMedia','getTokenMedia']);
        }
    }

    function beforeFilter(\Cake\Event\Event $event){
        parent::beforeFilter($event);
    
        if(isset($this->Security)){
            $this->Security->config('validatePost',false);
            $this->Security->config('validateToken',false);
            $this->getEventManager()->off($this->Csrf);
    
        }
    
    }

    public function index()
    {
        if(empty($this->Auth->user())){
            $this->viewBuilder()->layout('login');
            if ($this->request->is('post')) {
                $this->loadModel('Users');
                $username = $this->request->getData('username');
                $password = $this->request->getData('password');
                $remember = $this->request->getData('remember');
                $checkUser  = $this->Users->find('all',[
                    'contain' => [
                        'UserGroups','UserGroups.Aros'
                    ],
                    'conditions' => [
                        'username' => $username,
                        'Users.status' => 1
                    ]
                ])->first();
                $url = "";
                if(!empty($checkUser)){
                    $hasher = new DefaultPasswordHasher;
                    if($hasher->check($password,$checkUser->password)){
                        $code       = 200;
                        $message    = "Selamat datang ". $username; 
                        $url = Router::url($this->Auth->redirectUrl(),true);
                    }else{
                        $code       = 50;
                        $message    = "Kombinasi username dan password salah, silahkan ulangi kembali."; 
                    }
                }else{
                    $code       = 50;
                    $message    = "Username tidak ditemukan "; 
                }
                $user = $checkUser;
                if ($code == 200) {
                    $this->Auth->setUser($user);
                    $this->Redis->createCacheUserAuth($user);
                    if(!empty($remember)){
                        $this->Cookie->write('remember_me_cookie', ['username'=>$username,'password'=>$password,'remember'=>$remember], true, '3 weeks');
                    }else{
                        $this->Cookie->delete('remember_me_cookie');
                    }
                    
                    if(!$this->request->is('ajax')){
                        return $this->redirect([
                            'controller'=> 'Pages',
                            'action' => 'index'
                        ]);
                    }
                } else {
                    if(!$this->request->is('ajax')){
                        $this->Flash->error(__('Username tidak ditemukan'));
                        $this->render('login');
                    }
                }
                $this->set(compact('code','message','url','user'));
                $this->set('_serialize',['code','message','user','url']);
            }else{
               $this->render('login');
            }
            
            
        }else{
            $home_url = $this->Redis->readCacheUrlHome($this->userData);
            return $this->redirect([
                'controller'=> $home_url['controller'],
                'action' => $home_url['action']
            ]);
        }
    }
    public function logout()
    { 
        
        $this->Cookie->delete('remember_me_cookie');
        if(!empty($this->userData)){
            $this->Redis->destroyCacheUrlHome($this->userData);
            $this->Redis->destroyCacheSideNav($this->userData);
            $this->Redis->destroyCacheUserAuth($this->userData);
            $this->redirect($this->Auth->logout());
        }
        $this->redirect('/');
    }
 
    public function editProfile()
    {
        $this->loadModel('Users');
        $id = $this->userId;
        $record = $this->Users->get($id, [
            'contain' => [
                'UserGroups','UserGroups.Aros'
            ]
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $cokie = $this->Cookie->read('remember_me_cookie');
            $data = $this->request->getData();
            $record = $this->Users->patchEntity($record,$data ,[
                'validate'=>'editProfile'
            ]);
            $password = $data['password'];
            if(empty($record->password)){
                unset($record->password);
                $password = $cokie['password'];
            }
            
            if ($this->Users->save($record)) {
                unset($data['password']);
                $this->Cookie->write('remember_me_cookie', ['username' => $data['username'], 'password' => $password], true, '3 weeks');
                $this->Redis->destroyCacheUserAuth($record);
                $this->Redis->createCacheUserAuth($record);
                $this->Flash->success(__('Profile berhasil di update.'));
                $this->autoRender = false;
                return $this->redirect(['action' => 'editProfile']);
            }
            $this->Flash->error(__('Profile gagal diupdate, silahkan ulangi kembali'));
        }
        $this->set(compact('record'));
        $titleModule = "Profile";
        $titlesubModule = "Edit ".$titleModule;
        $breadCrumbs = [
            Router::url(['action' => 'editProfile']) => $titlesubModule
        ];
        $this->set(compact('titleModule','breadCrumbs','titlesubModule'));
    }

    public function activitiesLog()
    {
        $id = $this->userId;
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        $this->request->allowMethod(['get']);
        $this->loadModel('AuditLogs');
        $auditLogs = $this->AuditLogs->find('all',[
            'contain'=>[
                'Users' => [
                    'conditions' => [
                        'user_id' => $id
                    ]
                ]
            ],
            'order'=>['AuditLogs.timestamp' => 'DESC'],
            'conditions' => [
                
            ]
                    
        ]);
        if($this->request->is('ajax')){
            $auditLogs->where('DATE(timestamp) >= DATE_SUB(NOW(), INTERVAL 10 DAY)');
        }
        $logs = [];
        foreach($auditLogs as $key => $auditLog){
            $time =new Time($auditLog->timestamp);
            $time = $time->timeAgoInWords(['accuracy' => 'day','end'=>'+7 day']);
            $logs[$key] = [
                'time' => $time,
                'description' => 'Has been '.$auditLog->type. ' '. $auditLog->source,
                'id' => $auditLog->id
            ];
        }
        $code = 200;
        $message = __('Get data activity logs');
        $status = 'success';
        $this->set('code',$code);
        $this->set('message',$message);
        $this->set('auditLogs',$logs);
        $titleModule = "Activities Logs";
        $titlesubModule = "List ".$titleModule;
        $breadCrumbs = [
            Router::url(['action' => 'activitiesLogs']) => $titlesubModule
        ];
        $this->set(compact('titleModule','breadCrumbs','titlesubModule'));
        if($this->request->is('ajax')){
            $this->set('_serialize',['code','message','auditLogs']);
        }
    }

    public function uploadMedia()
    {
        $data = $this->request->data['file'];
        $uploadFolder = WWW_ROOT.DS.'img'.DS.'media'.DS.$data['name'];
        $saveDir = '/img/media/'.$data['name'];
        $extension  = pathinfo($data['name'], PATHINFO_EXTENSION);
        move_uploaded_file($data['tmp_name'],$uploadFolder);
        $url = Router::url($saveDir,true);
        $data_array = [
            'default' => $url
        ];
        $this->set('data_array',$data_array);
        $this->set('_serialize','data_array');
        $this->RequestHandler->renderAs($this, 'json');
    }

    public function getTokenMedia()
    {
        $this->autoRender =false;
        echo "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzZXJ2aWNlcyI6eyJja2VkaXRvci1jb2xsYWJvcmF0aW9uIjp7InBlcm1pc3Npb25zIjp7IioiOiJ3cml0ZSJ9fX0sInVzZXIiOnsiZW1haWwiOiJjb0BleGFtcGxlLmNvbSIsIm5hbWUiOiJUcmF2aXMgQnJvd24iLCJpZCI6IjJiMjRjOThkLTJmOWItNDIyNi04ZDcyLWU3Y2E0MjVlMzRiOSJ9LCJpc3MiOiJyYzFERnVGcEhxY1IzTWFoNnkwZSIsImp0aSI6IkRlVUdzMTNQdk9NeUM4blNxaXBuZ0NSODhnajlhajNFIiwiaWF0IjoxNTI0MTM4OTU0fQ.FcaCe8xn505R4TgbvefOmx0EogbMFwyiwKJPb5y8wt8";
    }

}