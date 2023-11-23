$(document).ready(function(){
    $('#status').change(function(){
        $('#filter_form').submit();
     });
     $('#payment_status').change(function(){
        $('#filter_form').submit();
     });
     $('.search_key').change(function(){
        $('#filter_form').submit();
     });
     $('#reservation').change(function(){
         $('#filter_form').submit();
     });

     $('#closedby_user').change(function(){
        $('#filter_form').submit();
    });

    $('#sales_agent').change(function(){
      $('#filter_form').submit();
    });

    $('.assign_followup').change(function(){
        

            $('#Loader').show();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        
            $.ajax({
                url: site_url+ '/assignfollowup', 
                  method: 'post',
                  data: {
                    id: $(this).val(),
                    case_id: $(this).attr('case-id')
                  },
                  dataType : 'json',
                  success: function(response){
                    $('#Loader').hide();
                     //alert(response.msg);
                      
                  }
             }); 
        
    });


  $('.assign_tech').change(function(){
        

      $('#Loader').show();
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
  
      $.ajax({
          url: site_url+ '/assigntech', 
            method: 'post',
            data: {
              id: $(this).val(),
              case_id: $(this).attr('case-id')
            },
            dataType : 'json',
            success: function(response){
              $('#Loader').hide();
               //alert(response.msg);
                
            }
       }); 
  
  });


  $('.assign_junior_tech').change(function(){
    $('#Loader').show();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        url: site_url+ '/assignjuniortech', 
          method: 'post',
          data: {
            id: $(this).val(),
            case_id: $(this).attr('case-id')
          },
          dataType : 'json',
          success: function(response){
            $('#Loader').hide();
             //alert(response.msg);
              
          }
     }); 

});



 });