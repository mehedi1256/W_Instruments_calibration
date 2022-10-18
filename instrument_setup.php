<?php
//Databse Connection file
include('db_connection.php');
if (isset($_POST['submit'])) {
    //getting the post values
    $instrumentName = $_POST['instrumentN'];
    $modelN = $_POST['modelN'];
    $mfc = $_POST['mfc'];
    $tgn = $_POST['tgn'];
    $unitpara = $_POST['unitpara'];
    $range = $_POST['range'];
    $workingRange = $_POST['workingRange'];
    $unitpara = $_POST['resu'];
    $accu = $_POST['accu'];
    $calPreq = $_POST['calPreq'];
    $calFreq = $_POST['calFreq'];
    $lastCal = $_POST['lastCal'];
    $calDue = $_POST['calDue'];
    $calBy = $_POST['calBy'];
    $calCn = $_POST['calCn'];
    $stdMethod = $_POST['stdMethod'];
    $stdScope = $_POST['stdScope'];
    $conPerson = $_POST['conPerson'];

    // Query for data insertion
    $query = mysqli_query($con, "insert into all_instrument_list(name_instrument,model,mf_country, tagNo, measuring_para,R_ange,working_range,resolution,accuracy,Calibration_Point_Required,cal_freq,last_cal,cal_due,calibrated_by,calibration_cert_no,std_method,std_scope,con_person) value('$instrumentName','$modelN', '$mfc', '$tgn', '$unitpara', '$range', '$workingRange','$unitpara', '$accu', '$calPreq','$calFreq','$lastCal','$calDue','$calBy','$calCn','$stdMethod','$stdScope','$conPerson' )");
    if ($query) {
        echo "<script>alert('You have successfully inserted the data');</script>";
        echo "<script type='text/javascript'> document.location ='instrument_setup.php'; </script>";
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
            <h1 class="text-center">Instrument Setup</h1>
        </div>
        <form action="" method="post">
            <div class="mb-3 row">
                <label for="inputInstrument" class="col-sm-2 col-form-label">Name of Instrument</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" id="inputInstrument" name="instrumentN">
                </div>
                <label for="inputModel" class="col-sm-2 col-form-label">Model</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" id="inputModel" name="modelN">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="inputMfCountry" class="col-sm-2 col-form-label">Mf. Country/Mfr.</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" id="inputMfCountry" name="mfc">
                </div>
                <label for="inputTag" class="col-sm-2 col-form-label">Tag/Serial No</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" id="inputTag" name="tgn">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="inputMpara" class="col-sm-2 col-form-label">Units/Measuring Parameter</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" id="inputMpara" name="unitpara">
                </div>

                <label for="inputRange" class="col-sm-2 col-form-label">Range</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" id="inputRange" name="range">
                </div>

            </div>
            <div class="mb-3 row">
                <label for="inputWrange" class="col-sm-2 col-form-label">Working Range</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" id="inputWrange" name="workingRange">
                </div>

                <label for="inputRes" class="col-sm-2 col-form-label">Resolution</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" id="inputRes" name="resu">
                </div>

            </div>

            <div class="mb-3 row">
                <label for="inputAcc" class="col-sm-2 col-form-label">Accuracy</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" id="inputAcc" name="accu">
                </div>

                <label for="inputCPreq" class="col-sm-2 col-form-label">Calibration Point Required</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" id="inputCPreq" name="calPreq">
                </div>

            </div>

            <div class="mb-3 row">
                <label for="inputCalFreq" class="col-sm-2 col-form-label">Cal Freq</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" id="inputCalFreq" name="calFreq">
                </div>

                <label for="inputLcal" class="col-sm-2 col-form-label">Last Cal</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" id="inputLcal" name="lastCal">
                </div>

            </div>

            <div class="mb-3 row">
                <label for="inputCalDue" class="col-sm-2 col-form-label">Cal Due</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" id="inputCalDue" name="calDue">
                </div>

                <label for="inputCalBy" class="col-sm-2 col-form-label">Calibrated By</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" id="inputCalBy" name="calBy">
                </div>

            </div>

            <div class="mb-3 row">
                <label for="inputCalCertN" class="col-sm-2 col-form-label">Calibration Cert. No.</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" id="inputCalCertN" name="calCn">
                </div>

                <label for="inputSMeth" class="col-sm-2 col-form-label">Standard Methods</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" id="inputSMeth" name="stdMethod">
                </div>

            </div>

            <div class="mb-3 row">
                <label for="inputSScope" class="col-sm-2 col-form-label">Standard Scope</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" id="inputSScope" name="stdScope">
                </div>

                <label for="inputConPer" class="col-sm-2 col-form-label">Contact Person</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" id="inputConPer" name="conPerson">
                </div>

            </div>


            <input class="btn btn-primary btn-lg" type="submit" value="Submit" name="submit">


        </form>

    </div>
</body>

</html>