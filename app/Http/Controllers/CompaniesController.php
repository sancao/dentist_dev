<?php

namespace App\Http\Controllers;

use JWTAuth;
use Auth;
use App\Models\Company;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Common\Common;
use App\Repositories\CompanyInterface;

class CompaniesController extends Controller
{
    private $company;
    private $common;

    public function __construct(CompanyInterface $company) 
    {
        $this->company = $company;
        $this->common = app('App\Common\Common');
    }

    public function index(Request $request)
    {
        // $user = Auth::user();
        // dd($user);
        $companies=$this->company->getCompanies(5,$request['text']);        
        $response = [
            'pagination' => [
                'total' => $companies->total(),
                'per_page' => $companies->perPage(),
                'current_page' => $companies->currentPage(),
                'last_page' => $companies->lastPage(),
                'from' => $companies->firstItem(),
                'to' => $companies->lastItem()
            ],
            'data' => $companies
        ];
        
        return $this->common->responseToJson(True,200,'success',$response);
    }

    public function show($id)
    {
        return Company::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $company = Company::findOrFail($id);
        $company->update($request->all());

        return $company;
    }

    public function store(Request $request)
    {
        $company = Company::create($request->all());
        return $company;
    }

    public function destroy($id)
    {
        $company = Company::findOrFail($id);
        $company->delete();
        return '';
    }
}
