<?php
session_start();
require_once("../db.php");

if (isset($_POST['submit'])) {
    $subject = trim($_POST['subject']);
    $notice = trim($_POST['input']);
    $audience = trim($_POST['audience']);
    $file = ''; // default value

    if (isset($_FILES['resume']) && $_FILES['resume']['error'] === 0) {
        $allowedExts = ['pdf', 'doc', 'docx'];
        $folder_dir = "../uploads/resume/";
        $base = basename($_FILES['resume']['name']);
        $ext = strtolower(pathinfo($base, PATHINFO_EXTENSION));

        if (in_array($ext, $allowedExts)) {
            $file = uniqid() . "." . $ext;
            $filepath = $folder_dir . $file;

            if (!is_dir($folder_dir)) {
                mkdir($folder_dir, 0755, true);
            }

            if (!move_uploaded_file($_FILES['resume']['tmp_name'], $filepath)) {
                die("Failed to upload file.");
            }
        } else {
            die("Invalid file type. Only PDF, DOC, DOCX allowed.");
        }
    }

    $hash = md5(uniqid());
    $stmt = $conn->prepare("INSERT INTO notice (subject, notice, audience, resume, hash, date) VALUES (?, ?, ?, ?, ?, NOW())");
    $stmt->bind_param("sssss", $subject, $notice, $audience, $file, $hash);


    if ($stmt->execute()) {
        include 'sendmail.php';
        header("Location: postnotice.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Placement Portal</title>

    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../Css/AdminLTE.min.css">
<link rel="stylesheet" href="../Css/_all-skins.min.css">
<link rel="stylesheet" href="../Css/custom.css">



    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-green sidebar-mini">
    <?php

    include 'header.php';
    ?>



    <div class="row">
        <div class="col-xs-6 responsive">
            <section>
                <div class="alert alert-success alert-dismissible" style="display: none;" id="truemsg">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-check"></i> Success!</h4>
                    New Notice Successfully added
                </div>

               <form class="centre" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" enctype="multipart/form-data">
    <div>
        <h4><strong>Post a new notice</strong></h4>
    </div>
    <div>
        <input id="subject" placeholder="Subject" type="text" name="subject" required class="form-control">
    </div>

    <div id="file" class="form-group">
        <input type="file" name="resume" class="btn btn-flat btn-primary" accept=".pdf,.doc,.docx">
    </div>

    <div class="form-group mt-3">
        <textarea name="input" id="input" class="form-control" placeholder="Notice" required></textarea>
    </div>

    <div class="form-group">
        <label for="audience">Audience</label>
        <select id="audience" name="audience" class="form-control" required>
            <option value="All Students">All Students</option>
            <option value="Co-ordinators">Co-ordinators</option>
        </select>
    </div>

    <div class="text-center">
        <button class="btn btn-primary btn-sm" name="submit" type="submit">NOTIFY</button>
    </div>
</form>



        </div>
        </section>



        <div class="col-xs-5 responsive2 ">


            <div class="box box-primary ">
                <div class="box-header with-border">
                    <h3 class="box-title">Posted Notice</h3>
                </div>

                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Subject</th>
                                <th>Notice</th>

                                <th>Audience</th>

                                

                                <th>Date and Time</th>
                                <th>Delete</th>



                            </tr>
                        </thead>
                        <tbody>


                            <?php

                            $sql = "SELECT * FROM notice";

                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {

                                // output data of each row
                                while ($row = $result->fetch_assoc()) {
                            ?>
                                    <td><?php echo $row['subject']; ?></td>
                                    <td><?php echo $row['notice']; ?></td>
                                    <td><?php echo $row['audience']; ?></td>
                                    
                                    <td><?php echo $row['date']; ?></td>

                                    <td><a id="delete" href="deletenotice.php?id=<?php echo $row['id']; ?>"><i class="fa fa-trash"></i></a></td>
                                    </tr><?php

                                        }
                                    }

                                            ?>


                        </tbody>
                        <tfoot>

                        </tfoot>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>

        </div>

    </div>


    <footer class="main-footer" style="margin:auto;margin-bottom: 0px; padding:15px;
  width: 100%;
  height: 50px; position:absolute; background-color:#1f0a0a; color:white">
        <div class="text-center">
            <strong>Copyright &copy; 2025 Placement Portal</strong> All rights
            reserved.
        </div>
    </footer>

</body>

</html>


