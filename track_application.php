<?php include_once 'header.php'; ?> 
<br/><br/><br/><br/><br/><br/><br/>
<div class="container d-flex align-items-center justify-content-center flex-column mt-4">
    <h2 class="text-center">Track Your Application</h2><br/><br/><br/><br/>
    <form method="post" action="track_application.php" class="row g-2 align-items-center">
        <div class="col-auto">
            <label for="applicationId" class="col-form-label">Enter Your Application ID:</label>
        </div>
        <div class="col-auto">
            <input type="text" class="form-control" name="applicationId" required>
        </div>
        <div class="col-auto">
            <button type="submit" class="btn btn-primary">Track</button>
        </div>
    </form>
    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $enteredApplicationId = $_POST['applicationId'];
        $query = "SELECT status FROM task WHERE applicantid = $enteredApplicationId";
        $result = mysqli_query($con, $query);
        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $status = $row['status'];
            $statusText = '';
            $statusColor = '';
            switch ($status) {
                case 1:
                    $statusText = 'Applied';
                    $statusColor = 'darkgrey';
                    break;
                case 2:
                    $statusText = 'Progress';
                    $statusColor = 'orange';
                    break;
                case 3:
                    $statusText = 'Successful';
                    $statusColor = 'green';
                    break;
                case 4:
                    $statusText = 'Rejected';
                    $statusColor = 'red';
                    break;
                default:
                    $statusText = 'Unknown';
                    $statusColor = 'black';
                    break;
            }            
            echo '<div class="mt-3 text-center">';
            echo '<p>Status of Application ID ' . $enteredApplicationId . ': <span style="color: ' . $statusColor . '; background-color: rgba(255, 255, 255, 0.5); padding: 5px; border-radius: 5px; font-weight: bold;">' . $statusText . '</span></p>';
            echo '</div>';
        } else {
            echo '<div class="mt-3 text-center">';
            echo '<p class="text-danger">Invalid Application ID. Please enter a valid one.</p>';
            echo '</div>';
        }
    }
    ?>
</div>
<?php include_once 'footer.php'; ?>
