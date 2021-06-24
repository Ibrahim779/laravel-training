<div class="modal fade" id="editDocModal" tabindex="-1" role="dialog"
     aria-labelledby="editDocModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editDocModalLabel">Document Edit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editDoc" method="post" enctype="multipart/form-data">
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
                            <label for="inputEditDocName">Name</label>
                            <input name="name" type="text" class="form-control" id="inputEditDocName" placeholder="Enter Name">
                        </div>
                        <div class="docContainer">
                            <div class="docForm"></div>
                            <div class="form-group">
                                <div class="row formFields"></div>
                            </div>
                        </div>
                        <div>
                            <i class="addDocForm fas fa-plus-circle"></i>
                        </div>
                    </div>

                    <div class="card-footer">
                        <button id="submitEditDoc" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
