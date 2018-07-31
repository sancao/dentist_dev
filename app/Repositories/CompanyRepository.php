<?php
namespace App\Repositories;
use App\Repositories\CompanyInterface;
use Illuminate\Support\Facades\DB;
use App\Models\Company;

class CompanyRepository implements CompanyInterface
{
    public function getCompanies($user_id=0,$text){
        $companies= Company::join('users', 'companies.user_id','=','users.id')    
        ->select('companies.name','companies.address'
        ,'companies.website','companies.email','companies.icon'
        ,'companies.phone','companies.user_id','companies.id');

        // $companies->where(['companies.user_id' => $user_id]);      
        
        if($text){
            $companies->where(function ($query) use($text) {
                $query->orWhere('companies.name','LIKE', '%'.$text.'%');
                // ->orWhere('users.name' ,'LIKE', '%'.$text.'%') 
                // ->orWhere('users1.name' ,'LIKE', '%'.$text.'%') 
                // ->orWhere('schedules.comment' ,'LIKE', '%'.$text.'%')                
                // ->orWhere('services.amount' ,'LIKE', '%'.$text.'%')
                // ->orWhere('services.service' ,'LIKE', '%'.$text.'%')
                // ->orWhere('schedules.date' ,'LIKE', '%'.$text.'%')
                // ->orWhere('schedules.status' ,'LIKE', '%'.$text.'%');
            });
        }
        return $companies
                ->orderBy('companies.name', 'ASC')
                ->paginate(10);
    }
}