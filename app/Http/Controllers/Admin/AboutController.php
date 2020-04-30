<?php

namespace App\Http\Controllers\Admin;

use App\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $aboutUsData = About::latest()->get();
        return view('admin.about.view',compact('aboutUsData'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //

            $title = $request->input('title');
            $desc = $request->input('desc');

            $file = $request->file('image');
            $file_name = $file->getClientOriginalName();
            $myNew_file = rand(0,999999).$file_name;
            $file_type = $file->getClientOriginalExtension();
            $enc_type = $file->getClientOriginalExtension();
            $data_checking = 0;
            if($enc_type == 'jpeg' || $enc_type == 'jpg' || $enc_type == 'webp' || $enc_type == 'png' || $enc_type == 'gif')
            {
                $real_path = $file->getRealPath();
                $file_size = $file->getSize();
                $meme_type = $file->getMimeType();
                $destinationPath = 'uploads/about-img';
                $file->move($destinationPath,$myNew_file);

                $myActualPath = $destinationPath.'/'.$myNew_file;


                About::insert([
                           'about_image' => $myActualPath,
                           'about_title' => $title,
                           'about_description' => $desc,
                        ]);
                $data_checking = 1;
                
            }
            else
            {
                $myActualPath = "";
                $is_uploaded = '0';
                $file_type = "";
                $data_checking = 0;
            }

            
        echo json_encode($data_checking);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\About  $about
     * @return \Illuminate\Http\Response
     */
    public function show(About $about)
    {
        //
        $aboutUsData = About::latest()->get();
        echo json_encode($aboutUsData);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\About  $about
     * @return \Illuminate\Http\Response
     */
    public function edit(About $about)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\About  $about
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
            $title = $request->input('title');
            $desc = $request->input('desc');

            $file = $request->file('image');
            if($file != null){
                $file_name = $file->getClientOriginalName();
                $myNew_file = rand(0,999999).$file_name;
                $file_type = $file->getClientOriginalExtension();
                $enc_type = $file->getClientOriginalExtension();
                $data_checking = 0;
                if($enc_type == 'jpeg' || $enc_type == 'jpg' || $enc_type == 'webp' || $enc_type == 'png' || $enc_type == 'gif')
                {
                    $real_path = $file->getRealPath();
                    $file_size = $file->getSize();
                    $meme_type = $file->getMimeType();
                    $destinationPath = 'uploads/about-img';
                    $file->move($destinationPath,$myNew_file);

                    $myActualPath = $destinationPath.'/'.$myNew_file;


                    About::where('id', 2)->update([
                               'about_image' => $myActualPath,
                               'about_title' => $title,
                               'about_description' => $desc,
                            ]);
                    $data_checking = 1;
                    
                }
                else
                {
                    $myActualPath = "";
                    $is_uploaded = '0';
                    $file_type = "";
                    $data_checking = 0;
                }
            }else{
                About::where('id', 2)->update([
                               'about_title' => $title,
                               'about_description' => $desc,
                            ]);
                $data_checking = 1;
            }
            

            
        echo json_encode($data_checking);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\About  $about
     * @return \Illuminate\Http\Response
     */
    public function destroy(About $about)
    {
        //
    }

    public function showFrontAbout()
    {
        return view('frontend.front-pages.about');
    }
}
