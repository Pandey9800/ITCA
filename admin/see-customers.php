<?php
include_once 'function/db_connect.php';
include_once 'function/function.php';
?>

<?php include 'sidebar.php'; ?>

<style>
    .content-header {
        text-align: center;
    }
    .table th,
    .table td {
        cursor: default;
    }
    .table-bordered {
        border: 2px solid #000;
    }
</style>

<div class="content-wrapper">
    <section class="content-header">
        <h1 class="text-center">Customers List</h1>
    </section>
    <section class="content">
        <div class="mx-auto">
            <div class="box box-white box-solid" style="min-height: 600px;">
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead style="color: black; text-align: center;">
                                <tr>
                                    <th style="text-align: center; border: 1px solid black;">ID</th>
                                    <th style="text-align: center; border: 1px solid black;">Name</th>
                                    <th style="text-align: center; border: 1px solid black;">Last Name</th>
                                    <th style="text-align: center; border: 1px solid black;">Father's Name</th>
                                    <th style="text-align: center; border: 1px solid black;">City</th>
                                    <th style="text-align: center; border: 1px solid black;">Contact</th>
                                    <th style="text-align: center; border: 1px solid black;">Address</th>
                                    <th style="text-align: center; border: 1px solid black;">Pincode</th>
                                    <th style="text-align: center; border: 1px solid black;">PAN Number</th>
                                    <th style="text-align: center; border: 1px solid black;">Adhar Number</th>
                                    <th style="text-align: center; border: 1px solid black;">Gender</th>
                                    <th style="text-align: center; border: 1px solid black;">Email</th>
                                    <th style="text-align: center; border: 1px solid black;">Date Of Birth</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = "SELECT * FROM customer"; // Fetch all rows from the customer table
                                $result = mysqli_query($con, $query);

                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        ?>
                                        <tr>
                                            <td style="border: 1px solid black;"><?php echo $row['id']; ?></td>
                                            <td style="border: 1px solid black;"><?php echo $row['name']; ?></td>
                                            <td style="border: 1px solid black;"><?php echo $row['lname']; ?></td>
                                            <td style="border: 1px solid black;"><?php echo $row['father']; ?></td>
                                            <td style="border: 1px solid black;"><?php echo $row['city']; ?></td>
                                            <td style="border: 1px solid black;"><?php echo $row['contact']; ?></td>
                                            <td style="border: 1px solid black;"><?php echo $row['address']; ?></td>
                                            <td style="border: 1px solid black;"><?php echo $row['pincode']; ?></td>
                                            <td style="border: 1px solid black;"><?php echo $row['panno']; ?></td>
                                            <td style="border: 1px solid black;"><?php echo $row['adharno']; ?></td>
                                            <td style="border: 1px solid black;"><?php echo getGender($row['gender']); ?></td>
                                            <td style="border: 1px solid black;"><?php echo $row['EMAIL']; ?></td>
                                            <td style="border: 1px solid black;"><?php echo $row['DOB']; ?></td>
                                        </tr>
                                        <?php
                                    }
                                } else {
                                    echo "<tr><td colspan='13'>No customers found.</td></tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                        <div class="text-center">
                            <?php
                            $totalPages = ceil(mysqli_num_rows($result) / 15);
                            for ($i = 1; $i <= $totalPages; $i++) {
                                echo '<button class="btn btn-primary pagination" style="margin: 5px; border: 1px solid black; text-align: center; border-radius: 10px; padding-left:10px; padding-right:10px;">' . $i . '</button>';
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php include_once 'footer.php'; ?>


<?php
function getGender($genderNumeric) {
    switch ($genderNumeric) {
        case 1:
            return 'Male';
        case 2:
            return 'Female';
        case 3:
            return 'Other';
        default:
            return 'Unknown';
    }}
?>
<script>
    var customers = document.querySelectorAll("tbody tr");
    var pageNumber = 1;
    function showPage(pageNumber) {
        customers.forEach(function(customer, index) {
            var start = (pageNumber - 1) * 15;
            var end = start + 15;
            customer.style.display = (index >= start && index < end) ? "table-row" : "none";
        });
    }
    showPage(pageNumber);
    document.addEventListener("click", function(event) {
        if (event.target.matches(".pagination")) {
            pageNumber = parseInt(event.target.textContent);
            showPage(pageNumber);
        }
    });
</script>
