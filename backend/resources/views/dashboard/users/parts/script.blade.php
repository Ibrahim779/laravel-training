<script>
    //Show Add Form
    $('#addUser').click(function () {
        $('#formSection').show();
    });
    $('#hiddenAddForm').click(function () {
        $('#formSection').hide();
    });
    //Add User
    $('#submitAddForm').click(function (e) {
        e.preventDefault();
        let formData = new FormData($('#addUserForm')[0]);
        $.ajax({
            type: 'post',
            enctype: 'multipart/form-data',
            url: "{{route('dashboard.users.store')}}",
            data: formData,
            processData: false,
            contentType: false,
            cache: false,
            success: function (data) {
                $('#name').html(data.user.first_name);
                $('#email').html(data.user.email);
                $('#phone').html(data.user.phone);
                $("#img").attr("src","{{url('/storage')}}/"+data.user.img);
                $("#edit").attr("userId",data.user.id);
                $("#delete").attr("userId",data.user.id);
                $('#newUserRow').show();
                $('#exampleModal').modal('toggle');
            }
        });
    });
    //Show Edit Form
    let userId;
    $('.editUser').click(function () {
        userId = $(this).attr('userId');
        $.ajax({
            type: 'get',
            url : "{{url('admin/users')}}/"+ userId+'/edit',
            success: function (data) {
                $('#editInputFirstName').val(data.user.first_name);
                $('#editInputLastName').val(data.user.last_name);
                $('#editInputPhone').val(data.user.phone);
                $('#editInputEmail').val(data.user.email);
            }
        });
        $('#formEditSection').show();
    });
    $('#hiddenEditForm').click(function () {
        $('#formEditSection').hide();
    });
    //Edit User
    $('#submitEditForm').click(function (e) {
        e.preventDefault();
        let formData = new FormData($('#editUserForm')[0]);
        $.ajax({
            type: 'post',
            enctype: 'multipart/form-data',
            url: "{{url('admin/users')}}/"+ userId,
            data: formData,
            processData: false,
            contentType: false,
            cache: false,
            success: function (data) {
                $('#editName').html(data.user.first_name + ' '+ data.user.last_name);
                $('#editEmail').html(data.user.email);
                $('#editPhone').html(data.user.phone);
                $("#editImage").attr("src","{{url('storage')}}/"+data.user.img);
                $('#editModal').modal('toggle');
            }
        });
    });
    //Delete User
    $('.deleteUser').click(function (e) {
        e.preventDefault();
        let userId = $(this).attr('userId');
        $.ajax({
            type: 'delete',
            data:{
                '_token' : "{{csrf_token()}}",
            },
            url: "{{url('admin/users')}}/" + userId,
            success: function () {
                $('#userRow_'+userId).remove();
            }
        });
    })
</script>
