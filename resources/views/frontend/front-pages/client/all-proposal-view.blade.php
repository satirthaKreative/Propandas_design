@extends('layouts.frontendLayouts.app')
@section('content')
<section class="dshbord-theme">
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <h3 class="fs-title">Proposal List</h3>
            <hr>
         </div>
         <div class="col-md-3">
            <div class="side-menu">
               @include('frontend.front-pages.client.include.sidebar')
               <?php
                $link = $_SERVER['REQUEST_URI']; // PHP_SELF
                $link_array = explode('/',$link);
                $get_arg_id = end($link_array);

                $decode_arg_id = base64_decode($get_arg_id);
               ?>
            </div>
         </div>
         <!-- end of col-md-3 -->
         <div class="col-md-9">
            <div class="dsbrd-content">
               <h6>Search a Lawyer</h6>
               <div class="src-filter ">
                        <form action="">
                           <div class="row">
                              <div class="col-md-3 plr-5">
                                 <div class="form-group">
                                    <label for="">Budget</label>
                                  <select name="" id="" class="form-control lawyer-budget-search-id" placeholder="Enter budget" onchange="budget_Change_Search()">
                                      <option value="" selected>Select budget</option>
                                      <option value="1"><span>Less than </span><span><element>€</element>100</span></option>
                                      <option value="2"><span><element>€</element>100</span></option>
                                      <option value="3"><span><element>€</element>100</span> <span> - </span> <span><element>€</element>200</span></option>
                                      <option value="4"><span><element>€</element>200</span> <span> - </span> <span><element>€</element>300</span></option>
                                      <option value="5"><span><element>€</element>400</span> <span> - </span> <span><element>€</element>500</span></option>
                                      <option value="6"><span>More than </span><span><element>€</element>500</span></option>
                                    </select>
                                 </div>
                              </div>
                              <div class="col-md-3 plr-5">
                                <div class="form-group lawyer-country">
                                    <label for="">Countries</label>
                                    <select name="type" id="type"  class="form-control lawyer-country-search-id" aria-hidden="true">
                                       <option selected="selected" value="">Select Country</option>                                      
                                    </select>
                                 </div>
                              </div>
                              <div class="col-md-3 plr-5">
                                <div class="form-group lawyer-cities">
                                    <label for="">Popular Cities</label>
                                    <select name="type" id="type"  class="form-control lawyer-cities-search-id" aria-hidden="true">
                                       <option selected="selected" value="">Select Cities</option>
                                    </select>
                                 </div>
                              </div>

                               <div class="col-md-3 plr-5">
                                <div class="form-group">
                                    <label for="">&nbsp;</label>
                                    <input type="button" onclick="myProposalSearch()" name="" value="Search" class="flt-search">
                                 </div>
                              </div>
                           </div>
                           
                        </form>
                     </div>
               <ul class="filter-result all-proposal-project-id-wish">                 
                 <li class="no-search-file"><h5 class="text-info"><i class="fa fa-spinner"></i> Loading your job details</h5></li>
               </ul>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- end of dshbord-theme -->
@endsection
@section('pagewishjs')
<script>
   $(function(){
      var url_id = '<?php echo $decode_arg_id ?>';
      $.ajax({
         url: '/all-proposal-ajax',
         type: 'GET',
         data: {url_id: url_id},
         dataType: 'json',
         success:  function(event){
            $(".all-proposal-project-id-wish").html(event)
         }, error:  function(event){
            
         }
      })

      // country of lawyer check
       $.ajax({
          url: '/all-lawyer-country-load-ajax',
          type: 'GET',
          dataType: 'json',
          success:  function(event){
             $(".lawyer-country").html(event)
          }, error:  function(event){
             
          }
       })
   })


   function country_change_for_city_load(){
      var url_id = '<?php echo $decode_arg_id ?>';
      var country_id = $(".lawyer-country-search-id").val();


      if(country_id == ''){
        country_id = 0;
      }else{
        country_id = country_id;
      }
    // cities load
      $.ajax({
         url: '/all-lawyer-cities-load-ajax',
         type: 'GET',
         data: {country_id: country_id},
         dataType: 'json',
         success:  function(event){
            $(".lawyer-cities").html(event);

            // country wish search
            $.ajax({
               url: '/proposal_search_update_ajax',
               type: 'GET',
               data: {url_id: url_id, country_id: country_id},
               dataType: 'json',
               success:  function(event){
                  $(".all-proposal-project-id-wish").html(event)
               }, error:  function(event){
                  
               }
            })
         }, error:  function(event){
            
         }
      })

   }


   function  myProposalSearch()
   {
      var url_id = '<?php echo $decode_arg_id ?>';

      var budget_id = $(".lawyer-budget-search-id").val();
      var country_id = $(".lawyer-country-search-id").val();
      var city_id = $(".lawyer-cities-search-id").val();

      if(budget_id == ''){
        $(".lawyer-budget-search-id").css({'border':'1px solid red','box-shadow':'0px 0px 3px 0px red'});
      }else if(country_id == ''){
        $(".lawyer-country-search-id").css({'border':'1px solid red','box-shadow':'0px 0px 3px 0px red'});
      }else if(city_id == ''){
        $(".lawyer-cities-search-id").css({'border':'1px solid red','box-shadow':'0px 0px 3px 0px red'});
      }else{
        $(".lawyer-budget-search-id").css({'border':'1px solid #cecece','box-shadow':'none'});
        $(".lawyer-country-search-id").css({'border':'1px solid #cecece','box-shadow':'none'});
        $(".lawyer-cities-search-id").css({'border':'1px solid #cecece','box-shadow':'none'});

        $.ajax({
           url: '/proposal_search_update_ajax',
           type: 'GET',
           data: {url_id: url_id, budget_id: budget_id, country_id: country_id, city_id: city_id},
           dataType: 'json',
           success:  function(event){
              $(".all-proposal-project-id-wish").html(event)
           }, error:  function(event){
              
           }
        })
      }
   }


    function budget_Change_Search()
    {
      var url_id = '<?php echo $decode_arg_id ?>';

      var budget_id = $(".lawyer-budget-search-id").val();

      if(budget_id == ''){
        budget_id = 0;
      }else{
        budget_id = budget_id;
      }

        $.ajax({
           url: '/proposal_search_update_ajax',
           type: 'GET',
           data: {url_id: url_id, budget_id: budget_id},
           dataType: 'json',
           success:  function(event){
              $(".all-proposal-project-id-wish").html(event)
           }, error:  function(event){
              
           }
        })
    }


    function lawyer_cities_search()
    {
        var url_id = '<?php echo $decode_arg_id ?>';

        var city_id = $(".lawyer-cities-search-id").val();

        if(city_id == ''){
          city_id = 0;
        }else{
          city_id = city_id;
        }

          $.ajax({
             url: '/proposal_search_update_ajax',
             type: 'GET',
             data: {url_id: url_id, city_id: city_id},
             dataType: 'json',
             success:  function(event){
                $(".all-proposal-project-id-wish").html(event)
             }, error:  function(event){
                
             }
          })
    }
</script>
@endsection