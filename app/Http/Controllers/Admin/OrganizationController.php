<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrganizationRequest;
use App\Http\Requests\OrganizationRequestUpdate;
use App\Models\Organization;
use Illuminate\Http\Request;

class OrganizationController extends Controller
{
    //Organization list
    public function index(){
        $data['organizations'] = Organization::orderBy('id', 'DESC')->paginate(5);
        return view('admin.organization.index',$data);
    }
    //Organization create
    public function create(){
        return view('admin.organization.create');
    }
    //Organization store
    public function store(OrganizationRequest $request){
        $record = new Organization();
        $record->name = request('name');
        $record->description = request('description');
        $record->save();
        return redirect()->route('organization.list')->with('message','Successfully Organization Create');
    }

    //Organization edit
    public function edit($id){
        $organization = Organization::findOrFail($id);
        $data = [
            'organization' => $organization,
        ];
        return view('admin.organization.edit',$data);
    }


    //Organization courses
    public function update(OrganizationRequestUpdate $request ,$id){
        $record = Organization::find($id);
        $record->name = request('name');
        $record->description = request('description');
        $record->update();
        return redirect()->route('organization.list')->with('message','Successfully Updated');
    }

    //Organization Courses

    public function destroy($id)
    {
        $record = Organization::findOrFail($id);
        if($record->count() > 0){
            $record->delete();
        }
        return redirect()->back()->with('message', 'Successfully Delete Organization');
    }
}
