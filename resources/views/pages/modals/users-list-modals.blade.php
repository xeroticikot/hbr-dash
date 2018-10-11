<?php $i = 0; ?>
@foreach($users as $user)
    <?php $i++; ?>
    <!-- Modal -->
    <div class="modal fade" id="myModalps{{ $i }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Edit User</h4>
                </div>
                <div class="modal-body">
                    <form id="edit{{ $i }}" method="post" action="{{ url('/users-list') }}" role="form">
                        {{ csrf_field() }}
                        <fieldset>
                            <div class="form-group">
                                <input class="form-control" placeholder="Edit User Name" name="name" type="text" autofocus="" value="{{ $user->name }}">
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="New Password" name="password" type="password" value="">
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Re-type New Password" name="repass" type="password" value="">
                            </div>
                        </fieldset>
                        <input type="hidden" name="user_id" value="{{ $user->id }}">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModalpr{{ $i }}">Save</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="myModalpr{{ $i }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Confirmation</h4>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to Proceed ?</p>
                </div>
                <div class="modal-footer">
                    <button type="submit" form="edit{{ $i }}" class="btn btn-primary">Yes</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="myModalD{{ $i }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
                    <form method="post" action="{{ url('/users/delete/'.$user->id) }}">
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-primary">Yes</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach

        <!-- Modal -->
    <div class="modal fade" id="myModalLogout" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Log Out</h4>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to logout ?</p>
                </div>
                <div class="modal-footer">
                    <form method="post" action="{{ url('/logout') }}" id="logout">{{ csrf_field() }}</form>
                    <button type="submit" form="logout" class="btn btn-primary">Yes</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                </div>
            </div>
        </div>
    </div>