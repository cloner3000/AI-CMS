<?php
/**
 * App\src\View\Helper\UtilitiesHelper.php
 * Don't Remove this signature if you love code 
 * Code For Easy
 * =================================================================
 * Author   : Ardiansyah Iqbal
 * Email    : aiqbalsyah@gmail.com
 * Github   : aiqbalsyah
 */
namespace App\View\Helper;

use Cake\View\Helper;

class UtilitiesHelper extends Helper
{
    public $helpers = ['Url'];
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
    
    public function sideBarArrayCheck( array $array, $keys ) {
        $count = 0;
        if ( ! is_array( $keys ) ) {
            $keys = func_get_args();
            array_shift( $keys );
        }
        foreach ( $keys as $key ) {
            if ( isset( $array[$key] ) || array_key_exists( $key, $array ) ) {
                $count ++;
            }
        }
    
        return $count;
    }

    public function labelSettings($label){
        return str_replace(".","",$label);
    }

    public function statusLabel($label){
        if($label){
            return "<span class=\"kt-badge kt-badge--primary  kt-badge--inline kt-badge--pill\"> ENABLE</span>";
        }else{
            return "<span class=\"kt-badge kt-badge--danger  kt-badge--inline kt-badge--pill\"> DISABLED</span>";
        }
    }

    public function statusLabelAktif($label){
        if($label){
            return "<span class=\"kt-badge kt-badge--primary  kt-badge--inline kt-badge--pill\">AKTIF</span>";
        }else{
            return "<span class=\"kt-badge kt-badge--danger  kt-badge--inline kt-badge--pill\">TIDAK AKTIF</span>";
        }
    }

    public function generateUrlAsset($img_dir=null,$img,$prefix = null,$img_not_found = null)
    {
		//full_path_dir
        $baseDir = "";
        if($img_dir == null){
            $img_dir = $img;
            if(substr($img_dir,0,1) == "/" || substr($img_dir,0,1) == "\""){
                $img_dir = substr($img_dir,1);
            }
            $changeSlash 		= str_replace("\\",DS,$img_dir);
            $changeSlash		= str_replace("/",DS,$changeSlash); 
            $changeSlash        = str_replace("webroot\\","",$changeSlash);
            $changeSlash        = str_replace("webroot/","",$changeSlash);
            $full_path = WWW_ROOT.$changeSlash;
            $noDir = true;
        }else{
            $img_dir = $baseDir.$img_dir."/";
            $img = $prefix.$img;
            $changeSlash 		= str_replace("\\",DS,$img_dir);
            $changeSlash		= str_replace("/",DS,$changeSlash); 
            $full_path = ROOT.DS.$changeSlash.$img;
            $noDir = false;
        }
        
		//check image exist
		if(file_exists($full_path)){
            if($noDir == false){
                $dir 		= str_replace("\\","/",$img_dir).$img;
            }else{
                $dir 		= str_replace("\\","/",$img_dir);
            }
			$dir = str_replace("webroot/","",$dir);
			$url = $this->Url->build("/".$dir,true);
		}else{
			if($img_not_found == null){
				$url = $this->Url->build("/img/no-image.png",true);
			}else{
				$url = $this->Url->build("/".$img_not_found,true);
			}
		}
		return $url;
    }

    public function generateLinkHeader($links)
    {
        $listMenus = "";
        foreach($links as $key => $r){
            $url = $this->generateUrlMenu($r);
            if(!empty($r['children'])){
                $listMenus .= '<li class="dropdown">
                <a href="#">
                    '.$r['title'].' <i class="fa fa-angle-down"></i>
                </a><div class="dropdown-menu"><ul>';
                $listMenus .= $this->generateLinkHeader($r['children']);
                $listMenus .= '</ul></div></li>';
            }else{
                $listMenus .= "<li><a href='".$url."' target='".$r['target']."'>".$r['title']."</a></li>";
            }
        }
        return $listMenus;
    }

    public function generateLinkFooter($links,$level = 0){
        $html = "";
        foreach($links as $key => $link){
            $url = $this->generateUrlMenu($link);
            if($level == 0){
                if(empty($link['children'])){
                    $html .="<div class='col-md-4'>";
                    $html .= "<a href='".$url."' target='".$link['target']."'>".$link['title']."</a>";
                    $html .= "</div>";
                }else{
                    $html .="<div class='col-md-4'>";
                    $html .= "<h1>".$link['title']."</h1>";
                    $html .= "<nav><ul>";
                    $html .= $this->generateLinkFooter($link['children'],$level + 1);
                    $html .= "</ul></nav>";
                    $html .= "</div>";
                }
            }else{
                if(empty($link['children'])){
                    $html .="<li>";
                    $html .= "<a href='".$url."' target='".$link['target']."'>".$link['title']."</a>";
                    $html .= "</li>";
                }else{
                    $html .="<li class='has-child'>";
                    $html .= $link['title'];
                    $html .= "<ul>";
                    $html .= $this->generateLinkFooter($link['children'],$level + 1);
                    $html .= "</ul>";
                    $html .= "</div>";
                }
            }
            
        }
        return $html;
    }

    public function generateUrlMenu($link)
    {
        $url = "";
        if($link['_type']=="CONTENT"):
            $url = $this->Url->build(['_name'=>'checkSlug','slug'=>$link['content']['slug']]);
        elseif($link['_type'] == 'HEADER'):
            $url = '#';
        else:  
            if(filter_var($link['url'], FILTER_VALIDATE_URL) == FALSE){
                $url = $this->Url->build("/".$link['url']);
            }else{
                $url = $link['url'];
            }
        endif;
        return $url;
    }

}