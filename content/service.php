<?php 
  // $query = mysqli_query($koneksi,"SELECT * FROM services ORDER BY id DESC");
  $query = mysqli_query($koneksi, "SELECT * FROM levels ORDER BY id DESC");
  $rows = mysqli_fetch_all($query, MYSQLI_ASSOC);

  if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
  
    $delete = mysqli_query($koneksi, "DELETE FROM services WHERE id = '$id'");
    if ($delete) {
      header("Location:?page=service&notif=berhasil");
    }
  }
?>

<div class="row">
  <div class="col-sm-12">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Data Service</h5>
      </div>
      <div class="card-body">
        <div align="right" class="mb-3 mt-3">
          <a href="?page=add-service" class="btn btn-primary">Create New Service</a>
        </div>
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>No</th>
              <th>Name</th>
              <th>Price</th>
              <th>Description</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <?php 
            $no=1; 
            foreach($rows as $row):?>
              <tr>
                <td><?= $no++ ?></td>
                <td><?php echo $row['service_name'] ?></td>
                <td><?php echo $row['service_price'] ?></td>
                <td><?php echo $row['service_description'] ?></td>
                <td><a href="?page=add-service&edit=<?php echo $row['id']?>" class="btn btn-primary btn-sm" >Edit</a>
                <a href="?page=service&delete=<?php echo $row['id']?>" onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm">Delete</a>
                </td>
              </tr>
            <?php endforeach?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>