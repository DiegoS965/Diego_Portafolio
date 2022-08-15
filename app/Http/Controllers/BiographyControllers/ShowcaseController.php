<?php

namespace App\Http\Controllers\BiographyControllers;

use App\Models\Image;
use App\Models\Project;
use App\Models\Biography;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShowcaseController extends Controller
{
    public function index()
    {
        $biography = Biography::all()->where('id','=', '1')->first();
        $showcases = Project::latest()->with(['images'])->paginate(3);
        /* foreach($showcases as $showcase)
        {
            
        } */

        return view('showcase',[
            'showcases'=>$showcases,
            'biography' => $biography,
        ]);
    }

    public function sho_index(Project $showcase)
    {
        return view('edits.showcasePage',[
            'showcase' => $showcase,
        ]);
    }

    public function store(Request $request, Biography $biography)
    {
        $this->validate($request, [
            'title' => 'required|string|max:355',
            'description'=>'required|string',
            'link'=>'string',
            'rep_link'=>'required|string',
            'completed_at'=>'required|date',
            'images'=>'required',
            'images.*'=>'image|mimes:jpeg,png,jpg,svg',
        ]);

        $biography->projects()->create($request->all());

        if($request->file('images'))
        {
            foreach ($request->file('images') as $imageFile)
            {
                $image = new Image;
                $filename = date('YmdHi').$imageFile->getClientOriginalName();
                $imageFile->move(public_path('project_images'), $filename);
                $image['url'] = $filename;
                $image->project_id = $biography->projects->last()->id;
                $image->save();
            }
        }

        return back();
    }

    public function update(Request $request, Project $showcase)
    {
        $this->validate($request, [
            'title' => 'required|string|max:355',
            'description'=>'required|string',
            'link'=>'string',
            'rep_link'=>'required|string',
            'completed_at'=>'required|date',
        ]);
        
        $showcase->update($request->all());

        return back();
    }

    public function delete(Project $showcase)
    {
        $showcase->delete();

        return back();
    }
}
