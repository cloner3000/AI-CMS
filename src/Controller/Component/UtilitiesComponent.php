<?php
/**
 * App\src\Controller\Component\UtilitiesComponent.php
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
use Cake\Controller\Controller;
use Cake\Core\Configure;
use Cake\Routing\Router;

class UtilitiesComponent extends Component
{
    public $components = ['Auth','Acl.Acl'];
    
    public function message_alert($title,$no = 1){
        $array = [
            1 => 'Data '.$title.' berhasil disimpan',
            'Data '.$title.' gagal disimpan',
            'Data '.$title.' berhasil diedit',
            'Data '.$title.' gagal diedit',
            'Data '.$title.' berhasil dihapus',
            'Data '.$title.' gagal dihapus'
        ];
        return $array[$no];
    }

    public function monthArray()
    {
        $array = array (1 =>   'Januari',
                    'Februari',
                    'Maret',
                    'April',
                    'Mei',
                    'Juni',
                    'Juli',
                    'Agustus',
                    'September',
                    'Oktober',
                    'November',
                    'Desember'
                );
        return $array;
    }
    
    public function indonesiaDateFormat($tanggal,$time = false,$toIndonesia = true)
    {
        $bulan = $this->monthArray();
        $datepick = explode(" ", $tanggal);
        $split = explode("-", $datepick[0]);
        if($toIndonesia == true){
            if($time == false){
                return $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];
            }else{
                return $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0]. ' ' . $datepick[1];
            }
        }else{
            if($time == false){
                return $split[2] . '-' . $split[1]. '-' . $split[0];
            }else{
                return $split[2] . '-' . $split[1] . '-' . $split[0].' '.$datepick[1];
            }
        }
        
    }  

    public function generalitationDateFormat($tanggal,$time = false)
    {
        $datepick = explode(" ", $tanggal);
        $split = explode("-", $datepick[0]);
        if($time){
            return $split[2] . '-' . $split[1] . '-' . $split[0]. " " . $datepick[1]; 
        }else{
            return $split[2] . '-' . $split[1] . '-' . $split[0]; 
        }
           
    }
    
	public function generalitationNumber($number){
        return str_replace(",","",$number);
    }

    public function treeToListSitemaps($result){
        $data = [];
        foreach($result as $key=>$r){
            
            if(!empty($r->children)){
                $data[$r->name] = $this->treeToListSitemaps($r->children);
            }else{
                $data[$r->id] = $r->name;
            }
        }
        return $data;
    }

    public function contentsLists($result){
        $data = [];
        foreach($result as $key=>$r){
            if(!empty($r->contents)){
                $data[$r->title] = [];
                foreach($r->contents as $kc => $content){
                    $data[$r->title][$content->id] = $content->title;
                }
            }
        }
        return $data;
    }

    public function urlContentGenerator($content)
    {
        if($content->contents_category_id == 2){
            $explodeParams = explode(":",$content->node);
            $controller = !empty($explodeParams[0]) ? $explodeParams[0] : '';
            $action = !empty($explodeParams[1]) ? $explodeParams[1] : 'index';
            $url = Router::url(['controller'=>$controller,'action'=>$action],true);
        }elseif($content->contents_category_id == 1){
            $url = Router::url(['_name' => 'checkSlug','slug'=>$content->slug],true);
        }else{
            $url = Router::url(['_name' => 'checkSlugCategories','slug'=>$content->slug,'content_category' => $content->contents_category->slug],true);
        }
        return $url;
    }

    public function linksList($links)
    {
        $newLinks = [];
        foreach($links as $key => $r){
            $link = $this->generateUrlMenu($r);
            $newLinks[$key] = [
                'title' => $r['title'],
                'url' => $link,
                'target' => $r['target'],
            ];
            if(empty($r['children'])){
                $newLinks[$key]['children'] = null;
            }else{
                $newLinks[$key]['children'] = $this->linksList($r['children']);
            }
        }
        return $newLinks;
    }

    public function generateUrlMenu($link)
    {
        $url = "";
        if($link['_type']=="CONTENT"):
            $url = $link['content']['slug'];
        elseif($link['_type'] == 'HEADER'):
            $url = '#';
        else:  
            if(filter_var($link['url'], FILTER_VALIDATE_URL) == FALSE){
                $url = $link['url'];
            }else{
                $url = $link['url'];
            }
        endif;
        return $url;
    }
}

?>