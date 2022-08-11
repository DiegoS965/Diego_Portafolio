<?php

namespace App\Http\Controllers\BiographyControllers;

use App\Models\Biography;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BiographyController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth'])->only(['store','update','destroy']);
    }

    public function index()
    {
        $biography = Biography::all()->where('id','=', '1')->first();
        return view('home',[
            'biography'=> $biography,
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name'=>'required|string',
            'description' => 'required|string',
            'phone_number' => 'required|int|unique:biographies',
            'biography_title' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:biographies',
            //'birthdate'=>'required|date',
            'university'=>'required|string|min:10|max:255',
            'city'=>'required|string|max:255',
            'country'=>'required|string|max:255',
            'linkedin'=>'required|string',
        ]);

        //$input_date = $request->input('birthdate');
        

        $request->user()->biographies()->create($request->all());

        return back();
    }

    public function update(Request $request, Biography $biography)
    {
        $this->validate($request, [
            'name'=>'required|string',
            'description' => 'required|string',
            'phone_number' => 'required|int',
            'biography_title' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'birthdate'=>'required|date',
            'university'=>'required|string|min:10|max:255',
            'city'=>'required|string|max:255',
            'country'=>'required|string|max:255',
            'linkedin'=>'required|string',
        ]);

        $biography->update($request->all());

        return back();
    }

    public function destroy(Biography $biography)
    {
        $biography->delete();

        return back();
    }

}
