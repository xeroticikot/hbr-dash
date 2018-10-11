@foreach($data as $boat)

    <!-- Modal -->

    <div class="modal fade" id="myModalps{{ $boat->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

        <div class="modal-dialog" role="document">

            <div class="modal-content">

                <div class="modal-header">

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                    <h4 class="modal-title" id="myModalLabel">Edit Boat</h4>

                </div>

                <div class="modal-body">

                    <form id="edit-boat-{{ $boat->id }}" method="post" action="{{ url('/edit-boat') }}" role="form">

                        {{ csrf_field() }}

                        <fieldset>

                            <div class="form-group">

                                <label>Boat Name : </label>

                                <input type="text" name="name" class="form-control" placeholder="Enter Boat Name" autofocus="" value="{{ $boat->name }}">

                            </div>

                            <div class="form-group">

                                <label>Owner's Name : </label>

                                <input type="text" name="owner" class="form-control" placeholder="Enter Boat Owner" value="{{ $boat->owner }}">

                            </div>

                            <div class="form-group">

                                <label>E-mail : </label>

                                <input type="email" name="email" class="form-control" placeholder="Enter Owner's E-mail" value="{{ $boat->email }}">

                            </div>

                            <div class="form-group">

                                <label>Phone # : </label>

                                <input type="text" name="phone" class="form-control" placeholder="Enter Owner's Phone #" value="{{ $boat->phone }}">

                            </div>

 				<div class="form-group">

                                <label>Boat Representative : </label>

                                <input type="text" name="boat_rep" class="form-control" placeholder="Boat Representative:" value="{{ $boat->boat_rep }}">

                            </div>

 				<div class="form-group">

                                <label>Boat Representative Email :</label>

                                <input type="text" name="boat_rep_email" class="form-control" placeholder="Boat Representative Email:" value="{{ $boat->boat_rep_email }}">

                            </div>

 				<div class="form-group">

                                <label>Boat Representative Phone # : </label>

                                <input type="text" name="boat_rep_phone" class="form-control" placeholder="Boat Representative Phone #" value="{{ $boat->boat_rep_phone }}">

                            </div>

                            <div class="form-group">

                                <label>Notes : </label>

                                <input type="text" name="notes" class="form-control" placeholder="Enter Additional Notes (Optional)" value="{{ $boat->notes }}">

                            </div>

                            <div class="form-group">

                                <label>Commission : </label>

                                <input type="text" name="commission" class="form-control" placeholder="Enter Commission (Optional)" value="{{ $boat->commission }}">

                            </div>

                        </fieldset>

                        <input type="hidden" name="boat_id" value="{{ $boat->id }}">

                    </form>

                </div>

                <div class="modal-footer">

                    <button type="submit" class="btn btn-primary" form="edit-boat-{{ $boat->id }}">Save</button>

                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>

                </div>

            </div>

        </div>

    </div>



    <!-- Modal -->

    <div class="modal fade" id="myModalD{{ $boat->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

        <div class="modal-dialog" role="document">

            <div class="modal-content">

                <div class="modal-header">

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                    <h4 class="modal-title" id="myModalLabel">Confirmation</h4>

                </div>

                <div class="modal-body">

                    <p>Are you sure you want to <strong>delete</strong> ?</p>

                </div>

                <div class="modal-footer">

                    <form method="post" action="{{ url('/delete-boat') }}">

                        {{ csrf_field() }}

                        <input type="hidden" name="boat_id" value="{{ $boat->id }}">

                        <button type="submit" class="btn btn-primary">Yes</button>

                        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>

                    </form>

                </div>

            </div>

        </div>

    </div>

@endforeach