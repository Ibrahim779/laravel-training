<div class="modal fade" id="addDocModal" tabindex="-1" role="dialog"
     aria-labelledby="addDocModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addDocModalLabel">Document Create</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="storeDocForm" method="post" enctype="multipart/form-data">
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
                            <label for="inputDocName">Name</label>
                            <input name="name" type="text" class="form-control" id="inputDocName" placeholder="Enter Name">
                        </div>
                        <div class="docContainer">
                            <div class="row">
                                <div class="col-9">
                                    <label for="inputFormName">Form</label>
                                    <select id="inputFormName" class="selectedForm form-control" name="forms[]">
                                        <option  value="1">select..</option>
                                        @foreach($forms as $form)
                                            <option value="{{$form->id}}">{{$form->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-2">
                                    <label>Delete</label>
                                    <i class="deleteForm btn btn-danger fas fa-trash-alt"></i>
                                </div>

                                <div class="mt-3 col-1">
                                   <i class="download pb-2 fas fa-download"></i>
                                    <i class="upload pb-2 fas fa-upload"></i>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row formFields"></div>
                            </div>
                            <div class="docForm"></div>
                        </div>
                        <div>
                            <i class="addDocForm fas fa-plus-circle"></i>
                        </div>
                    </div>

                    <div class="card-footer">
                        <button id="submitDocForm" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>
