@extends('layouts.frontendLayouts.app')
@section('content')
<section class="dshbord-theme">
   <div class="chat-content">
      <div class="sd-icon">
         <div class="ic-menu">
            <div class="icn-lst">
               <i class="fa fa-bars" aria-hidden="true"></i>
            </div>
            <div class="dsh-menu">
               @include('frontend.front-pages.chat.include.chat-sideboard')
            </div>
         </div>
         <h3 class="fs-title">Messages</h3>
      </div>
      <div class="message-content">
         <div class="inbox_people">
            <div class="nav nav-tabs " id="nav-tab" role="tablist">
               <a class="nav-item nav-link active show" data-toggle="tab" data-target="#all-tab" href="javascript:void(0)" role="tab" aria-selected="true">All</a>
               <a class="nav-item nav-link" data-toggle="tab" data-target="#active-tab" href="javascript:void(0)" role="tab" aria-selected="false">Active Project</a>
               <a class="nav-item nav-link" data-toggle="tab" data-target="#jobs-tab" href="javascript:void(0)" role="tab" aria-selected="false">Complete Project </a>                        
            </div>
            <div class="tab-content">
               <div id="all-tab" class="tab-pane fade show active">
                  <div class="inbox_chat" id="active-input-projects">
                     <!-- <div class="chat_list ">
                        <a href="#">
                           <div class="chat_people">               
                         <div class="chat_ib">
                           <h5>Labore et dolore magna aliqua.labore et dolore magna aliqua. <span class="chat_date">Dec 25</span></h5>                  
                         </div>
                        </div>
                        </a>              
                        </div> -->
                     <!-- <div class="chat_list active_chat">
                        <a href="#">
                           <div class="chat_ib">
                              <h5> <i class="fa fa fa-lock" aria-hidden="true"></i>Labore et dolore magna aliqua</h5>
                           </div>
                        </a>
                     </div> -->
                     <div class="chat_list">
                        <a href="#">
                           <div class="chat_ib">
                              <h5><i class="fa fa-spinner" aria-hidden="true"></i>Loading conversations</h5>
                           </div>
                        </a>
                     </div>
                  </div>
               </div>
               <div id="active-tab" class="tab-pane fade">
                  <div class="inbox_chat" id="active-chatting-projects">
                     <div class="no-convertion">
                        <p>No conversation selected</p>
                     </div>
                  </div>
               </div>
               <div id="jobs-tab" class="tab-pane fade">
                  <div class="inbox_chat" id="cancel-chatting-projects">
                     <div class="no-convertion">
                        <p>No conversation selected</p>
                     </div>
                  </div>
               </div>
               <div id="unread-tab" class="tab-pane fade">
                  <div class="inbox_chat">
                     <div class="no-convertion">
                        <p>No conversation selected</p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="mesgs">
            <div class="mesg-top">
               <div class="msg-top-left accept-project">
                  <h6>Project Name <input type="hidden" class="project-name-hidden-class" name="project_name_hidden" value="" /></h6>

                  <input type="hidden" name="chat_fill_hide_id" id="chat-main-hidden-p-id" />
                  <input type="hidden" name="chat_fill_hide_name" id="chat-main-hidden-p-name" />
               </div>
               <div class="user-dtls">
                  <ul id="msg-top-user-class" style="display: none">
                     <!-- <li>
                        <a data-toggle="tooltip" data-placement="top" title="No Member" href="#" >
                        <i class="fa fa-user-o" aria-hidden="true"></i><label>5</label>                      
                        </a>                        
                     </li>
                     <li><a href="#" data-toggle="modal" data-target="#add-people" >Add Member</a></li> -->
                  </ul>
               </div>
            </div>
            <div class="msg_history">
               <div class="front-msg">
                  <div class="usg-img">
                     <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> 
                  </div>
                  <div class="cont-msg">
                     <div class="usg-name">
                        <h6><a href="#"><strong>User Name</strong></a> <span class="date-usg">11:01 AM | June 9</span></h6>
                        <p>Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                        <p>Duis aute irure dolor in reprehenderit in voluptate velit esse
                           cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                           proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                        </p>
                        <p><a href="#">https://www.cupidatat.com/images/excepteur.png</a></p>
                        <ul>
                           <li>Excepteur sint occaecat cupidatat non proident</li>
                           <li>Aute irure dolor in reprehenderit in voluptate velit esse</li>
                           <li>Sed do eiusmod tempor incididunt ut labore</li>
                        </ul>
                        <div class="upload-kit">
                           <ul>
                              <li>
                                 <img src="images/blog-2.jpg" alt="images" class="img-fluid">
                                 <div class="upld-btn">
                                    <span><a href="javascript:void(0)"><i class="fa fa-cloud-upload" aria-hidden="true"></i></a></span>
                                 </div>
                              </li>
                              <li>
                                 <video controls>
                                    <source src="https://files.slack.com/files-pri/TKJL2HUJK-F014HJVN64T/untitled__may_29_2020_8_38_pm.webm" type="video/mp4">
                                 </video>
                                 <div class="upld-btn">
                                    <span><a href="javascript:void(0)"><i class="fa fa-cloud-upload" aria-hidden="true"></i></a></span>
                                 </div>
                              </li>
                           </ul>
                        </div>
                     </div>
                     <div class="shrt-view">
                        <ul>
                           <li><a href="#" data-toggle="tooltip" data-placement="top" title="Remove"><i class="fa fa-times-circle-o" aria-hidden="true"></i></a></li>
                           <li><a href="#" data-toggle="tooltip" data-placement="top" title="Start a Reply"><i class="fa fa-commenting-o" aria-hidden="true"></i></a></li>
                           <li><a href="#" data-toggle="tooltip" data-placement="top" title="42kb"><i class="fa fa-file-image-o" aria-hidden="true"></i></a></li>
                        </ul>
                     </div>
                  </div>
                  <div class="reply-box">
                     <div class="rply-content">
                        <div class="front-msg">
                           <div class="usg-img">
                              <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> 
                           </div>
                           <div class="cont-msg">
                              <div class="usg-name">
                                 <h6><a href="#"><strong>User Name</strong></a> <span class="date-usg">11:01 AM | June 9</span></h6>
                                 <p>Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                 <p>Duis aute irure dolor in reprehenderit in voluptate velit esse
                                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                 </p>
                                 <p><a href="#">https://www.cupidatat.com/images/excepteur.png</a></p>
                                 <ul>
                                    <li>Excepteur sint occaecat cupidatat non proident</li>
                                    <li>Aute irure dolor in reprehenderit in voluptate velit esse</li>
                                    <li>Sed do eiusmod tempor incididunt ut labore</li>
                                 </ul>
                                 <div class="upload-kit">
                                    <ul>
                                       <li>
                                          <img src="images/blog-2.jpg" alt="images" class="img-fluid">
                                          <div class="upld-btn">
                                             <span><a href="javascript:void(0)"><i class="fa fa-cloud-upload" aria-hidden="true"></i></a></span>
                                          </div>
                                       </li>
                                       <li>
                                          <video controls>
                                             <source src="https://files.slack.com/files-pri/TKJL2HUJK-F014HJVN64T/untitled__may_29_2020_8_38_pm.webm" type="video/mp4">
                                          </video>
                                          <div class="upld-btn">
                                             <span><a href="javascript:void(0)"><i class="fa fa-cloud-upload" aria-hidden="true"></i></a></span>
                                          </div>
                                       </li>
                                    </ul>
                                 </div>
                              </div>
                              <div class="shrt-view">
                                 <ul>
                                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="Remove"><i class="fa fa-times-circle-o" aria-hidden="true"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="42kb"><i class="fa fa-file-image-o" aria-hidden="true"></i></a></li>
                                 </ul>
                              </div>
                           </div>
                        </div>
                        <div class="front-msg">
                           <div class="reply-count">
                              <p>1 replies</p>
                              <hr>
                           </div>
                           <div class="usg-img">
                              <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> 
                           </div>
                           <div class="cont-msg">
                              <div class="usg-name">
                                 <h6><a href="#"><strong>User Name</strong></a> <span class="date-usg">11:01 AM | June 9</span></h6>
                                 <p>Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                    consequat.
                                 </p>
                                 <p>Duis aute irure dolor in reprehenderit in voluptate velit esse
                                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                 </p>
                              </div>
                              <div class="shrt-view">
                                 <ul>
                                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Remove"><i class="fa fa-times-circle-o" aria-hidden="true"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="42kb"><i class="fa fa-file-image-o" aria-hidden="true"></i></a></li>
                                 </ul>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="type_msg">
                        <div class="input_msg_write">
                           <form action="">
                              <textarea name="" class="form-control write_msg" placeholder="Type your message..."></textarea>
                              <div class="setd-tag">
                                 <div class="attach-icn" data-toggle="tooltip" data-placement="top" title="Attach file">
                                    <input type="file" name="">
                                    <span class="file-span"><i class="fa fa-paperclip" aria-hidden="true"></i></span>
                                 </div>
                                 <button class="msg_send_btn" type="submit"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
                              </div>
                           </form>
                        </div>
                     </div>
                  </div>  <!-- end of reply-box -->
               </div>
               <div class="front-msg">
                  <div class="usg-img">
                     <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> 
                  </div>
                  <div class="cont-msg">
                     <div class="usg-name">
                        <h6><a href="#"><strong>User Name2</strong></a> <span class="date-usg">11:01 AM | June 9</span></h6>
                        <p>Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                           quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                           consequat.
                        </p>
                        <p>Duis aute irure dolor in reprehenderit in voluptate velit esse
                           cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                           proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                        </p>
                        <div class="upload-kit">
                           <ul>
                              <li>
                                 <audio controls>
                                    <source src="horse.mp3" type="audio/mpeg">
                                 </audio>
                                 <div class="upld-btn">
                                    <span><a href="javascript:void(0)"><i class="fa fa-cloud-upload" aria-hidden="true"></i></a></span>
                                 </div>
                              </li>
                              <li>
                                 <object data="images/pdf-file.pdf" width="300" height="200"></object>                       
                                 <div class="upld-btn">
                                    <span><a href="javascript:void(0)"><i class="fa fa-cloud-upload" aria-hidden="true"></i></a></span>
                                 </div>
                              </li>
                              <li>
                                 <iframe src="/uploads/media/default/0001/01/540cb75550adf33f281f29132dddd14fded85bfc.pdf" height="200" width="300"></iframe>
                                 <div class="upld-btn">
                                    <span><a href="javascript:void(0)"><i class="fa fa-cloud-upload" aria-hidden="true"></i></a></span>
                                 </div>
                              </li>
                           </ul>
                        </div>
                     </div>
                     <div class="rpl-box">                 
                        <a href="#">
                        <span class="rptext"><i class="fa fa-user" aria-hidden="true"></i>8 replies</span> <span class="date-usg">Last reply 2 days ago</span>
                        </a>                   
                     </div>
                     <div class="shrt-view">
                        <ul>
                           <li><a href="#" data-toggle="tooltip" data-placement="top" title="Remove"><i class="fa fa-times-circle-o" aria-hidden="true"></i></a></li>
                           <li><a href="#" data-toggle="tooltip" data-placement="top" title="Start a Reply"><i class="fa fa-commenting-o" aria-hidden="true"></i></a></li>
                           <li><a href="#" data-toggle="tooltip" data-placement="top" title="42kb"><i class="fa fa-file-image-o" aria-hidden="true"></i></a></li>
                        </ul>
                     </div>
                  </div>
               </div>
               <div class="front-msg">
                  <div class="usg-img">
                     <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> 
                  </div>
                  <div class="cont-msg">
                     <div class="usg-name">
                        <h6><a href="#"><strong>User Name</strong></a> <span class="date-usg">11:01 AM | June 9</span></h6>
                        <p>Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                           quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                           consequat.
                        </p>
                        <p>Duis aute irure dolor in reprehenderit in voluptate velit esse
                           cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                           proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                        </p>
                     </div>
                     <div class="shrt-view">
                        <ul>
                           <li><a href="#" data-toggle="tooltip" data-placement="top" title="Remove"><i class="fa fa-times-circle-o" aria-hidden="true"></i></a></li>
                           <li><a href="#" data-toggle="tooltip" data-placement="top" title="Start a Reply"><i class="fa fa-commenting-o" aria-hidden="true"></i></a></li>
                           <li><a href="#" data-toggle="tooltip" data-placement="top" title="42kb"><i class="fa fa-file-image-o" aria-hidden="true"></i></a></li>
                        </ul>
                     </div>
                  </div>
               </div>
               <div class="front-msg">
                  <div class="usg-img">
                     <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> 
                  </div>
                  <div class="cont-msg">
                     <div class="usg-name">
                        <h6><a href="#"><strong>User Name</strong></a> <span class="date-usg">11:01 AM | June 9</span></h6>
                        <p>Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                           quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                           consequat.
                        </p>
                        <p>Duis aute irure dolor in reprehenderit in voluptate velit esse
                           cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                           proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                        </p>
                     </div>
                     <div class="shrt-view">
                        <ul>
                           <li><a href="#" data-toggle="tooltip" data-placement="top" title="Remove"><i class="fa fa-times-circle-o" aria-hidden="true"></i></a></li>
                           <li><a href="#" data-toggle="tooltip" data-placement="top" title="Start a Reply"><i class="fa fa-commenting-o" aria-hidden="true"></i></a></li>
                           <li><a href="#" data-toggle="tooltip" data-placement="top" title="42kb"><i class="fa fa-file-image-o" aria-hidden="true"></i></a></li>
                        </ul>
                     </div>
                  </div>
               </div>
               <div class="front-msg">
                  <div class="usg-img">
                     <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> 
                  </div>
                  <div class="cont-msg">
                     <div class="usg-name">
                        <h6><a href="#"><strong>User Name</strong></a> <span class="date-usg">11:01 AM | June 9</span></h6>
                        <p>Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                           quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                           consequat.
                        </p>
                        <p>Duis aute irure dolor in reprehenderit in voluptate velit esse
                           cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                           proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                        </p>
                     </div>
                     <div class="shrt-view">
                        <ul>
                           <li><a href="#" data-toggle="tooltip" data-placement="top" title="Remove"><i class="fa fa-times-circle-o" aria-hidden="true"></i></a></li>
                           <li><a href="#" data-toggle="tooltip" data-placement="top" title="Start a Reply"><i class="fa fa-commenting-o" aria-hidden="true"></i></a></li>
                           <li><a href="#" data-toggle="tooltip" data-placement="top" title="42kb"><i class="fa fa-file-image-o" aria-hidden="true"></i></a></li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
            <div class="type_msg">
               <div class="input_msg_write">
                  <form action="" id="write_msg_form">
                     <textarea name="write_msg_text" id="write-msg-text-id" class="form-control write_msg" placeholder="Type your message..."></textarea>
                     <input type="hidden" name="project_name_hide" id="project-name-hide-id">
                     <input type="hidden" name="project_id_hide" id="project-hide-id">
                     <div class="setd-tag">
                        <div class="attach-icn" data-toggle="tooltip" data-placement="top" title="Attach file">
                           <input type="file" name="">
                           <span class="file-span"><i class="fa fa-paperclip" aria-hidden="true"></i></span>
                        </div>
                        <button class="msg_send_btn" type="button" onclick="send_msg_to_project()"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- add Modal -->
   <div class="modal fade theme-modal" id="add-people">
      <div class="modal-dialog">
         <div class="modal-content">
            <!-- Modal body -->
            <div class="modal-body ">
               <div class="center-part">
                  <h3>Add People</h3>
                  <p>Please Enter lawyer Name for add</p>
                  <form id="adding-members-form-chat">
                     <div class="form-group">
                        <label>Select Client</label> 
                        <select name="chat_rest_client_name[]" multiple="multiple" class="form-control" id="chat-rest-client-id">
                           
                        </select>
                     </div>
                     <div class="form-group">
                        <label>Select Lawyer</label> 
                        <select name="chat_rest_lawyer_name[]" multiple="multiple" class="form-control" id="chat-rest-lawyer-id">
                           
                        </select>
                     </div>
                     <input type="button" onclick="adding_members_form_chatting()" name="" value="Add people" class="cnt-btn">
                     <p class="text-center add-people-all-msg"></p>
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
   $(document).ready(function(){
     $('[data-toggle="tooltip"]').tooltip();
     $('.msg_history').scrollTop($('.msg_history')[0].scrollHeight);
     $('.theme-select').multiselect({
          
     });

     chat_chat_sideboard_check();
     first_chat_popup_without_project_select(); 
 

     // every chat loading section
      setInterval(function(){ 
         every_second_chat_loading(); 
      }, 30000);
     // end of loading seconds
     
   });

   function chat_chat_sideboard_check()
   {
      $.ajax({
         url: '/chat-sideboard-ajax',
         type: 'GET',
         dataType: 'json',
         success: function(event){
            console.log(event);
            if(event.length > 0){
               var html = '';
               for(var i = 0; i < event.length; i++){
                  html += '<div class="chat_list"><a href="javascript:;" onclick=project_chat_click('+event[i].id+',"'+event[i].project_name+'")><div class="chat_ib"><h5><i class="fa fa fa-lock" aria-hidden="true"></i>'+event[i].project_name+'</h5></div></a></div>';
               }
               $("#active-input-projects").html(html);
            }else{
               $("#active-input-projects").html('<div class="no-convertion"><p>No conversation selected</p></div>');

            }
            
         }, error: function(event){

         }
      })
   }

   function project_chat_click(project_id, project_name)
   {
      $(".accept-project").html('<h6>'+project_name+' <input type="hidden" class="project-name-hidden-class" name="project_name_hidden" value="" /></h6><input type="hidden" name="chat_fill_hide_id" id="chat-main-hidden-p-id" /><input type="hidden" name="chat_fill_hide_name" id="chat-main-hidden-p-name" />');

      $("#chat-main-hidden-p-id").val(project_id);
      $("#chat-main-hidden-p-name").val(project_name);
      $.ajax({
         url: "/project-chat-ajax",
         type: 'GET',
         data: {project_id: project_id, project_name: project_name},
         dataType: 'json',
         success: function(event){
            add_more_members_in_chat();
               if(event == "no_data")
               {
                  $(".msg_history").html('<div class="inbox_chat"><div class="no-convertion"><p>No conversation yet</p></div></div>');
                  $("#project-name-hide-id").val(project_name);
                  $("#project-hide-id").val(project_id);

                  $("#chat-main-hidden-p-id").val(project_id);
                  $("#chat-main-hidden-p-name").val(project_name);
               }
               else
               {
                  $(".msg_history").html(event);
                  $("#project-name-hide-id").val(project_name);
                  $("#project-hide-id").val(project_id);

                  $("#chat-main-hidden-p-id").val(project_id);
                  $("#chat-main-hidden-p-name").val(project_name);
               }
               // main member top details
               $.ajax({
                  url: '/count-chat-member-ajax',
                  type: 'GET',
                  data: {project_id: project_id, project_name: project_name},
                  dataType: 'json',
                  success: function(response){
                     $("#msg-top-user-class").show();
                     $("#msg-top-user-class").html('<li><a data-toggle="tooltip" data-placement="top" title="'+response.count_total+' Member" href="#" ><i class="fa fa-user-o" aria-hidden="true"></i><label>'+response.count_total+'</label></a></li><li><a href="#" data-toggle="modal" data-target="#add-people" >Add Member</a></li>');
                     $('[data-toggle="tooltip"]').tooltip();
                     $('.msg_history').scrollTop($('.msg_history')[0].scrollHeight);
                  }, error: function(response){

                  }
               })
               // end main top details
         }, error: function(event){

         }
      })
   }

   // every second chat loading section
   function every_second_chat_loading()
   {
      $.ajax({
         url: "/every-second-chat-loading",
         type: 'GET',
         dataType: 'json',
         success: function(event){
               if(event == "no_data")
               {
                  
               }
               else
               {
                  $(".msg_history").append(event);
                  $('.msg_history').scrollTop($('.msg_history')[0].scrollHeight);
               }
         }, error: function(event){

         }
      })
   }
   // end of every second chat loading section

   function first_chat_popup_without_project_select()
   {
      var main_data = $(".project-name-hidden-class").val();

      if(main_data == ""){
         $(".msg_history").html('<div class="inbox_chat"><div class="no-convertion"><p>No conversation yet</p></div></div>');
      }else{
         $.ajax({
            url: "/first-chat-popup",
            type: "GET",
            dataType: "json",
            success: function(event){

            }, error: function(event){

            }
         })
      }
   }

   function send_msg_to_project()
   {
      var proj_name = $("#project-name-hide-id").val();
      var proj_id = $("#project-hide-id").val();
      var main_text = $("#write-msg-text-id").val();
      
      if(proj_name == ""){
         $(".msg_history").html('<div class="inbox_chat"><div class="no-convertion"><p>No Project Selected</p></div></div>');
      }else if(main_text == ""){
         $("#write-msg-text-id").attr("title","No message in your box");
      }else{
         $("#write-msg-text-id").removeAttr("title");
         $.ajax({
            url: "/insert-chat-text-add-ajax",
            type: "GET",
            data: {proj_name: proj_name, proj_id: proj_id, main_text: main_text},
            dataType: "json",
            success: function(event){
               $("#write-msg-text-id").val("");
               every_second_chat_loading();
            }, error: function(event){

            }
         });
      }
   }

   // add more members to chat channel

   function add_more_members_in_chat()
   {
      var p_id = $("#chat-main-hidden-p-id").val();
      var p_name = $("#chat-main-hidden-p-name").val();

      if(p_id != '' && p_name != '')
      {
         $.ajax({
            url: "/add-member-to-chat",
            type: "GET",
            data: {project_id: p_id, project_name: p_name},
            dataType:"json",
            success: function(event){
               $("#chat-rest-client-id").html(event.avail_client_arr);
               $("#chat-rest-lawyer-id").html(event.avail_lawyer_arr);
               $('#chat-rest-lawyer-id').multiselect({});
               $('#chat-rest-client-id').multiselect({});
            }, error:  function(event){

            }
         })
      }
   }

   // chatting add members
   function adding_members_form_chatting()
   {
      var client_members_ids = $("#chat-rest-client-id").val();
      var lawyer_members_ids = $("#chat-rest-lawyer-id").val();
      if(client_members_ids == "" && lawyer_members_ids == ""){
         $(".add-people-all-msg").html("<span class='text-danger'><i class='fa fa-times'></i> Choose atleast one lawyer/clients</span>").fadeIn().delay(3000).fadeOut('slow');
      }else{
         $.ajax({
            url: '/adding-members-form-chat-ajax',
            type: 'GET',
            data: $("#adding-members-form-chat").serialize(),
            dataType: 'json',
            success: function(event){
               $("#msg-top-user-class").show();
               $("#msg-top-user-class").html('<li><a data-toggle="tooltip" data-placement="top" title="'+event+' Member" href="#" ><i class="fa fa-user-o" aria-hidden="true"></i><label>'+event+'</label></a></li><li><a href="#" data-toggle="modal" data-target="#add-people" >Add Member</a></li>');
               $('[data-toggle="tooltip"]').tooltip();
               add_more_members_in_chat();
               setTimeout(function(){ $("#add-people").modal('hide'); }, 3000);

            }, error: function(event){

            }
         })
      } 
   }
</script>
@endsection