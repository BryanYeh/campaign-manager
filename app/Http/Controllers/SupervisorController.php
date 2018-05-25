<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SupervisorKey;
use App\SupervisorStore;
use App\Store;
use App\Supervisor;

class SupervisorController extends Controller
{
    public function index(Request $request)
    {
        $id = $request->route('id');
        $key = $request->route('key');

        //make sure the url for the supervisor is real otherwise throw a 404 not found page
        SupervisorKey::where('supervisor_id',$id)->where('key',$key)->firstOrFail();

        //get all stores
        $stores = Store::all();

        //get selected store for hosting by supervisor
        $store_id = SupervisorStore::where('supervisor_id',$id)->first();

        //get supervisor
        $supervisor = Supervisor::where('id',$id)->first();

        return view('supervisor-form', ['stores' => $stores, 'supervisor' => $supervisor, 'store_id' => $store_id]);
    }

    public function save(Request $request)
    {
        //validate data from form
        $validatedData = $request->validate([
            'store' => 'required|exists:prg_sample_storelist,id',
            'ownerkey' => 'required|exists:supervisor_keys,key',
            'supervisor' => 'required|exists:supervisor_keys,supervisor_id',
        ]);

        //update or create host store by supervisor
        $supervisor_store = SupervisorStore::updateOrCreate(
            ['supervisor_id' => $request->input('supervisor')],
            ['store_id' => $request->input('store')]
        );

        return redirect(route('supervisor-view', ['id' => $request->input('supervisor'),'key'=> $request->input('ownerkey')]))->with('success', 'Successfully set Host Store');
    }
}
