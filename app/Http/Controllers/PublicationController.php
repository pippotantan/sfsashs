<?php

namespace App\Http\Controllers;
use Image;
use Validator;
use Illuminate\Http\Request;
use App\Publication;
use Illuminate\Support\Facades\File;


class PublicationController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except('index', 'show');

       // $this->middleware('log')->only('index');

        //$this->middleware('subscribed')->except('store');
    }

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
        $validator = Validator::make($request->all(), [
            'filename' => 'image|required|mimes:jpeg,png,jpg,gif,svg',
        ]);

        if ($validator->fails()) {
            return redirect('publications/create')
                        ->withErrors($validator)
                        ->withInput();
        }
        
/*
        $this->validate($request, [
            'filename' => 'image|required|mimes:jpeg,png,jpg,gif,svg'
        ],
         [
            'filename.required' => 'only the following image type is allowed: jpeg,png,jpg,gif & svg',
            'filename.required' => 'publication image is required'
        ])->withInput();
*/
        $name="none";

        //if($request->hasfile('filename'))
        //{
           //$file = $request->file('filename');
           //$name=time().$file->getClientOriginalName();
           //$file->move(public_path().'/images/', $name);

           $originalImage= $request->file('filename');
           $name=time().$originalImage->getClientOriginalName();
           $thumbnailImage = Image::make($originalImage);
           $thumbnailPath = public_path().'/images/thumbnail/';
           $originalPath = public_path().'/images/';
           $thumbnailImage->heighten(180, function ($constraint){
            $constraint->upsize();
        });
          // $thumbnailImage->resize(150,82.5);
          
           $thumbnailImage->save($originalPath.$name);
           $thumbnailImage->heighten(200, function ($constraint){
            $constraint->upsize();
        });
            $thumbnailImage->save($thumbnailPath.$name); 
   
        //}
        
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

        $validator = Validator::make($request->all(), [
            'filename' => 'image|required|mimes:jpeg,png,jpg,gif,svg',
        ]);

        if ($validator->fails()) {
            return back()
            ->withErrors($validator)
            ->withInput();
        }

        $publication= Publication::find($id);
        $name="";
      
        if($request->hasfile('filename')){
            $oldImageThumb = public_path().'/images/thumbnail/'.$publication->pubpic; // get previous image from folder
            $oldImageOrig = public_path().'/images/'.$publication->pubpic;
            @unlink($oldImageThumb); //delete thumnail and original image respectively
            @unlink($oldImageOrig);
        }
      
        
           //create;

           $originalImage= $request->file('filename');
           $name=time().$originalImage->getClientOriginalName();
           $thumbnailImage = Image::make($originalImage);
           $thumbnailPath = public_path().'/images/thumbnail/';
           $originalPath = public_path().'/images/';
           $thumbnailImage->heighten(180, function ($constraint){
            $constraint->upsize();
        });
          
           $thumbnailImage->save($originalPath.$name);
           $thumbnailImage->heighten(200, function ($constraint){
            $constraint->upsize();
        });
            $thumbnailImage->save($thumbnailPath.$name); 
   
        //}

                
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
