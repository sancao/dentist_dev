<?php
namespace App\Repositories;
use App\Repositories\UserInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\User;

class UserRepository implements UserInterface
{
    public function getUsers($user_id=0,$text){
        $users= User::select('users.name','users.address'
        ,'users.email','users.avatar'
        ,'users.phone','users.id');

        // $users->where(['users.user_id' => $user_id]);      
        
        if($text){
            $users->where(function ($query) use($text) {
                $query->orWhere('users.name','LIKE', '%'.$text.'%');
                // ->orWhere('users.name' ,'LIKE', '%'.$text.'%') 
                // ->orWhere('users1.name' ,'LIKE', '%'.$text.'%') 
                // ->orWhere('schedules.comment' ,'LIKE', '%'.$text.'%')                
                // ->orWhere('services.amount' ,'LIKE', '%'.$text.'%')
                // ->orWhere('services.service' ,'LIKE', '%'.$text.'%')
                // ->orWhere('schedules.date' ,'LIKE', '%'.$text.'%')
                // ->orWhere('schedules.status' ,'LIKE', '%'.$text.'%');
            });
        }
        return $users
                ->orderBy('users.name', 'ASC')
                ->paginate(10);
    }

    public function addBenhNhan($company_id=0,$arr){
        // dd($arr);
        // $user = User::create($arr);
        // return $user;

        return User::create([
            'name' => $arr['name'],
            'email' => $arr['email'],
            'password' => Hash::make('sangcao'),
            'role'=>1,
            'address'=>$arr['address'],
            'gender'=>$arr['gender'],
            'phone'=>$arr['phone'],
            'email'=>$arr['email'],
            'dob'=>$arr['dob'],
            'tong_tien'=>$arr['tong_tien'],
            'yeu_cau'=>$arr['yeu_cau'],
        ]);
    }
}