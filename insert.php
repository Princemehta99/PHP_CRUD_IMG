<?php
include 'config.php';

if (isset($_POST['upload'])) {
    $name = $_POST['name'];
    $price = $_POST['price'];

    $uniqueName = time() . '_' . $_FILES['image']['name'];
    $tmpName = $_FILES['image']['tmp_name'];
    $destination = 'uploadImage/' . $uniqueName;

    if (move_uploaded_file($tmpName, $destination)) {
        
        $query = "INSERT INTO content(name, price, image) VALUES('$name', '$price', '$destination')";
        if (mysqli_query($con, $query)) {
            echo "<script>alert('Image uploaded successfully'); window.location.href='index.php';</script>";
        } else {
            echo "Database error: " . mysqli_error($con);
        }
    } else {
        echo "Failed to upload image file.";
    }
}
?>
