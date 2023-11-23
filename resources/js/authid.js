$('.refresh_auth_id').click(function(){
    
    $('#Loader').show();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        url: site_url+ '/refreshauthid',
          method: 'post',
          data: {
          },
          dataType : 'json',
          success: function(response){
            $('#Loader').hide();
             $('.auth_id').html(response.auth_id);
          }
    });
    
});


$('.generate_auth_key').click(function(){
    var user_id = $(this).attr('id');
    $('#Loader').show();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        url: site_url+ '/generateauthkey',
          method: 'post',
          data: {
            user_id: user_id
          },
          dataType : 'json',
          success: function(response){
            $('#Loader').hide();
             $('#auth-'+user_id).html(response.auth_id);

          }
    });
    
});


$('#search_key').change(function(){
    $('#filter_form').submit();
 });