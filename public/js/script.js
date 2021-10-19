$('.fun_ser').on('change',function(){
    var data = {
        fun_id:$(this).data('funid'),
        ser_id:$(this).val(),
        _token: $('input[name=_token]').val()
    };

    if($(this).is(':checked')){
        data.estado = 1
    } else {
        data.estado=0
    }
    ajaxRequest('/admin/menu-rol',data);
});

function ajaxRequest (url,data){
  /*  $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
    }); */
    $.ajax({
        url: url,
        type:'POST',
        data:data
       
    });
   
}