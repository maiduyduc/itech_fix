function actionDelete(event){
    event.preventDefault();
    let urlRequest = $(this).data('url');
    let that = $(this);
    Swal.fire({
        title: 'Hủy đăng ký khóa học này?',
        text: "Bạn có chắc chắn muốn hủy đăng ký khóa học này không?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Hủy đăng ký!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: 'GET',
                url: urlRequest,
                success: function (data){
                    if(data.code == 200){
                        that.parent().parent().parent().remove();
                        Swal.fire(
                            'Done!',
                            'Hủy đăng ký thành công.',
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
document.addEventListener('DOMContentLoaded', () => {
    $(document).on('click', '.action_delete', actionDelete);
});
