</div><!-- ./wrapper -->

<!-- success div -->
<div class="modal" id="succ-modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">      
      <div class="modal-body">
        <h2><span><i class="fa fa-check-circle" aria-hidden="true"></i></span><span>Successfully Done</span></h2>     
      </div>      
    </div>
  </div>
</div>

<!-- end of succes div -->

<!-- error div -->
<div class="modal" id="danger-a-modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">      
      <div class="modal-body">
        <h2><span><i class="fa fa-times" aria-hidden="true"></i></span><span>Something Went Wrong</span></h2>     
      </div>      
    </div>
  </div>
</div>
<!-- end of error div -->


        <!-- add new calendar event modal -->


        <!-- jQuery 2.0.2 -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <!-- jQuery UI 1.10.3 -->
        <script src="{{ asset('backendAssets/js/jquery-ui-1.10.3.min.js') }}" type="text/javascript"></script>
        <!-- Bootstrap -->
        <script src="{{ asset('backendAssets/js/bootstrap.min.js') }}" type="text/javascript"></script>
        
        <!-- AdminLTE App -->
        <script src="{{ asset('backendAssets/js/AdminLTE/app.js') }}" type="text/javascript"></script>

        <!-- custom js -->
        <script src="{{ asset('backendAssets/js/custom.js') }}" type="text/javascript"></script>  

        <!-- custom admin js -->
        <script src="{{ asset('backendAssets/js/admin-custom.js') }}" type="text/javascript"></script>  

        <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>

        <script src="{{ asset('backendAssets/js/mySelect.js') }}" type="text/javascript"></script>

        <script src="{{ asset('backendAssets/js/checked.js') }}" type="text/javascript"></script>

        <!-- ckeditor -->
        <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>

        <script>
        


            $('form#form-about-data').submit(function(event) {
            event.preventDefault();

            for (instance in CKEDITOR.instances) {
                CKEDITOR.instances[instance].updateElement();
            }
            var formData = new FormData($(this)[0]);
            $.ajax({
                headers: {
                       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                   },
                url:    '/aboutUsDetailsAdd',
                type:   'POST',
                data:   formData,
                cache:  false,
                dataType: 'json',
                processData: false,
                contentType: false, 
                success: function(result)
                {
                                if(result == 1){
                                   $("#about-us-modal").modal('hide');
                                   $( "#succ-modal" ).modal('show');
                                   $( "#succ-modal span:nth-child(2)" ).html('Successfully Added');
                                   setTimeout(function(){ $("#succ-modal").modal('hide'); }, 3000);
                                }else if(result == 0){
                                   $("#about-us-modal").modal('hide');
                                   $( "#danger-a-modal" ).modal('show');
                                   $( "#danger-a-modal span:nth-child(2)" ).html('Please insert only <i>image file</i>');
                                   setTimeout(function(){ $("#danger-a-modal").modal('hide'); }, 3000);
                                }else{
                                   $('#about-us-modal').modal('hide');
                                }
                },
                error: function(result)
                {
                    console.log(result);
                }
            });

        });

                $('form#form-about-data1').submit(function(event) {
                event.preventDefault();

                for (instance in CKEDITOR.instances) {
                    CKEDITOR.instances[instance].updateElement();
                }
                var formData = new FormData($(this)[0]);
                $.ajax({
                    headers: {
                           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                       },
                    url:    '/aboutUsDetailsEdit',
                    type:   'POST',
                    data:   formData,
                    cache:  false,
                    dataType: 'json',
                    processData: false,
                    contentType: false, 
                    success: function(result)
                    {

                                    if(result == 1){
                                       $("#about-us-modal1").modal('hide');
                                       $( "#succ-modal" ).modal('show');
                                       $( "#succ-modal span:nth-child(2)" ).html('Successfully Updated');
                                       setTimeout(function(){ $("#succ-modal").modal('hide'); }, 3000);
                                    }else if(result == 0){
                                       $("#about-us-modal1").modal('hide');
                                       $( "#danger-a-modal" ).modal('show');
                                       $( "#danger-a-modal span:nth-child(2)" ).html('Please insert only <i>image file</i>');
                                       setTimeout(function(){ $("#danger-a-modal").modal('hide'); location.reload(); }, 3000);
                                    }else{
                                       $('#about-us-modal1').modal('hide');
                                    }
                    },
                    error: function(result)
                    {
                        console.log(result);
                    }
                });

            });
        </script>