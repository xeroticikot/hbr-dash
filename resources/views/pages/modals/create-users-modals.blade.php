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