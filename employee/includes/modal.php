<!-- New Modal -->
<div class="modal fade" id="newModal" tabindex="-1" aria-labelledby="newModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newModalLabel">Add New Employee</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="/inventory/employee/index.php" method="post">
      <div class="modal-body">
      <div class="mb-3">
        <label for="pan" class="form-label">PanCard No</label>
        <input type="text" class="form-control" id="pan" name="pan" aria-describedby="pancard number">
      </div>
      <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" id="name" name="name" aria-describedby="name of employee">
      </div>
      <div class="mb-3">
        <label for="role" class="form-label">Role</label>
        <input type="text" class="form-control" id="role" name="role" aria-describedby="role of employee">
      </div>
      <div class="mb-3">
        <label for="mail" class="form-label">Email Id</label>
        <input type="email" class="form-control" id="mail" name="mail" aria-describedby="mail of employee">
      </div>
      <div class="mb-3">
        <label for="mobile" class="form-label">Mobile No</label>
        <input type="number" class="form-control" id="mobile" name="mobile" aria-describedby="mobile of employee">
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Add Employee</button>
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
        <h5 class="modal-title" id="editModalLabel">Edit Employee Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="/inventory/employee/index.php" method="POST">
      <div class="modal-body">
          <input type="hidden" name="panEdit" id="panEdit">
          <div class="mb-3">
            <label for="nameEdit" class="form-label">Name</label>
            <input type="text" class="form-control" id="nameEdit" name="nameEdit" aria-describedby="name of employee">
          </div>
          <div class="mb-3">
            <label for="roleEdit" class="form-label">Role</label>
            <input type="text" class="form-control" id="roleEdit" name="roleEdit" aria-describedby="role of employee">
          </div>
          <div class="mb-3">
            <label for="mailEdit" class="form-label">Email Id</label>
            <input type="email" class="form-control" id="mailEdit" name="mailEdit" aria-describedby="mail of employee">
          </div>
          <div class="mb-3">
            <label for="mobileEdit" class="form-label">Mobile No</label>
            <input type="number" class="form-control" id="mobileEdit" name="mobileEdit" aria-describedby="mobile of employee">
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
      <form action="/inventory/employee/index.php" method="POST">
      <div class="modal-body">
          <input type="hidden" name="panDelete" id="panDelete">
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