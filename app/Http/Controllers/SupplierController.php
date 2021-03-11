<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class SupplierController extends Controller  {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        //
        $suppliers = Supplier::orderBy('name', 'ASC')->get();
        return view('inventory.supplier.index')->with('suppliers', $suppliers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('inventory.supplier.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $rules = array(
            'name' => 'required|unique:suppliers,name',
            'phone' => 'required',
            'address' => 'required');
        $validator = Validator::make($request->all(), $rules);


        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        } else {
            // store
            $supplier = new Supplier;
            $supplier->name= $request->get('name');
            $supplier->phone= $request->get('phone');
            $supplier->email= $request->get('email');
            $supplier->address= $request->get('address');
            $supplier->user_id = Auth::user()->id;
            try{
                $supplier->save();
                $url = Session::get('SOURCE_URL');

                return redirect()->to($url)
                    ->with('message',  trans('Record successfully saved'));
            }catch(QueryException $e){
                Log::error($e);
            }
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        //show a supplier
        $supplier =Supplier::find($id);
        //show the view and pass the $supplier to it
        return view('inventory.supplier.show')->with('supplier', $supplier);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $suppliers = Supplier::find($id);

        //Open the Edit View and pass to it the $patient
        return view('inventory.supplier.edit')->with('suppliers', $suppliers);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {//Validate
        $rules = array('name' => 'required');
        $validator = Validator::make($request->all(), $rules);

        // process the request
        if ($validator->fails()) {
            return redirect()->to('inventory.supplier.edit')->withErrors($validator)->withInput($request->except('password'));
        } else {
            // Update
            $supplier = Supplier::find($id);
            $supplier->name= $request->get('name');
            $supplier->address= $request->get('address');
            $supplier->phone= $request->get('phone');
            $supplier->email= $request->get('email');
            $supplier->user_id = Auth::user()->id;
            $supplier->save();
            try{
                $supplier->save();
                $url = Session::get('SOURCE_URL');

                return Redirect::to($url)
                    ->with('message', trans('messages.record-successfully-updated')) ->with('activesupplier', $supplier ->id);
            }catch(QueryException $e){
                Log::error($e);
            }
        }

    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        //Soft delete the item
        $supplier = Supplier::find($id);
        if(count($supplier->stocks)>0)
        {
            return redirect()->route('supplier.index')->with('message', trans('messages.failure-delete-record'));
        }
        else
        {
            $supplier->delete();
            // redirect
            return redirect()->route('supplier.index')->with('message', trans('messages.record-successfully-deleted'));
        }
    }
}
