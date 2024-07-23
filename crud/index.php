<?php
require_once "inc/functions.php";

session_start(array(
    'cookie_lifetime' => 300,
));

$info = '';
$task = $_GET['task'] ?? 'report';
if ('seed' == $task) {
    if (!isAdmin()) {
        header('location: /index.php');
    };

    seed();
    $info = 'Seeding Complete';
}

$error = $_GET['error'] ?? '';

$fname = '';
$lname = '';
$roll = '';

if (isset($_POST['submit'])) {
    if ($_POST['submit'] != 'delete') {
        $fname = filter_input(INPUT_POST, 'fname', FILTER_DEFAULT);
        $lname = filter_input(INPUT_POST, 'lname', FILTER_DEFAULT);
        $roll = filter_input(INPUT_POST, 'roll', FILTER_DEFAULT);
        $id = filter_input(INPUT_POST, 'id', FILTER_DEFAULT);

        if ($id) {
            if ($fname != '' && $lname != '' && $roll != '') {
                $result = updateStudent($id, $fname, $lname, $roll);
                if ($result == true) {
                    header('location: /index.php?task=report');
                } else {
                    $error = 1;
                }
            }
        } else {
            if ($fname != '' && $lname != '' && $roll != '') {
                $result = addStudents($fname, $lname, $roll);
                if ($result == true) {
                    header('location: /index.php?task=report');
                } else {
                    $error = 1;
                }
            }
        }
    } elseif ($_POST['submit'] == 'delete') {
        if (!isAdmin()) {
            header('location: /index.php');
        }
        $id = filter_input(INPUT_POST, 'id', FILTER_DEFAULT);
        $result = deleteStudent($id);
        if ($result) {
            $info = 'Delete Student Successfull!';
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/style.css">
    <title>PHP CRUD Application</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col">
                <h2>CRUD PROJECT - 2</h2>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ducimus reiciendis veniam dolores ullam laboriosam voluptas rem facilis ad, eius similique.</p>
            </div>
        </div>
        <div class="row">
            <?php include_once "./inc/templates/nav.php"; ?>
        </div>
        <hr>

        <?php
        if ($info != '') {
            echo "<p class='info'> Info: $info </p>";
        }
        ?>

        <!-- Error -->
        <?php if ('1' == $error) : ?>
            <div class="row">
                <div class="col">
                    <blockquote>
                        Duplicate Roll Number
                    </blockquote>
                </div>
            </div>
        <?php endif; ?>
        <!-- END Error -->

        <!-- Student Report -->
        <?php if ('report' == $task) : ?>
            <div class="row">
                <div class="col">
                    <h3>Student Report</h3>
                    <?php generateReport(); ?>
                </div>
            </div>
        <?php endif; ?>
        <!-- END Student Report -->

        <!-- Add Student -->
        <?php if ('add' == $task) :
            if (!isAdmin()) {
                header('location: index.php');
            }
        ?>
            <div class="row">
                <div class="col">
                    <h3>Add New Student</h3>
                    <div>
                        <form action="/index.php?task=add" method="POST">
                            <p>
                                <label for="fname">First Name</label>
                                <input type="text" id="fname" name="fname" required value="<?php echo $fname; ?>">
                            </p>
                            <p>
                                <label for="lname">Last Name</label>
                                <input type="text" id="lname" name="lname" required value="<?php echo $lname; ?>">
                            </p>
                            <p>
                                <label for="roll">Roll Number</label>
                                <input type="number" id="roll" name="roll" required value="<?php echo $roll; ?>">
                            </p>
                            <button type="submit" name="submit" value="add">Add New Student</button>

                        </form>
                    </div>

                </div>
            </div>
        <?php endif; ?>
        <!-- END Add Student -->

        <!-- Edit Student -->
        <?php if ('edit' == $task) :
            if (!hasPrivilages()) {
                header("location: index.php");
                die();
            }
            $id = filter_input(INPUT_GET, 'id', FILTER_DEFAULT);
            if ($error == 1) {
                $student = array(
                    'id' => $id,
                    'fname' => $fname,
                    'lname' => $lname,
                    'roll' => $roll,
                );
            } else {
                $student = getStudent($id);
            }
            if ($student) :
        ?>
                <div class=" row">
                    <div class="col">
                        <h3>Update Student</h3>
                        <div>
                            <form action="/index.php?task=edit&id=<?php echo $id; ?>" method="POST">
                                <input type="hidden" name="id" value="<?php echo $id; ?>">
                                <p>
                                    <label for="fname">First Name</label>
                                    <input type="text" id="fname" name="fname" required value="<?php echo $student['fname']; ?>">
                                </p>
                                <p>
                                    <label for="lname">Last Name</label>
                                    <input type="text" id="lname" name="lname" required value="<?php echo $student['lname']; ?>">
                                </p>
                                <p>
                                    <label for="roll">Roll Number</label>
                                    <input type="number" id="roll" name="roll" required value="<?php echo $student['roll']; ?>">
                                </p>
                                <button type="submit" name="submit" value="update">Update Student</button>

                            </form>
                        </div>

                    </div>
                </div>
        <?php
            endif;
        endif; ?>
        <!-- END Edit Student -->

        <!-- Delete Student -->
        <?php
        if ('delete' == $task) {
            if (!isAdmin()) {
                header("location: index.php");
                die();
            }
            $id = filter_input(INPUT_GET, 'id', FILTER_DEFAULT);
            $student = getStudent($id);
        ?>
            <div class="row">
                <div class="col">
                    <h4>Are you sure you want to delete? <br><?php printf("%s %s, Roll:%s", $student['fname'], $student['lname'], $student['roll']); ?> </h4>
                    <form action="/index.php?task=report" method="POST">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <button class="warning" type="submit" name="submit" value="delete">Sure ! Delete</button>
                    </form>
                </div>
            </div>
        <?php
        } ?>
        <!-- End Delete Student -->

    </div>
</body>

</html>