<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }


    /**
     * undocumented function
     *
     * @return void
     * @author 
     **/
    public function user()
    {
        return view('app.user.index',[]);
    }

    /**
     * User Active
     *
     * @return void
     * @author 
     **/
    public function userActive()
    {
        return view('app.active.index',[]);
    }

    /**
     * List ip binding
     *
     * @return void
     * @author 
     **/
    public function IpBinding()
    {
        return view('app.binding.index',[]);
    }


    /**
     * create function
     *
     * @return void
     * @author 
     **/
    public function createIpBinding()
    {
        return view('app.binding.create',[]);   
    }


    /**
     * undocumented function
     *
     * @return void
     * @author 
     **/
    public function editIpBinding(Request $request,$id)
    {
        $router = new MikrotikController();

        $data = $router->routerPrint('/ip/hotspot/ip-binding/print',[
            'numbers' => '.id',
            'macaddress' => 'mac-address',
            'address' => 'address',
            'toaddress' => 'to-address',
            'server' => 'server',            
            'disabled' => 'disabled',
            'type' => 'type',            
            'where' => 'where',            
            'comment' => 'comment',
        ],$id);        
        return view('app.binding.edit',$data[0]);
    }

    /**
     * undocumented function
     *
     * @return void
     * @author 
     **/
    public function editIpBindingSave(Request $request,$id)
    {        
        $router = new MikrotikController();

        $action = $router->routerAction('/ip/hotspot/ip-binding/set',[
            'numbers' => $id,
            'mac-address' => $request->input('ma-caddress'),
            'address' => $request->input('address'),
            'to-address' => $request->input('to-address'),
            'server' => $request->input('server'),
            'disabled' => $request->input('disabled'),
            'type' => $request->input('type'),
            'where' => $request->input('where'),
            'comment' => $request->input('comment'),
        ],$id);        
        if ($action) {
            return redirect("/binding/$id/edit")->with('message','Saved');
        }
        return redirect("/binding/$id/edit")->with('message','Failed');
    }


    /**
     * Form Create User
     *
     * @return void
     * @author 
     **/
    public function createUser()
    {
        return view('app.user.create',[]);

    }


    /**
     * Edit User
     *
     * @return void
     * @author harylalamentik@gmail.com
     **/
    public function editUser(Request $request,$id)
    {

        $router = new MikrotikController();

        $data = $router->routerPrint('/ip/hotspot/user/print',[
            'numbers' => '.id',
            'disabled' => 'disabled',
            'name' => 'name',
            // 'password' => 'password',
            'email' => 'email',
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
            'routes' => 'routes'
        ],$id);        
        return view('app.user.edit',$data[0]);
    }
    /**
     * undocumented function
     *
     * @return void
     * @author 
     **/
    public function editUserSave(Request $request,$id)
    {                
        $router = new MikrotikController();
        $action = $router->routerAction('/ip/hotspot/user/set',[
            'numbers' => $id,
            'disabled' => $request->input('disabled'),
            'name' => $request->input('name'),
            'password' => $request->input('password'),
            'email' => $request->input('email'),
            'profile' => $request->input('profile'),
            'server' => $request->input('server'),
            'bytes-in' => $request->input('bytesin'),
            'bytes-out' => $request->input('bytesout'),
            'address' => $request->input('address'),
            'comment' => $request->input('comment'),
            'limit-bytes-in' => $request->input('limitbytesin'),
            'limit-bytes-out' => $request->input('limitbytesout'),
            'limit-bytes-total' => $request->input('limitbytestotal'),
            'limit-uptime' => $request->input('limituptime'),
            'packets-in' => $request->input('packetsin'),
            'packets-out' => $request->input('packetsout'),
            'mac-address' => $request->input('maccaddress'),
            'routes' => $request->input('route')
        ]);

        if ($action) {
            return redirect("/user/$id/edit")->with('message','Saved');
        }
        return redirect("/user/$id/edit")->with('message','Failed');
    }

}
