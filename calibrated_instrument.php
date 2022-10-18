<?php
//Databse Connection file
include('db_connection.php');
if (isset($_POST['submit'])) {
    //getting the post values
    $date = $_POST['date'];
    $nextCalDate = $_POST['ncaldate'];
    $doneBy = $_POST['doneby'];


    // Query for data insertion
    $query = mysqli_query($con, "insert into cal_instrument(date,last_cal_date,done_by) value('$date','$nextCalDate', '$doneBy')");
    if ($query) {
        echo "<script>alert('You have successfully inserted the data');</script>";
        echo "<script type='text/javascript'> document.location ='calibrated_instrument.php'; </script>";
    } else {
        echo "<script>alert('Something Went Wrong. Please try again');</script>";
    }
}
?>



<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
    <title>All instruments</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body class="p-3 m-0 border-0">
    <div class="container">
        <div class="text-bg-light mb-4">
            <h1 class="text-center">Calibrated Instrument</h1>
        </div>
        <form action="" method="post">
            <div class="mb-3 row">
                <label for="date" class="col-sm-2 col-form-label">Date</label>
                <div class="col-sm-3">
                    <input type="date" class="form-control" id="date" name="date">
                </div>

            </div>
            <div class="mb-3 row">
                <label for="nextcaldate" class="col-sm-2 col-form-label">Next Cal. Date</label>
                <div class="col-sm-3">
                    <input type="date" class="form-control" id="nextcaldate" name="ncaldate">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="doneby" class="col-sm-2 col-form-label">Done By</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" id="doneby" name="doneby">
                </div>
            </div>

            <input class="btn btn-primary btn-lg" type="submit" value="Submit" name="submit">


        </form>

    </div>
</body>

</html>