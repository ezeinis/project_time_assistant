$('#new_project').click(function(){
    var height=$('#new_project_hidden_bar').height();
    //console.log(height);
    if(height>0){
        $('#new_project_hidden_bar').css('max-height','0px');
    }else{
        $('#new_project_hidden_bar').css('max-height','500px');
    }

});

//# sourceMappingURL=index.js.map
