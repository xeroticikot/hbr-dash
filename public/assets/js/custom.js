$('#calendar').datepicker({
});
$('#calendar2').datepicker({
});


!function ($) {
    $(document).on("click","ul.nav li.parent > a ", function(){          
        $(this).find('em').toggleClass("fa-minus");      
    }); 
    $(".sidebar span.icon").find('em:first').addClass("fa-plus");
}

(window.jQuery);
	$(window).on('resize', function () {
  if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
})
$(window).on('resize', function () {
  if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
})

$(document).on('click', '.panel-heading span.clickable', function(e){
    var $this = $(this);
	if(!$this.hasClass('panel-collapsed')) {
		$this.parents('.panel').find('.panel-body').slideUp();
		$this.addClass('panel-collapsed');
		$this.find('em').removeClass('fa-toggle-up').addClass('fa-toggle-down');
	} else {
		$this.parents('.panel').find('.panel-body').slideDown();
		$this.removeClass('panel-collapsed');
		$this.find('em').removeClass('fa-toggle-down').addClass('fa-toggle-up');
	}
})

$(".notification-badge").on('click',function() {
        $(".get-notification-popupbar").toggleClass("add-popupbar");
    });

$(function() {
	/*--=================
    bootstrap select
    =================--*/
    $('.get-select-picker').selectpicker({});

    // mobile menu toggle
    $(".navbar-toggle").click(function() {
    return $(".navi-trigger").toggleClass("cross");
  });
  $('.data-table').DataTable({
        responsive: true,
        "processing": true,
        "info": true,
        "stateSave": true,
        "searching": true,
        "lengthChange": false,
        "pageLength": 100,
        "ordering":true,
        "language": {
            "paginate": {
                "previous": "<i class='fa fa-arrow-left'></i>",
                "next": "<i class='fa fa-arrow-right'></i>"
            }
        }
    });
});
