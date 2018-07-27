// Product management
window.onload = function(){
    var url = window.location.origin;

    $('.remove-image').click(function(){
        var check = $(this);
        var image = $(this).data('image');
        var id = $(this).data('id');
        var token = $('#token').val();
        if(confirm('Chắc chắn xóa ảnh này')){
            $.ajax({
                url: url + '/atelier/admin/trend/deleteImage',
                method: 'POST',
                data: {
                    image : image, id : id, _token : token
                },
                success: function(res){
                    check.parent('div').fadeOut();
                    
                },
            });
        }
        
    });

}
