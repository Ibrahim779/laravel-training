<script>
    let counter = 1;
    $('.addDocForm').click(function () {
        let docForm =
            '<div class="row">\n' +
            '    <div class="col-9">\n' +
            '        <label for="inputFormType">Form</label>\n' +
            '          <select id="inputFormType" class="selectedForm form-control" name="forms[]">\n' +
            '                <option  value="1">select..</option>'+
            '           @foreach($forms as $form)\n' +
            '              <option value="{{$form->id}}">{{$form->name}}</option>\n' +
            '               @endforeach\n' +
            '             </select>\n' +
            '             </div>\n' +
            '  <div class="col-2">\n' +
            '   <label>Delete</label>\n' +
            '<i class="deleteForm btn btn-danger fas fa-trash-alt"></i>\n' +
            '</div>\n' +
            '<div class="mt-3 col-1">\n' +
            '   <a href="#"><i class="pb-2 fas fa-download"></i></a>\n' +
            '   <a href="#"> <i class="fas fa-upload"></i> </a>\n' +
            '</div>'+
            '</div>'+' <div class="form-group">\n' +
            '                                <div class="row formFields">\n' +
            '                                </div>\n' +
            '                            </div>';
        $('.docForm').append(docForm);
        counter++;
    });
    $('#submitDocForm').click(function (e) {
        e.preventDefault();
        let formData = new FormData($('#storeDocForm')[0]);
        $.ajax({
            type: 'post',
            enctype: 'multipart/form-data',
            url: "{{route('dashboard.documents.store')}}",
            data: formData,
            processData: false,
            contentType: false,
            cache: false,
            success: function (data) {
                console.log(data);
                $('#addDocModal').modal('toggle');
            }
        });
    });
    //show edit doc
    let docId;
    $('.showEditDoc').click(function () {
        docId = $(this).attr('docId');
        $.ajax({
            type: 'get',
            url: "{{url('admin/documents')}}/" + docId + "/edit",
            success: function (data) {
                console.log(data.forms,data.document.name);
                $('#inputEditDocName').val(data.document.name);
                counter=0;
                $('.docForm').children().remove();
                $.each( data.forms, function( key, value ) {
                    counter++;
                    let docForm =
                        '<div class="row">\n' +
                        '    <div class="col-10">\n' +
                        '        <label for="inputEditFormType">Form</label>\n' +
                        '           <select id="inputEditFormType" class="selectedEditForm form-control" name="forms[]">\n' +
                        '                <option  value="1">select..</option>'+
                        '             @foreach($forms as $form)\n' +
                        '               <option value="{{$form->id}}">{{$form->name}}</option>\n' +
                        '             @endforeach\n' +
                        '             </select>\n' +
                        '             </div>\n' +
                        '  <div class="col-2">\n' +
                        '   <label>Delete</label>\n' +
                        '<i class="deleteForm btn btn-danger fas fa-trash-alt"></i>\n' +
                        '</div>\n' + '' +
                        '<div class="mt-3 col-1">\n' +
                        '   <a href="#"><i class="pb-2 fas fa-download"></i></a>\n' +
                        '   <a href="#"> <i class="fas fa-upload"></i> </a>\n' +
                        '</div>' +
                        '</div>';
                    $('.docForm').append(docForm);
                });
            }
        })
    });
    //Edit Form
    $('#submitEditDoc').click(function (e) {
        e.preventDefault();
        let formData = new FormData($('#editDoc')[0]);
        $.ajax({
            type: 'post',
            enctype: 'multipart/form-data',
            url: "{{url('admin/documents')}}/"+ docId,
            data: formData,
            processData: false,
            contentType: false,
            cache: false,
            success: function (data) {
                // $('#formName').html(data.form.name);
                $('#editDocModal').modal('toggle');
            }
        });
    });
    //delete field
    $('.docContainer').click(function (e) {
        let fields = [];
        if(e.target.classList.contains("deleteForm") && counter > 1){
            let row = e.target.parentElement.parentElement;
            $('.formFields').children().remove();
            row.remove();
            counter--;
        }
        if (e.target.classList.contains("selectedEditForm")) {
            let formId = $('.selectedEditForm').val();
            if (formId){
                $.ajax({
                    type: 'get',
                    url: "{{url('admin/forms')}}/" + formId + "/edit",
                    success: function (data) {
                        $('.formFields').children().remove();
                        $.each(data.fields, function (key, value) {
                            let fieldForm = '' +
                                '<div class="col-6">\n' +
                                ' <label for="inputDoc' + value.title + '">' + value.title + '</label>\n' +
                                '<input name="' + value.id + '" type="' + value.type + '" class="form-control" id="inputDoc' + value.title + '" placeholder="Enter ' + value.title + '">\n' +
                                '</div>';
                            $('.formFields').append(fieldForm);
                        });
                    }
                });
            }
        }
        if (e.target.classList.contains("selectedForm")) {
            let formId = $('.selectedForm').val();
            if (formId){
                $.ajax({
                    type: 'get',
                    url: "{{url('admin/forms')}}/" + formId + "/edit",
                    success: function (data) {
                        $('.formFields').children().remove();
                        $.each(data.fields, function (key, value) {
                            let fieldForm = '' +
                                '<div class="col-6">\n' +
                                ' <label for="inputDoc' + value.title + '">' + value.title + '</label>\n' +
                                '       <input name="' + value.id + '" type="' + value.type + '" class="form-control" id="inputDoc' + value.title + '" placeholder="Enter ' + value.title + '">\n' +
                                '</div>';
                            $('.formFields').append(fieldForm);
                        });
                    }
                });
            }
        }

        if (e.target.classList.contains("download")) {
            let formId = $('.selectedForm').val();
            console.log(formId);
            $.ajax({
                type: 'get',
                url: "{{url('admin/forms')}}/" + formId + "/export",
                success: function () {
                    console.log('success');
                }
            });
        }
        //Upload
        if (e.target.classList.contains("upload")) {
            $.ajax({
                type: 'post',
                data : {
                    '_token' : "{{csrf_token()}}",
                    'fieldsValue' : $('#fieldsValue').val(),
                },
                url: "{{route('dashboard.forms.import')}}",
                success: function (data) {
                    $.each(data[0][0], function (key, value){
                        if($('#inputDoc'+ key)){
                            $('#inputDoc'+ key).val(value)
                        }
                    });
                }
            });
        }
    });

    //Delete Form
    $('.deleteDoc').click(function (e) {
        e.preventDefault();
        let docId = $(this).attr('docId');
        $.ajax({
            type: 'delete',
            data:{
                '_token' : "{{csrf_token()}}",
            },
            url: "{{url('admin/documents')}}/" + docId,
            success: function () {
                $('#docRow_' + docId).remove();
            }
        });
    });


</script>
