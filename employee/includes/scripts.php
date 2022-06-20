<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script>
      $(document).ready( function () {
        $('#myTable').DataTable();
      } );
    </script>
    <script>
    adds = document.getElementsByClassName('add');
    Array.from(adds).forEach((element)=>{
      element.addEventListener("click", (e)=>{
        console.log("add ");
        $('#newModal').modal('toggle');
      })
    })

    edits = document.getElementsByClassName('edit');
    Array.from(edits).forEach((element)=>{
      element.addEventListener("click", (e)=>{
        console.log("edit ");
        tr = e.target.parentNode.parentNode;
        name = tr.getElementsByTagName("td")[0].innerText;
        role = tr.getElementsByTagName("td")[1].innerText;
        mail = tr.getElementsByTagName("td")[2].innerText;
        mobile = tr.getElementsByTagName("td")[3].innerText;
        console.log(name, role, mail, mobile);
        nameEdit.value = name;
        roleEdit.value = role;
        mailEdit.value = mail;
        mobileEdit.value = mobile;
        panEdit.value = e.target.id;
        console.log(e.target.id);
        $('#editModal').modal('toggle');
      })
    })

    deletes = document.getElementsByClassName('delete');
    Array.from(deletes).forEach((element)=>{
      element.addEventListener("click", (e)=>{
        console.log("delete ");
        panDelete.value = e.target.id.substr(1);
        console.log(panDelete.value);
        $('#deleteModal').modal('toggle');
      })
    })
  </script>