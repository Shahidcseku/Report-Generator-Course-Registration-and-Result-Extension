<?php
include($_SERVER['DOCUMENT_ROOT'].'/se/templates/dashboardsidebar.php');

if(isset($_SESSION['message']))
{
  $msg = "<div class='alert alert-success'>";
  $msg .= ($_SESSION['message']);
  $msg .= "</div>";
  echo $msg;
  unset($_SESSION['message']);
}
?>

<div id="table">
    <table class="table">
        <thead>
            <tr id="role_list">
                <th colspan="2"><h3 class="text-center">Role Information</h3></th>
            </tr>
              <tr id="role_list">
                <th >Role Name</th>
                <th  class="text-right" class="text-right"> Edit</th>
                <th  class="text-right"> Delete</th>
            </tr>
        </thead>
        <tbody>
           <?php
           require_once("bll/bll.role.php");
           $content = $bllRole->show();
           echo $content;
           ?>
        </tbody>
        <tfoot>
            <!--tr>
                <td></td>
                <td>Total</td>
                <td>33</td>
            </tr-->
        </tfoot>
    </table>
</div>

<!-- Add new Modal-->
 <link rel="stylesheet" href="/se/resources/css/modal.css">

 <button id="myBtn" class="btn btn-primary">Crate New Role</button>

<!-- Modal for insertion -->
 <!-- The Modal -->
 <div id="myModal" class="modal">
   <!-- Modal content -->
   <div class="modal-content">
     <div class="modal-header">
       <span class="close">&times;</span>
       <h2>Add New Role</h2>    </div>

     <div class="modal-body">
      <form action="bll/bll.role.php" method="POST" onsubmit="reload_page();">
      
         <span class="badge badge-success">Role Name</span>
         <input id="roleName" type="text" class="form-control" name="roleName" placeholder="Name of the Role" required>
        <br>
        
        <input type="submit" name="submit_insert" value="Submit" class="btn btn-primary pull-right">
        <br>
       </form>
       <div >
         <br>
       </div>
      
   </div>

 </div>
 </div>

 <!-- Modal for updating -->
 <!-- The Modal -->
 <div id="modalUpdate" class="modal">
   <!-- Modal content -->
   <div class="modal-content">
     <div class="modal-header">
       <span class="close">&times;</span>
       <h2>Edit Role</h2>    </div>

     <div class="modal-body">
      <form action="bll/bll.role.php" method="POST" onsubmit="reload_page();">
         <input id="id_update" type="text"  name="id" style="display: none";>
          
         <span class="badge badge-success">Role Name</span>
         <input id="roleName_update" type="text" class="form-control" name="roleName" placeholder="Name of the Role" required>

        <br>

        <input type="submit" name="submit_update"  value="Submit" class="btn btn-primary pull-right" >
        <br>
       </form>
       <div >
         <br>
       </div>

 </div>
 </div>
 </div>
<!--Modal end-->

<!--Delete confirmation dialog-->
<div id="dialog" title="delete"></div>


<!--Including the js files-->
<script type="text/javascript" src="/se/resources/js/jquery.js"></script>
<script type="text/javascript" src="/se/resources/js/jquery.min.js"></script>
<script type="text/javascript" src="/se/resources/js/edit_modal.js"></script>
<script type="text/javascript" src="/se/resources/js/jquery-ui.js"></script>
<script type="text/javascript" src="/se/resources/js/jquery-ui.min.js"></script>
<script type="text/javascript" src="/se/resources/js/confirm_delete.js"></script>


<script type="text/javascript">

// Function that call from bll to edit items
function EditRole(id)
{
  modalUpdate.style.display = "block"; // show the modal

  // Data retriving form table to modal
  var $row = $('#row_id'+id+'').closest("tr");

  // Get values into variable
  $roleName = $row.find("td:nth-child(1)"); 

  // Update value into textbox
  $('#id_update').attr('value',id);
  $('#roleName_update').attr('value',$($roleName).text());

}

</script>

<!--Page Endings-->
    </div>
    </div>
    </div>
    </body>
</html>
