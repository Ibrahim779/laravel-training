<div class="modal fade" id="editProductModal" tabindex="-1" role="dialog"
     aria-labelledby="editProductModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editProductModalLabel">Product Edit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form enctype="multipart/form-data">
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
                            <label for="inputEditArabicName">Arabic Name</label>
                            <input name="name_ar" type="text" class="form-control" id="inputEditArabicName" placeholder="Enter Arabic Name">
                        </div>
                        <div class="form-group">
                            <label for="inputEditEnglishName">English Name</label>
                            <input name="name_en" type="text" class="form-control" id="inputEditEnglishName" placeholder="Enter English Name">
                        </div>
                        <div class="form-group">
                            <label for="inputEditPrice">Price</label>
                            <input  name="price" type="text" class="form-control" id="inputEditPrice" placeholder="Enter Price">
                        </div>
                        <div class="form-group">
                            <label for="inputEditArabicDescription">Arabic Description</label>
                            <textarea name="description_ar"
                                      class="form-control"
                                      id="inputEditArabicDescription"
                            ></textarea>
                        </div>
                        <div class="form-group">
                            <label for="inputEditEnglishDescription">English Description</label>
                            <textarea  name="description_en"
                                       class="form-control"
                                       id="inputEditEnglishDescription"
                            ></textarea>
                        </div>
                        <div class="form-group">
                            <label for="inputEditCategory">Category</label>
                            <select  name="price" class="form-control" id="inputEditCategory">
                                <option>Category1</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="inputEditFile">Image</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input name="img" type="file" class="custom-file-input" id="inputEditFile">
                                    <label class="custom-file-label" for="inputEditFile">Choose Image</label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text">Upload</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
