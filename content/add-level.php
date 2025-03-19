<?php 
  if (isset($_POST["save"])) {
    $level_name = $_POST['level_name'];

    $insert = mysqli_query($koneksi,"INSERT INTO levels (level_name) VALUES ('$level_name')");
    if ($insert){
      header("location:?page=level&add=success");
    }
  }

  $id = isset($_GET['edit']) ? $_GET['edit'] : '';
  $queryEdit = mysqli_query($koneksi, "SELECT * FROM levels WHERE id = '$id'");
  $rowEdit = mysqli_fetch_assoc($queryEdit);

  
  if (isset($_POST['edit'])) {
    $id = $_GET['edit'];
    $level_name = $_POST['level_name'];
  
    $update = mysqli_query($koneksi, "UPDATE levels SET level_name='$level_name' WHERE id = '$id'");
    if ($update){
      header("Location:?page=level&update=success");
    }
  }

?>

<div class="row">
  <div class="col-sm-12">
    <div class="card">
      <div class="card-body">
        <h3><?php echo isset($_GET['edit']) ? 'Edit' : 'Create New' .' '?>Level</h3>
      </div>
      <div class="card-body">
        <form action="" method="post">
          <div class="row mb-3">
            <div class="col-sm-2">
              <label for="">Level Name</label>             
            </div>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="level_name" placeholder="Enter Level Name" value="<?php echo isset($_GET['edit']) ? $rowEdit['level_name'] : '' ?>" required>
            </div>
          </div>

          <div class="col mb-3">
            <button class="btn btn-primary" type="submit" name="<?php echo isset($_GET['edit']) ? 'edit' : 'save' ?>">Save</button>
          </div>
        </form>
        

      </div>
    </div>
  </div>
</div>