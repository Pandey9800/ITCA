<?php
include_once 'function/db_connect.php';
include_once 'function/function.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate the input data
    $cityName = validate($_POST['cityName']);

    // Insert data into the 'cities' table
    $insertCityQuery = "INSERT INTO `cities` (`city_name`) VALUES ('$cityName')";
    $result = mysqli_query($con, $insertCityQuery);

    if ($result) {
        $message = "City added successfully!";
    } else {
        $error = "Error: " . mysqli_error($con);
    }
}
?>

<?php include 'sidebar.php'; ?>

<div class="content-wrapper">
    <section class="content-header">
        <h1 class="text-center">Add City</h1>
    </section>
    <section class="content">
        <div class="mx-auto">
            <div class="box box-white box-solid" style="min-height: 600px;" >
                <div class="box-header with-border text-center">
                    <h3 class="box-title">Add City Form</h3>
                </div>
                <div class="box-body text-center" style="display: flex; flex-direction: column; align-items: center; justify-content: center; min-height: 600px;">
    <form action="add_city.php" method="post">
        <div class="form-group">
            <label for="cityName">City Name:</label>
            <input type="text" name="cityName" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Add City</button>
    </form>
    <?php
    if (isset($message)) {
        echo '<p style="color: green;">' . $message . '</p>';
    }
    if (isset($error)) {
        echo '<p style="color: red;">' . $error . '</p>';
    }
    ?>
</div>
            </div>
        </div>
    </section>
</div>
<?php include_once 'footer.php'; ?>
