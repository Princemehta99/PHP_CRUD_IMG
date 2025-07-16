<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Image CRUD</title>
  <link rel="stylesheet" href="style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<center>
  <div class="main mt-5">
    <form action="insert.php" method="post" enctype="multipart/form-data">
      <div class="mb-3">
        <label>Name:</label>
        <input type="text" name="name" class="form-control" required>
      </div>
      <div class="mb-3">
        <label>Price:</label>
        <input type="text" name="price" class="form-control" required>
      </div>
      <div class="mb-3">
        <label>Image:</label>
        <input type="file" name="image" class="form-control" accept="image/*" required>
      </div>
      <button type="submit" name="upload" class="btn btn-primary">Upload</button>
    </form>
  </div>
</center>

<div class="container mt-5">
  <table class="table table-bordered text-center">
    <thead class="table-dark">
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Price</th>
        <th>Image</th>
        <th>Delete</th>
        <th>Update</th>
      </tr>
    </thead>
    <tbody>
      <?php 
      include 'config.php';
      $pic = mysqli_query($con, "SELECT * FROM `content`");

      while ($row = mysqli_fetch_assoc($pic)) {
        echo "
        <tr>
          <td>{$row['id']}</td>
          <td>{$row['name']}</td>
          <td>{$row['price']}</td>
          <td><img src='{$row['image']}' width='100' height='100'></td>
          <td><a href='delete.php?id={$row['id']}' class='btn btn-danger'>Delete</a></td>
          <td><a href='update.php?id={$row['id']}' class='btn btn-warning'>Update</a></td>
        </tr>
        ";
      }
      ?>
    </tbody>
  </table>
</div>

</body>
</html>
