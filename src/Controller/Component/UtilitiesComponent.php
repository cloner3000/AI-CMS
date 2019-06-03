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

    public function contentLoader($content,$request)
    {
        if($content->contents_category_id == 1){
            $controller = '\App\Controller\\'.'Pages'.'Controller';
            $action     = 'loadPage';
        }elseif($content->contents_category_id == 2){
            $explodeParams = explode(":",$content->node);
            $controller = !empty($explodeParams[0]) ? $explodeParams[0] : '';
            $action = !empty($explodeParams[1]) ? $explodeParams[1] : 'index';
            // dd($controller);
            if(empty($controller)){
                throw new NotFoundException();
            }else{
                $controller = "\App\Controller\\".$controller.'Controller';
                $action     = $action;
            }
        }else{
            $controller = '\App\Controller\\'.'Pages'.'Controller';
            $action     = 'loadContentCategoryPage';
        }
        // dd($controller);
        $controllerLoader = new $controller;
        return $controllerLoader;
    }
}

?>