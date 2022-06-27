<!-- New Modal -->
<div class="modal fade" id="newModal" tabindex="-1" aria-labelledby="newModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newModalLabel">Add New Device</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="/gitInventory/device/index.php" method="post">
      <div class="modal-body">
      <div class="mb-3">
        <label for="id" class="form-label">Device Id</label>
        <input type="text" class="form-control" id="id" name="id" aria-describedby="device id">
      </div>
      <div class="mb-3">
        <label for="type" class="form-label">Device Type</label>
        <input type="text" class="form-control" id="type" name="type" aria-describedby="device type">
      </div>
      <div class="mb-3">
        <label for="brand" class="form-label">Brand Name</label>
        <input type="text" class="form-control" id="brand" name="brand" aria-describedby="device brand">
      </div>
      <div class="mb-3">
        <label for="os" class="form-label">OS Type</label>
        <input type="text" class="form-control" id="os" name="os" aria-describedby="device os type">
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Add Device</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">Edit Device Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="/gitInventory/device/index.php" method="POST">
      <div class="modal-body">
          <input type="hidden" name="idEdit" id="idEdit">
          <div class="mb-3">
            <label for="typeEdit" class="form-label">Device Type</label>
            <input type="text" class="form-control" id="typeEdit" name="typeEdit" aria-describedby="type of device">
          </div>
          <div class="mb-3">
            <label for="brandEdit" class="form-label">Brand Name</label>
            <input type="text" class="form-control" id="brandEdit" name="brandEdit" aria-describedby="brand of device">
          </div>
          <div class="mb-3">
            <label for="osEdit" class="form-label">OS Type</label>
            <input type="text" class="form-control" id="osEdit" name="osEdit" aria-describedby="os of device">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </form>
    </div>
  </div>
</div>

  <!-- Delete Modal -->
  <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteModalLabel">Are you sure that you want to delete this Employee?</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="/gitInventory/device/index.php" method="POST">
      <div class="modal-body">
          <input type="hidden" name="idDelete" id="idDelete">
          <p>Remember you won't be able to recover it!</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-bs-dismiss="modal">GO BACK</button>
        <button type="submit" class="btn btn-danger">DELETE</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!--Assign Modal-->
<div class="modal fade" id="assignModal" tabindex="-1" aria-labelledby="assignModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="assignModalLabel">Please Enter ID of Employee to assign this device?</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="/gitInventory/device/index.php" method="POST">
      <div class="modal-body">
        <input type="hidden" name="idAssign" id="idAssign">
        <div class="mb-3">
            <label for="empId" class="form-label">Enter Employee Id</label>
            <input type="text" class="form-control" id="empId" name="empId" aria-describedby="id of Employee">
        </div>  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Not Sure</button>
        <button type="submit" class="btn btn-success">Assign</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!--Retrieve Modal-->
<div class="modal fade" id="retrieveModal" tabindex="-1" aria-labelledby="retrieveModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="retrieveModalLabel">Are you sure about retrieving this device?</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="/gitInventory/device/index.php" method="POST">
      <div class="modal-body">
        <input type="hidden" name="idRetrieve" id="idRetrieve">
        <p>Please check the condition of the retrieved device!</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Not Sure</button>
        <button type="submit" class="btn btn-success">Retrieve</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!--Check Modal-->
<div class="modal fade" id="checkModal" tabindex="-1" aria-labelledby="checkModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="checkModalLabel">Enter Employee ID of employee</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="/gitInventory/device/index.php" method="POST">
      <div class="modal-body">
      <div class="mb-3">
        <label for="empID" class="form-label">Employee Id</label>
        <input type="text" class="form-control" id="empID" name="empID" aria-describedby="Employee id">
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">GO BACK</button>
        <button type="submit" class="btn btn-success">CHECK</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!--Log Modal-->
<div class="modal fade" id="logModal" tabindex="-1" aria-labelledby="logModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="logModalLabel">Enter Device ID to Check History:</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="/gitInventory/device/logs.php" method="POST">
      <div class="modal-body">
      <div class="mb-3">
        <label for="devID" class="form-label">Device Id</label>
        <input type="text" class="form-control" id="devID" name="devID" aria-describedby="Device id">
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">GO BACK</button>
        <button type="submit" class="btn btn-success">CHECK</button>
      </div>
      </form>
    </div>
  </div>
</div>