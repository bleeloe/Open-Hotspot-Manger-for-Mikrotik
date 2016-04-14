<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \PEAR2\Net\RouterOS as RouterOS;
use App\Http\Requests;

class MikrotikController extends Controller
{

    protected $client;

    /**
     * construct
     *
     * @return void
     * @author 
     **/
    public function __construct()
    {

        $mikrotik = \App\Mikrotik::find(1);                    
        try {
            $this->client = new RouterOS\Client($mikrotik->ipaddress, $mikrotik->user,\Crypt::decrypt($mikrotik->pass));
        } catch (\Exception $e) {
            print "Error connecting to RouterOS";    
        }
        
    }


    /**
     * Router Command
     *
     * @return void
     * @author 
     **/
    public function routerCommand(Request $request)
    {

        $request->header('Content-Type','text/plain');
        $util = new RouterOS\Util( $this->client );
        $util->changeMenu('/ip hotspot user');        
        echo $util->get(0, 'name');
        // foreach ($util->getAll() as $item) {
        //     echo 'IP: ', $item->getProperty('address'),
        //          ' MAC: ', $item->getProperty('mac-address'),
        //          "\n";
        // }
    }




    /**
     * Command print function
     *
     * @return void
     * @author 
     **/
    public function routerPrint($pathMenu=null, $argumentProperty = array(),$numbers = NULL)
    {   
        if (is_null($pathMenu)) {
            return null;
        }

        $client = $this->client;
        $request = new RouterOS\Request($pathMenu);
        if (!is_null($numbers)) {
            $request->setQuery(RouterOS\Query::where('.id', $numbers));
        }        
        $responses = $client->sendSync($request);
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
        return ($result);
    }



    /**
     * Router Action
     * 
     * @return void
     * @author harylalamentik@gmail.com
     **/    
    public function routerAction($path, $setArgument = array())
    {                
        $routerRequest = new RouterOS\Request($path);           
        if (count($setArgument)) {
            foreach ($setArgument as $key => $value) {
                if (!empty($value)) {
                    $routerRequest->setArgument($key,$value);                
                }                
            }        
        }
        if ($this->client->sendSync($routerRequest)->getType() !== RouterOS\Response::TYPE_FINAL) {
            return FALSE;
        }        
        return TRUE;
    } 


    /**
     * Http remove user active hotspot 
     *
     * @return void
     * @author 
     **/
    public function hotspotKillActive(Request $request,$id)
    {
        if ($this->routerAction('/ip/hotspot/active/remove',['numbers'=>$id])) {
            return redirect('/user/active')->with('message','Removed');    
        }
        return redirect('/user/active')->with('message-error','Failed');

    }




    /**
     * Create User
     *
     * @return void
     * @author 
     **/
    public function createUser(Request $request)
    {

        $action = $this->routerAction('/ip/hotspot/user/add',[
            'server'=> $request->input('server'),
            'name'=> $request->input('name'),
            'password'=> $request->input('password'),
            'profile'=> $request->input('profile'),     
            'email'=> $request->input('email'),     
            'comment'=> $request->input('comment'),     
        ]);
        if ($action) {
            return redirect('/user/create')->with('message','Created');
        }
        return redirect('/user/create')->with('message-error','Failed');
    }


    /**
     * Remove hotspot user
     *
     * @return void
     * @author 
     **/
    public function removeUser(Request $request,$id)
    {        
        if ($this->routerAction('/ip/hotspot/user/remove',['numbers'=>$id])) {
            return redirect('/user')->with('message','Removed');    
        }
        return redirect('/user')->with('message-error','Failed');
    }

    /**
     * undocumented function
     *
     * @return void
     * @author 
     **/
    public function removeIpBinding(Request $request,$id)
    {
        if ($this->routerAction('/ip/hotspot/ip-binding/remove',['numbers'=>$id])) {
            return redirect('/binding')->with('message','Removed');    
        }
        return redirect('/binding')->with('message-error','Failed');
    }


    /**
     * Server Profiles
     *
     * @return void
     * @author 
     **/
    public function ServerProfile()
    {
        return $this->routerPrint('/ip/hotspot/profile/print',[
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
        return $this->routerPrint('/ip/hotspot/ip-binding/print',[
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
     * undocumented function
     *
     * @return void
     * @author 
     **/
    public function createIpBinding(Request $request)
    {
        
        $action = $this->routerAction('/ip/hotspot/ip-binding/add',[        
            'mac-address'=> $request->input('mac-address'),            
            'comment'=> $request->input('comment'),     
            'address'=> $request->input('address'),     
            'to-address'=> $request->input('to-address'),     
            'type'=> $request->input('type'),     
            'email'=> $request->input('email'),     
            'server'=> $request->input('server'),
        ]);

        if ($action) {
            return redirect('/binding/create')->with('message','Created');
        }
        return redirect('/binding/create')->with('message-error','Failed');
    }



    /**
     * Display list user profile
     *
     * @return void
     * @author 
     **/
    public function UserProfile()
    {
        return $this->routerPrint('/ip/hotspot/user/profile/print',[
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

        $request->header('Content-Type','application/json');

        return $this->routerPrint('/ip/hotspot/user/print',[
            'numbers' => '.id',
            'disabled' => 'disabled',
            'name' => 'name',
            // 'password' => 'password',
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
        return $this->routerPrint('/ip/hotspot/active/print',[
            'numbers' => '.id',
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
            'macAddress' => 'mac-address',
            'packetsIn' => 'packets-in',
            'packetsOut' => 'packets-out',
            'sessionTimeLeft' => 'session-time-left',
        ]);
    }
}
