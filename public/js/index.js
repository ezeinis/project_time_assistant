

// $('.project_list_item_sidebar').click(function(){
//     console.log($(this).attr('id'));
//     var row_clicked = $(this).attr('id');
//     if($(this).hasClass('active')){
//         console.log('mlk');
//     }else{
//         console.log('allazw se '+row_clicked);
//         var index=$('.project_list_item_sidebar').index(this);
//         $('.project_list_item_sidebar').removeClass('active');
//         $(this).addClass('active');
//         $('#index_main_section').html(
//             "<div class='row'><div class='col-md-12 main_section_header'>\
//             <div class='row'>\
//             <div class='col-md-12'>\
//             <h4>"+projects[index].name+"</h4>\
//             </div>\
//             </div>\
//             <div class='row'>\
//             <div class='col-md-12'>\
//             <h5>Hours worked: "+projects[index].total_hrs+"</h5>\
//             </div>\
//             </div>\
//             <div class='row'>\
//             <div class='col-md-12'>\
//             <h5>Project description: </h5>\
//             </div>\
//             </div>\
//             </div>\
//             <button id='new_hour_project_"+projects[index].id+"' class='btn new_hour' data-toggle='modal' data-target='#myModal'>+</button>\
//             </div>\
//             <div id='project_work_instances'>\
//             <div class='row'>\
//             <div class='col-md-6 created_at_header'>\
//             Date\
//             </div>\
//             <div class='col-md-6 hrs_header'>\
//             Hours\
//             </div>\
//             </div>\
//             <div id='project_"+projects[index].id+"_hours' class='hrs_container'></div>\
//             </div>"
//         );
//             var height = $("#index_main_section>.row").height();
//             $(".new_hour").css('margin-top',(height/2)-25);
//             $("input[name='project_id']").val(projects[index].id);
//             //console.log(projects[index].work_instances);
//             $.each(projects[index].work_instances, function( index, value ) {
//               //console.log(value);
//               $('#project_'+value.project_id+'_hours').append("<div class='row'>\
//                     <div class='col-md-6 created_at'>\
//                         "+value.created_at+"\
//                     </div>\
//                     <div class='col-md-6 hrs'>\
//                         "+value.hrs+"\
//                     </div>\
//                 </div>");
//             });
//     }
// });


$(document).ready(function(){
    // adjust margin top for button add new hour
    var height = $("#index_main_section>.row").height();
    $(".new_hour").css('margin-top',(height/2)-25);

    $('#new_project').on("click",function(){
    var height=$('#new_project_hidden_bar').height();
    if(height>0){
        $('#new_project_hidden_bar').css('max-height','0px');
    }else{
        $('#new_project_hidden_bar').css('max-height','500px');
    }

    });

});

$(document.body).on('click', '.fa-times', function(){
    var work_instance_id = $(this).attr('id');
    swal({
        title: "Are you sure?",
        text: "You will not be able to recover this work instance",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Yes, delete it!",
        closeOnConfirm: false
    },
    function(){
        $('#work_instance_row_'+work_instance_id.split("_")[1]).remove();
        $.get(
            "/work_instance/delete",
            {'work_instance_id':work_instance_id.split("_")[1]},
            function( data ) {
            $('#project_hrs_header').text("Hours worked: "+data);
        });
        swal("Deleted!", "Work instance has been deleted.", "success");
    });
});

$('.project_list_item_sidebar').on("click",function(){
    var project_name = $(this).attr('id').split("_")[2];

    if($(this).hasClass('active')){
        console.log('mlk');
    }else{
        console.log('allazw se '+project_name);
        $('.project_list_item_sidebar').removeClass('active');
        $(this).addClass('active');
        $.get(
        "/project/get_work_instance_view",
        {'project_name':project_name},
        function( data ) {
            $('.hrs_container').html(data[2]);
            $('#project_name_header').text(data[0]);
            $('#project_hrs_header').text("Hours worked: "+data[1]);
        });
    }
});

$('.new_hour_submit_button').on("click",function(){
    var project_name = $('.project_list_item_sidebar.active').attr('id').split("_")[2];
    console.log(project_name);
    hrs = $("input[name='hours_worked']").val();
    note = $("input[name='note']").val();
    $.get(
        "/project/add_hours",
        {'project_name':project_name,"hrs":hrs,"note":note},
        function( data ) {
            $('#myModal').modal('toggle');
            $("input[name='hours_worked']").val("");
            $("input[name='note']").val("");
            $('.hrs_container').prepend(data[0]);
            $('#project_hrs_header').text("Hours worked: "+data[1]);
    });
});

// edit-save work instance start
$(document.body).on("click",'.fa-pencil',function(){
    var full_id = $(this).attr('id');
    var id = full_id.split("_")[1];
    //hide full size note
    $('#full_size_note_'+id).css("display","none");
    //deixe save button
    $(this).css("display","none");
    $('#save_'+id).css("display","inline-block");
    //deixe hrs input
    $('#hrs_input_'+id).css("display","inline-block");
    $('#hrs_regular_'+id).css("display","none");
    //deixe note textarea
    $('#trunc_note_'+id).css("display","none");
    $('#edit_note_'+id).css("display","inline-block");
});

$(document.body).on("click",'.fa-save',function(){
    var full_id = $(this).attr('id');
    var id = full_id.split("_")[1];

    var note = $("#edit_note_"+id+">textarea").val();
    var hrs = $("#hrs_input_"+id).val();

    $.get(
        "/work_instance/edit",
        {"id":id,"hrs":hrs,"note":note},
        function( data ) {
            $('.hrs_container').html(data[0]);
            $('#project_hrs_header').text("Hours worked: "+data[1]);
            }).done(function() {
                $('#work_instance_row_'+id).css('background-color','#81C784');
                setTimeout(function(){$('#work_instance_row_'+id).css('background-color','white');},300);
    });

});
// edit-save work instance end




//# sourceMappingURL=index.js.map
