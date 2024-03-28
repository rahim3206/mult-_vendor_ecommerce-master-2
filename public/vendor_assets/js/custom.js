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

});