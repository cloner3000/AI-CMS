<?php
/**
 * App\src\Controller\PagesController.php
 * Don't Remove this signature if you love code 
 * Code For Easy
 * =================================================================
 * Author   : Ardiansyah Iqbal
 * Email    : aiqbalsyah@gmail.com
 * Github   : aiqbalsyah
 */
namespace App\Controller;

use Cake\Core\Configure;
use Cake\Http\Exception\ForbiddenException;
use Cake\Http\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
use Cake\Controller\Controller;
use Cake\Event\Event;

/**
 * Static content controller
 *
 * This controller will render views from Template/Pages/
 *
 * @link https://book.cakephp.org/3.0/en/controllers/pages-controller.html
 */
class PagesController extends AppController
{
    private $content = [];
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);

    }

    public function checkSlug()
    {
        $this->loadModel('Contents');
        $content = $this->contentData;
        if(empty($content)){
            throw new NotFoundException();
        }else{
            $this->content = $content;
            if($content->contents_category_id == 1){
                $this->loadPage($content);
            }else{
                $this->loadContentCategoryPage($content);
            }
            
        }
    }


    public function loadContentCategoryPage($content){
        $this->render('loadPageCategory');
    }

    public function loadPage($content){
        $this->render('loadPage');
    }

    public function sitemap()
    {
        $this->loadModel('Contents');
        $url = [];
        //HOME CONTENT FOR PRIORITY 1//
        $homeContent = $this->Contents->find('all',[
            'conditions' => [
                'Contents.status' => 1,
                'Contents.slug' => $this->defaultWebSettings['Web.FirstPage']
            ],
            'contain' => [
                'ContentsCategories'
            ]
        ])->first();
        if(!empty($homeContent)){
            $url[] = [
                'loc' => $this->Utilities->urlContentGenerator($homeContent),
                'lastmod' => (!empty($homeContent->modified) ? $homeContent->modified->format('Y-m-d') : $homeContent->created->format('Y-m-d')),
                'changefreq' => 'daily',
                'priory' => 1,
            ];
        }
        $contents = $this->Contents->find('all',[
            'conditions' => [
                'Contents.status' => 1,
                'Contents.slug !=' => $this->defaultWebSettings['Web.FirstPage']
            ],
            'contain' => [
                'ContentsCategories'
            ],
            'order' => [
                'Contents.contents_category_id' => 'ASC'
            ]
        ]);
        foreach($contents as $key=> $content){
            $url[] = [
                'loc' => $this->Utilities->urlContentGenerator($content),
                'lastmod' => (!empty($content->modified) ? $content->modified->format('Y-m-d') : $content->created->format('Y-m-d')),
                'changefreq' => 'daily',
                'priory' => 0.8,
            ];
        }
        $this->set('_rootNode', 'urlset');
        $this->set([
            // Define an attribute on the root node.
            '@xmlns' => 'http://www.sitemaps.org/schemas/sitemap/0.9',
            'url' => $url
        ]);
        $this->set('_serialize', ['@xmlns', 'url']);
    }
}
