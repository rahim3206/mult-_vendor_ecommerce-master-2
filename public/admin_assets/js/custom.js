$(document).ready(function(){

    // Change Vendor Status
    $(document).on('change','.changeVendorStatus',function(){
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
                if(response.status)
                {
                    Toastify({
                        text: response.status,
                        className: "success",
                        style: {
                            background: "#008000",
                        }
                    }) .showToast();
                }
            }
        });
    });


    $(document).on('click','#add_sub_category',function(){
        // alert('hello');
        var html = '';
        html += '<div class="col-md-12">';
        html += '<div class="form-group">';
        html += '<div class="d-flex">';
        html += '    <div class="col-md-3">';
        html += '        <input class="form-control" type="text" placeholder="Category Name" name="title[]">';
        html += '    </div>&nbsp;';
        html += '    <div class="col-md-3">';
        html += '        <input class="form-control" type="text" placeholder="Category Icon (eg: flaticon-bag)" name="icon[]">';
        html += '    </div>&nbsp;';
        html += '    <div class="col-md-3">';
        html += '        <input class="form-control" type="file"  name="image[]">';
        html += '    </div>';
        html += '    &nbsp;';
        html += '    <div class="col-md-2">';
        html += '        <button class="btn btn-danger btn-sm" type="button" id="remove_sub_category"> <i class="fa fa-trash"></i></button>';
        html += '    </div>';
        html += '</div>';
        html += '</div>';
        html += '</div>'

        $('#sub_category_append').append(html);
    });

    $(document).on('click','#remove_sub_category',function(){
        $(this).closest('.col-md-12').remove();
    });


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
