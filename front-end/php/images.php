<script>
    function Alert(message){
        alert(message);
    }
</script>
<?php 

define("IMAGE_DIR", "../images/");
define("IMAGE_TYPE", ".jpg");

/*
getImage function used for retrieving the image.
Params: 
    image_url: image url to retrieve the image.
*/


function getImage($image_url): void{
    $image_url = "../images/".$image_url;
    if(file_exists($image_url)){
        echo "<img src='../images/" . $image_url . "' alt='$image_url'>";
    }else{
        echo "<img class='product-image' src='../images/image_default.jpg' alt='default image'>";
    }
}

/*
 SetImageName function is used to set the image url in the database 
 after the image is uploaded by the admin.
 Params:
    category: product category,
    image_name: product name is used as image name,
    id: product id to set the url.
*/
require_once("../includes/db.php");
function setImageName(string $category, string $image_name , int $id): void{
    global $conn;
    $image_url = IMAGE_DIR.$category."/".$image_name.IMAGE_TYPE;
    $sql = "UPDATE products SET image_url = '$image_url' WHERE id = '$id'";
    if($conn->query($sql)){
        echo "<script>Alert('Image updated successfully')</script>";
    } else{
        echo "<script>Alert('Error: ".$conn->error."')</script>";
    }
}
