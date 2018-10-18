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
            window.location = $(".link-gos").attr("data-href");
        });
    });
</script>

<script src="https://js.pusher.com/3.1/pusher.min.js"></script>
<script type="text/javascript">
    var user_id = '{{ Auth::id() }}';
    var notificationsWrapper   = $('.dropdown');
    var notificationsToggle    = $('.dropdown-toggle');
    var notificationsCountElem = notificationsToggle.find('span.badge');
    var notificationsCount     = parseInt(notificationsCountElem.text());
    var notifications          = notificationsWrapper.find('ul.dropdown-cart');

//    if (notificationsCount <= 0) {
//        notificationsWrapper.hide();
//    }

    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('52b35e01759e2e568c28', {
        encrypted: true,
        cluster: 'mt1'
    });

    // Subscribe to the channel we specified in our Laravel Event
    var channel = pusher.subscribe('notify-all');

    // Bind a function to a Event (the full Laravel class)
    channel.bind('App\\Events\\NotifyAll', function(data) {
        var existingNotifications = notifications.html();
        var newNotificationHtml = '<li>'+
                '<p class="alert alert-info alert-dismissible msg">'+
        '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'+data.msg+
        '</p>'+
        '</li>';

        notifications.html(newNotificationHtml + existingNotifications);

        notificationsCount += 1;
        notificationsCountElem.text(notificationsCount);
        //notificationsWrapper.show();
    });

    function readNot(event, id){
        if(event.which == 1 || event.which == 2 || event.which == 3){
            $.ajax({
                url: '{{ url('/read-notification') }}',
                type: 'POST',
                data: {'id':id},
                dataType: 'json',
                success: function(data){
                    if(data.stat == 'true'){
                        $('#notify-'+id).removeAttr('class');
                        notificationsCount -= 1;
                        notificationsCountElem.text(notificationsCount);
                    }
                }
            });
        }
    }
</script>

@if(isset($js))
    @include($js)
    @endif

</body>
</html>