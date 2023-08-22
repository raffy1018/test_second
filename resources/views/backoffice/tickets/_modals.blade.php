<div class="modal fade" id="add-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5>Create Ticket</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('backoffice.tickets.store') }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <h5 class="text-success text-center">{{ $reference }}</h5>
                    <input type="hidden" name="reference_no" value="{{ $reference }}">

                    <div class="form-group">
                        <label for="subject">Subject</label>
                        <input type="text" name="subject" id="subject" class="form-control" placeholder="Enter Subject" required="">
                    </div>

                    <div class="form-group">
                        <label for="recipient">Recipient</label>
                        <select name="customer_id" id="recipient" class="form-control">
                            <option value="" selected disabled>-- Select one --</option>
                            @foreach(\App\Models\Customer::all() as $customer)
                                <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="message">Message</label>
                        <textarea type="text" class="form-control" placeholder="Enter Custom Message" name="message" rows="4" cols="50" autocomplete="off" id="message"></textarea>
                    </div>

                    <div class="form-group">
                        Select Image to upload:
                        <div class="d-flex justify-content-start border">
                            <input type="file" name="files[]" id="file" multiple="multiple">
                        </div>
                        <div class="text-info" style="font-size:0.8rem;">Image Size: Less than 500KB</div>
                    </div>

                    <div class="my-1 modal-footer d-flex justify-content-center">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Confirm</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>