<div class="">
    <div class="d-flex justify-content-between adcc">
        <p>Country</p>
        <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#addDistrictModal">
            Add Country
        </button>
    </div>
    <div>
        <table id="datatab" class="display arbind" style="width:100% !important;">
            <thead>
                <tr>
                    <th>Country Name</th>
                    <th class="text-end">Action</th>
                </tr>
            </thead>
            <tbody id="countryData">
                <?php foreach($countries as $row): ?>
                    <tr>
                        <td><?php echo $row['name']; ?></td>
                        <td class="text-end">
                            <button class="edit-btn btn-primary" data-id="<?php echo $row['id']; ?>">Edit</button>
                            <button class="delete-btn btn-danger" data-id="<?php echo $row['id']; ?>">Delete</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="modal fade" id="addDistrictModal" tabindex="-1" role="dialog" aria-labelledby="addDistrictModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addDistrictModalLabel">Add New Country</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="addCountryForm" method="POST" class="mb-3">
                        <div class="mb-3">
                            <label for="country_name" class="form-label">Country:</label>
                            <input type="text" name="name" id="country_name" class="form-control" placeholder="Country name" required>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="saveCountryBtn">Save Country</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    // $(document).ready(function() {
    //     $('#datatab').DataTable({
    //         "processing": true,
    //         "serverSide": true,
    //         "ajax": {
    //             "url": "<?php echo base_url('mV_controller/get_countries'); ?>",
    //             "type": "POST",
    //             "dataSrc": function (json) {
    //                 if (json.status === 'error') {
    //                     alert(json.message);
    //                     return [];
    //                 }
    //                 return json.data;
    //             }
    //         },
    //         "columns": [
    //             { "data": "name" },
    //             {
    //                 "data": null,
    //                 "className": "text-end",
    //                 "render": function (data, type, row) {
    //                     return '<button class="edit-btn btn-primary" data-id="' + row.id + '">Edit</button>' +
    //                            '<button class="delete-btn btn-danger" data-id="' + row.id + '">Delete</button>';
    //                 }
    //             }
    //         ]
    //     });
    // });
    $('#saveCountryBtn').on('click', function() {
        $('#addCountryForm').submit();
    });
    $('#addCountryForm').on('submit', function(e) {
        e.preventDefault();
        var country = $('#country_name').val();

        if (country === '') {
            alert('Please enter a country name.');
            return;
        }
        $('#saveCountryBtn').prop('disabled', true);
        $.ajax({
            url: '<?php echo base_url('mV_controller/addCountry'); ?>',
            type: 'POST',
            data: { country_name: country },
            dataType: 'json',
            success: function(res) {
                alert(res.message);
                $('#addCountryForm')[0].reset();
                $('#saveCountryBtn').prop('disabled', false);
                $('#addDistrictModal').modal('hide');
                $('#datatab').DataTable().ajax.reload(null, false); // Reload DataTable after country is added
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.error('Error:', textStatus, errorThrown);
                $('#saveCountryBtn').prop('disabled', false);
            }
        });
    });
    $('#datatab').on('click', '.delete-btn', function(){
        let id = $(this).data('id');

        if (confirm('Are you sure you want to delete this record?')) {
            $.ajax({
                url: '<?php echo base_url('SettingsController/delcon'); ?>',
                type: 'POST',
                data: { id: id },
                beforeSend: function() {
                    $('#loader').show();
                },
                success: function(response) {
                    $('#loader').hide();
                    let res = JSON.parse(response);
                    if (res.status === 'success') {
                        alert(res.message);
                        $('#datatab').DataTable().ajax.reload(null, false); // Reload DataTable after deletion
                    } else {
                        alert(res.message);
                    }
                },
                error: function(xhr, status, error) {
                    $('#loader').hide();
                    alert('An error occurred: ' + error);
                }
            });
        } else {
            return false;
        }
    });
</script>
