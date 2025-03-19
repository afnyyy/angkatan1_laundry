<?php 
  if (isset($_POST["save"])) {
    $level =  $_POST['id_level'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = sha1($_POST['password']);

    $insert = mysqli_query($koneksi,"INSERT INTO users (id_level, name, email, password) VALUES ('$level', '$name', '$email', '$password')");
    if ($insert){
      header("location:?page=user&add=success");
    }
  }

  $id = isset($_GET['edit']) ? $_GET['edit'] : '';
  $queryEdit = mysqli_query($koneksi, "SELECT * FROM users WHERE id = '$id'");
  $rowEdit = mysqli_fetch_assoc($queryEdit);

  
  if (isset($_POST['edit'])) {
    $id = $_GET['edit'];
    $level =  $_POST['id_level'];
    $name = $_POST['name'];
    $email = $_POST['email'];

    if ($_POST['password']) {
      $password = sha1($_POST['password']);
    } else {
      $password = $rowEdit['password'];
    }
    
  
    $update = mysqli_query($koneksi, "UPDATE users SET id_level='$level', name='$name', email='$email', password='$password' WHERE id = '$id'");
    if ($update){
      header("Location:?page=user&update=success");
    }
  }

  // level 
  $queryLevl = mysqli_query($koneksi, "SELECT * FROM levels ORDER BY id DESC");
  $rowLevls = mysqli_fetch_all($queryLevl, MYSQLI_ASSOC)

?>

<div class="row">
  <div class="col-sm-12">
    <div class="card">
      <div class="card-body">
        <h3><?php echo isset($_GET['edit']) ? 'Edit' : 'Create New' .' '?>User</h3>
      </div>
      <div class="card-body">
        <form action="" method="post">
        <div class="row mb-3">
            <div class="col-sm-2">
              <label for="">Level Name</label>             
            </div>
            <div class="col-sm-10">
            <select id="" class="form-control" name="id_level">
              <option value="" hidden>Choose Level</option>
              <?php foreach ($rowLevls as $item) {?>
                <option <?php echo isset($_GET['edit']) ? ($item['id'] == $rowEdit['id_level']) ? 'selected' : '' : ''?> value="<?php echo $item['id'] ?>"><?php echo $item['level_name'] ?></option>
              <?php }?>
            </select>
            </div>
          </div>

          <div class="row mb-3">
            <div class="col-sm-2">
              <label for="">Name<span class="text-danger">*</span></label>             
            </div>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="name" placeholder="Enter Name" value="<?php echo isset($_GET['edit']) ? $rowEdit['name'] : '' ?>" required>
            </div>
          </div>

          <div class="row mb-3">
            <div class="col-sm-2">
              <label for="">Email<span class="text-danger">*</span></label>            
            </div>
            <div class="col-sm-10">
              <input value="<?php echo isset($_GET['edit']) ? $rowEdit['email'] : '' ?>" type="email" class="form-control" name="email" placeholder="Enter Email" required>            
            </div>
          </div>

          <div class="row mb-3">
            <div class="col-sm-2">          
              <label for="">Password<span class="text-danger">*</span></label>
            </div>
            <div class="col-sm-10">            
              <input value="" type="password" class="form-control" name="password" placeholder="Enter Password">            
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