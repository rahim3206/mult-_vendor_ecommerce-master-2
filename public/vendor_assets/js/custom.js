$(document).ready(function(){

    $(document).on('change','#category_id',function(){
        const id = $(this).val();
        const url = $(this).data('url');
        
        $.ajax({
            type:"GET",
            url:url,
            data:{id:id},
            success:function(response){
                $('#sub_category_append').html(response);
            }
        });
    });

     // Change Product Status
     $(document).on('change','.changeProductStatus',function(){
        const url = $(this).data('url');
        const id = $(this).data('id');
        const status = $(this).val();

        $.ajax({
            type:"GET",
            url:url,
            data:{
                id:id,
                status:status
            },
            success:function(response){
                if(response.success)
                {
                    Toastify({
                        text: response.success,
                        className: "success",
                        style: {
                            background: "#008000",
                        }
                    }) .showToast();
                }
            }
        });
    });

    $(document).on('click','.sub_images_delete',function(){
        const id = $(this).data('id');
        const url = $(this).data('url');
        const parent_div = $(this).parent();
        $.ajax({
            type:"GET",
            url:url,
            data:{id:id},
            success:function(response)
            {
                if(response == 'success')
                {
                    $(parent_div).remove();
                }
            }
        });
    });

});