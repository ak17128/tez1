<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<script type="text/javascript">
    $(document).ready(function(){
        $('.tab').on('click', function(){
            let page = $(this).data('page');
            $.ajax({
                url: '<?php echo base_url('mV_controller/'); ?>' + page,
                type: "POST",
                success: function(res){
                    $('#pages').html(res);
                },
                error: function() {
                    $('#pages').html('<div class="alert alert-danger">Error loading page.</div>');
                }
            });
            $('.tab').removeClass('active');
            $(this).addClass('active');
        });
    });
</script>
</body>
</html>
