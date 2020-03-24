<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class AdminProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $myProfile = DB::table('admins')->get();
        return view('admin.profile.view-edit',compact('myProfile'));
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
     * @param  \App\adminProfilePageModel  $adminProfilePageModel
     * @return \Illuminate\Http\Response
     */
    public function show(adminProfilePageModel $adminProfilePageModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\adminProfilePageModel  $adminProfilePageModel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $u_id)
    {
        //

        $request->validate([
            'p_pass' => 'required',
            'cp_pass' => 'required',
        ]);


        $pass = $request->p_pass;
        $cpass = $request->cp_pass;

        if($pass != $cpass)
        {

        $update_arr = [
            'password' => $request->p_pass,
        ];

        $update_query = DB::table('admins')->where('id',$u_id)->update($update_arr);
        }
        return redirect()->route('admin-profile.index')->with('success_pass','Password Successfully Changed');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\adminProfilePageModel  $adminProfilePageModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $u_id)
    {
        $request->validate([
            'profile_name' => 'required',
            'admin_email' => 'required',
        ]);


        // uploads files

        if($request->upload != '')
        {
            $file = $request->file('upload');
            $file_name = $file->getClientOriginalName();
            $file_type = $file->getClientOriginalExtension();
            $enc_type = $file->getClientOriginalExtension();
            if($enc_type == 'jpeg' || $enc_type == 'jpg' || $enc_type == 'webp' || $enc_type == 'png' || $enc_type == 'gif')
            {
                $real_path = $file->getRealPath();
                $file_size = $file->getSize();
                $meme_type = $file->getMimeType();
                $destinationPath = 'uploads/admin';
                $file->move($destinationPath,$file->getClientOriginalName());

                $myActualPath = $destinationPath.'/'.$file_name;
                
            }
            else
            {
                $myActualPath = "";
            }
            $update_arr = [
                'name' => $request->profile_name,
                'email' => $request->admin_email,
                'recovery_email' => $request->recovery_email,
                'admin_img' => $myActualPath,
            ];
        }
        else
        {
            $update_arr = [
                'name' => $request->profile_name,
                'email' => $request->admin_email,
                'recovery_email' => $request->recovery_email
            ];
        }

        $update_query = DB::table('admins')->where('id',$u_id)->update($update_arr);
        return redirect()->route('admin-profile.index')->with('success','Profile Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\adminProfilePageModel  $adminProfilePageModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(adminProfilePageModel $adminProfilePageModel)
    {
        //
    }
}
