<link rel="stylesheet" href="http://localhost/pro/assets/css/generalSetting.css">
<div class="container-fluid">
    <div class="row">
        <div class="col-md-3 sidenab-bgc">
            <div class="side_nav_section">
                <ul class="sidenav">
                    <li><a href="#" data-page="addCountry" class="loc active" id="addCountry">Country</a></li>
                    <li><a href="#" data-page="addDistrict" class="loc" id="addDistrict">District</a></li>
                    <li><a href="#" data-page="addCity" class="loc" id="addCity">City</a></li>
                </ul>
            </div>
        </div>
        <div class="col-md-9">
            <div id="loader" style="display:none;">
                <img src="https://i.gifer.com/ZZ5H.gif" alt="Loading..." />
                <p>Loading...</p>
            </div>
            <div id="location"><?php   $countries = $this->MV_models->get_countries(); $data = array(); $data['countries'] = $countries; $this->load->view('settings/location/country', $data); ?></div>
        </div>
    </div>
</div>
<script type="text/javascript">
$('#datatab').DataTable({
      "paging": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "pageLength": 5,
      "lengthMenu": [5, 10, 25, 50],
      "order": [],
      "language": {
          "lengthMenu": "Show _MENU_ entries per page",
          "zeroRecords": "No records found",
          "info": "Showing page _PAGE_ of _PAGES_",
          "infoEmpty": "No records available",
          "infoFiltered": "(filtered from _MAX_ total records)",
          "search": "Filter results:",
          "paginate": {
              "previous": "Prev",
              "next": "Next"
          }
      },
      "columnDefs": [
          { "orderable": false, "targets": [0, 1] }
      ]
  });
    $(document).on('click', '.loc', function() {
        let page = $(this).data('page');
        $('.loc').removeClass('active');
        $(this).addClass('active');
        $.ajax({
            url: '<?php echo base_url('SettingsController/'); ?>' + page,
            type: 'POST',
            beforeSend: function() {
                $('#loader').show();
                $('#location').empty();
            },
            success: function(res) {
                $('#loader').hide();
                $('#location').html(res);
                $('#datatab').DataTable({
                    "paging": true,
                    "searching": true,
                    "ordering": true,
                    "info": true,
                    "pageLength": 5,
                    "lengthMenu": [5, 10, 25, 50],
                    "order": [],
                    "language": {
                        "lengthMenu": "Show _MENU_ entries per page",
                        "zeroRecords": "No records found",
                        "info": "Showing page _PAGE_ of _PAGES_",
                        "infoEmpty": "No records available",
                        "infoFiltered": "(filtered from _MAX_ total records)",
                        "search": "Filter results:",
                        "paginate": {
                            "previous": "Prev",
                            "next": "Next"
                        }
                    },
                    "columnDefs": [
                        { "orderable": false, "targets": [0, 1] }
                    ]
                });
            },
            error: function(xhr, status, error) {
                $('#loader').hide();
                $('#location').html('<p>An error occurred. Please try again later.</p>');
            }
        });
    });
</script>
