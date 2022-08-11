<?php

namespace App\Http\Controllers\BiographyControllers;

use App\Models\Project;
use App\Models\Biography;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShowcaseController extends Controller
{
    public function index()
    {
        $biography = Biography::all()->where('id','=', '1')->first();
        $showcases = Project::latest()->paginate(3);

        return view('showcase',[
            'showcases'=>$showcases,
            'biography' => $biography,
        ]);
    }

    public function sho_index(Project $showcase, Biography $biography)
    {
        return view('edits.showcasePage',[
            'showcase' => $showcase,
        ]);
    }

    public function store(Request $request, Biography $biography)
    {
        $biography->projects()->create($request->all());

        return back();
    }

    public function update(Request $request, Project $showcase)
    {
        $showcase->update($request->all());

        return back();
    }

    public function delete(Project $showcase)
    {
        $showcase->delete();

        return back();
    }
}
