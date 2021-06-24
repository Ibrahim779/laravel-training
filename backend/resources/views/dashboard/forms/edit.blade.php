<div class="modal fade" id="editFormModal" tabindex="-1" role="dialog"
     aria-labelledby="editFormModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editFormModalLabel">Form Edit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editForm" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
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
                            <label for="inputFormName">Name</label>
                            <input name="name" type="text" class="form-control" id="inputFormName" placeholder="Enter Name">
                        </div>
                        <div class="fieldContainer">
                            <div class="fieldForm"></div>
                        </div>
                        <div>
                            <i class="addField fas fa-plus-circle"></i>
                        </div>
                    </div>

                    <div class="card-footer">
                        <button id="submitEditForm" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
