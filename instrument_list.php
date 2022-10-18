<?php
//database conection  file
include('db_connection.php');
//Code for deletion
if (isset($_GET['delid'])) {
    $rid = intval($_GET['delid']);
    $sql = mysqli_query($con, "delete from all_instrument_list where ID=$rid");
    echo "<script>alert('Data deleted');</script>";
    echo "<script>window.location.href = 'instrument_list.php'</script>";
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
                <h2 class="text-center float-start"><b>Instrument List</b></h2>
            </div>
            <div class="col-sm-7">
                <a href="instrument_setup.php" class="btn btn-light float-end"><i class="material-icons">&#xE147;</i>
                    <span>Add New Instrument</span></a>

            </div>
        </div>
    </div>
    <div class="container-xl">
        <div class="table-responsive">
            <div class="table-wrapper">
                <!-- <div class="table-title">
                    <div class="row">
                        <div class="col-sm-5">
                            <h2><b>Instrument List</b></h2>
                        </div>
                        <div class="col-sm-7" align="right">
                            <a href="instruments_setup.php" class="btn btn-secondary"><i
                                    class="material-icons">&#xE147;</i>
                                <span>Add New Instrument</span></a>

                        </div>
                    </div>
                </div> -->

                <table class="table table-hover" id="userTable">
                    <thead>
                        <tr>
                            <th scope="col">SL</th>
                            <th scope="col">Name of Instrument</th>
                            <th scope="col">Model</th>
                            <th scope="col">Mf. Country/Mfr.</th>
                            <th scope="col">Tag/Serial No.</th>
                            <th scope="col">Units/Measuring Parameter</th>
                            <th scope="col">Range</th>
                            <th scope="col">Working Range</th>
                            <th scope="col">Resolution</th>
                            <th scope="col">Accuracy</th>
                            <th scope="col">Calibration Point Required</th>
                            <th scope="col">Cal. Freq</th>
                            <th scope="col">Last Cal</th>
                            <th scope="col">Cal Due</th>
                            <th scope="col">Calibrated By</th>
                            <th scope="col">Calibration Cert. No.</th>
                            <th scope="col">Standard Methods</th>
                            <th scope="col">Standard Scope</th>
                            <th scope="col">Contact Person</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $ret = mysqli_query($con, "select * from all_instrument_list");
                        $cnt = 1;
                        $row = mysqli_num_rows($ret);
                        if ($row > 0) {
                            while ($row = mysqli_fetch_array($ret)) {

                        ?>
                        <!--Fetch the Records -->
                        <tr>
                            <td><?php echo $cnt; ?></td>
                            <td><?php echo $row['name_instrument']; ?></td>
                            <td><?php echo $row['model']; ?></td>
                            <td><?php echo $row['mf_country']; ?></td>
                            <td> <?php echo $row['tagNo']; ?></td>
                            <td> <?php echo $row['measuring_para']; ?></td>
                            <td> <?php echo $row['R_ange']; ?></td>
                            <td> <?php echo $row['working_range']; ?></td>
                            <td> <?php echo $row['resolution']; ?></td>
                            <td> <?php echo $row['accuracy']; ?></td>
                            <td> <?php echo $row['Calibration_Point_Required']; ?></td>
                            <td> <?php echo $row['cal_freq']; ?></td>
                            <td> <?php echo $row['last_cal']; ?></td>
                            <td> <?php echo $row['cal_due']; ?></td>
                            <td> <?php echo $row['calibrated_by']; ?></td>
                            <td> <?php echo $row['calibration_cert_no']; ?></td>
                            <td> <?php echo $row['std_method']; ?></td>
                            <td> <?php echo $row['std_scope']; ?></td>
                            <td> <?php echo $row['con_person']; ?></td>
                            <td>
                                <a href="read.php?viewid=<?php echo htmlentities($row['id']); ?>" class="view"
                                    title="View" data-toggle="tooltip"><i class="material-icons">&#xE417;</i></a>
                                <a href="edit.php?editid=<?php echo htmlentities($row['id']); ?>" class="edit"
                                    title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                                <a href="instrument_list.php?delid=<?php echo ($row['id']); ?>" class="delete"
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