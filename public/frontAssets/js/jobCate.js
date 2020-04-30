$(function(){
	var segment_str = window.location.pathname; // return segment1/segment2/segment3/segment4
	var segment_array = segment_str.split( '/' );
	var last_segment = segment_array.pop();
	var jcategory_id = window.atob(last_segment);
	// console.log(jcategory_id);
	// mycountstate(jcategory_id);
	var myDate;
	$.ajax({
		url: '/mycountstate',
		type: 'GET',
		data: {data: jcategory_id},
		dataType: 'json',
		success: function(response){
			$.ajax({
				url: "/myCategoryQ",
				type: "GET",
				data: {cate_id: jcategory_id},
				dataType: "json",
				success: function(event_resp)
				{
					var html = '';
					html += '<fieldset><h2 class="fs-title">'+event_resp[0].category_name+' Job Posting</h2><p class="text-justify">'+event_resp[0].category_title+'</p><p class="text-justify">'+event_resp[0].category_description+'</p><input type="button" name="previous" class="previous action-button-previous" value="Previous" onclick="backHome()"/><input type="button" name="next" class="next action-button" value="Next"/></fieldset>';
					$('#msform').html(html);
				},
				error:  function(event_resp)
				{

				}
			})
			myDate = response;
			myCallJobQuestion(jcategory_id,myDate);
		}, error: function(response){

		}
	});	
});

function myCallJobQuestion(jc_id, myDate)
{
	$.ajax({
		url: '/jobQuestionSelect',
		type: 'GET',
		data: {data: jc_id},
		dataType: 'json',
		success: function(event){
			$.ajax({
				url: '/jobQuesOptSelect',
				type: 'GET',
				data: {q_id: event[0].question_id},
				dataType: 'json',
				success: function(event1){
					if(event[0].question_subheading != null)
					{ 
							var data_view1 = "display: block"; 
					}else{ 
							var data_view1 = "display: none";
					}

					if(event[0].question_description != null)
					{ 
							var data_view2 = "display: block"; 
					}else{ 
							var data_view2 = "display: none";
					}


				 	var html = '<fieldset ><h2 class="fs-title">'+event[0].question_name+'</h2><p class="text-justify" style="'+data_view1+'">'+event[0].question_subheading+'</p><p style="'+data_view2+'">'+event[0].question_description+'</p>';
				 	if(event[0].question_type == 1)
				 	{
				 		fieldsetcount = $('fieldset').length+1;
				 		html += '<input type="text" name="text_data" class="text_data s_data'+fieldsetcount+'" placeholder="" onfocusout="myFunctest('+jc_id+','+event[0].question_id+',0)"/>';
				 	} 
				 	else if(event[0].question_type == 2)
				 	{
				 		fieldsetcount = $('fieldset').length+1;
				 		html += '<ul class="list-option">';
				 		for(var i = 0; i <event1.length; i++ )
				 		{
				 			html += '<li><label><input type="radio" value="'+event1[i].id+'" name="optradio" onchange="myFunctest('+jc_id+','+event[0].question_id+','+fieldsetcount+event1[i].id+')" class="text_data s_data'+fieldsetcount+event1[i].id+'"> '+event1[i].option_label+'</label></li>';
				 		}
				 		html += '</ul>';
				 	}
				 	else if(event[0].question_type == 3)
				 	{
				 		fieldsetcount = $('fieldset').length+1;
				 		html += '<textarea name="" class="text_data s_data'+fieldsetcount+'" placeholder="Message" onfocusout="myFunctest('+jc_id+','+event[0].question_id+',0)"></textarea>';
				 	}
				 	else if(event[0].question_type == 4)
				 	{
				 		fieldsetcount = $('fieldset').length+1;
				 		html += '<ul class="list-option">';
				 		for(var i = 0; i <event1.length; i++ )
				 		{
				 			console.log();
				 			html += '<li><label><input type="checkbox" name="remember" onclick="myFunctest('+jc_id+','+event[0].id+','+fieldsetcount+event1[i].id+')" value="'+event1[i].id+'"  class="text_data s_data'+fieldsetcount+event1[i].id+'"> '+event1[i].option_label+'</label></li>';
				 		}
				 		html += '</ul>';
				 	}
				 	else if(event[0].question_type == 5)
				 	{
				 		fieldsetcount = $('fieldset').length+1;
				 		html += '<select name="" class="text_data s_data'+fieldsetcount+'"  onchange="myFunctest('+jc_id+','+event[0].question_id+','+fieldsetcount+')"><option value="">Select</option>';
                    	for(var i = 0; i <event1.length; i++ )
                    	{
                    		html += '<option value="'+event1[i].id+'">'+event1[i].option_label+'</option>';
                    	}
				 	}
				 	else if(event[0].question_type == 6)
				 	{
				 		fieldsetcount = $('fieldset').length+1;
				 		html += '<select name="" class="text_data s_data'+fieldsetcount+'" multiple="multiple" id="multy-select" onchange="myFunctest('+jc_id+','+event[0].question_id+','+fieldsetcount+')"><option value="">Select</option>';
                    	for(var i = 0; i <event1.length; i++ )
                    	{
                    		html += '<option value="'+event1[i].id+'"> '+event1[i].option_label+'</option>';
                    	}
				 	}
				 	else if(event[0].question_type == 7)
				 	{
				 		fieldsetcount = $('fieldset').length+1;
				 		html += '<ul class="list-option">';
				 		for(var i = 0; i <event1.length; i++ )
				 		{
				 			html += '<li><label><input type="checkbox" class="text_data s_data'+fieldsetcount+'" name="remember[]" onchange="onclick('+jc_id+','+event[0].question_id+','+fieldsetcount+event1[i].id+')" value="'+event1[i].id+'"  class="text_data s_data'+fieldsetcount+event1[i].id+'"> '+event1[i].option_label+'</label></li>';
				 		}
				 		html += '</ul>';
				 	}

				 	
                    html += '<input type="button" name="previous" class="previous action-button-previous" value="Previous"/><input type="button" name="next" class="next action-button" value="Next" id="lastIdnext" onclick="myFunction('+event[0].next_ques_id+','+jc_id+')"/></fieldset>';

                    $('#msform').append(html);
                    wishCategoryCheck();
				}
			})
		}
	})
}


function do_dump_c(nxt_qid,c_id){
	
	
var tmp_g = "";
	var opt_val = jQuery('.text_data').val();
				$.ajax({
					url: '/nextQuestionRound',
					type: 'GET',
					async: false,
					data: {nxt_id: nxt_qid, c_id: c_id, opt_val: opt_val},
					dataType: 'json',
					success: function(event1){
						console.log(event1);
						var fieldsetcount = "";
						if(event1.my_status == 5){
						if(event1.without_opt[0].question_subheading != null)
						{ 
								var data_view1 = "display: block"; 
						}else{ 
								var data_view1 = "display: none";
						}

						if(event1.without_opt[0].question_description != null)
						{ 
								var data_view2 = "display: block"; 
						}else{ 
								var data_view2 = "display: none";
						}

					 	var html_new = '<h2 class="fs-title">'+event1.without_opt[0].question_name+'</h2><p class="text-justify" style="'+data_view1+'">'+event1.without_opt[0].question_subheading+'</p><p style="'+data_view2+'">'+event1.without_opt[0].question_description+'</p>';
					 	if(event1.without_opt[0].question_type == '1' || event1.without_opt[0].question_type == 1)
					 	{
	                    	fieldsetcount = $('fieldset').length+1;
					 		html_new += '<input type="text" name="twitter" id ="s_data"  class="s_data'+fieldsetcount+'" placeholder="Name" onfocusout="myFunctest1('+c_id+','+event1.without_opt[0].question_id+','+fieldsetcount+')"/>';
					 	} 
					 	else if(event1.without_opt[0].question_type == 2)
					 	{

					 		fieldsetcount = $('fieldset').length+1;
					 		html_new += '<ul class="list-option">';
					 		for(var i = 0; i <event1.with_opt.length; i++ )
					 		{
					 			html_new += '<li><label><input id ="s_data"  onclick="myFunctest1('+c_id+','+event1.without_opt[0].question_id+','+fieldsetcount+event1.with_opt[i].id+')" type="radio" value="'+event1.with_opt[i].id+'" name="optradio" class="text_data s_data'+fieldsetcount+event1.with_opt[i].id+'"> '+event1.with_opt[i].option_label+'</label></li>';
					 		}
					 		html_new += '</ul>';
					 	}
					 	else if(event1.without_opt[0].question_type == 3)
					 	{
					 		fieldsetcount = $('fieldset').length+1;
					 		html_new += '<textarea name="" id ="s_data"  class="text_data s_data'+fieldsetcount+'" placeholder="Message" onfocusout="myFunctest1('+c_id+','+event1.without_opt[0].question_id+','+fieldsetcount+')"></textarea>';
					 	}
					 	else if(event1.without_opt[0].question_type == 4)
					 	{
					 		fieldsetcount = $('fieldset').length+1;
					 		html_new += '<ul class="list-option">';
					 		for(var i = 0; i <event1.with_opt.length; i++ )
					 		{

					 			html_new += '<li><label><input id ="s_data"  type="checkbox" onclick="myFunctest1('+c_id+','+event1.without_opt[0].question_id+','+fieldsetcount+event1.with_opt[i].id+')" name="remember" value="'+event1.with_opt[i].id+'"  class="text_data s_data'+fieldsetcount+event1.with_opt[i].id+'"> '+event1.with_opt[i].option_label+'</label></li>';
					 		}
					 		html_new += '</ul>';
					 	}
					 	else if(event1.without_opt[0].question_type == 5)
					 	{
					 		fieldsetcount = $('fieldset').length+1;
					 		html_new += '<select name=""  id ="s_data"   class="text_data s_data'+fieldsetcount+'" onchange="myFunctest1('+c_id+','+event1.without_opt[0].question_id+','+fieldsetcount+')"><option value="">Select</option>';
					 		for(var i = 0; i <event1.with_opt.length; i++ )
					 		{
					 			html_new += '<option value="'+event1.with_opt[i].id+'">'+event1.with_opt[i].option_label+'</option>';
					 		}
	                    	html_new += "</select>";
					 	}
					 	else if(event1.without_opt[0].question_type == 6)
					 	{
					 		fieldsetcount = $('fieldset').length+1;
					 		html_new += '<select name=""  id ="s_data" class="text_data s_data'+fieldsetcount+'" multiple="multiple" onchange="myFunctest1('+c_id+','+event1.without_opt[0].question_id+','+fieldsetcount+')" id="multy-select" ><option value="">Select</option>';
	                    	for(var i = 0; i <event1.with_opt.length; i++ )
	                    	{
	                    		html_new += '<option value="'+event1.with_opt[i].id+'"> '+event1.with_opt[i].option_label+'</option>';
	                    	}
					 	}
					 	else if(event1.without_opt[0].question_type == 7)
					 	{
					 		fieldsetcount = $('fieldset').length+1;
					 		html_new += '<ul class="list-option">';
					 		for(var i = 0; i <event1.with_opt.length; i++ )
					 		{
					 			html_new += '<li><label><input type="checkbox" id ="s_data"  class="text_data s_data'+fieldsetcount+'" name="remember[]" value="'+event1.with_opt[i].id+'"   onclick="myFunctest1('+c_id+','+event1.without_opt[0].question_id+','+fieldsetcount+event1.with_opt[i].id+')"> '+event1.with_opt[i].option_label+'</label></li>';
					 		}
					 		html_new += '</ul>';
					 	}

					 	
	                    html_new += '<input type="button" name="previous" class="previous action-button-previous "   value="Previous" /><input type="button" name="next" class="next action-button lastIdnext"  value="Next" onclick="myFunction('+event1.without_opt[0].next_ques_id+','+c_id+')"/>';
	                   	tmp_g = html_new;
	                   	
	                    
					}else if(event1.my_status == 10){
						if(event1.my_log == 10){
							if(event1.without_opt[0].question_subheading != null)
							{ 
									var data_view1 = "display: block"; 
							}else{ 
									var data_view1 = "display: none";
							}

							if(event1.without_opt[0].question_description != null)
							{ 
									var data_view2 = "display: block"; 
							}else{ 
									var data_view2 = "display: none";
							}
						var html_new = '<h2 class="fs-title">'+event1.without_opt[0].question_name+'</h2><p class="text-justify" style="'+data_view1+'">'+event1.without_opt[0].question_subheading+'</p><p style="'+data_view2+'">'+event1.without_opt[0].question_description+'</p>';
					 	if(event1.without_opt[0].question_type == '1' || event1.without_opt[0].question_type == 1)
					 	{
	                    	fieldsetcount = $('fieldset').length+1;
					 		html_new += '<input id ="s_data" class="s_data'+fieldsetcount+'" type="text" name="twitter" placeholder="Name" onfocusout="myFunctest1('+c_id+',0,'+fieldsetcount+')"/>';
					 	} 
					 	else if(event1.without_opt[0].question_type == 2)
					 	{
					 		fieldsetcount = $('fieldset').length+1;
					 		html_new += '<ul class="list-option">';
					 		for(var i = 0; i <event1.with_opt.length; i++ )
					 		{
					 			html_new += '<li><label><input id ="s_data"  type="radio" value="'+event1.with_opt[i].id+'" onclick="myFunctest1('+c_id+',0,'+fieldsetcount+event1.with_opt[i].id+')" name="optradio" class="text_data s_data'+fieldsetcount+event1.with_opt[i].id+'"> '+event1.with_opt[i].option_label+'</label></li>';
					 		}
					 		html_new += '</ul>';
					 	}
					 	else if(event1.without_opt[0].question_type == 3)
					 	{
					 		fieldsetcount = $('fieldset').length+1;
					 		html_new += '<textarea name="" id ="s_data" class="text_data s_data'+fieldsetcount+'" placeholder="Message" onfocusout="myFunctest1('+c_id+',0,'+fieldsetcount+')"></textarea>';
					 	}
					 	else if(event1.without_opt[0].question_type == 4)
					 	{
					 		fieldsetcount = $('fieldset').length+1;
					 		html_new += '<ul class="list-option">';
					 		for(var i = 0; i <event1.with_opt.length; i++ )
					 		{
					 			html_new += '<li><label><input id ="s_data" type="checkbox" name="remember" onclick="myFunctest1('+c_id+',0,'+fieldsetcount+event1.with_opt[i].id+')" value="'+event1.with_opt[i].id+'"  class="text_data s_data'+fieldsetcount+event1.with_opt[i].id+'"> '+event1.with_opt[i].option_label+'</label></li>';
					 		}
					 		html_new += '</ul>';
					 	}
					 	else if(event1.without_opt[0].question_type == 5)
					 	{
					 		fieldsetcount = $('fieldset').length+1;
					 		html_new += '<select name=""  id ="s_data"  class="text_data s_data'+fieldsetcount+'" onchange="myFunctest1('+c_id+',0,'+fieldsetcount+')"><option value="">Select</option>';
					 		for(var i = 0; i <event1.with_opt.length; i++ )
					 		{
					 			html_new += '<option value="'+event1.with_opt[i].id+'">'+event1.with_opt[i].option_label+'</option>';
					 		}
	                    	html_new += "</select>";
					 	}
					 	else if(event1.without_opt[0].question_type == 6)
					 	{
					 		fieldsetcount = $('fieldset').length+1;
					 		html_new += '<select name=""  id ="s_data"class="text_data s_data'+fieldsetcount+'" multiple="multiple" onchange="myFunctest1('+c_id+',0,'+fieldsetcount+')" id="multy-select" ><option value="">Select</option>';
	                    	for(var i = 0; i <event1.with_opt.length; i++ )
	                    	{
	                    		html_new += '<option value="'+event1.with_opt[i].id+'"> '+event1.with_opt[i].option_label+'</option>';
	                    	}
					 	}
					 	else if(event1.without_opt[0].question_type == 7)
					 	{
					 		fieldsetcount = $('fieldset').length+1;
					 		html_new += '<ul class="list-option">';
					 		for(var i = 0; i <event1.length; i++ )
					 		{
					 			html_new += '<li><label><input id ="s_data" type="checkbox" class="text_data s_data'+fieldsetcount+event1.with_opt[i].id+'" onclick="myFunctest1('+c_id+',0,'+fieldsetcount+event1.with_opt[i].id+')" name="remember[]" value="'+event1.with_opt[i].id+'"  class="text_data"> '+event1.with_opt[i].option_label+'</label></li>';
					 		}
					 		html_new += '</ul>';
					 	}
					 	html_new += '<input type="button" name="previous" class="previous action-button-previous "   value="Previous" /><input type="button" name="next" class="next action-button lastIdnext"  value="Next" onclick="myFunction(0,0)"/>';

						}else if(event1.my_log == 5){
							var html_new = '<h2 class="fs-title">Would you like to receive text (SMS) notifications</h2><ul class="list-option"><li><label><input type="radio" name="optradio_phn" value="1" onclick="phn_no_show_check()">Yes</label></li><li><label><input type="radio" name="optradio_phn" value="0" checked onclick="phn_no_show_check()">No</label>    </li></ul><div class="phn-class" style="display:none;"><h3 class="fs-subtitle">Once you enter your phone number, click "Next". You will receive a text message from UpCounsel. Reply "Yes" to confirm your number. Message & data rates may apply.</h3><input type="text" name="twitter" id="phn_number_show_client" value=""  placeholder="Phone Number"/></div><input type="button" name="previous" class="previous action-button-previous" value="Previous"/><input type="button" name="submit" class="submit action-button" onclick="submit_client_data()" value="Submit"/>';
						}
						tmp_g = html_new;
					}
					}
				})
				
				return tmp_g;
	
	
}



// function mycountstate(jcategory_id)
// {
// 	$.ajax({
// 		url: '/mycountstate',
// 		type: 'GET',
// 		data: {data: jcategory_id},
// 		dataType: 'json',
// 		success: function(response){

// 		}, error: function(response){

// 		}
// 	})
// }

function backHome()
{
	window.location.href="/";
}

function myFunctest(c_id,q_id,jq_id)
{
	if(jq_id != 0 || jq_id != '0'){
		var opt_id = $('.s_data'+jq_id).val();
	}else{
		var opt_id = 0;
	}
	
	console.log(c_id +" "+opt_id+ " "+ q_id);
	$.ajax({
		url: '/nextQuesInitId',
		type: 'get',
		data: {c_id:  c_id, q_id: q_id, opt_id: opt_id},
		dataType: 'json',
		success:  function(rep){
			$("#lastIdnext").attr('onclick', 'myFunction('+rep[0].next_ques_id+','+c_id+')');
		}, error:  function(rep){

		}
	})
	
}



function myFunction(nxt_qid,c_id)

{
	var data = do_dump_c(nxt_qid,c_id);
	var html_new = '<fieldset>';
	html_new += data;
	html_new += '</fieldset>';
	jQuery('#msform').append(html_new);
    wishCategoryCheck();
}


function myFunctest1(c_id,q_id,jq_id)
{
	// var opt_id = $(this).find('.s_data').val();
	var opt_id = $('.s_data'+jq_id).val();
	
	$.ajax({
		url: '/nextQuesInitId',
		type: 'get',
		data: {c_id:  c_id, q_id: q_id, opt_id: opt_id},
		dataType: 'json',
		success:  function(rep){
			console.log(rep);
			$(".lastIdnext").attr('onclick', 'myFunction('+rep[0].next_ques_id+','+c_id+')');
		}, error:  function(rep){

		}
	})
	
}

// function myRemoveField()
// {
// 	$( "fieldset" ).last().remove();
// 	wishCategoryCheck();
// }


// function simpleSelectO(nxt_qid)
// {
// 	var tmp_g1 = "";
// 	var html_new = "";
// 	$.ajax({
// 		url: '/multiOptionN',
// 		type: 'GET',
// 		data: {nxt_id: nxt_qid},
// 		dataType: 'json',
// 		success:  function(eventO)
// 		{
// 			for(var i = 0; i <eventO.length; i++ )
// 			{
// 				html_new += '<option value="'+eventO[i].id+'">'+eventO[i].option_label+'</option>';
// 			}
// 			tmp_g1 = html_new;
// 		}
// 	})
// 	return tmp_g1;
// }
function phn_no_show_check(){
	if ($("input[name='optradio_phn']:checked").val() == 1) {
     	$(".phn-class").show();
	}else if($("input[name='optradio_phn']:checked").val() == 0){
		$(".phn-class").hide();
	}
}

function submit_client_data(){
	var phn_no = $("#phn_number_show_client").val();
	$.ajax({
		url: '/submitClientJobData',
		type: 'GET',
		dataType: 'json',
		data: {phn_no: phn_no},
		success: function(event)
		{
			console.log(event);
			if(event.redirectTo_page == 1)
			{
				window.location.href="/dashboard";
			}else if(event.redirectTo_page == 0){
				window.location.href="/login";
			}
			
		}
	})
}