@extends('layouts.app')

@section('title', 'Tickets - '.$ticket->reference_no)

@section('content')

    <div class="container-fluid"><div class="d-flex justify-content-between">
            
        </div>
        <div class="row">
            <div class="col-xl-3 col-md-12 mb-4">
                <div class="card mb-3">
                    <div class="card-header">
                        Ticket Information
                    </div>
                    <div class="card-body">
                        <div class="text-info" style="font-size:0.8rem;">Requestor</div>
                        <p><a href="recordDetails.php?account="></a></p>
                        <hr class="sidebar-divider">
                        <div class="text-info" style="font-size:0.8rem;">Ticket #</div>
                        <p>{{ $ticket->reference_no }}</p>
                        <hr class="sidebar-divider">
                        <div class="text-info" style="font-size:0.8rem;">Subject</div>
                        <p>{{ $ticket->subject }}</p>
                        <hr class="sidebar-divider">
                        <div class="text-info" style="font-size:0.8rem;">Submitted</div>
                        <p>{{ \Carbon\Carbon::parse($ticket->created_at)->format('F d, Y h:i A') }}</p>
                        <hr class="sidebar-divider">
                        <div class="text-info" style="font-size:0.8rem;">Status</div>
                        <p>{{ $ticket->status ? 'OPENED' : 'CLOSED' }}</p>
                        <hr class="sidebar-divider">
                        <div class="d-flex justify-content-center">

                            <a href="#" data-toggle="modal" data-target="#replyModal" class="bg-success text-decoration-none mx-1 font-weight-bold text-success"><button type="button" class="btn btn-success btn-sm px-4" title="Reply"><span><i class="fas fa-pen"></i> REPLY</span></button></a>
                            <a href="actions/closeTicket.php?id=1" onclick="displayLoader()" class="bg-succress text-decoration-none mx-1 font-weight-bold text-danger"><button type="button" class="btn btn-danger btn-sm px-4" title="Close"><span><i class="fas fa-times"></i> CLOSE</span></button></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-9 col-md-12 mb-4">
                <div class="card mb-3">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <div><i class="fas fa-user"></i> </div>
                            <div>{{ \Carbon\Carbon::parse($ticket->created_at)->format('F d, Y h:i A') }}</div>
                        </div>
                    </div>
                    <div class="card-body">
                        <p>{!! $ticket->message !!}</p>
                        @forelse($ticket->files as $file)
                            <a href="{{ asset('storage/'.$file->file) }}" target="_blank" style="font-size:0.8rem;">{{ $file->file }}</a><br>
                        @empty

                        @endforelse
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="replyModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5>Reply Ticket</h5>
                    </div>
                    <div class="card-body">
                        <form class="user" action="actions/replyTicket.php?id=1" enctype="multipart/form-data" method="POST">
                            <center>
                                <h5 style="color:green;">REF#-22-07-2023-012104</h5>
                                <div hidden="" class="form-group" style="width: 70%;">
                                    <div class="d-flex justify-content-start">Ticket:</div>
                                    <input type="text" style="text-align: center;" class="form-control rounded-pill" name="ticket" autocomplete="off" readonly="" value="REF#-22-07-2023-012104">
                                </div>
                                <div class="d-flex justify-content-start">Subject</div>
                                <input type="text" style="text-align: center;" class="form-control mb-3" name="ticketsubject" value="ticket subject" autocomplete="off" readonly="">
                                <input hidden="" type="text" style="text-align: center;" class="form-control mb-3" name="recipientName" value="" autocomplete="off" readonly="">
                                <div class="form-group">
                                    <div class="d-flex justify-content-start">Message:</div>
                                    <textarea type="text" style="text-align: center;" class="form-control" placeholder="Enter Custom Message" name="content" rows="8" cols="50" autocomplete="off"></textarea>
                                </div>
                                <div class="form-group">
                                    Select Image to upload:
                                    <div class="d-flex justify-content-start border">
                                        <input type="file" name="fileToUpload[]" id="fileToUpload" multiple="multiple">
                                    </div>
                                    <div class="text-info" style="font-size:0.8rem;">Image Size: Less than 500KB</div>
                                </div>
                            </center>
                            <div class="my-1 modal-footer d-flex justify-content-center">
                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                <button type="submit" onclick="displayLoader()" class="btn btn-primary" name="submit">Confirm</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection