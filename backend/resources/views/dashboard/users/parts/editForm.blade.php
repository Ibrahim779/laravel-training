<div class="modal fade" id="editModal" tabindex="-1" role="dialog"
     aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">User Edit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editUserForm" method="post" enctype="multipart/form-data">
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
                            <label for="editInputFirstName">First Name</label>
                            <input value="{{old('first_name')}}" name="first_name" type="text"
                                   class="form-control" id="editInputFirstName" placeholder="Enter First Name">
                        </div>
                        <div class="form-group">
                            <label for="editInputLastName">Last Name</label>
                            <input value="{{old('last_name')}}" name="last_name" type="text"
                                   class="form-control" id="editInputLastName" placeholder="Enter Last Name">
                        </div>
                        <div class="form-group">
                            <label for="editInputPhone">Phone</label>
                            <input value="{{old('phone')}}" name="phone" type="text"
                                   class="form-control" id="editInputPhone" placeholder="Enter Phone">
                        </div>
                        <div class="form-group">
                            <label for="editInputEmail">Email</label>
                            <input value="{{old('email')}}" name="email" type="email" class="form-control"
                                   id="editInputEmail" placeholder="Enter Email">
                        </div>
                        <div class="form-group">
                            <label for="editInputPassword">Password</label>
                            <input value="{{old('password')}}" name="password" type="password"
                                   class="form-control" id="editInputPassword" placeholder="Enter Password">
                        </div>
                        <div class="form-group">
                            <label for="editInputFile">Image</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input name="img" type="file"
                                           class="custom-file-input" id="editInputFile">
                                    <label class="custom-file-label" for="exampleInputFile">Choose Image</label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text">Upload</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button id="submitEditForm" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
