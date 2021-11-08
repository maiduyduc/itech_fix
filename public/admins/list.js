function actionDelete(event){
    event.preventDefault();
    let urlRequest = $(this).data('url');
    let that = $(this);
    // alert(urlRequest);
    Swal.fire({
        title: 'Bạn có chắc chắn muốn xóa không?',
        text: "!!!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Xóa!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: 'GET',
                url: urlRequest,
                success: function (data){
                    if(data.code == 200){
                        that.parent().parent().parent().parent().remove();
                        Swal.fire(
                            'Done!',
                            'Xóa thành công.',
                            'success'
                        )
                    }
                },
                error: function (){

                }
            });

        }
    })
}

$( function (){
    $(document).on('click', '.action_delete', actionDelete);
})
