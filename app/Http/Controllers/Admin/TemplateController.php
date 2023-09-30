<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TemplateRequest;
use App\Http\Requests\TemplateRequestUpdate;
use App\Models\Category;
use App\Models\Template;
use Illuminate\Http\Request;

class TemplateController extends Controller
{
    //temp list
    public function index(){
        $data['templates'] = Template::orderBy('id', 'DESC')->paginate(5);
        return view('admin.template.index',$data);
    }
    //temp create
    public function create(){
        $data['categories'] = Category::get();
        return view('admin.template.create',$data);
    }
    //temp store
    public function store(TemplateRequest $request){
        $record = new Template();
        $record->name = request('name');
        $record->category_id = request('category_id');
        $record->description = request('description');
        $record->save();
        return redirect()->route('category.list')->with('message','Successfully  Create');
    }

    //temp edit
    public function edit($id){
        $template = Template::findOrFail($id);
        $data = [
            'template' => $template,
            'categories' => Category::get(),
        ];
        return view('admin.template.edit',$data);
    }


    //temp courses
    public function update(TemplateRequestUpdate $request ,$id){
        $record = Template::find($id);
        $record->name = request('name');
        $record->category_id = request('category_id');
        $record->description = request('description');
        $record->update();
        return redirect()->route('template.list')->with('message','Successfully Updated');
    }

    //temp Courses

    public function destroy($id)
    {
        $record = category::findOrFail($id);
        if($record->count() > 0){
            $record->delete();
        }
        return redirect()->back()->with('message', 'Successfully Delete ');
    }
}
