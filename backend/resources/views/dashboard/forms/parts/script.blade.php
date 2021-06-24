<script>
    let counter = 1;
    $('.addField').click(function () {
        counter++;
        let fieldForm =
            '<div class="row">\n' +
            '<div class="form-group col-6">\n' +
            '<label for="inputFieldName">Field Title</label>\n' +
            '<input name="title[]" type="text" class="form-control" id="inputFieldName" placeholder="Enter Field Title">\n' +
            '</div>\n' +
            '<div class="col-4">\n' +
            '   <label for="inputFieldType">Type</label>\n' +
            '          <select id="inputFieldType" class="form-control" name="type[]">\n' +
            '                <option value="text">text</option>\n' +
            '                <option value="number">number</option>\n' +
            '                <option value="date">date</option>\n' +
            '            </select>\n' +
            '          </div>\n' +
            '         <div class="col-2">\n' +
            '          <label for="inputFieldType">Delete</label>\n' +
            '    <i class="deleteField btn btn-danger fas fa-trash-alt"></i>\n' +
            '</div>\n' +
            '</div>';
        $('.fieldForm').append(fieldForm);
    });
    $('#submitForm').click(function (e) {
        e.preventDefault();
        let formData = new FormData($('#addForm')[0]);
        $.ajax({
            type: 'post',
            enctype: 'multipart/form-data',
            url: "{{route('dashboard.forms.store')}}",
            data: formData,
            processData: false,
            contentType: false,
            cache: false,
            success: function (data) {
                $('#addFormModal').modal('toggle');
            }
        });
    });
    //show edit Form
    let formId;
    $('.showEditForm').click(function () {
        formId = $(this).attr('formId');
        $.ajax({
            type: 'get',
            url: "{{url('admin/forms')}}/" + formId + "/edit",
            success: function (data) {
                console.log(data.fields,formId);
                $('#inputFormName').val(data.form.name);
                counter=0;
                $.each( data.fields, function( key, value ) {
                    counter++;
                    let fieldForm =
                        '<div class="row">\n' +
                        '<div class="form-group col-6">\n' +
                        '<label for="inputFieldName">Field Title</label>\n' +
                        '<input value="'+ value.title +'" name="title[]" type="text" class="form-control" id="inputFieldName" placeholder="Enter Field Title">\n' +
                        '</div>\n' +
                        '<div class="typeSelected col-4">\n' +
                        '   <label for="inputFieldType">Type</label>\n' +
                        '          <select id="inputFieldType" class="form-control" name="type[]">\n' +
                        '                <option  value="text">text</option>\n' +
                        '                <option value="number">number</option>\n' +
                        '                <option value="date">date</option>\n' +
                        '            </select>\n' +
                        '          </div>\n' +
                        '         <div class="col-2">\n' +
                        '          <label>Delete</label>\n' +
                        '    <i class="deleteField btn btn-danger fas fa-trash-alt"></i>\n' +
                        '</div>\n' +
                        '</div>';
                    $('.fieldForm').append(fieldForm);

                });
            }
        })
    });

    //Edit Form
    $('#submitEditForm').click(function (e) {
        e.preventDefault();
        let formData = new FormData($('#editForm')[0]);
        $.ajax({
            type: 'post',
            enctype: 'multipart/form-data',
            url: "{{url('admin/forms')}}/"+ formId,
            data: formData,
            processData: false,
            contentType: false,
            cache: false,
            success: function (data) {
                // $('#formName').html(data.form.name);
                $('#editFormModal').modal('toggle');
            }
        });
    });
    //delete field
    $('.fieldContainer').click(function (e) {
        if(e.target.classList.contains("deleteField") && counter > 1){
            let row = e.target.parentElement.parentElement;
            row.remove();
            counter--;
        }
    });
    //Delete Form
    $('.deleteForm').click(function (e) {
        e.preventDefault();
        let formId = $(this).attr('formId');
        $.ajax({
            type: 'delete',
            data:{
                '_token' : "{{csrf_token()}}",
            },
            url: "{{url('admin/forms')}}/" + formId,
            success: function () {
                $('#formRow_' + formId).remove();
            }
        });
    })
</script>
