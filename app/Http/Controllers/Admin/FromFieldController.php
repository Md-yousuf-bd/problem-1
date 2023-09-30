<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\fromFieldRequest;
use App\Http\Requests\fromFieldRequestUpdate;
use App\Models\FromField;
use App\Models\Template;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

class FromFieldController extends Controller
{
    //FromField list
    public function index()
    {
        $data['fields'] = FromField::orderBy('id', 'DESC')->paginate(5);
        return view('admin.from-field.index', $data);
    }
    //FromField create
    public function create()
    {
        $data['templates'] = Template::get();
        return view('admin.from-field.create', $data);
    }
    //FromField store
    public function store(fromFieldRequest $request)
    {
        // Retrieve the input data
        $templateId = $request->input('template_id');
        $names = $request->input('name');
        $types = $request->input('type');

        // Process and save the submitted data
        foreach ($names as $key => $name) {
            FromField::create([
                'template_id' => $templateId,
                'name' => $name,
                'type' => $types[$key],
            ]);
        }
        return redirect()->route('field.list')->with('success', 'Fields created successfully');
    }

    //FromField edit
    public function edit($id)
    {
        $fromField = FromField::findOrFail($id);
        $data = [
            'field' => $fromField,
            'templates' => Template::get(),
        ];
        return view('admin.from-field.edit', $data);
    }


    //FromField
    public function update(fromFieldRequestUpdate $request, $id)
    {
        $field = FromField::find($id);
        $templateId = $request->input('template_id');
        $names = $request->input('name');
        $types = $request->input('type');

        FromField::where('id', $id)->delete();
        foreach ($names as $key => $name) {
            FromField::create([
                'template_id' => $templateId,
                'name' => $name,
                'type' => $types[$key],
            ]);
        }
        return redirect()->route('field.list')->with('success', 'Fields update successfully');
    }

    //FromField Courses

    public function destroy($id)
    {
        $record = FromField::findOrFail($id);
        if ($record->count() > 0) {
            $record->delete();
        }
        return redirect()->back()->with('message', 'Successfully Delete ');
    }
}
