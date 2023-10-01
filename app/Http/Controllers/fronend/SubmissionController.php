<?php

namespace App\Http\Controllers\fronend;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubmissionRequest;
use App\Models\Submission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubmissionController extends Controller
{
    //submission list
    public function index(){
        $data['submissions'] = Submission::orderBy('id', 'DESC')->paginate(5);
        return view('admin.submission.index',$data);
    }
    //submission store
    public function store(SubmissionRequest $request){
        $record = new Submission();
        $record->organization_id = request('organization_id');
        $record->category_id = request('category_id');
        $record->name = request('name');
        $record->email = request('email');
        $record->number = request('number');
        $record->address = request('address');
        $record->date = request('date');
        $record->gender = request('gender');
        $record->description = request('description');
        $record->user_id = Auth::user()->id;
        $record->user_name = Auth::user()->name;
        $record->save();
        return redirect()->back()->with('message', 'Successfully information submitted');
    }
    //delete
    public function destroy($id)
    {
        $record = Submission::findOrFail($id);
        if($record->count() > 0){
            $record->delete();
        }
        return redirect()->back()->with('message', 'Successfully Delete ');
    }

}
