<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Product &amp; Services</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="{{ route('backoffice.products.store') }}" method="POST">
                @csrf
                <center class="my-3">
                    <div class="form-group" style="width: 70%;">
                        <div class="d-flex justify-content-start">Product Name:</div>
                        <input type="text" style="text-align: center;" class="form-control rounded-pill" name="name" placeholder="Enter Product Name" required>
                    </div>
                    <div class="form-group" style="width: 70%;">
                        <div class="d-flex justify-content-start">Description:</div>
                        <input type="text" style="text-align: center;" class="form-control rounded-pill" name="description" placeholder="Enter Description">
                        <div class="text-info" style="font-size:0.8rem;">Optional: Description of the Product</div>
                    </div>
                    <div class="form-group" style="width:70%;text-align:center;">
                        <div class="d-flex justify-content-start">Type:</div>
                        <select class="btn btn-white border form-control" style="text-align:left;width:100%;" name="type">
                            <option selected disabled>-- Select one --</option>
                            @foreach(\App\Models\Product::getTypeSelectOptions() as $type)
                                <option value="{{ $type['value'] }}">{{ $type['label'] }}</option>
                            @endforeach
                        </select>

                    </div>
                    <div class="form-group" style="width: 70%;">
                        <div class="d-flex justify-content-start">Price:</div>
                        <input type="number" style="text-align: center;" class="form-control rounded-pill" name="price" placeholder="Enter Price" required>
                        <div class="text-info" style="font-size:0.8rem;">Price in Php</div>
                    </div>
                </center>
                <div class="modal-footer d-flex justify-content-center">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>