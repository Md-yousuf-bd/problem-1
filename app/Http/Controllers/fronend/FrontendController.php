<?php

namespace App\Http\Controllers\fronend;

use App\Models\Organization;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\FromField;
use App\Models\Submission;
use App\Models\Template;

class FrontendController extends Controller
{
    public function index(){
        $data['organizations'] = Organization::get();
        if (auth()->user()) {
            $data['submissions'] = Submission::where('user_id', auth()->user()->id)->get();
        } else {
            $data['submissions'] = [];
        }
        return view('frontend.home',$data);
    }




    public function categories(Request $request)
    {
        $organization_id = $request->organization_id;
        $categories = Category::where('organization_id', $organization_id)->pluck('name', 'id');
        return response()->json($categories);
    }

     public function getTemplate(Request $request)
    {
        $category_id = $request->category_id;
        $templates = Template::where('category_id', $category_id)->pluck('name', 'id');
        return response()->json($templates);
    }
     public function getField(Request $request)
    {
        $template_id = $request->template_id;
        $field = FromField::where('template_id', $template_id)->pluck('name','type', 'id');
        return response()->json($field);
    }
}
