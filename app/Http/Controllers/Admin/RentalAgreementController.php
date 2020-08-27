<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\admincategory;
use App\Models\Icons\CategoryIconModel;
use App\Models\legalDocx\LegalDocumentModel;

class RentalAgreementController extends Controller
{
    //
    public function index()
    {
    	return view('admin.legal-docx.rental-agreement');
    }
    
    // insert data into 1) category_icon_tbls and 2) legal_document_tbls

    public function insert_data(Request $request)
    {
    	$file = $request->file('filename2');

    	$full_description = $_POST['full_description'];
    	$short_description = $_POST['short_description'];
    	$legal_title = $_POST['legal_title'];
    	$document_type = $_POST['document_type'];
    	$category_name = $_POST['category_name'];
    	$category_icons = $_POST['category_icons'];

    	// for file part
    	if($file != null)
    	{
    		$file_name = rand(10000,99999).$file->getClientOriginalName();
    		$file_ext = $file->getClientOriginalExtension();

    		if($file_ext == "jpeg" || $file_ext == "jpg" || $file_ext == "png" || $file_ext == "doc" || $file_ext == "docx" || $file_ext == "pdf")
    		{
    			$real_Path = $file->getRealPath();
    			$file_size = $file->getSize();
    			$mime_type = $file->getMimeType();
    			$move_path = "uploads/legal-document";
    			$file->move($move_path,$file_name);
    			$path_with_img = $move_path."/".$file_name;
    		}
    		else
    		{
    			$return_msg = "file type error";
    		}
    	}
    	else
    	{
    		$path_with_img = "no file";
    	}

    	// for icons part
    	if($category_icons != null)
    	{
    		$icon_data = $category_icons;

    		$countAvaliable = CategoryIconModel::where('category_id',$category_name)->count();

    		if($countAvaliable > 0)
    		{
    			$icon_insert_already = "icons already inserted";
    		}
    		else if($countAvaliable == 0)
    		{
    			$icon_Arr = [
    				'category_id' => $category_name,
    				'category_icons' => $category_icons,
    			];
    			$insert_icons = CategoryIconModel::insert($icon_Arr);
    		}
    		
    	}
    	else
    	{
    		$icon_data = "no icon";
    	}
    	

    	// input Query
    	
    	// legal document insert 
    	$arr1 = [
    		'category_id' => $category_name,
    		'agreement_title' => $legal_title,
    		'legal_cate_type' => $document_type,
    		'agreement_short_desc' => $short_description,
    		'agreement_full_desc' => $full_description,
    		'agreement_category_desc' => 'none',
    		'agreement_file_upload' => $path_with_img,
    		'created_at' => date('Y-m-d H:i:s'),
    		'updated_at' => date('Y-m-d H:i:s')
   		];

    	$insertQuery = LegalDocumentModel::insert($arr1);

    	if($insertQuery)
    	{
    		$return_msg = "success";
    	}
    	else
    	{
    		$return_msg = "error";
    	}

    	echo $return_msg;
    	// end of input Query
    	
    }

    // icons loaded by category

    public function category_load_for_icons()
    {
    	$cateShowQuery = admincategory::get();

    	$html = '<option value="">Choose a category</option>';
    	foreach($cateShowQuery as $cShow)
    	{
    		$html .= '<option value="'.$cShow->id.'">'.$cShow->category_name.'</option>';
    	}

    	echo json_encode($html);
    }


    // load all legal document
    public function load_rental_agreement()
    {
    	$countQuery = LegalDocumentModel::count();
    	$html = '<tr>
    	          <th style="width: 10px">#</th>
    	          <th>Title</th>
    	          <th>Legal Doc. Type</th>
                  <th class="w30">Legal Short Description</th>
    	          <th class="w30">Legal Full Description</th>
    	          <th>Image Upload</th>
    	          <th>Action</th>
    	        </tr>';
    	

    	if($countQuery > 0)
    	{
    		$Query = LegalDocumentModel::get();
    		$i = 1;
    		foreach($Query as $q1)
    		{
    			if($q1->agreement_file_upload == "no file")
    			{
    				$file_data = "no file added";
    			}
    			else
    			{
    				$file_data = "<img src='".url($q1->agreement_file_upload)."' alt='".$q1->agreement_title."' width='200px' height='100px' />";
    			}


    			$html .= '<tr>
    						<td>
                              '.$i.'  	
                            </td>
                            <td>
                               '.$q1->agreement_title.'  	
                            </td>
                            <td>
                                '.$q1->legal_cate_type.'    
                            </td>
                            <td>
                                '.$q1->agreement_short_desc.'    
                            </td>
                            <td>
                                '.$q1->agreement_full_desc.'    
                            </td>
                            <td>
                                '.$file_data.'    
                            </td>
                            <td>
                                <a href="javascript: ;" onclick="delete_legal_document('.$q1->id.')" class="text-danger"><i class="fa fa-trash"></i></a>    
                            </td>
                         </tr>';
                            $i++;
    		}
    	}else{
    		$html .= '<tr><td colspan="7" class="text-warning"><center><i class="fa fa-times"></i> No legal documents into  the database!</center></td></tr>';
    	}
    	echo json_encode($html);
    	
    }

    // delete legal docx
    public function deleting_legal_docx()
    {
    	$legal_id = $_GET['legal_id'];

    	$deleteQuery = LegalDocumentModel::where(['id' => $legal_id])->delete();
    	echo json_encode("success");
    }

    







                    // --------------Rental Agreement----------- \\

    public function rental_agreement_load()
    {
        return view('admin.legal-docx.agreement-download');
    }


    public function view_show_rental_agreement()
    {
        $query = LegalDocumentModel::get();
        $html  = '<tr>
                    <th style="width: 10px">#</th>
                    <th>Title</th>
                    <th>Type</th>
                    <th>Action</th>
                 </tr>';
                 $i = 1;
        foreach($query as $q1)
        {
            $html .= '<tr><td>'.$i.'</td><td>'.$q1->agreement_title.'</td><td>'.$q1->legal_cate_type.'</td><td><a href="javascript: ;" onclick="asking_modal('.$q1->id.')" class="text-danger"><i class="fa fa-trash"></i></a></td></tr>';
            $i++;
        }

        echo json_encode($html);
    }


    public function submit_legal_agreement()
    {
        $query_insert = LegalDocumentModel::where(['id' => $_GET['title_id']])->update(['agreement_full_details' => $_GET['editor1']]);
        if($query_insert)
        {
            $html = "success";
        }
        else
        {
            $html = "error";
        }
        echo json_encode($html);
    }

    public function agreement_all_title()
    {
        $query = LegalDocumentModel::get();
        $html = '<option value="">Choose a title</option>';

        foreach($query as $qm)
        {
            $html .= '<option value="'.$qm->id.'">'.$qm->agreement_title.'</option>';
        }

        echo json_encode($html);
    }


}
