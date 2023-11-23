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

$( "#customername" ).keyup(function() { 
    //$('#Loader').show();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
 
    $.ajax({
        url: site_url+ '/getcustomer',
          method: 'post',
          data: {
             customer_name: $(this).val()
          },
          dataType : 'json',
          success: function(response){
             //$('#Loader').hide();
             $('.customer_dropdown').html(response.html);
             $('.customer_dropdown').show();
             
          }
     }); 



    /* if($(".sissuestatus").val()=='partially fixed'){
        $(".sissuestatus_comment").removeClass('d-none');
    } else if($(".sissuestatus").val()=='not fixed'){
        $(".sissuestatus_comment").removeClass('d-none');
    } else {
        $(".sissuestatus_comment").addClass('d-none');
    } */
 });


 function addexcase_incident(case_id){
    $('.customer_dropdown').hide();
    $('#Loader').show();
    window.location.assign(site_url+ '/addexcaseincident/'+case_id);
 }


function get_customer(case_id){
    $('.customer_dropdown').hide();
    $('#Loader').show();
   $.ajaxSetup({
       headers: {
           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
       }
   });

   $.ajax({
       url: site_url+ '/getcase',
         method: 'post',
         data: {
            id: case_id
         },
         dataType : 'json',
         success: function(response){
            $('#Loader').hide();
            //alert(response.case.incident);
/*
            $('#customerphone').val(response.case.customerphone);
            $('#remote').val(response.case.remote);
            $('#country').val(response.case.country);
            $('#addedby').val(response.case.addedby);
            $('#sale_status').val(response.case.sale_status);
            $('#currency').val(response.case.currency);
            $('#amount').val(response.case.amount);
            $('#email').val(response.case.email);
            $('#charged_amount').val(response.case.charged_amount);
            $('#pending_amount').val(response.case.pending_amount);
            $('#addressline1').val(response.case.addressline1);
            $('#city').val(response.case.city);
            $('#state').val(response.case.state);
            $('#zip').val(response.case.zip);
            $('#bttr').val(response.case.bttr);
            $('#issue').val(response.case.issue);
            $('#additionalissue').val(response.case.additionalissue);
            $('#remarks').val(response.case.remarks);
            $('#bankinfo').val(response.case.bankinfo);
            $('#status').val(response.case.status);
            $('#payment_status').val(response.case.payment_status);
            $('#payment_gateway').val(response.case.payment_gateway);
            $('#other_gateway').val(response.case.other_gateway);
            $('#closedby_user').val(response.case.closedby_user);


*/


           /* setTimeout(function () {
                window.location.reload();
            }, 1000);
            */
         }
    }); 
}




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
            id: $(this).attr('id')
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