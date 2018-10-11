<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
                <button type="button" class="btn btn-primary">Yes</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
            </div>
        </div>
    </div>
</div>

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

@if(isset($modals))
    @include($modals)
@endif

<script src="{{ asset('public/assets/js/jquery-1.11.1.min.js') }}"></script>
<script src="{{ asset('public/assets/js/bootstrap.min.js') }}"></script>
<script language="JavaScript" src="https://code.jquery.com/jquery-1.12.4.js" type="text/javascript"></script>
<script language="JavaScript" src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script language="JavaScript" src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js" type="text/javascript"></script>
<script language="JavaScript" src="https://cdn.datatables.net/responsive/2.1.1/js/dataTables.responsive.min.js" type="text/javascript"></script>
<script language="JavaScript" src="https://cdn.datatables.net/responsive/2.1.1/js/responsive.bootstrap.min.js" type="text/javascript"></script>
<script src="{{ asset('public/assets/js/chart.min.js') }}"></script>
<script src="{{ asset('public/assets/js/chart-data.js') }}"></script>
<script src="{{ asset('public/assets/js/easypiechart.js') }}"></script>
<script src="{{ asset('public/assets/js/easypiechart-data.js') }}"></script>
<script src="{{ asset('public/assets/js/bootstrap-select.js') }}"></script>
<script src="{{ asset('public/assets/js/bootstrap-datepicker.js') }}"></script>
<script src="{{ asset('public/assets/js/custom.js') }}"></script>

<script>
    $(document).ready(function(){
        $(".link-go").click(function(e) {
            e.preventDefault();
            window.location = $(this).attr("data-href");
        });
    });
</script>

@if(isset($js))
    @include($js)
    @endif

</body>
</html>