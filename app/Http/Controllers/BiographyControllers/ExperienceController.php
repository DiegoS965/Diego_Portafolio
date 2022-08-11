<?php

namespace App\Http\Controllers\BiographyControllers;

use App\Models\Biography;
use App\Models\Experience;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ExperienceController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth'])->only(['store','update','destroy']);
    }

    public function index()
    {
        $biography = Biography::all()->where('id','=', '1')->first();
        $experiences = Experience::latest()->paginate(4);

        return view('experience',[
            'experiences' => $experiences,
            'biography' => $biography,
        ]);
    }

    public function exp_index(Experience $experience)
    {
        return view('edits.experiencePage',[
            'experience' => $experience,
        ]);
    }

    public function store(Request $request, Biography $biography)
    {
        $this->validate($request, [
            'title'=>'required|string|max:355',
            'description' => 'required|string',
            'worked_at' => 'required|string',
            'start'=>'required|date',
            'end'=>'required|date',
        ]);
        
        $biography->experiences()->create($request->all());

        return back();
    }

    public function update(Request $request, Experience $experience)
    {
        $this->validate($request, [
            'title'=>'required|string|max:355',
            'description' => 'required|string',
            'worked_at' => 'required|string',
            'start'=>'required|date',
            'end'=>'required|date',
        ]);

        $experience->update($request->all());

        return back();
    }

    public function destroy(Experience $experience)
    {
        $experience->delete();
        
        return back();
    }


}
