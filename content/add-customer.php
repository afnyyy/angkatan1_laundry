<?php 
  if (isset($_POST["save"])) {
    $customer_name = $_POST['customer_name'];
    $customer_phone = $_POST['customer_phone'];
    $customer_address = $_POST['customer_address'];

    $insert = mysqli_query($koneksi,"INSERT INTO customers (customer_name, customer_phone, customer_address) VALUES ('$customer_name', '$customer_phone', '$customer_address')");
    if ($insert){
      header("location:?page=customer&add=success");
    }
  }

  $id = isset($_GET['edit']) ? $_GET['edit'] : '';
  $queryEdit = mysqli_query($koneksi, "SELECT * FROM customers WHERE id = '$id'");
  $rowEdit = mysqli_fetch_assoc($queryEdit);

  
  if (isset($_POST['edit'])) {
    $id = $_GET['edit'];
    $customer_name = $_POST['customer_name'];
    $customer_phone = $_POST['customer_phone'];
    $customer_address = $_POST['customer_address'];
  
    $update = mysqli_query($koneksi, "UPDATE customers SET customer_name='$customer_name', customer_phone='$customer_phone', customer_address='$customer_address' WHERE id = '$id'");
    if ($update){
      header("Location:?page=customer&update=success");
    }
  }

?>

<div class="row">
  <div class="col-sm-12">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Create Customer</h5>
      </div>
      <div class="card-body">
        <form action="" method="post">
          <div class="row mb-3">
            <div class="col-sm-2">
              <label for="">Customer Name</label>             
            </div>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="customer_name" placeholder="Enter Customer Name" value="<?php echo isset($_GET['edit']) ? $rowEdit['customer_name'] : '' ?>" required>
            </div>
          </div>

          <div class="row mb-3">
            <div class="col-sm-2">
              <label for="">Customer Phone <span class="text-danger">*</span></label>            
            </div>
            <div class="col-sm-10">
              <input value="<?php echo isset($_GET['edit']) ? $rowEdit['customer_phone'] : '' ?>" type="text" class="form-control" name="customer_phone" placeholder="Enter Customer Phone" required>            
            </div>
          </div>

          <div class="row mb-3">
            <div class="col-sm-2">          
              <label for="">Customer Address</label>
            </div>
            <div class="col-sm-10">            
              <input value="<?php echo isset($_GET['edit']) ? $rowEdit['customer_address'] : '' ?>" type="text" class="form-control" name="customer_address" placeholder="Enter Customer Address">            
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