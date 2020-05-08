@extends('layouts.frontendLayouts.app')
@section('content')
<section class="dshbord-theme">
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <h3 class="fs-title">Post Your Job</h3>
            <hr>
         </div>
         <div class="col-md-3">
            <div class="side-menu">
               @include('frontend.front-pages.client.include.sidebar')
            </div>
         </div>
         <!-- end of col-md-3 -->
         <div class="col-md-9">
            <div class="dsbrd-content">             
               <div class="dsbrd-qststep ">
                        <form action="">
                           <div class="step-structure dshbrd-inner">
                              <div class="step-box">
                                 <h5 class="qst">What kind of startup assistance do you need?</h5>
                                 <select name="" id="choose_category" onchange="chooseCategory()">
                                    <option value="">Select</option>
                                    @foreach($cateAllQuery as $cateView)
                                    <option value="{{ $cateView->id }}">{{ $cateView->category_name }}</option>
                                    @endforeach
                                 </select>
                              </div>
                             
                              <!-- <input type="submit" name="" value="Submit" class="flt-search"> -->
                              
                           </div>
                           
                           
                        </form>
                     </div>               
            </div>
         </div>
      </div>
   </div>
</section>
<!-- end of dshbord-theme -->
@endsection
@section('pagewishjs')
<script>
function chooseCategory(){
   var choose_category = $("#choose_category").val();
   var total_div_count = document.getElementsByClassName('step-box').length;
   $.ajax({
      // headers: {
      //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      // },
      url: '/categoryClientAjax',
      type: 'get',
      data: {choose_category: choose_category, total_div_count: total_div_count},
      dataType: 'json',
      success: function(event){
         if($("#step-box-id-category").length > 0 ){
            $('.step-box').eq(1).remove();
            $(".step-structure").append(event);

            var messageBody = document.querySelector('.step-structure');
            messageBody.scrollTop = messageBody.scrollHeight - messageBody.clientHeight;
         }else{
            $(".step-structure").append(event);
            var messageBody = document.querySelector('.step-structure');
            messageBody.scrollTop = messageBody.scrollHeight - messageBody.clientHeight;
         }
      }, error: function(event){

      }
   })
}

function goToNextOne(ques_type, div_count, ques_id, opt_value, cate_id){
   if(ques_type == 1){
      var option_val = $("#input_Text"+div_count).val();
   }else if(ques_type == 3){
      var option_val = $("#input_Textarea"+div_count).val();
   }else if(ques_type == 5){
      var option_val = $("#input_Selectbox"+div_count).val();
   }else if(ques_type == 6){
      var option_val = $("#input_Selectbox_multi"+div_count).val();
   }else{
      var option_val = opt_value;
   } 

   var total_div_count = document.getElementsByClassName('step-box').length;
   $.ajax({
      // headers: {
      //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      // },

      url: '/searchNextQuestion',
      type: 'get',
      data: {ques_id: ques_id, option_val: option_val, cate_id: cate_id,total_div_count: total_div_count},
      dataType: 'json',
      success: function(event){
         if($("#step-box"+ques_id).length > 0 ){
            $("#step-box"+ques_id).remove();
            $(".step-structure").append(event);

            
            var messageBody = document.querySelector('.step-structure');
            messageBody.scrollTop = messageBody.scrollHeight - messageBody.clientHeight;
         }else{
            $(".step-structure").append(event);

            var messageBody = document.querySelector('.step-structure');
            messageBody.scrollTop = messageBody.scrollHeight - messageBody.clientHeight;
         }
      }, error: function(event){

      }
   })

} 

function goToNextLast(ques_type, div_count, ques_id, opt_value, cate_id){
   if(ques_type == 1){
      var option_val = $("#input_Text"+div_count).val();
   }else if(ques_type == 3){
      var option_val = $("#input_Textarea"+div_count).val();
   }else if(ques_type == 5){
      var option_val = $("#input_Selectbox"+div_count).val();
   }else if(ques_type == 6){
      var option_val = $("#input_Selectbox_multi"+div_count).val();
   }else{
      var option_val = opt_value;
   } 

   var total_div_count = document.getElementsByClassName('step-box').length;
   $.ajax({
      // headers: {
      //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      // },

      url: '/searchNextLast',
      type: 'get',
      data: {ques_id: ques_id, option_val: option_val, cate_id: cate_id,total_div_count: total_div_count},
      dataType: 'json',
      success: function(event){
         $("#next-btn"+div_count).removeAttr('disabled');
      }, error: function(event){

      }
   })

} 


function goToNextQues(cate_id)
{
   var con_id = $(".contact-class-number").val();
   if(con_id == ''){
      var con_id = "91";
   }
   $.ajax({
      // headers: {
      //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      // },

      url: '/submitQuesAnsData',
      type: 'get',
      data: {cate_id: cate_id, con_id: con_id},
      dataType: 'json',
      success: function(event){
         if(event == 'Success'){
            $(".step-structure").load(location.href + " .step-structure");
            $("#jobPostClientSuccessModal").modal('show');
            setTimeout(function(){ $("#jobPostClientSuccessModal").modal('hide'); location.reload(); }, 5000);
         }
      }, error: function(event){

      }
   })
}
</script>
@endsection