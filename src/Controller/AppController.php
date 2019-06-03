<?php
/**
 * App\src\Controller\AppController.php
 * Don't Remove this signature if you love code 
 * Code For Easy
 * =================================================================
 * Author   : Ardiansyah Iqbal
 * Email    : aiqbalsyah@gmail.com
 * Github   : aiqbalsyah
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\Auth\DefaultPasswordHasher;
use Cake\Core\Configure;
use Cake\Http\Exception\NotFoundException;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public $contentData = [];
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('RequestHandler', [
            'enableBeforeRedirect' => false,
        ]);
        $this->loadComponent('Flash');
        $this->loadComponent('Security');
        $this->loadComponent('Csrf');
        $this->loadComponent('Datatables');
        $this->loadComponent('Utilities');
        $this->loadComponent('Redis');

        $defaultAppSettings = Configure::read('defaultAppSettings');
        $defaultWebSettings = Configure::read('defaultWebSettings');
        $this->defaultWebSettings = $defaultWebSettings;
        $this->defaultAppSettings = $defaultAppSettings;
        $this->set(compact('defaultAppSettings','defaultWebSettings'));
        if($this->request->prefix == "webadmin"){
            $this->loadComponent('Cookie');

            $this->loadComponent('Acl',[
                'className' => 'Acl.Acl'
            ]);

            $this->loadComponent('Auth', [
                'authenticate' => [
                    'Form' => [
                        'fields' => ['username' => 'username', 'password' => 'password'],
                        'finder' => 'auth'
                    ]
                ],
                'authorize' => [
                    'App.Custom' => ['actionPath'=>'controllers/']
                ],
                'loginAction' => [
                    'controller' => 'Default',
                    'action' => 'index'
                ],
                'loginRedirect' => [
                    'controller' => 'Default',
                    'action' => 'index'
                ],
                'logoutRedirect' => [
                    'controller' => 'Default',
                    'action' => 'index'
                ],
                'unauthorizedRedirect' => [
                    'controller' => 'Error',
                    'action' => 'unauthorized',
                ],
                'authError' => 'Anda tidak diizinkan untuk mengakses halaman ini.',
                'flash' => [
                    'element' => 'error'
                ]
            ]);
            if($this->Auth->user()){
                $this->loadModel('Users');
                $userData = $this->Auth->user();
                if(empty($userData)){
                    $userData = [];
                    $userId = "";
                    $this->userData = [];
                    $this->userId = "";
                }else{
                    $userData = $this->Redis->readCacheUserAuth($userData);
                    $userId = $userData->id;
                    $this->userData = $userData;
                    $this->userId = $userId;
                    $sidebarList = $this->Redis->readCacheSideNav($userData);
                }
                
                $this->set(compact('userData','userId','sidebarList'));
            }
        }else{
            $linksMaps = $this->Redis->readCacheLinksMaps();
            $this->firstPage = $defaultWebSettings['Web.FirstPage'];
            if($this->request->_name == 'home'){
                $this->slug = $this->firstPage;
            }else{
                $this->slug = $this->request->slug;
            }
            $this->loadModel('Covers');
            $covers = $this->Covers->find('all',[
                'conditions' => [
                    'slug' => $this->slug
                ]
            ]);
            $this->loadModel('Contents');
            $content = $this->Contents->find('all',[
                'conditions' => [
                    'Contents.slug' => $this->slug
                ],
                'contain' => [
                    'ContentsCategories'
                ]
            ])->first();
            if(empty($content)){
                throw new NotFoundException();
            }else{
                $this->contentData = $content;
                
            }
            $this->set(compact('linksMaps','covers','content'));
        }
    }

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        if($this->request->prefix == "webadmin"){
            $this->loadModel('Users');
            $cokie = $this->Cookie->read('remember_me_cookie');
            if(!empty($cokie) && empty($this->Auth->user())){
                $username = $cokie['username'];
                $password = $cokie['password'];
                $remember = $cokie['remember'];
                $checkUser  = $this->Users->find('all',[
                    'contain' => [
                        'UserGroups','UserGroups.Aros'
                    ],
                    'conditions' => [
                        'username' => $username,
                        'Users.status' => 1
                    ]
                ])->first();
                $hasher = new DefaultPasswordHasher;
                if($hasher->check($password,$checkUser->password)){
                    $user = $checkUser;
                    $code       = 200;
                    $message    = "Selamat datang kembali". $username; 
                    $this->Auth->setUser($user);
                    $this->Redis->createCacheUserAuth($user);
                    if($remember){
                        $this->Cookie->write('remember_me_cookie', ['username'=>$username,'password'=>$password,'remember'=>$remember], true, '3 weeks');
                    }
                    $userData = $this->Redis->readCacheUserAuth($user);
                    $userId = $userData->id;
                    $this->userData = $userData;
                    $this->userId = $userId;
                    $sidebarList = $this->Redis->readCacheSideNav($userData);
                    $home_url = $this->Redis->readCacheUrlHome($checkUser);
                    $this->set(compact('userData','userId','sidebarList'));
                }
            }
        }
    }
    public function beforeRender(\Cake\Event\Event $event)
    {
        if($this->request->prefix != "webadmin"){
            $this->loadModel('Covers');
            $covers = $this->Covers->find('all',[
                'conditions' => [
                    'slug' => $this->slug
                ]
            ]);
            $this->set(compact('covers'));
        }
    }
}
