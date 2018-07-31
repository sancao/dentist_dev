<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Common\Common;
use App\Repositories\UserInterface;

class UsersController extends Controller
{
    private $user;
    private $common;

    public function __construct(UserInterface $user) 
    {
        $this->user = $user;
        $this->common = app('App\Common\Common');
    }

    public function index(Request $request)
    {
        // $user = Auth::user();
        // dd($user);
        $users=$this->user->getCompanies(5,$request['text']);        
        $response = [
            'pagination' => [
                'total' => $users->total(),
                'per_page' => $users->perPage(),
                'current_page' => $users->currentPage(),
                'last_page' => $users->lastPage(),
                'from' => $users->firstItem(),
                'to' => $users->lastItem()
            ],
            'data' => $users
        ];
        
        return $this->common->responseToJson(True,200,'success',$response);
    }

    public function show($id)
    {
        return User::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update($request->all());

        return $user;
    }

    public function store(Request $request)
    {
        $user = User::create($request->all());
        return $user;
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return '';
    }
}
