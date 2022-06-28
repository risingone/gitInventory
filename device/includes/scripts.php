<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> -->
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

    checks = document.getElementsByClassName('check');
    Array.from(checks).forEach((element)=>{
      element.addEventListener("click", (e)=>{
        console.log("check ");
        $('#checkModal').modal('toggle');
      })
    })

    logs = document.getElementsByClassName('log');
    Array.from(logs).forEach((element)=>{
      element.addEventListener("click", (e)=>{
        console.log("history ");
        $('#logModal').modal('toggle');
      })
    })

    edits = document.getElementsByClassName('edit');
    Array.from(edits).forEach((element)=>{
      element.addEventListener("click", (e)=>{
        console.log("edit ");
        tr = e.target.parentNode.parentNode;
        id = tr.getElementsByTagName("td")[0].innerText;
        type = tr.getElementsByTagName("td")[1].innerText;
        brand = tr.getElementsByTagName("td")[2].innerText;
        os = tr.getElementsByTagName("td")[3].innerText;
        // console.log(id, type, brand, os);
        typeEdit.value = type;
        brandEdit.value = brand;
        osEdit.value = os;
        idEdit.value = id;
        // console.log(id);
        $('#editModal').modal('toggle');
      })
    })

    deletes = document.getElementsByClassName('delete');
    Array.from(deletes).forEach((element)=>{
      element.addEventListener("click", (e)=>{
        console.log("delete ");
        idDelete.value = e.target.id.substr(1);
        // console.log(idDelete.value);
        $('#deleteModal').modal('toggle');
      })
    })
     
    operations = document.getElementsByClassName('operation');
    Array.from(operations).forEach((element)=>{
      element.addEventListener("click", (e)=>{
        // console.log(e.target.id,e.target.innerText);
        if(e.target.innerText==="Assign"){
          idAssign.value = e.target.id;
          console.log(idAssign.value);
          $('#assignModal').modal('toggle');
        } else{
          idRetrieve.value = e.target.id;
          console.log(idRetrieve.value);
          $('#retrieveModal').modal('toggle');
        }
      })
    })

  </script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="../js/scripts.js"></script>
        <script src="../js/script.js"></script>
       
        </body>
</html>