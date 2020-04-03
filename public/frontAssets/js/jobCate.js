$(function(){
	var segment_str = window.location.pathname; // return segment1/segment2/segment3/segment4
	var segment_array = segment_str.split( '/' );
	var last_segment = segment_array.pop();
	var jcategory_id = atob(last_segment);
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

				 	var html = '<fieldset ><h2 class="fs-title">'+event[0].question_name+'</h2><p class="text-justify">'+event[0].question_subheading+'</p><p>'+event[0].question_description+'</p>';
				 	if(event[0].question_type == 1)
				 	{
				 		html += '<input type="text" name="text_data" class="text_data" placeholder="" />';
				 	} 
				 	else if(event[0].question_type == 2)
				 	{

				 		html += '<ul class="list-option">';
				 		for(var i = 0; i <event1.length; i++ )
				 		{
				 			html += '<li><label><input type="radio" value="'+event1[i].id+'" name="optradio" onchange="myFunctest('+jc_id+','+event[0].question_id+')" class="text_data"> '+event1[i].option_label+'</label></li>';
				 		}
				 		html += '</ul>';
				 	}
				 	else if(event[0].question_type == 3)
				 	{
				 		html += '<textarea name="" class="text_data" placeholder="Message"></textarea>';
				 	}
				 	else if(event[0].question_type == 4)
				 	{
				 		html += '<ul class="list-option">';
				 		for(var i = 0; i <event1.length; i++ )
				 		{
				 			html += '<li><label><input type="checkbox" name="remember" onchange="myFunctest('+jc_id+','+event[0].question_id+')" value="'+event1[i].id+'"  class="text_data"> '+event1[i].option_label+'</label></li>';
				 		}
				 		html += '</ul>';
				 	}
				 	else if(event[0].question_type == 5)
				 	{
				 		html += '<select name="" class="text_data" id="s_data" onchange="myFunctest('+jc_id+','+event[0].question_id+')"><option value="">Select</option>';
                    	for(var i = 0; i <event1.length; i++ )
                    	{
                    		html += '<option value="'+event1[i].id+'">'+event1[i].option_label+'</option>';
                    	}
				 	}
				 	else if(event[0].question_type == 6)
				 	{
				 		html += '<select name="" class="text_data" multiple="multiple" id="multy-select" onchange="myFunctest('+jc_id+','+event[0].question_id+')"><option value="">Select</option>';
                    	for(var i = 0; i <event1.length; i++ )
                    	{
                    		html += '<option value="'+event1[i].id+'"> '+event1[i].option_label+'</option>';
                    	}
				 	}
				 	else if(event[0].question_type == 7)
				 	{
				 		html += '<ul class="list-option">';
				 		for(var i = 0; i <event1.length; i++ )
				 		{
				 			html += '<li><label><input type="checkbox" class="text_data" name="remember[]" onchange="myFunctest('+jc_id+','+event[0].question_id+')" value="'+event1[i].id+'"  class="text_data"> '+event1[i].option_label+'</label></li>';
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
					 	var html_new = '<h2 class="fs-title">'+event1[0].question_name+'</h2><p class="text-justify">'+event1[0].question_subheading+'</p><p>'+event1[0].question_description+'</p>';
					 	if(event1[0].question_type == '1' || event1[0].question_type == 1)
					 	{
	                    
					 		html_new += '<input type="text" name="twitter" placeholder="Name"/>';
					 	} 
					 	else if(event1[0].question_type == 2)
					 	{

					 		html_new += '<ul class="list-option">';
					 		for(var i = 0; i <event1.length; i++ )
					 		{
					 			html_new += '<li><label><input type="radio" value="'+event1[i].id+'" name="optradio" class="text_data"> '+event1[i].option_label+'</label></li>';
					 		}
					 		html_new += '</ul>';
					 	}
					 	else if(event1[0].question_type == 3)
					 	{
					 		html_new += '<textarea name="" class="text_data" placeholder="Message"></textarea>';
					 	}
					 	else if(event1[0].question_type == 4)
					 	{
					 		html_new += '<ul class="list-option">';
					 		for(var i = 0; i <event1.length; i++ )
					 		{
					 			html_new += '<li><label><input type="checkbox" name="remember" value="'+event1[i].id+'"  class="text_data"> '+event1[i].option_label+'</label></li>';
					 		}
					 		html_new += '</ul>';
					 	}
					 	else if(event1[0].question_type == 5)
					 	{
					 		html_new += '<select name="" class="text_data"><option value="">Select</option>';
	                    	for(var i = 0; i <event1.length; i++ )
	                    	{
	                    		html_new += '<option value="'+event1[i].id+'">'+event1[i].option_label+'</option>';
	                    	}
					 	}
					 	else if(event1[0].question_type == 6)
					 	{
					 		html_new += '<select name="" class="text_data" multiple="multiple" id="multy-select" ><option value="">Select</option>';
	                    	for(var i = 0; i <event1.length; i++ )
	                    	{
	                    		html_new += '<option value="'+event1[i].id+'"> '+event1[i].option_label+'</option>';
	                    	}
					 	}
					 	else if(event1[0].question_type == 7)
					 	{
					 		html_new += '<ul class="list-option">';
					 		for(var i = 0; i <event1.length; i++ )
					 		{
					 			html_new += '<li><label><input type="checkbox" class="text_data" name="remember[]" value="'+event1[i].id+'"  class="text_data"> '+event1[i].option_label+'</label></li>';
					 		}
					 		html_new += '</ul>';
					 	}

					 	
	                    html_new += '<input type="button" name="previous" class="previous action-button-previous" value="Previous" /><input type="button" name="next" class="next action-button" value="Next" onclick="myFunction('+event1[0].next_ques_id+','+c_id+')"/>';
	                   	tmp_g = html_new;
	                   	
	                    
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

function myFunctest(c_id,q_id)
{
	var opt_id = $('#s_data').val();
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
		alert(nxt_qid);
		var data = do_dump_c(nxt_qid,c_id);
		var html_new = '<fieldset>';
		html_new += data;
		html_new += '</fieldset>';
		console.log(html_new);
		jQuery('#msform').append(html_new);
         wishCategoryCheck();
  
}