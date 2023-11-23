$( "#sr_status" ).change(function() { 
    if($(this).val()=='No'){
        $(".sr_reason").removeClass('d-none');
    } else {
        $(".sr_reason").addClass('d-none');
    }
});

$( "#tp_status" ).change(function() { 
    if($(this).val()=='No'){
        $(".tp_reason").removeClass('d-none');
    } else {
        $(".tp_reason").addClass('d-none');
    }
});


$('.close_jrt').click(function(){
    
    $('#Loader').show();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        url: site_url+ '/closejrt',
          method: 'post',
          data: {
             id: $(this).attr('id'),
             case_id: $(this).attr('data-caseid')
          },
          dataType : 'json',
          success: function(response){
            $('#Loader').hide();
             alert(response.msg);
             setTimeout(function () {
                 window.location.reload();
             }, 1000);
          }
     }); 
});

