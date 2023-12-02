<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function MongoDB\BSON\toJSON;

class supplyController extends Controller
{
    public function newCompany()
    {
        return view('supply.createcompany');
    }
    public function createCompany(Request $request)
    {
        Company::create([
            'person' => $request->person,
            'company' => $request->company,
            'phone'=> $request->phone,
            'mobile' => $request->mobile,
            'address' => $request->address,
            'chap' => $request->chap,
            'gifts' => $request->gifts,
            'ads' => $request->ads,
            'tablosardarb' => $request->tablosardarb,
            'decor' => $request->decor,
            'stand' => $request->stand,
            'adsagency' => $request->adsagency,
            'cip' => $request->cip,
            'bastebandi' => $request->bastebandi,
            'adsmanager' => $request->adsmanager,
            'graphist' => $request->graphist,
            'freelancer' => $request->freelancer,
            'narator' => $request->narator,
            'exhibition' => $request->exhibition,
            'age' => $request->age,
            'city' => $request->city,
            'site' => $request->site,
            'email' => $request->email,
            'quality' => $request->quality,
            'codeeghtesadi' => $request->codeeghtesadi,
            'shenasemelli' => $request->shenasemelli,
            'shenasesabt' => $request->shenasesabt,
            'codekargah' => $request->codekargah,
            'codesabtashkhas' => $request->codesabtashkhas,
            'pre_act' => $request->pre_act,
            'user_id' => Auth::user()->id,
        ]);
        return to_route('supplierlist');
    }

    public function supplierList()
    {
        return view('supply.supplierlist');
    }

    public function getSupplier(Request $request)
    {
        if (Auth::user()->user_role == 1){
            $req = $request->supplier;
            $getsuppliers = Company::where($req, 1)->get();
            return view('supply.results', compact('getsuppliers'));
        }else{
            $req = $request->supplier;
            $getsuppliers = Auth::user()->getCompanies->where($req, 1);
            return view('supply.results', compact('getsuppliers'));
        }
    }

    public function showData(Request $request, $id)
    {
        $supplier = Company::find($id);
        return view('supply.supplier', compact('supplier'));
    }
}
