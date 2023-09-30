<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Http\Requests\CategoryRequestUpdate;
use App\Models\Category;
use App\Models\Organization;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //category list
    public function index(){
        $data['categories'] = Category::orderBy('id', 'DESC')->paginate(5);
        return view('admin.category.index',$data);
    }
    //category create
    public function create(){
        $data['organizations'] = Organization::get();
        return view('admin.category.create',$data);
    }
    //category store
    public function store(CategoryRequest $request){
        $record = new Category();
        $record->name = request('name');
        $record->organization_id = request('organization_id');
        $record->description = request('description');
        $record->save();
        return redirect()->route('category.list')->with('message','Successfully  Create');
    }

    //category edit
    public function edit($id){
        $category = Category::findOrFail($id);
        $data = [
            'category' => $category,
            'organizations' => Organization::get(),
        ];
        return view('admin.category.edit',$data);
    }


    //category courses
    public function update(CategoryRequestUpdate $request ,$id){
        $record = Category::find($id);
        $record->name = request('name');
        $record->organization_id = request('organization_id');
        $record->description = request('description');
        $record->update();
        return redirect()->route('category.list')->with('message','Successfully Updated');
    }

    //category Courses

    public function destroy($id)
    {
        $record = category::findOrFail($id);
        if($record->count() > 0){
            $record->delete();
        }
        return redirect()->back()->with('message', 'Successfully Delete ');
    }
}
