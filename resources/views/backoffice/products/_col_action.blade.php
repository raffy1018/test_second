<a class="text-decoration-none mx-1" href="#" data-toggle="modal" data-target="#edit-modal"><button class="btn btn-warning btn-sm" title="Edit"><i class="fas fa-edit"></i></button></a>
<a class="text-decoration-none mx-1" href="#" data-toggle="modal" data-target="#delete-modal"><button class="btn btn-danger btn-sm" title="Delete"><i class="fas fa-trash"></i></button></a>

<!-- Edit -->
<div class="modal fade" id="edit-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit WiFi Rates</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <form action="{{ route('backoffice.products.edit', $product) }}" method="POST">
                @csrf
                <center class="my-3">
                    <div class="form-group" style="width: 70%;">
                        <div class="d-flex justify-content-start">Product Name:</div>
                        <input type="text" style="text-align: center;" class="form-control rounded-pill" name="name" autocomplete="off" value="{{ $product->name }}">
                    </div>
                    <div class="form-group" style="width: 70%;">
                        <div class="d-flex justify-content-start">Description:</div>
                        <input type="text" style="text-align: center;" class="form-control rounded-pill" name="description" autocomplete="off" value="{{ $product->description }}">
                        <div class="text-info" style="font-size:0.8rem;">Optional: Description of the Product</div>
                    </div>
                    <div class="form-group" style="width:70%;text-align:center;">
                        <div class="d-flex justify-content-start">Type:</div>
                        <select class="btn btn-white border form-control" style="text-align:left;width:100%;" name="type">

                            <option selected disabled>-- Select one --</option>
                            @foreach(\App\Models\Product::getTypeSelectOptions() as $type)
                                @if($product->type == $type['value'])
                                    <option value="{{ $type['value'] }}" selected>{{ $type['label'] }}</option>
                                @else
                                    <option value="{{ $type['value'] }}">{{ $type['label'] }}</option>
                                @endif
                            @endforeach
                        </select>

                    </div>
                    <div class="form-group" style="width: 70%;">
                        <div class="d-flex justify-content-start">Price:</div>
                        <input type="number" style="text-align: center;" class="form-control rounded-pill" name="price" autocomplete="off" value="{{ $product->price }}">
                        <div class="text-info" style="font-size:0.8rem;">Price in Php</div>
                    </div>
                </center>
                <div class="modal-footer d-flex justify-content-center">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>

        </div>
    </div>
</div>


<!-- Delete -->
<div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Products &amp; Services?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Confirm" below if you want to delete this Products &amp; Services from the Database.</div>
            <div class="modal-footer d-flex justify-content-center">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <form action="{{ route('backoffice.products.destroy', $product) }}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-primary">Confirm</button>
                </form>
            </div>
        </div>
    </div>
</div>