<?php

namespace App\Http\Controllers\BiographyControllers;

use App\Models\Ability;
use App\Models\Biography;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AbilityController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth'])->only(['store','update','destroy']);
    }
    
    public function index()
    {
        $biography = Biography::all()->where('id','=', '1')->first();
        $abilities = Ability::latest()->paginate(8);

        return view('abilities',[
            'abilities' => $abilities,
            'biography' => $biography,
        ]);
    }

    public function abi_index(Ability $ability)
    {
        return view('edits.abilityPage',[
            'ability' => $ability,
        ]);
    }

    public function store(Request $request, Biography $biography)
    {
        $this->validate($request, [
            'ability'=>'required|string|max:255',
        ]);
        
        $biography->abilities()->create($request->all());

        return back();
    }

    public function update(Request $request, Ability $ability)
    {
        $this->validate($request, [
            'ability'=>'required|string|max:255',
        ]);
        
        $request->update($ability->all());

        return back();
    }

    public function destroy(Ability $ability)
    {
        $ability->delete();
        
        return back();
    }
}
