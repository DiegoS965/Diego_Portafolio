<?php

namespace App\Http\Controllers\BiographyControllers;

use App\Models\Biography;
use App\Models\Education;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EducationController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth'])->only(['store','update','destroy']);
    }
    
    public function index()
    {
        $biography = Biography::all()->where('id','=', '1')->first();
        $educations = Education::latest()->paginate(4);

        return view('education',[
            'educations' => $educations,
            'biography' => $biography,
        ]);
    }

    public function edu_index(Education $education)
    {
        return view('edits.educationPage',[
            'education' => $education,
        ]);
    }

    public function store(Request $request, Biography $biography)
    {
        $this->validate($request, [
            'title'=>'required|string|max:355',
            'studied_at' => 'required|string',
            'start'=>'required|date',
            'end'=>'required|date',
        ]);
        

        $biography->educations()->create($request->all());

        return back();
    }

    public function update(Request $request, Education $education)
    {
        $this->validate($request, [
            'title'=>'required|string|max:355',
            'studied_at' => 'required|string',
            'start'=>'required|date',
            'end'=>'required|date',
        ]);

        $education->update($request->all());

        return back();
    }

    public function destroy(Education $education)
    {
        $education->delete();
        
        return back();
    }
}
