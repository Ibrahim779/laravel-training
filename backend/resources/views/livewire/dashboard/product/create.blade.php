<div wire:ignore.self class="modal fade" id="addProductModal" tabindex="-1" role="dialog"
     aria-labelledby="addProductModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addProductModalLabel">
                    Product Create
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="store" enctype="multipart/form-data">
                    @csrf
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <button type="button" class="close"
                                    data-dismiss="alert" aria-label="Close">
                                <i class="material-icons">&times;</i>
                            </button>
                            <span>
                                {{$errors->first()}}
                            </span>
                        </div>
                    @endif
                    <div class="card-body">
                        <div class="form-group">
                            <label for="inputAddArabicName">Arabic Name</label>
                            <input wire:model="name_ar" name="name_ar" type="text"
                                   class="form-control" id="inputAddArabicName"
                                   placeholder="Enter Arabic Name">
                        </div>
                        <div class="form-group">
                            <label for="inputAddEnglishName">English Name</label>
                            <input wire:model="name_en" name="name_en"
                                   type="text" class="form-control"
                                   id="inputAddEnglishName" placeholder="Enter English Name">
                        </div>
                        <div class="form-group">
                            <label for="inputAddPrice">Price</label>
                            <input wire:model="price" name="price"
                                   type="text" class="form-control"
                                   d="inputAddPrice" placeholder="Enter Price">
                        </div>
                        <div class="form-group">
                            <label for="inputAddArabicDescription">Arabic Description</label>
                            <textarea wire:model="description_ar" name="description_ar"
                                      class="form-control"
                                      id="inputAddArabicDescription"
                            ></textarea>
                        </div>
                        <div class="form-group">
                            <label for="inputAddEnglishDescription">English Description</label>
                            <textarea wire:model="description_en" name="description_en"
                                       class="form-control"
                                       id="inputAddEnglishDescription"
                            ></textarea>
                        </div>
                        <div class="form-group">
                            <label for="inputAddCategory">Category</label>
                            <select wire:model="category_id" name="category_id"
                                    class="form-control" id="inputAddCategory">
                                <option>Select</option>
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="inputAddFile">Image</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input wire:model="img" name="img" type="file"
                                           class="custom-file-input" id="inputAddFile">
                                    <label class="custom-file-label" for="inputAddFile">
                                        Choose Image
                                    </label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        Upload
                                    </span>
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
