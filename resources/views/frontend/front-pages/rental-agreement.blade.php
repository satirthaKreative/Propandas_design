@extends('layouts.frontendLayouts.app')
@section('content')
 <section class="short-banner">
   <div class="container">
     <h1>Free Legal Documents</h1>
     <p>Here you can find free legal documents. <br>Do you have a free legal document you would like to share? <br>Contact us <a href="mailto:office@propandas.com">office@propandas.com</a></p>

     <form id="legal_search" onsubmit="return check_legal_working(event)">    
    <div class="input-group">
      <span class="input-group-addon"><i class="fa fa-search" aria-hidden="true"></i></span>
      <input type="text" name="q" id="legal-docx-search-id" class="form-control" placeholder="Search for legal articles &amp; documents">
    </div>
  </form>
   </div>
 </section>

<!--  end of short-banner -->

 <section class="search-wrapper">
   <div class="container">
     <div class="row">
       <div class="col-md-3">
         <div class="legal-filters">
           <ul id="legal-filter-category-id">
             <div class="category-loding"><i class="fa fa-spinner"></i> Loading Data's</div>
           </ul>
         </div>
       </div>
       <!-- end of col-md-3 -->

       <div class="col-md-9">
         <div class="results-wrapper">
           <div class="results-categorey">           
          <div class="nav nav-tabs " id="nav-tab" role="tablist">

            <a class="nav-item nav-link active" data-toggle="tab" href="#all-view" role="tab"  aria-selected="true">
            <i class="fa fa-list-ul" aria-hidden="true"></i>All
           </a>

            <a class="nav-item nav-link" data-toggle="tab" href="#documents-view" role="tab" aria-selected="false"><i class="fa fa-file" aria-hidden="true"></i>Documents </a>

            <a class="nav-item nav-link" data-toggle="tab" href="#articles-view" role="tab"  aria-selected="false"><i class="fa fa-gavel" aria-hidden="true"></i>Articles</a>
            
          </div> 
           </div>

           <div class="categorey-list">

          <div class="tab-content" id="nav-tabContent">

          <div class="tab-pane fade show active" id="all-view" role="tabpanel">
           <ul id="all-legal-document-id">
              <div class="data-loding"><i class="fa fa-spinner"></i> Loading Data's</div>
            </ul>
          </div>
          <div class="tab-pane fade" id="documents-view" role="tabpanel" aria-labelledby="nav-profile-tab">
             <ul id="all-legal-document-type-id"> 
              <div class="data-loding"><i class="fa fa-spinner"></i> Loading Data's</div>
             </ul>
          </div>
          <div class="tab-pane fade" id="articles-view" role="tabpanel" aria-labelledby="nav-contact-tab">
         <ul id="all-legal-article-type-id">
          <div class="data-loding"><i class="fa fa-spinner"></i> Loading Data's</div>     
         </ul>
          </div>
         
        </div>

         



            
           </div>

         </div>
       </div>
     </div>
   </div>
 </section>
@endsection
@section('pagewishjs')
<script>
  function check_legal_working()
  {
    t1();
    return false;
  }

  function t1()
  {
    var get_val = $("#legal-docx-search-id").val();
    $.ajax({
      url: '/all-legal-search',
      type: 'GET',
      data: {get_val: get_val},
      dataType: 'JSON',
      success:  function(event)
      {
        console.log(event);
        $("#all-legal-document-id").html(event.all_document);
        $("#all-legal-document-type-id").html(event.only_docx);
        $("#all-legal-article-type-id").html(event.only_article);
      },
      error:  function(event)
      {

      }
    })
  }
	$(function(){
    load_legal_category_docx();
    all_legal_docx();
    all_legal_docx_type();
    all_legal_article_type();

    // $("#legal-docx-search-id").keyup(function(event) {
    //     if (event.keyCode === 13) {
    //         var get_val = $("#legal-docx-search-id").val();
    //         $.ajax({
    //           url: '/all-legal-search',
    //           type: 'GET',
    //           data: {get_val: get_val},
    //           dataType: 'JSON',
    //           success:  function(event)
    //           {
    //             console.log(event);
    //             $("#all-legal-document-id").html(event.all_document);
    //             $("#all-legal-document-type-id").html(event.only_docx);
    //             $("#all-legal-article-type-id").html(event.only_article);
    //           },
    //           error:  function(event)
    //           {

    //           }
    //         })
    //     }
    // });
  });


  function load_legal_category_docx()
  {
    $.ajax({
      url: '/legal-docx-sidebar-category-load',
      type: 'GET',
      dataType: 'json',
      success: function(event){
        $("#legal-filter-category-id").html(event);
      }, error:  function(event){

      }
    })
  }

  function all_legal_docx()
  {
    $.ajax({
      url: '/all-legal-docx-and-article',
      type: 'GET',
      dataType: 'JSON',
      success:  function(event)
      {
        $("#all-legal-document-id").html(event);
      },
      error:  function(event)
      {

      }
    })
  }

  function all_legal_docx_type()
  {
    $.ajax({
      url: '/all-legal-docx',
      type: 'GET',
      dataType: 'JSON',
      success:  function(event)
      {
        $("#all-legal-document-type-id").html(event);
      },
      error:  function(event)
      {

      }
    })
  }

  function all_legal_article_type()
  {
    $.ajax({
      url: '/all-legal-article',
      type: 'GET',
      dataType: 'JSON',
      success:  function(event)
      {
        $("#all-legal-article-type-id").html(event);
      },
      error:  function(event)
      {

      }
    })
  }

  function legal_category(id)
  {
    $("#legal-category-id"+id).toggleClass('active legal-ct'+id);

    var legal_class_exist_or_not = document.getElementsByClassName('legal-ct'+id);

    if(legal_class_exist_or_not.length > 0)
    {
      var lElement = id;
      var eStatus = "Push";
    }
    else
    {
      var lElement = id;
      var eStatus = "Pop";
    }


    $.ajax({
      url: "/legal-category-active-show",
      type: "GET",
      data: {lElement: lElement, eStatus: eStatus},
      dataType: 'json',
      success: function(event){
        $("#all-legal-document-id").html(event.all_document);
        $("#all-legal-document-type-id").html(event.only_docx);
        $("#all-legal-article-type-id").html(event.only_article);
      }, error:  function(event){

      }
    })
  }
</script>
@endsection