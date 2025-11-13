<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['damsid'] == 0)) {
    header('location:logout.php');
} else {
    if (isset($_POST['submit'])) {
        $eid = $_GET['editid'];
        $aptid = $_GET['aptid'];
        $status = $_POST['status'];
        $remark = $_POST['remark'];
        $sql = 'update tblappointment set Status=:status,Remark=:remark where ID=:eid';
        $query = $dbh->prepare($sql);
        $query->bindParam(':status', $status, PDO::PARAM_STR);
        $query->bindParam(':remark', $remark, PDO::PARAM_STR);
        $query->bindParam(':eid', $eid, PDO::PARAM_STR);
        $query->execute();
        echo '<script>alert("Remark and status has been updated")</script>';
        echo "<script>window.location.href ='all-appointment.php'</script>";
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>DHCS|| View Appointment Detail</title>
    <link rel="stylesheet" href="libs/bower/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="libs/bower/material-design-iconic-font/dist/css/material-design-iconic-font.css">
    <link rel="stylesheet" href="libs/bower/animate.css/animate.min.css">
    <link rel="stylesheet" href="libs/bower/fullcalendar/dist/fullcalendar.min.css">
    <link rel="stylesheet" href="libs/bower/perfect-scrollbar/css/perfect-scrollbar.css">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/core.css">
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="stylesheet" href="assets/css/customize.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:400,500,600,700,800,900,300">
    <script src="libs/bower/breakpoints.js/dist/breakpoints.min.js"></script>
    <script>
        Breakpoints();
    </script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap');

        /* Modern Print Popup Styles */
        #printPopup {
            display: none;
            font-family: "Outfit", sans-serif;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: white;
            padding: 20px;
            border: 1px solid #ccc;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            /* Stronger shadow */
            z-index: 1000;
            width: 400px;
            /* Adjust width as needed */
            max-height: 80vh;
            /* Limit height for long content */
            overflow-y: auto;
            /* Enable scrolling */
            border-radius: 8px;
            /* Rounded corners */
        }

        #printPopup h2 {
            font-size: 20px;
            margin-bottom: 15px;
            color: #333;
            text-align: center;
        }

        #printPopup p {
            font-size: 14px;
            line-height: 1.6;
            color: #555;
            margin-bottom: 8px;
        }

        #printPopup strong {
            font-weight: 600;
            color: #333;
        }

        #printPopup button {
            display: inline-block;
            margin: 20px 5px 0;
            /* Space between buttons */
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
        }

        #printPopup button:hover {
            background-color: #0056b3;
        }

        #printPopup button.cancel-button {
            background-color: #dc3545; /* Red color for cancel */
        }

        #printPopup button.cancel-button:hover {
            background-color: #c82333;
        }

        /* Style the table within the popup */
        #printPopup table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        #printPopup table td {
            padding: 8px;
            border-bottom: 1px solid #eee;
        }

        #printPopup table tr:last-child td {
            border-bottom: none;
        }
    </style>
</head>

<body class="menubar-left menubar-unfold menubar-light theme-primary">
    <?php include_once('includes/header.php'); ?>
    <?php include_once('includes/sidebar.php'); ?>
    <main id="app-main" class="app-main">
        <div class="wrap">
            <section class="app-content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="widget">
                            <header class="widget-header">
                                <h4 class="widget-title" style="color: blue">Appointment Details</h4>
                            </header>
                            <hr class="widget-separator">
                            <div class="widget-body">
                                <div class="table-responsive">
                                    <?php
                                    $eid = $_GET['editid'];
                                    $sql = 'SELECT * from tblappointment  where ID=:eid';
                                    $query = $dbh->prepare($sql);
                                    $query->bindParam(':eid', $eid, PDO::PARAM_STR);
                                    $query->execute();
                                    $results = $query->fetchAll(PDO::FETCH_OBJ);
                                    $cnt = 1;
                                    if ($query->rowCount() > 0) {
                                        foreach ($results as $row) {
                                    ?>
                                            <table border="1" class="table table-bordered mg-b-0">
                                                <tr>
                                                    <th>Appointment Number</th>
                                                    <td><?php echo $aptno = ($row->AppointmentNumber); ?></td>
                                                    <th>Patient Name</th>
                                                    <td><?php echo $row->Name; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Mobile Number</th>
                                                    <td><?php echo $row->MobileNumber; ?></td>
                                                    <th>Email</th>
                                                    <td><?php echo $row->Email; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Appointment Date</th>
                                                    <td><?php echo $row->AppointmentDate; ?></td>
                                                    <th>Appointment Time</th>
                                                    <td><?php echo $row->AppointmentTime; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Apply Date</th>
                                                    <td><?php echo $row->ApplyDate; ?></td>
                                                    <th>Appointment Final Status</th>
                                                    <td colspan="4">
                                                        <?php $status = $row->Status;
                                                        if ($row->Status == '') {
                                                            echo 'Not yet updated';
                                                        }
                                                        if ($row->Status == 'Approved') {
                                                            echo 'Your appointment has been approved';
                                                        }
                                                        if ($row->Status == 'Cancelled') {
                                                            echo 'Your appointment has been cancelled';
                                                        }; ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Remark</th>
                                                    <?php if ($row->Remark == '') { ?>
                                                        <td colspan="3"><?php echo 'Not Updated Yet'; ?></td>
                                                    <?php } else { ?>
                                                        <td colspan="3"><?php echo htmlentities($row->Remark); ?></td>
                                                    <?php } ?>
                                                </tr>
                                            </table>
                                            <br>
                                            <?php
                                            if ($status == '') {
                                            ?>
                                                <p align="center" style="padding-top: 20px">
                                                    <button class="btn btn-primary waves-effect waves-light w-lg" data-toggle="modal"
                                                        data-target="#myModal">Take Action</button>
                                                    <button class="btn btn-success waves-effect waves-light w-lg" onclick="openPrintPopup()">Print
                                                        Receipt</button>
                                                </p>
                                            <?php } ?>
                                            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Take Action</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <table class="table table-bordered table-hover data-tables">
                                                                <form method="post" name="submit">
                                                                    <tr>
                                                                        <th>Remark :</th>
                                                                        <td><textarea name="remark" placeholder="Remark" rows="12" cols="14"
                                                                                class="form-control wd-450" required="true"></textarea></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Status :</th>
                                                                        <td>
                                                                            <select name="status" class="form-control wd-450" required="true">
                                                                                <option value="Approved" selected="true">Approved</option>
                                                                                <option value="Cancelled">Cancelled</option>
                                                                            </select>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <button type="submit" name="submit" class="btn btn-primary">Update</button>
                                                        </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <iframe id="printFrame" style="display:none;"></iframe>
                                            <div class="print-popup" id="printPopup">
                                                <h2>Appointment Receipt</h2>
                                                <table>
                                                    <tr>
                                                        <td><strong>Appointment Number:</strong></td>
                                                        <td><?php echo $aptno; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Patient Name:</strong></td>
                                                        <td><?php echo $row->Name; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Mobile Number:</strong></td>
                                                        <td><?php echo $row->MobileNumber; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Email:</strong></td>
                                                        <td><?php echo $row->Email; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Appointment Date:</strong></td>
                                                        <td><?php echo $row->AppointmentDate; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Appointment Time:</strong></td>
                                                        <td><?php echo $row->AppointmentTime; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Apply Date:</strong></td>
                                                        <td><?php echo $row->ApplyDate; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Appointment Final Status:</strong></td>
                                                        <td><?php echo ($row->Status == '' ? 'Not yet updated' : $row->Status); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Remark:</strong></td>
                                                        <td><?php echo ($row->Remark == '' ? 'Not Updated Yet' : htmlentities($row->Remark)); ?></td>
                                                    </tr>
                                                </table>
                                                <button onclick="printReceipt()">Print Receipt</button>
                                                <button class="cancel-button" onclick="closePrintPopup()">Cancel</button>
                                            </div>
                                    <?php
                                        $cnt = $cnt + 1;
                                        }
                                    } ?>
                                </div>
                                <script>
                                    function openPrintPopup() {
                                        document.getElementById('printPopup').style.display = 'block';
                                    }

                                    function closePrintPopup() {
                                        document.getElementById('printPopup').style.display = 'none';
                                    }

                                    function printReceipt() {
                                        var printFrame = document.getElementById("printFrame");
                                        var printContent = document.getElementById("printPopup").innerHTML;

                                        printFrame.contentDocument.body.innerHTML = printContent;
                                        printFrame.contentWindow.print();
                                    }
                                </script>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <?php include_once('includes/footer.php'); ?>
    </main>
    <?php include_once('includes/customizer.php'); ?>
    <script src="libs/bower/jquery/dist/jquery.js"></script>
    <script src="libs/bower/jquery-ui/jquery-ui.min.js"></script>
    <script src="libs/bower/jQuery-Storage-API/jquery.storageapi.min.js"></script>
    <script src="libs/bower/bootstrap-sass/assets/javascripts/bootstrap.js"></script>
    <script src="libs/bower/jquery-slimscroll/jquery.slimscroll.js"></script>
    <script src="libs/bower/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>
    <script src="libs/bower/PACE/pace.min.js"></script>
    <script src="assets/js/library.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/app.js"></script>
    <script src="libs/bower/moment/moment.js"></script>
    <script src="libs/bower/fullcalendar/dist/fullcalendar.min.js"></script>
    <script src="assets/js/fullcalendar.js"></script>
</body>

</html>
<?php } ?>