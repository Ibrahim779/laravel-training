<div class="modal fade" id="addFormModal" tabindex="-1" role="dialog"
     aria-labelledby="addFormModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addFormModalLabel">Form Create</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="addForm" method="post" enctype="multipart/form-data">
                    @csrf
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <i class="material-icons">&times;</i>
                            </button>
                            <span>
                                {{$errors->first()}}
                            </span>
                        </div>
                    @endif
                    <div class="card-body">
                        <div class="form-group">
                            <label for="inputName">Name</label>
                            <input name="name" type="text" class="form-control" id="inputName" placeholder="Enter Name">
                        </div>
                        <div class="fieldContainer">
                            <div class="row">
                                <div class="form-group col-6">
                                    <label for="inputFieldName">Field Title</label>
                                    <input name="title[]" type="text" class="form-control" id="inputFieldName" placeholder="Enter Field Title">
                                </div>
                                <div class="col-4">
                                    <label for="inputFieldType">Type</label>
                                    <select id="inputFieldType" class="form-control" name="type[]">
                                        <option value="text">text</option>
                                        <option value="number">number</option>
                                        <option value="date">date</option>
                                    </select>
                                </div>
                                <div class="col-2">
                                    <label for="inputFieldType">Delete</label>
                                    <i class="deleteField btn btn-danger fas fa-trash-alt"></i>
                                </div>
                            </div>
                            <div class="fieldForm"></div>
                        </div>
                        <div>
                            <i class="addField fas fa-plus-circle"></i>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button id="submitForm" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
