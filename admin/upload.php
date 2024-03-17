<?php
include_once 'header.php';

if(isset($_FILES['upload']['name']))
{
    $file = $_FILES['upload']['tmp_name'];
    $file_name = $_FILES['upload']['name'];
    $file_name_array = explode(".", $file_name);
    $extension = end($file_name_array);
    $new_image_name = rand() . '.' . $extension;
        if($extension!= "jpg" && $extension!= "jpeg" && $extension!= "PNG" && $extension!= "JPG"  && $extension!= "JPEG") {
            echo "<script type='text/javascript'>alert('sorry, only JPG, JPEG, & PNG files are allowed. Close image properties windows and try again');</script>";
        }
        elseif($_FILES["upload"]["size"] > 1000000){
            echo "<script type='text/javascript'>alert('Image is too large: Upload image under 1 MB . Close image properties windows and try again ');</script>";
        }
        else
        {
            move_uploaded_file($file, 'uploads/' . $new_image_name);
            mysqli_query($mysqli,"INSERT INTO Service (imguides) VALUES ('$new_image_name')");
            $function_number = $_GET['CKEditorFuncNum'];
            $url = 'http://localhost/itcaO/admin/uploads/'.$new_image_name;
            $message = '';
            echo "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction($function_number, '$url', '$message');</script>";
        }
}
?>
