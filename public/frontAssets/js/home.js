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
           
            if(c == 3 || (c > 3 && c < 7))
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
                    html += '<div class="col-sm-3 plr-5"><div class="cr-box"><a href="/search-view"><img src="'+img+'" alt="images" class="img-fluid"><div class="text-overley"><p>'+event[i].category_name+'</p></div></a></div></div>';
                }
                html += others;

            }
            else if(c == 7 || (c > 7))
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
                    html += '<div class="col-sm-3 plr-5"><div class="cr-box"><a href="#"><img src="'+img+'" alt="images" class="img-fluid"><div class="text-overley"><p>'+event[i].category_name+'</p></div></a></div></div>';
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
                    html += '<div class="col-sm-3 plr-5"><div class="cr-box"><a href="#"><img src="'+img+'" alt="images" class="img-fluid"><div class="text-overley"><p>'+event[i].category_name+'</p></div></a></div></div>';
                }
            }

            $(".my-tt").html(html);
        },
        error:  function(event)
        {

        }
    })
});