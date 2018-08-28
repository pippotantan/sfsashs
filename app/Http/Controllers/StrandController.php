<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Image;
use Validator;
use App\Strand;
class StrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   
    public function __construct()
    {
        $this->middleware('auth')->except('show');
    }

   
     public function index()
    {
        $strands = Strand::orderBy('strand', 'asc')->paginate(5);
        return view('strands.index', compact('strands'));
 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('strands.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'image' => 'image|required|mimes:jpeg,png,jpg,gif,svg',
        ]);

        if ($validator->fails()) {
            return redirect('strands/create')
                        ->withErrors($validator)
                        ->withInput();
        }
        
        $name="none";

           $originalImage= $request->file('image');
           $name=time().$originalImage->getClientOriginalName();
           $thumbnailImage = Image::make($originalImage);
           $thumbnailPath = public_path().'/images/thumbnail/';
           $originalPath = public_path().'/images/';
           $thumbnailImage->resize(900, 600, function ($constraint){
            $constraint->aspectRatio();
        });
           $thumbnailImage->save($originalPath.$name);
          
           $thumbnailImage->resize(200, 200, function ($constraint){
            $constraint->aspectRatio();
        });
            $thumbnailImage->save($thumbnailPath.$name); 
   
        //}
        
       $strand= new \App\Strand;
       $strand->strand=$request->get('strand');
       $strand->short_desc=$request->get('short_desc');
       $strand->long_desc=$request->get('long_desc');
       $strand->created_by=auth()->user()->name;
       $strand->strandpic=$name;
       
       
       //$publication->pub_pic=$name;rrr
       $strand->save();
       //\Session::flash('flash_message','Article successfully published.'); //<--FLASH MESSAGE
        $m = 'Strand ' . $request->get('strand'). ' created successfully!';
       return redirect('strands')->with('success', $m);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $strand = Strand::all()->find($id);
        //return view('strands.details', ['strand' => Strand::find($id)]);
        return view('strands.details', compact('strand'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $strand = Strand::find($id);
        return view('strands.edit',compact('strand','id'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'image' => 'image|required|mimes:jpeg,png,jpg,gif,svg',
        ]);

        if ($validator->fails()) {
            return back()
            ->withErrors($validator)
            ->withInput();
        }

        $strand= Strand::find($id);
        $name="";
      
        if($request->hasfile('image')){
            $oldImageThumb = public_path().'/images/thumbnail/'.$strand->strandpic; // get previous image from folder
            $oldImageOrig = public_path().'/images/'.$strand->strandpic;
            @unlink($oldImageThumb); //delete thumnail and original image respectively
            @unlink($oldImageOrig);
        }
      
        
           //create;

           $originalImage= $request->file('image');
           $name=time().$originalImage->getClientOriginalName();
           $thumbnailImage = Image::make($originalImage);
           $thumbnailPath = public_path().'/images/thumbnail/';
           $originalPath = public_path().'/images/';
           $thumbnailImage->resize(900, 600, function ($constraint){
           $constraint->aspectRatio();
        });
           $thumbnailImage->save($originalPath.$name);
          
           $thumbnailImage->resize(200, 200, function ($constraint){
           $constraint->aspectRatio();
        });
            $thumbnailImage->save($thumbnailPath.$name); 
   
        //}

                
            $strand->strand=$request->get('strand');
            $strand->short_desc=$request->get('short_desc');
            $strand->long_desc=$request->get('long_desc');
            $strand->created_by=auth()->user()->name;
            if(!$name==""){$strand->strandpic=$name;}
            $strand->save();
            $m = 'Strand ' . $request->get('strand'). ' updated successfully!';
            return redirect('strands')->with('success', $m);;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $strand = Strand::find($id);
        $strand->delete();
        $m = 'Strand ' . $strand['strand'] . ' deleted successfully!';
        return redirect('strands')->with('success',$m);
    }
}
