<?php
include 'config.php';

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'] ?? '';
    $price = $_POST['price'] ?? '';

    // Check if new image is uploaded
    if (!empty($_FILES['image']['name'])) {
        $imageName = time() . '_' . $_FILES['image']['name'];
        $imageTmp = $_FILES['image']['tmp_name'];
        $imagePath = "uploadImage/" . $imageName;

        move_uploaded_file($imageTmp, $imagePath);

        // Update with image
        $query = "UPDATE content SET name='$name', price='$price', image='$imagePath' WHERE id='$id'";
    } else {
        // Update without changing image
        $query = "UPDATE content SET name='$name', price='$price' WHERE id='$id'";
    }

    if (mysqli_query($con, $query)) {
        echo "<script>alert('Record updated successfully'); window.location.href='index.php';</script>";
    } else {
        echo "Update failed: " . mysqli_error($con);
    }
} else {
    echo "Invalid form submission.";
}
?>
