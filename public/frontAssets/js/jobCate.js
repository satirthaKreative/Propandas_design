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
				success: function(event){
				 	console.log(event);	
				 	var html = '<fieldset><h2 class="fs-title">'+myDate+'Startup Job Posting</h2><p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium nam, ipsam voluptate ab iure qui veniam. Voluptatibus officiis voluptas in ipsum sed eum iusto architecto blanditiis eaque illum totam fugiat assumenda soluta et officia, ea, sequi nemo ad nihil perspiciatis eos quisquam mollitia cum facilis! Excepturi beatae nobis quo delectus nostrum ullam ad magnam tempora, laboriosam, expedita ex.</p><p class="text-justify"> Velit praesentium, facilis eius distinctio omnis temporibus quas aut odio fugit minima ducimus deserunt cumque, optio saepe molestiae ipsam unde laudantium. Quos deleniti consequatur, ex, debitis itaque excepturi, possimus laborum dolor esse veniam deserunt eos, doloribus dolorem tempore voluptate molestias sint saepe!</p><p><strong>A good description includes:</strong></p><ul><li>Unique details about your project or legal needs</li><li>Project timeline and expected deliverables</li><li>Your budget expectations</li><li>Specific legal expertise or background that you need</li></ul><input type="button" name="previous" class="previous action-button-previous" value="Previous"/><input type="button" name="next" class="next action-button" value="Next"/></fieldset><fieldset><h2 class="fs-title">Startup Job Posting</h2><p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium nam, ipsam voluptate ab iure qui veniam. Voluptatibus officiis voluptas in ipsum sed eum iusto architecto blanditiis eaque illum totam fugiat assumenda soluta et officia, ea, sequi nemo ad nihil perspiciatis eos quisquam mollitia cum facilis! Excepturi beatae nobis quo delectus nostrum ullam ad magnam tempora, laboriosam, expedita ex.</p> <p class="text-justify">Velit praesentium, facilis eius distinctio omnis temporibus quas aut odio fugit minima ducimus deserunt cumque, optio saepe molestiae ipsam unde laudantium. Quos deleniti consequatur, ex, debitis itaque excepturi, possimus laborum dolor esse veniam deserunt eos, doloribus dolorem tempore voluptate molestias sint saepe!</p><p><strong>A good description includes:</strong></p>';
				 	html += '<select name="" ><option value="">Select</option>';
                    for(var i = 0; i <event.length; i++ )
                    {
                    	html += '<option value="'+event[i].id+'"> '+event[i].option_label+'</option>';
                    }
                    html += '<input type="button" name="previous" class="previous action-button-previous" value="Previous"/><input type="button" name="next" class="next action-button" value="Next" onclick="myFunction()"/></fieldset>';

                    $('#msform').append(html);
                    wishCategoryCheck();
				}
			})
		}
	})
}

function myFunction()

{
	var html = '<fieldset><h2 class="fs-title">Startup Job Posting</h2><p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium nam, ipsam voluptate ab iure qui veniam. Voluptatibus officiis voluptas in ipsum sed eum iusto architecto blanditiis eaque illum totam fugiat assumenda soluta et officia, ea, sequi nemo ad nihil perspiciatis eos quisquam mollitia cum facilis! Excepturi beatae nobis quo delectus nostrum ullam ad magnam tempora, laboriosam, expedita ex.</p><p class="text-justify"> Velit praesentium, facilis eius distinctio omnis temporibus quas aut odio fugit minima ducimus deserunt cumque, optio saepe molestiae ipsam unde laudantium. Quos deleniti consequatur, ex, debitis itaque excepturi, possimus laborum dolor esse veniam deserunt eos, doloribus dolorem tempore voluptate molestias sint saepe!</p><p><strong>A good description includes:</strong></p><ul><li>Unique details about your project or legal needs</li><li>Project timeline and expected deliverables</li><li>Your budget expectations</li><li>Specific legal expertise or background that you need</li></ul><input type="button" name="previous" class="previous action-button-previous" value="Previous"/><input type="button" name="next" class="next action-button" value="Next"/></fieldset><fieldset><h2 class="fs-title">Startup Job Posting</h2><p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium nam, ipsam voluptate ab iure qui veniam. Voluptatibus officiis voluptas in ipsum sed eum iusto architecto blanditiis eaque illum totam fugiat assumenda soluta et officia, ea, sequi nemo ad nihil perspiciatis eos quisquam mollitia cum facilis! Excepturi beatae nobis quo delectus nostrum ullam ad magnam tempora, laboriosam, expedita ex.</p> <p class="text-justify">Velit praesentium, facilis eius distinctio omnis temporibus quas aut odio fugit minima ducimus deserunt cumque, optio saepe molestiae ipsam unde laudantium. Quos deleniti consequatur, ex, debitis itaque excepturi, possimus laborum dolor esse veniam deserunt eos, doloribus dolorem tempore voluptate molestias sint saepe!</p><p><strong>A good description includes:</strong></p>';
	 html += '<input type="button" name="previous" class="previous action-button-previous" value="Previous"/><input type="button" name="next" class="next action-button" value="Next" onclick="myFunction()"/></fieldset>';
	 $('#msform').append(html);
	 wishCategoryCheck();
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