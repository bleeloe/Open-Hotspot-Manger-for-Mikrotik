<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \PEAR2\Net\RouterOS as RouterOS;
use App\Http\Requests;

class MikrotikController extends Controller
{

    private $host = '222.124.14.170';
    private $user = 'admin';
    private $pass = 'tbsjkt';
    protected $client;

    /**
     * undocumented function
     *
     * @return void
     * @author 
     **/
    public function __construct()
    {
        $this->client = new RouterOS\Client($this->host, $this->user,$this->pass);        
    }

    /**
     * Command print function
     *
     * @return void
     * @author 
     **/
    private function printResult($pathMenu=null, $argumentProperty = array())
    {   
        if (is_null($pathMenu)) {
            return null;
        }

        $client = $this->client;
        $responses = $client->sendSync(new RouterOS\Request($pathMenu));
        $result  = array();
        foreach ($responses as $response) {
            if ($response->getType() === RouterOS\Response::TYPE_DATA) {                
                $field = array();
                foreach ($argumentProperty as $key => $value) {
                    $field[$key] = $response->getArgument($value);
                }
                array_push($result, $field);

            }
        }
        return array($result);
    }



    /**
     * Remove Active User Hotspot
     *
     * @return void
     * @author harylalamentik@gmail.com
     **/
    public function hsActiveRemove(Request $request, $id = null)
    {             
        $request->header('Content-Type','text/plain');
        if ($request->has('id') || empty($id)) {
            return 'null';
        }
        $disableRequest = new RouterOS\Request('/ip/hotspot/active/remove');
        $disableRequest->setArgument('numbers', $id);
        $this->client->sendSync($disableRequest);
        return 'true';
    }    


    /**
     * Server Profiles
     *
     * @return void
     * @author 
     **/
    public function ServerProfile()
    {
        return $this->printResult('/ip/hotspot/profile/print',[
            'numbers' => '.id',
            'name' => 'name',
            'hotspot-address' => 'hotspot-address',
            'dns-name' => 'dns-name',
            'html-directory' => 'html-directory',
            'http-proxy' => 'http-proxy',
            'smtp-server' => 'smtp-server',
            'login-by' => 'login-by',
            'split-user-domain' => 'split-user-domain',                    
        ]);
    }


    /**
     * undocumented function
     *
     * @return void
     * @author 
     **/
    public function IpBinding(Request $request)
    {
        return $this->printResult('/ip/hotspot/ip-binding/print',[
            'numbers' => '.id',
            'mac-address' => 'mac-address',
            'address' => 'address',
            'to-address' => 'to-address',
            'server' => 'server',            
            'blocked' => 'blocked',            
            'bypassed' => 'bypassed',            
            'disabled' => 'disabled',            
            'type' => 'type',            
            'where' => 'where',            
            'comment' => 'comment',
        ]);
    }


    /**
     * Display list user profile
     *
     * @return void
     * @author 
     **/
    public function UserProfile()
    {
        return $this->printResult('/ip/hotspot/user/profile/print',[
            'numbers' => '.id',
            'name' => 'name',
            'idle-itmeout' => 'idle-itmeout',
            'keepalive-timeout' => 'keepalive-timeout',
            'status-autorefresh' => 'status-autorefresh',
            'shared-users' => 'shared-users',
            'add-mac-cookie' => 'add-mac-cookie',
            'address-list' => 'address-list',
            'transparent-proxy' => 'transparent-proxy',
        ]);
    }



    /**
     * Show Hotspot User
     *
     * @return void
     * @author harylalamentik@gmail.com
     **/
    public function hsUsers(Request $request)
    {

        return $this->printResult('/ip/hotspot/user/print',[
            'numbers' => '.id',
            'disabled' => 'disabled',
            'name' => 'name',
            'password' => 'password',
            'profile' => 'profile',
            'server' => 'server',
            'bytesIn' => 'bytes-in',
            'bytesOut' => 'bytes-out',
            'address' => 'address',
            'comment' => 'comment',
            'limitBytesIn' => 'limit-bytes-in',                    
            'limitBytesOut' => 'limit-bytes-out',                    
            'limitBytesTotal' => 'limit-bytes-total',
            'limitUptime' => 'limit-uptime',
            'packetsIn' => 'packets-in',
            'packetsOut' => 'packets-out',
            'macAddress' => 'mac-caddress',
            'routes' => 'routes',                    
        ]);    
    }


    /**
     * Show Hotspot Active User (online)
     *
     * @return void
     * @author harylalamentik@gmail.com
     **/
    public function hsActive(Request $request)
    {
        return $this->printResult('/ip/hotspot/active/print',[
            'id' => '.id',
            'radius' => 'radius',
            'server' => 'server',
            'user' => 'user',
            'ipaddress' => 'address',
            'uptime' => 'uptime',
            'loginBy' => 'login-by',
            'bytesIn' => 'bytes-in',
            'bytesOut' => 'bytes-out',
            'domain' => 'domain',
            'idleTime' => 'idle-time',
            'idleTimeout' => 'idle-timeout',
            'keepalive_timeout' => 'keepalive-timeout',
            'limitBytesIn' => 'limit-bytes-in',                    
            'limitBytesOut' => 'limit-bytes-out',                    
            'limitBytesTotal' => 'limit-bytes-total',
            'macAddress' => 'mac-caddress',
            'packetsIn' => 'packets-in',
            'packetsOut' => 'packets-out',
            'sessionTimeLeft' => 'session-time-left',
        ]);
    }
}
