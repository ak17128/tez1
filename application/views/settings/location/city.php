<style media="screen">
form input {
  display: block !important;
}
</style>
<div class="container">
    <div class="d-flex justify-content-between adcc">
        <p>City</p>
        <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#addDistrictModal">
            Add City
        </button>
    </div>
    <div>
        <table id="datatab" class="display arbind" style="width:100% !important;">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Name</th>
                    <th>Name</th>
                    <th>Name</th>
                    <th>Name</th>
                    <th>Name</th>
                </tr>
            </thead>
            <tbody id="districtData">
            </tbody>
        </table>
    </div>

    <div class="modal fade" id="addDistrictModal" tabindex="-1" role="dialog" aria-labelledby="addDistrictModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addDistrictModalLabel">Add New City</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                  <form method="POST" class="mb-3" id='addCity'>
                    <div class="errorThrown">
                      <div class="row">
                      <div class="mb-3 col-md-4">
                          <label for="country_id_for_city" class="form-label">Select Country:</label>
                          <select name="country_id" id="country_id_for_city" class="form-select">
                            <option disabled selected>Country</option>
                              <?php foreach ($countries as $country) { ?>
                                  <option value="<?php echo $country['id']; ?>"><?php echo $country['name']; ?></option>
                              <?php } ?>
                          </select>
                      </div>
                      <div class="mb-3 col-md-4">
                          <label for="district" class="form-label">Districts:</label>
                          <div class="dist">
                              <select id="district" name="district" class="form-select">
                                  <option disabled selected>Select District</option>
                              </select>
                          </div>
                      </div>
                      <div class="mb-3 col-md-4">
                          <label for="city_name" class="form-label">City:</label>
                          <input type="text" name="city_name" id="city_name" class="form-control" placeholder="city name" required>
                      </div>
                        </div>
                          </div>
                      <button type="submit" class="btn btn-primary">Add City</button>
                  </form>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="saveDistrict">Save District</button>
                </div>
            </div>
        </div>
    </div>
</div>
