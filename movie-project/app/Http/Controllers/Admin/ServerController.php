<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\Server\ServerRequest;
use App\Http\Controllers\Controller;
use App\Models\Server;
use App\Models\FilmEpisode;

class ServerController extends Controller
{
 
    public function index()
    {
        $Servers = Server::all();              
        return view('admin.server.list', ['servers' => $Servers]);
    }   

    
    public function create()
    {
        $getfilm_episodes = FilmEpisode::all();
        return view('admin.server.create', ['getfilm_episodes' => $getfilm_episodes]);
    }


    public function store(ServerRequest $request)
    {
        

        $Server = new Server();
        $Server->name = $request->name;
        $Server->episode_id = $request->episode_id;
        $Server->link = $request->link;
        $Server->save();

        return redirect()->route('admin_server_list')->with('success', 'Thêm mới thành công');
    }
   
    public function show($id)
    {
        //
    }

   

    public function edit($id)
    {
        $server = Server::find($id);
        $getfilm_episodes = FilmEpisode::all();
        return view('admin.server.edit', ['server' => $server, 'getfilm_episodes' => $getfilm_episodes]);
    }

    public function update(ServerRequest $request, $id)
    {
        
    	$Server = Server::find($id);

    	 if(($Server->name == $request->name)
    	 	&& ($Server->episode_id == $request->episode_id) 
    		&& ($Server->link == $request->link))
            return redirect()->back()->with('error', 'Bạn không sửa đổi thông tin gì !!!');


        $Server->name = $request->name;
        $Server->episode_id = $request->episode_id;
        $Server->link = $request->link;
        $Server->save();

        return redirect()->route('admin_server_list')->with('success', 'Cập nhật thành công');

    }

     public function destroy($id)
    {
        $server = Server::find($id);
        $server->delete();

        return redirect()->route('admin_server_list')->with('success', 'Xóa thành công');
    }
}
