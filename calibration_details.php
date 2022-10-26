<?php
//database conection  file
include('db_connection.php');
//Code for deletion
if (isset($_GET['delid'])) {
    $rid = intval($_GET['delid']);
    $sql = mysqli_query($con, "delete from cal_instrument where ID=$rid");
    echo "<script>alert('Data deleted');</script>";
    echo "<script>window.location.href = 'calibration_details.php'</script>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instrument List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
    <title>All instruments</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">


    <!-- JQuery For filter,search in a table -->
    <link rel="stylesheet" type="text/css" href="dt/dataTables.bootstrap5.min.css">
    <script type="text/javascript" src="dt/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="dt/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="dt/dataTables.bootstrap5.min.js"></script>


</head>

<body>
    <div class="table-title container">
        <div class="row">
            <div class="col-sm-5">
                <h2 class="text-center float-start"><b>Calibration Details</b></h2>
            </div>
            <div class="col-sm-7">
                <a href="calibrated_instrument.php" class="btn btn-light float-end"><i
                        class="material-icons">&#xE147;</i>
                    <span>Add New</span></a>

            </div>
        </div>
    </div>
    <div class="container-xl">
        <div class="table-responsive">
            <div class="table-wrapper">
                <table class="table table-hover" id="userTable">
                    <thead>
                        <tr>
                            <th scope="col">SL</th>
                            <th scope="col">Date</th>
                            <th scope="col">Next Cal. Date</th>
                            <th scope="col">Done By</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $ret = mysqli_query($con, "select * from cal_instrument");
                        $cnt = 1;
                        $row = mysqli_num_rows($ret);
                        if ($row > 0) {
                            while ($row = mysqli_fetch_array($ret)) {

                        ?>
                        
                        <!--Fetch the Records -->
                        <tr>
                            <td><?php echo $cnt; ?></td>
                            <td><?php echo $row['date']; ?></td>
                            <td><?php echo $row['last_cal_date']; ?></td>
                            <td><?php echo $row['done_by']; ?></td>
                            <td>
                                <a href="read.php?viewid=<?php echo htmlentities($row['id']); ?>" class="view"
                                    title="View" data-toggle="tooltip"><i class="material-icons">&#xE417;</i></a>
                                <a href="edit.php?editid=<?php echo htmlentities($row['id']); ?>" class="edit"
                                    title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                                <a href="calibration_details.php?delid=<?php echo ($row['id']); ?>" class="delete"
                                    title="Delete" data-toggle="tooltip"
                                    onclick="return confirm('Do you really want to Delete ?');"><i
                                        class="material-icons">&#xE872;</i></a>
                            </td>
                        </tr>
                        <?php
                                $cnt = $cnt + 1;
                            }
                        } else { ?>
                        <tr>
                            <th style="text-align:center; color:red;" colspan="6">No Record Found</th>
                        </tr>
                        <?php } ?>

                    </tbody>
                </table>

            </div>
        </div>
    </div>



    <script>
    $(document).ready(function() {
        $('#userTable').DataTable();
    });
    </script>
</body>

</html>