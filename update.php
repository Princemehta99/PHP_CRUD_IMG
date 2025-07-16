<?php
include 'config.php';

// Step 1: Check if ID exists in URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Step 2: Fetch record from database
    $result = mysqli_query($con, "SELECT * FROM content WHERE id = '$id'");

    if ($row = mysqli_fetch_assoc($result)) {
        // Record found
        $name = $row['name'];
        $price = $row['price'];
        $image = $row['image'];
    } else {
        echo "<script>alert('Record not found.'); window.location.href='index.php';</script>";
        exit;
    }
} else {
    echo "<script>alert('Invalid request: ID not provided in URL.'); window.location.href='index.php';</script>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Update Item</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
  <h2 class="text-center mb-4">Update Item</h2>
  <form action="update_process.php" method="POST" enctype="multipart/form-data" class="mx-auto" style="max-width: 500px;">
    <input type="hidden" name="id" value="<?php echo $id; ?>">

    <div class="mb-3">
      <label for="name" class="form-label">Name:</label>
      <input type="text" name="name" id="name" class="form-control" value="<?php echo $name; ?>" required>
    </div>

    <div class="mb-3">
      <label for="price" class="form-label">Price:</label>
      <input type="text" name="price" id="price" class="form-control" value="<?php echo $price; ?>" required>
    </div>

    <div class="mb-3">
      <label class="form-label">Current Image:</label><br>
      <img src="<?php echo $image; ?>" width="100" class="mb-2"><br>
      <input type="file" name="image" class="form-control">
    </div>

    <button type="submit" name="update" class="btn btn-success w-100">Update</button>
    <a href="index.php" class="btn btn-secondary mt-2 w-100">Cancel</a>
  </form>
</div>

</body>
</html>
