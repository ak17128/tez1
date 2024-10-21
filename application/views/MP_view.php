 <?php $this->load->view('include/header'); ?>
<?php $this->load->view('include/footer'); ?>
<!-- <!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>hello</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="http://localhost/pro/assets/css/style.css">
</head>
<body>
    <div class="nav-section">
        <nav>
            <ul class="mt-2">
                <li><a href="#" data-page="home" class="tab active">Home</a></li>
                <li><a href="#" data-page="contact" class="tab">Contact</a></li>
                <li><a href="#" data-page="about" class="tab">About</a></li>
                <li><a href="#" data-page="settings" class="tab">Settings</a></li>
                <li><a href="#" data-page="settngsClone" class="tab">settngsClone</a></li>
            </ul>
        </nav>
    </div>
    <div class="page-show" id="pages">
        <?php if ($this->session->flashdata('message')): ?>
            <div class="alert alert-info">
                <?php echo $this->session->flashdata('message'); ?>
            </div>
        <?php endif; ?>
    </div>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <script type="text/javascript">
        $(document).ready(function(){
            let page = 'home';
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
    </html> -->
