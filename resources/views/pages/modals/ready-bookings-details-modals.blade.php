@foreach($boats as $boat)
    <!-- Modal -->
    <div class="modal fade" id="myModalps{{ $boat->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Send E-mail to Boat Owner</h4>
                </div>
                <div class="modal-body">
                    <form id="send-mail-{{ $boat->id }}" method="post" action="{{ url('/send-mail') }}" role="form">
                        {{ csrf_field() }}
                        <fieldset>
                            <div class="form-group">
                                <label>Owner's Name : </label>
                                <input type="text" name="owner" class="form-control" placeholder="Enter Boat Owner" value="{{ $boat->owner }}" readonly>
                            </div>
                            <div class="form-group">
                                <label>E-mail : </label>
                                <input type="email" name="email" class="form-control" placeholder="Enter Owner's E-mail" value="{{ $boat->email }}" readonly>
                            </div>
                            <div class="form-group">
                                <label>Subject : </label>
                                <input type="text" name="subject" class="form-control" placeholder="Enter Owner's Phone #" value="HBR Boat inquiry with date and time" readonly>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" rows="8" name="email_body" placeholder="E-mail Body"></textarea>
                            </div>
                        </fieldset>
                        <input type="hidden" name="req_id" value="@foreach($data as $d) @if($d->key == 'status') {{ $d->sn_no }} @endif @endforeach">
                        <input type="hidden" name="boat_id" value="{{ $boat->id }}">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-info btn-offer" form="send-mail-{{ $boat->id }}">Send</button>
                    <button type="button" class="btn btn-info btn-offer" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>

@endforeach

        <!-- Modal -->
    <div class="modal fade" id="send-mail-client" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Send E-mail to Lead Owner</h4>
                </div>
                <div class="modal-body">
                    <form id="mail-lead" method="post" action="{{ url('/send-mail-client') }}" role="form">
                        {{ csrf_field() }}
                        <fieldset>
                            <div class="form-group">
                                <label>Lead Owner's Name : </label>
                                <input type="text" name="owner" class="form-control" placeholder="Enter Boat Owner" value="@foreach($data as $fd) @if($fd->key == 'full-name') {{$fd->value}} @endif @endforeach" readonly>
                            </div>
                            <div class="form-group">
                                <label>E-mail : </label>
                                <input type="email" name="email" class="form-control" placeholder="Enter Owner's E-mail" value="@foreach($data as $fd) @if($fd->key == 'email') {{ $fd->value }} @endif @endforeach" readonly>
                            </div>
                            <div class="form-group">
                                <label>Subject : </label>
                                <input type="text" name="subject" class="form-control" placeholder="Subject">
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" rows="8" name="email_body" placeholder="E-mail Body"></textarea>
                            </div>
                            <input type="hidden" name="req_id" value="@foreach($data as $d) @if($d->key == 'status') {{ $d->sn_no }} @endif @endforeach">
                        </fieldset>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="submit" form="mail-lead" class="btn btn-info btn-offer">Send</button>
                    <button type="button" class="btn btn-info btn-offer" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>