<script>
    $(document).ready(function(){
        $('#change-boat').on('change', function(e){
            e.preventDefault();
            $('#send-mail').attr('data-target', '#myModalps'+$(this).find(":selected").val());
        });
    });
</script>