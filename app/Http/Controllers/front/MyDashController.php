<?php

namespace App\Http\Controllers\front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class MyDashController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    

    public function index()
    {

        //
        if(session('cart') && session('myClientPhoneCall') && session('myClientCate'))
        {
            $category_name = Session::get('myClientCate');
            $redire= Session::get('cart');
            $phone_number = Session::get('myClientPhoneCall');
            Session::put('jobPostDataSent','12'); 


            $elements = array();
            foreach( $redire as $key=>$data)
            {
               $elements[] = $data['question_name']."=>".$data['Answer'];

            }
            $dzz = implode(',', $elements);

            $array_data = [
                'client_id'=>Auth::user()->id,
                'category_id'=>$category_name,
                'quesAnsDescrip'=>$dzz,
                'phone_number'=>$phone_number

            ];
            DB::table('jobanswerclinetdesc')->insert($array_data);
            $dzz = "";
            session()->forget('cart');  
            session()->forget('myClientPhoneCall');
            session()->forget('myClientCate');

        }
        return view('frontend.front-pages.dashboard');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  \App\r  $r
     * @return \Illuminate\Http\Response
     */
    public function show(r $r)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\r  $r
     * @return \Illuminate\Http\Response
     */
    public function edit(r $r)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\r  $r
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, r $r)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\r  $r
     * @return \Illuminate\Http\Response
     */
    public function destroy(r $r)
    {
        //
    }
}
