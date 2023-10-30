<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Supplier;
use Exception;
use Validator;

class SupplierController extends Controller
{
    
    function __construct()
    {
         $this->middleware('permission:role-list|role-create|role-edit|role-delete', ['only' => ['index','store']]);
         $this->middleware('permission:role-create', ['only' => ['create','store']]);
         $this->middleware('permission:role-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:role-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $suppliers = Supplier::get();
        return view('pages.suppliers.index', compact('suppliers'));
    }

    public function supplier_manage(Request $request, $id)
    {
        $supplier = Supplier::find($id);
        $contacts = Contact::where('id',$supplier->contact_id)->get();
        return view('pages.suppliers.manage',compact('supplier','contacts'));
    }

    public function store(Request $request)
    {
        if ($request->id == "new") {
            $supplier = new Supplier();
            $supplier->sup_name = $request->sup_name;
            $supplier->sup_code = $request->sup_code;
            $supplier->contact_id = 0;
            $supplier->save();
        } else {                
            $supplier = Supplier::find($request->id);
            $supplier->sup_name = $request->sup_name;
            $supplier->sup_code = $request->sup_code;
            $supplier->save();
        }
        return redirect()->route('supplier-manage',['id' => $supplier->id])->with("success","Supplier updated successfully!");
    }

    public function destroy($id)
    {
        Supplier::find($id)->delete();
        return redirect()->route('supplier-index')
                        ->with('success','Supplier deleted successfully');
    }

}
