<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">User Create</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="addUserForm" method="post" enctype="multipart/form-data">
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
                            <label for="exampleInputName">First Name</label>
                            <input value="{{old('first_name')}}" name="first_name" type="text" class="form-control" id="exampleInputName" placeholder="Enter First Name">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName">Last Name</label>
                            <input value="{{old('last_name')}}" name="last_name" type="text" class="form-control" id="exampleInputName" placeholder="Enter Last Name">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName">Phone</label>
                            <input value="{{old('phone')}}" name="phone" type="text" class="form-control" id="exampleInputName" placeholder="Enter Phone">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail">Email</label>
                            <input value="{{old('email')}}" name="email" type="email" class="form-control" id="exampleInputEmail" placeholder="Enter Email">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword">Password</label>
                            <input value="{{old('password')}}" name="password" type="password" class="form-control" id="exampleInputPassword" placeholder="Enter Password">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Image</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input name="img" type="file" class="custom-file-input" id="exampleInputFile">
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
                        <button id="submitAddForm" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
