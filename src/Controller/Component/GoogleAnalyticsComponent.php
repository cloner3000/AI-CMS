<?php
/**
 * App\src\Controller\Component\GoogleAnalyticsComponent.php
 * Don't Remove this signature if you love code 
 * Code For Easy
 * =================================================================
 * Author   : Ardiansyah Iqbal
 * Email    : aiqbalsyah@gmail.com
 * Github   : aiqbalsyah
 */
namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Core\Configure;
use \Google_Client;
use \Google_Service_Analytics;

class GoogleAnalyticsComponent extends Component
{

    public function loadAnalytics()
    {
        $analytic_view = true;
        $analytic_msg = "";
        $analytic_result = [];
        $defaultWebSettings = Configure::read('defaultWebSettings');
        if(!empty($defaultWebSettings['Google.Secret.Key']) && !empty($defaultWebSettings['Google.Secret.File']) && !empty($defaultWebSettings['Google.Analytics.ProfileId'])){
            $APP_NAME = $defaultWebSettings['Web.Name'];
            $KEY_FILE_LOCATION = ROOT.$defaultWebSettings['Google.Secret.File'];
            $profileId = $defaultWebSettings['Google.Analytics.ProfileId'];
            $analytics = $this->initializeAnalytics($APP_NAME,$KEY_FILE_LOCATION);
            if(!empty($analytics)){
                try{
                    $metric_params = [
                        'profile_id'=>'ga:' . $profileId,
                        'start_date'=>'30daysAgo',
                        'end_date'=>'today',
                        'metric'=>'ga:users,ga:newUsers',
                        'opt_params' => []
                    ];
                    $ga_users = $this->getGaData($analytics,$metric_params);
                    $ga_user = [
                        'user_lama' => $ga_users[0][0] + $ga_users[0][0] -$ga_users[0][1],
                        'user_baru' => $ga_users[0][1],
                    ];
                    $metric_params = [
                        'profile_id'=>'ga:' . $profileId,
                        'start_date'=>'30daysAgo',
                        'end_date'=>'today',
                        'metric'=>'ga:users',
                        'opt_params' => ['dimensions' =>'ga:browser']
                    ];
                    $ga_browsers = $this->getGaData($analytics,$metric_params);
                    $ga_browser = [];
                    foreach($ga_browsers as $key => $r){
                        $ga_browser[$key] = [
                            'name' => $r[0],
                            'count' => $r[1]
                        ];
                    }
                    $analytic_result['ga_user'] = $ga_user; 
                    $analytic_result['ga_browser'] = $ga_browser; 
                }catch(\Exception $error){
                    $analytic_result = null;
                    $analytic_msg = "Google secret key tidak valid";
                    $analytic_view = false;
                }
                
            }else{
                $analytic_msg = 'Gagal menginstall google analytics';
                $analytic_view = false;
            }
        }else{
            $analytic_msg = 'Google analytic belum tersetting';
            $analytic_view = false;
        }
        return [
            'analytic_view' => $analytic_view,
            'analytic_msg' => $analytic_msg,
            'analytic_result' => $analytic_result,
        ];
    }

    public function initializeAnalytics($APP_NAME,$KEY_FILE_LOCATION)
    {

        // Create and configure a new client object.
        $client = new Google_Client();
        $client->setApplicationName($APP_NAME." Analytics Reporting");
        $client->setAuthConfig($KEY_FILE_LOCATION);
        $client->setScopes(['https://www.googleapis.com/auth/analytics.readonly']);
        try{
            $analytics = new Google_Service_Analytics($client);
        }catch(\Exception $error){
            $analytics = null;
        }
        return $analytics;
    }

    public function getGaData($analytics,$metric_params) {
        // Calls the Core Reporting API and queries for the number of sessions
        // for the last seven days.
        extract($metric_params);
        try{
            $ga_result = $analytics->data_ga->get($profile_id,
                $start_date,
                $end_date,
                $metric,
                $opt_params
            ); 
            $results = $this->getResultGa($ga_result);
        }catch(\Exception $error){
            dd($error);
            $results = [];
        }
        
        
        return $results;
    }

    public function getResultGa($results){
        $countRows = count($results->getRows());
        if ($countRows > 0) {
            $rows = $results->getRows();
            foreach($rows as $key => $value){
                $result[$key] = $value;
            }
        } else {
            $result = [];
        }
        return $result;
    }

}

?>