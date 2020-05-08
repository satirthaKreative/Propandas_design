//  category js show
$(function(){
    $.ajax({
        url: "/homeCateAjax",
        type: 'get',
        dataType: 'json',
        success:  function(event)
        {
            var img;
            var c = event.length;
            var main_path = "frontAssets/images/";
            var img1 = main_path+"service-1.jpg";
            var img2 = main_path+"service-2.jpg";
            var img3 = main_path+"service-3.jpg";
            var img4 = main_path+"service-4.jpg";
            var img5 = main_path+"service-5.jpg";
            var img6 = main_path+"service-6.jpg";
            var img7 = main_path+"service-7.jpg";
            var other_img = main_path+"service-8.jpg";
            var html = "";
            var others = '<div class="col-sm-3 plr-5"><div class="cr-box"><a href="#"><img src="'+other_img+'" alt="images" class="img-fluid"><div class="text-overley"><p>Others</p></div></a></div></div>';
           
            if(c >= 3 && c < 7)
            {
                for(var i = 0; i < 3; i++)
                {
                    if(i == 0)
                    {
                        img = img1;
                    }
                    else if(i == 1)
                    {
                        img = img2;
                    }
                    else if(i == 2)
                    {
                        img = img3;
                    }
                    html += '<div class="col-sm-3 plr-5"><div class="cr-box"><a href="/search-view/'+btoa(event[i].id)+'"><img src="'+img+'" alt="images" class="img-fluid"><div class="text-overley"><p>'+event[i].category_name+'</p></div></a></div></div>';
                }
                html += others;

            }
            else if(c == 7 || (c > 7))
            {
                for(var i = 0; i < 7; i++)
                {
                    if(i == 0)
                    {
                        img = img1;
                    }
                    else if(i == 1)
                    {
                        img = img2;
                    }
                    else if(i == 2)
                    {
                        img = img3;
                    }
                    else if(i == 3)
                    {
                        img = img4;
                    }
                    else if(i == 4)
                    {
                        img = img5;
                    }
                    else if(i == 5)
                    {
                        img = img6;
                    }
                    else if(i == 6)
                    {
                        img = img7;
                    }  
                    html += '<div class="col-sm-3 plr-5"><div class="cr-box"><a href="/search-view/'+btoa(event[i].id)+'"><img src="'+img+'" alt="images" class="img-fluid"><div class="text-overley"><p>'+event[i].category_name+'</p></div></a></div></div>';
                }
                html += others;
            }
            else
            {
                for(var i = 0; i < c; i++)
                {
                    if(i == 0)
                    {
                        img = img1;
                    }
                    else if(i == 1)
                    {
                        img = img2;
                    }
                    else if(i == 2)
                    {
                        img = img3;
                    }
                    else if(i == 3)
                    {
                        img = img4;
                    }
                    else if(i == 4)
                    {
                        img = img5;
                    }
                    else if(i == 5)
                    {
                        img = img6;
                    }
                    else if(i == 6)
                    {
                        img = img7;
                    }
                    html += '<div class="col-sm-3 plr-5"><div class="cr-box"><a href="/search-view/'+btoa(event[i].id)+'"><img src="'+img+'" alt="images" class="img-fluid"><div class="text-overley"><p>'+event[i].category_name+'</p></div></a></div></div>';
                }
            }

            $(".my-tt").html(html);
        },
        error:  function(event)
        {

        }
    })

    $.ajax({
        url: '/homeBannerAjax',
        type: 'GET',
        dataType: 'json',
        success:  function(event)
        {
            var html = '';
            var other_banner = '';

            for(var i=0; i<event.length; i++)
            {
                if(i == 0){
                    var active_data = "active";
                }else{
                    var active_data = "";
                }
                html += '<li data-target="#myCarousel" data-slide-to="'+i+'" class="'+active_data+'"></li>';

                other_banner += '<div class="carousel-item '+active_data+'"><img src="/'+event[i].banner_images+'" alt="" class="img-fluid" /><div class="carousel-caption"><h1><span>'+event[i].top_banner_title+'</span>'+event[i].main_banner_title+'</h1><p>'+event[i].title_description+'</p><a href="#" class="cnt-btn">Get Free Proposals <span><i class="fa fa-long-arrow-right" aria-hidden="true"></i></span></a></div></div>';
                
            }

            $("#banner-carou-ids").html(html);
            $("#banner-data-slow-id").html(other_banner);
        }, error: function(event)
        {

        }
    })

    $.ajax({
        url: '/homeItWorkAjax',
        type: 'GET',
        dataType: 'json',
        success:  function(event)
        {

            var htmlImg = '<img src="'+event[0].howit_images+'" alt="about-image" class="img-fluid round-shape">';
            var html = '';
                html += '<div class="top-title"><h1>'+event[0].heading_title+'<span></span></h1></div>'+event[0].descriptions+'<div class="inf-part"><div class="row"><div class="col-md-6"><h3 ><span><img src="/frontAssets/images/hmm-icon.png" alt="icon"></span>'+event[0].year_count+'<small>'+event[0].year_text+'</small></h3></div><div class="col-md-6"><h3 class="no-border cntct-text">'+event[0].contact_no+'<small>'+event[0].contact_text+'</small></h3></div></div></div>';
             

            $("#home-work-id").html(html);
            $("#home-workImg-id").html(htmlImg);

        }, error: function(event)
        {
            
        }
    })

    $.ajax({
        url: '/homeTestimonialsAjax',
        type: 'GET',
        dataType: 'json',
        success:  function(event)
        {
            var html = '<div class="top-title white-title"><h1><small>Testimonial</small>What People Say <span></span></h1></div><div class="owl-carousel review-slide owl-theme "  >';

            for(var i=0; i<event.length; i++)
            {

                html += '<div class="item "> <img class="img-fluid clint-prf" src="'+event[i].client_img+'"  alt="brnd-images"> <figcaption><p class="review-text">'+event[i].client_comment+' </p><blockquote class="cnt-info"><h4>'+event[i].client_name+'</h4><p>'+event[i].client_designation+'</p></blockquote></figcaption></div>';
                
            }

            html += '</div>';

            $("#testimonials-full-client").html(html);
            owlCarousalCreate();
        }, error: function(event)
        {

        }
    })


    $.ajax({
        url: '/homeBehindPropandasAjax',
        type: 'GET',
        dataType: 'json',
        success:  function(event)
        {
            console.log(event);
            var html_heading = event.behindPropansHeading[0].heading_name;
            var html = '';
            if(event.behindPropans.length < 4){
                if(((event.behindPropans.length)%2 == 0) && ((event.behindPropans.length)%4 !== 0) && ((event.behindPropans.length)%5 !== 0) && ((event.behindPropans.length)%3 !== 0) && ((event.behindPropans.length)%6 !== 0))
                {
                    for(var i=0; i<event.behindPropans.length; i++){
                        html += '<div class="col-sm-6 equal-box"><div class="srvc-item"><div class="img-part"><a href="javascript:void(0)"><img src="'+event.behindPropans[i].behind_propandas_images+'" alt="images" class="img-fluid"></a></div><div class="img-info"><h5>'+event.behindPropans[i].owner_name+'</h5><h6>'+event.behindPropans[i].designation+'</h6><p>'+event.behindPropans[i].behind_propandas_pdetails+'</p></div></div></div>';
                    }
                }else if(((event.behindPropans.length)%2 == 0) && ((event.behindPropans.length)%4 == 0) && ((event.behindPropans.length)%5 !== 0) && ((event.behindPropans.length)%3 !== 0) && ((event.behindPropans.length)%6 !== 0)){
                    for(var i=0; i<event.behindPropans.length; i++){
                        html += '<div class="col-sm-3 equal-box"><div class="srvc-item"><div class="img-part"><a href="javascript:void(0)"><img src="'+event.behindPropans[i].behind_propandas_images+'" alt="images" class="img-fluid"></a></div><div class="img-info"><h5>'+event.behindPropans[i].owner_name+'</h5><h6>'+event.behindPropans[i].designation+'</h6><p>'+event.behindPropans[i].behind_propandas_pdetails+'</p></div></div></div>';
                    }
                }else if(((event.behindPropans.length)%3 == 0) || ((event.behindPropans.length)%6 == 0) || ((event.behindPropans.length)%9 == 0)) {
                    for(var i=0; i<event.behindPropans.length; i++){
                        html += '<div class="col-sm-4 equal-box"><div class="srvc-item"><div class="img-part"><a href="javascript:void(0)"><img src="'+event.behindPropans[i].behind_propandas_images+'" alt="images" class="img-fluid"></a></div><div class="img-info"><h5>'+event.behindPropans[i].owner_name+'</h5><h6>'+event.behindPropans[i].designation+'</h6><p>'+event.behindPropans[i].behind_propandas_pdetails+'</p></div></div></div>';
                    }
                }else if((event.behindPropans.length)%5 == 0){
                    var html_first_loop = '';
                    var html_second_loop = '';
                    var new_loop_data = '<div class="col-sm-2"></div>';
                    for(var i=0; i<event.behindPropans.length; i++){

                        if(i < 3){
                            html_first_loop += '<div class="col-sm-4 equal-box"><div class="srvc-item"><div class="img-part"><a href="javascript:void(0)"><img src="'+event.behindPropans[i].behind_propandas_images+'" alt="images" class="img-fluid"></a></div><div class="img-info"><h5>'+event.behindPropans[i].owner_name+'</h5><h6>'+event.behindPropans[i].designation+'</h6><p>'+event.behindPropans[i].behind_propandas_pdetails+'</p></div></div></div>';
                        }else{
                            html_second_loop += '<div class="col-sm-4 equal-box"><div class="srvc-item"><div class="img-part"><a href="javascript:void(0)"><img src="'+event.behindPropans[i].behind_propandas_images+'" alt="images" class="img-fluid"></a></div><div class="img-info"><h5>'+event.behindPropans[i].owner_name+'</h5><h6>'+event.behindPropans[i].designation+'</h6><p>'+event.behindPropans[i].behind_propandas_pdetails+'</p></div></div></div>';
                        }
                    }
                    html += html_first_loop+new_loop_data+html_second_loop+new_loop_data;
                }else if(((event.behindPropans.length)%1 == 0) && ((event.behindPropans.length)%2 !== 0) && ((event.behindPropans.length)%4 !== 0) && ((event.behindPropans.length)%5 !== 0) && ((event.behindPropans.length)%3 !== 0) && ((event.behindPropans.length)%6 !== 0) && ((event.behindPropans.length)%7 !== 0) && ((event.behindPropans.length)%8 !== 0) && ((event.behindPropans.length)%9 !== 0) && ((event.behindPropans.length)%10 !== 0)){
                    for(var i=0; i<event.behindPropans.length; i++){
                        html += '<div class="col-sm-3"></div><div class="col-sm-6 equal-box"><div class="srvc-item"><div class="img-part"><a href="javascript:void(0)"><img src="'+event.behindPropans[i].behind_propandas_images+'" alt="images" class="img-fluid"></a></div><div class="img-info"><h5>'+event.behindPropans[i].owner_name+'</h5><h6>'+event.behindPropans[i].designation+'</h6><p>'+event.behindPropans[i].behind_propandas_pdetails+'</p></div></div></div><div class="col-sm-3"></div>';
                    }
                }else{
                    for(var i=0; i<event.behindPropans.length; i++){
                        html += '<div class="col-sm-6 equal-box"><div class="srvc-item"><div class="img-part"><a href="javascript:void(0)"><img src="'+event.behindPropans[i].behind_propandas_images+'" alt="images" class="img-fluid"></a></div><div class="img-info"><h5>'+event.behindPropans[i].owner_name+'</h5><h6>'+event.behindPropans[i].designation+'</h6><p>'+event.behindPropans[i].behind_propandas_pdetails+'</p></div></div></div>';
                    }
                }
            }else{
                html += '<div class="owl-carousel team-slide owl-theme ">';
                for(var i=0; i<event.behindPropans.length; i++){
                    html += '<div class="srvc-item"><div class="img-part"><a href="javascript:void(0)"><img src="'+event.behindPropans[i].behind_propandas_images+'" alt="images" class="img-fluid"></a></div><div class="img-info"><h5>'+event.behindPropans[i].owner_name+'</h5><h6>'+event.behindPropans[i].designation+'</h6><p>'+event.behindPropans[i].behind_propandas_pdetails+'</p></div></div>';
                }
                html += '</div>';
            }

            $("#behind-propandas-heading-details").html(html_heading);
            

            if(event.behindPropans.length>3){
                $("#behind-propandas-full-data").hide();
                $("#teamScrollHome").html(html);
                owlteamCarousal();
            }else{
                $("#behind-propandas-full-data").html(html);
            }
        }, error: function(event)
        {

        }
    })



});