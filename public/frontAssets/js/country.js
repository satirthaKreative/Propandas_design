// full country list
$(function(){
    $.ajax({
        url: '/countryAjaxCall',
        type: 'GET',
        dataType: 'json',
        success: function(event)
        {
            var html = "";
            html += "<option value=''>Country</option>";
            for(var j = 0; j < event.length; j++)
            {
                html += "<option value='"+event[j].id+"'>"+event[j].nicename+"</option>";
            }
            $(".county_list").html(html);
        },
        error: function(event)
        {

        }
    })
});

// full timezone show
$(function(){
    $.ajax({
        url: '/timezoneAjaxCall',
        type: 'GET',
        dataType: 'json',
        success: function(event)
        {
            //  ip wish timezone check
            $.ajax({
                url: '/ipZoneAjaxCall',
                type: 'GET',
                dataType: 'json',
                success: function(resp)
                {
                    var html = "";
                    html += "<option value=''>Timezone</option>";
                    for(var j = 0; j < event.length; j++)
                    {
                        var data_selected = "";
                        if(event[j].zone == resp){
                            data_selected = "selected";
                        }else{
                            data_selected = "";
                        }
                        html += "<option value='"+event[j].id+"' "+data_selected+">"+event[j].zone+"</option>";
                    }
                    $(".time-zone").html(html);
                },
                error: function(resp)
                {
                    console.log(resp);
                }
            })
            //  end ip wish timezone check
            
        },
        error: function(event)
        {

        }
    })
});


// captcha checking
function recaptchaCallback() {
    $('.captcha-submit-class').removeAttr('disabled');
};