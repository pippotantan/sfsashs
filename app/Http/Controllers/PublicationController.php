<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Publication;

class PublicationController extends Controller
{
    public function index()
    {

        //$publications = Publication::all();
        //$publications = User::where('approved', '=', true)->paginate(5);
        $publications = Publication::orderBy('datepub', 'desc')->paginate(5);
        return view('publications.index', compact('publications'));
    }

    public function show($id)
    {
        $publications = Publication::all()->find($id);
        return view('publications.details', ['publication' => Publication::find($id)]);
        //return view('publications.details', compact('publications'));
    }

    public function create()
    {
        return view('publications.create');
    }

    public function store(Request $request)
    {
        $name="none";
        if($request->hasfile('filename'))
        {
           $file = $request->file('filename');
           $name=time().$file->getClientOriginalName();
           $file->move(public_path().'/images/', $name);
        }
       $publication= new \App\Publication;
       $publication->title=$request->get('title');
       $publication->author=$request->get('author');
       $publication->datepub=$request->get('datepub');
       $publication->body=$request->get('body');
       $publication->pubpic=$name;
       
       
       //$publication->pub_pic=$name;rrr
       $publication->save();
       //\Session::flash('flash_message','Article successfully published.'); //<--FLASH MESSAGE
        $m = 'Article ' . $request->get('title'). ' published successfully!';
       return redirect('publications')->with('success', $m);
   }

    public function edit($id)
    {
        $publication = Publication::find($id);
        return view('publications.edit',compact('publication','id'));
    }

    public function update(Request $request, $id)
    {
        $publication= Publication::find($id);
        $name="";
         if($request->hasfile('filename'))
        {
                $file = $request->file('filename');
                $name=time().$file->getClientOriginalName();
                $file->move(public_path().'/images/', $name);
        }
        
            $publication->title=$request->get('title');
            $publication->author=$request->get('author');
            $publication->datepub=$request->get('datepub');
            $publication->body=$request->get('body');
            if(!$name==""){$publication->pubpic=$name;}
            $publication->save();
            $m = 'Article ' . $request->get('title'). ' updated successfully!';
            return redirect('publications')->with('success', $m);;
    }

    public function destroy($id)
    {
        $publication = Publication::find($id);
        $publication->delete();
        $m = 'Article ' . $publication['title'] . ' deleted successfully!';
        return redirect('publications')->with('success',$m);
    }

    
}
