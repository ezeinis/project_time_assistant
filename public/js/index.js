$('#new_project').click(function(){
    var height=$('#new_project_hidden_bar').height();
    //console.log(height);
    if(height>0){
        $('#new_project_hidden_bar').css('max-height','0px');
    }else{
        $('#new_project_hidden_bar').css('max-height','500px');
    }

});

$('.project_list_item_sidebar').click(function(){
    console.log($(this).attr('id'));
    var row_clicked = $(this).attr('id');
    if($(this).hasClass('active')){
        console.log('mlk');
    }else{
        console.log('allazw se '+row_clicked);
        var index=$('.project_list_item_sidebar').index(this);
        $('.project_list_item_sidebar').removeClass('active');
        $(this).addClass('active');
        $('#index_main_section').html(
            "<div class='row'><div class='col-md-12 main_section_header'>\
            <div class='row'>\
            <div class='col-md-12'>\
            <h4>"+projects[index].name+"</h4>\
            </div>\
            </div>\
            <div class='row'>\
            <div class='col-md-12'>\
            <h5>Hours worked: "+projects[index].total_hrs+"</h5>\
            </div>\
            </div>\
            <div class='row'>\
            <div class='col-md-12'>\
            <h5>Project description: </h5>\
            </div>\
            </div>\
            </div>\
            <button id='new_hour_project_"+projects[index].id+"' class='btn new_hour' data-toggle='modal' data-target='#myModal'>+</button>\
            </div>\
            <div id='project_work_instances'>\
            <div class='row'>\
            <div class='col-md-6 created_at_header'>\
            Date\
            </div>\
            <div class='col-md-6 hrs_header'>\
            Hours\
            </div>\
            </div>\
            <div id='project_"+projects[index].id+"_hours' class='hrs_container'></div>\
            </div>"
        );
            var height = $("#index_main_section>.row").height();
            $(".new_hour").css('margin-top',(height/2)-25);
            $("input[name='project_id']").val(projects[index].id);
            //console.log(projects[index].work_instances);
            $.each(projects[index].work_instances, function( index, value ) {
              //console.log(value);
              $('#project_'+value.project_id+'_hours').append("<div class='row'>\
                    <div class='col-md-6 created_at'>\
                        "+value.created_at+"\
                    </div>\
                    <div class='col-md-6 hrs'>\
                        "+value.hrs+"\
                    </div>\
                </div>");
            });
    }
});

$(document).ready(function(){
    var height = $("#index_main_section>.row").height();
    $(".new_hour").css('margin-top',(height/2)-25);
});

//# sourceMappingURL=index.js.map
