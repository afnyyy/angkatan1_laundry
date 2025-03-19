<?php 
  if (isset($_POST["save"])) {
    $service_name = $_POST['service_name'];
    $service_price = $_POST['service_price'];
    $service_description = $_POST['service_description'];

    $insert = mysqli_query($koneksi,"INSERT INTO services (service_name, service_price, service_description) VALUES ('$service_name', '$service_price', '$service_description')");
    if ($insert){
      header("location:?page=service&add=success");
    }
  }

  $id = isset($_GET['edit']) ? $_GET['edit'] : '';
  $queryEdit = mysqli_query($koneksi, "SELECT * FROM services WHERE id = '$id'");
  $rowEdit = mysqli_fetch_assoc($queryEdit);

  
  if (isset($_POST['edit'])) {
    $id = $_GET['edit'];
    $service_name = $_POST['service_name'];
    $service_price = $_POST['service_price'];
    $service_description = $_POST['service_description'];
  
    $update = mysqli_query($koneksi, "UPDATE services SET service_name='$service_name', service_price='$service_price', service_description='$service_price' WHERE id = '$id'");
    if ($update){
      header("Location:?page=service&update=success");
    }
  }

?>

<div class="row">
  <div class="col-sm-12">
    <div class="card">
      <div class="card-body">
        <h3><?php echo isset($_GET['edit']) ? 'Edit' : 'Create New' .' '?>Service</h3>
      </div>
      <div class="card-body">
        <form action="" method="post">
          <div class="row mb-3">
            <div class="col-sm-2">
              <label for="">Service Name</label>             
            </div>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="service_name" placeholder="Enter Service Name" value="<?php echo isset($_GET['edit']) ? $rowEdit['service_name'] : '' ?>" required>
            </div>
          </div>

          <div class="row mb-3">
            <div class="col-sm-2">
              <label for="">Service Price<span class="text-danger">*</span></label>            
            </div>
            <div class="col-sm-10">
              <input value="<?php echo isset($_GET['edit']) ? $rowEdit['service_price'] : '' ?>" type="number" class="form-control" name="service_price" placeholder="Enter Service price" required>            
            </div>
          </div>

          <div class="row mb-3">
            <div class="col-sm-2">          
              <label for="">Service Description</label>
            </div>
            <div class="col-sm-10">            
              <input value="<?php echo isset($_GET['edit']) ? $rowEdit['service_description'] : '' ?>" type="text" class="form-control" name="service_description" placeholder="Enter Service Description">            
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