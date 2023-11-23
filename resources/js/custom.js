 $( ".payment_status" ).change(function() { 
     if($( ".payment_status" ).val()=='p2p'){
         $(".p2pdate").removeClass('d-none');
         //$(".p2pdate").css('display','contents');
     } else {
         $(".p2pdate").addClass('d-none');
     }
 });

 $( ".payment_gateway" ).change(function() { 
     if($( ".payment_gateway" ).val()=='other'){
         $(".other_gateway").removeClass('d-none');
         //$(".p2pdate").css('display','contents');
     } else {
         $(".other_gateway").addClass('d-none');
     }
 });


 $( ".doc_status" ).change(function() { 
    if($(this).val()=='Signed'){
        $(".merchant").removeClass('d-none');
    } else {
        $(".merchant").addClass('d-none');
    }
});

$( ".refund_request_type" ).change(function() { 
    if($(this).val()=='Partial Refund'){
        $(".refund_request_amount").removeClass('d-none');
    } else {
        $(".refund_request_amount").addClass('d-none');
    }
});

$( ".doc_r_status" ).change(function() { 
    if($(this).val()=='Yes'){
        $(".doc_link").removeClass('d-none');
    } else {
        $(".doc_link").addClass('d-none');
    }
});


 $( ".pissuestatus" ).change(function() { 
    if($(".pissuestatus").val()=='partially fixed'){
        $(".pissuestatus_comment").removeClass('d-none');
    } else if($(".pissuestatus").val()=='not fixed'){
        $(".pissuestatus_comment").removeClass('d-none');
    } else {
        $(".pissuestatus_comment").addClass('d-none');
    }
});


$( ".sissuestatus" ).change(function() { 
    if($(".sissuestatus").val()=='partially fixed'){
        $(".sissuestatus_comment").removeClass('d-none');
    } else if($(".sissuestatus").val()=='not fixed'){
        $(".sissuestatus_comment").removeClass('d-none');
    } else {
        $(".sissuestatus_comment").addClass('d-none');
    }
});


$('.close_incident').click(function(){
    
    $('#Loader').show();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        url: site_url+ '/closeincident',
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


$('.view_phone').click(function(){ 
    if($(this).attr('data-mode')=="phone"){
        $('#modal-view_phone').modal('show');
    } else if($(this).attr('data-mode')=="email"){
        $('#modal-view_email').modal('show');
    } else if($(this).attr('data-mode')=="card"){ 
        $('#modal-view_card').modal('show');
    }
});


$( ".view_phone_reason" ).change(function() { 
    if($(this).val()=='Other'){
        $(".other_phone_reason").removeClass('d-none');
    } else {
        $(".other_phone_reason").addClass('d-none');
    }
});


$('.view_phone_no_reason_form').each(function() {
    $(this).submit(function(){
       var $that = $(this);

var submitButton = $(this, "input[type='submit']");
$(submitButton).attr("disabled", "true");

       jQuery.ajax({
          data: $that.serialize(),
          method: 'post',
          dataType : 'json',
          url: site_url+ '/addphonereason',
          timeout: 2000,
          error: function() {
             alert("Failed to submit");
             return true;
          },
          success: function(r) {
             if(r.status=='true'){
                if(r.mode=="phone"){
                    $('#modal-view_phone').modal('hide');
                    $('#customerphone').attr('type','text');
                } else if(r.mode=="email"){
                    $('#modal-view_email').modal('hide');
                    $('#email').attr('type','text');
                } else if(r.mode=="card"){
                    $('#modal-view_card').modal('hide');
                    $('#card_number').attr('type','text');
                    $('#month').attr('type','text');
                    $('#year').attr('type','text');
                    $('#cvv').attr('type','text');
                }
             }
            
            
            //alert("Update Successful");
             //$submitButton.attr("disabled", "false");
          },
       });
       
       return false;
    })
 });


$("#primaryno").keyup(function(){
    if($(this).val()!=''){
        $('#primarynoremark').attr('required','true');
    } else {
        $('#primarynoremark').removeAttr('required');
    }
});

$("#secondaryno").keyup(function(){
    if($(this).val()!=''){
        $('#secondarynoremark').attr('required','true');
    } else {
        $('#secondarynoremark').removeAttr('required');
    }
});