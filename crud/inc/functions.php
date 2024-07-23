<?php
define('DB_NAME', 'C:\Users\USER\Desktop\PHP\crud\data\db.txt');
function seed()
{
    $students = unserialize(file_get_contents(DB_NAME)) ?? array();
    if ($students && count($students) > 0) {
        return;
    }
    $data = array(
        array(
            'id' => 1,
            'fname' => 'Kamal',
            'lname' => 'Ahmed',
            'roll' => '1',
        ),
        array(
            'id' => 2,
            'fname' => 'Jamal',
            'lname' => 'Khulu',
            'roll' => '2',
        ),
        array(
            'id' => 3,
            'fname' => 'Rahim',
            'lname' => 'Molla',
            'roll' => '3',
        ),
        array(
            'id' => 4,
            'fname' => 'Nikhil',
            'lname' => 'Chandra',
            'roll' => '4',
        ),
        array(
            'id' => 5,
            'fname' => 'John',
            'lname' => 'Doe',
            'roll' => '5',
        ),
    );

    $serializedData = serialize($data);
    file_put_contents(DB_NAME, $serializedData, LOCK_EX);
};

function generateReport()
{
    $serializedData = file_get_contents(DB_NAME);
    $students = unserialize($serializedData);
    if (!$students) {
?>
        <div>
            <p>No Students To Show! Please <a href="/index.php?task=seed">Seed</a> First</p>
        </div>
    <?php
    } else {
    ?>
        <table>
            <tr>
                <th>Name</th>
                <th style="width: 25%; text-align: center;">Roll</th>
                <?php if (hasPrivilages()) : ?>
                    <th style="width: 25%;  text-align: center;">Action</th>
                <?php endif; ?>
            </tr>
            <?php
            foreach ($students as $student) {
            ?>
                <tr>
                    <td><?php printf('%s %s', $student['fname'], $student['lname']); ?></td>
                    <td style="text-align: center;"><?php printf('%s', $student['roll']); ?></td>
                    <?php if (isAdmin()) : ?>
                        <td style="text-align: center;"><?php printf('<a href="/index.php?task=edit&id=%s">Edit</a> | <a href="/index.php?task=delete&id=%s" >Delete</a>', $student['id'], $student['id']); ?></td>
                    <?php elseif (hasPrivilages()) : ?>
                        <td style="text-align: center;"><?php printf('<a href="/index.php?task=edit&id=%s">Edit</a> ', $student['id'], $student['id']); ?></td>
                    <?php endif; ?>
                </tr>
            <?php
            }
            ?>
        </table>
<?php
    }
}


function addStudents($fname, $lname, $roll)
{
    $students = unserialize(file_get_contents(DB_NAME));
    if (validRoll($students, $roll)) {
        array_push($students, array(
            'id' => count($students) + 1,
            'fname' => $fname,
            'lname' => $lname,
            'roll' => $roll
        ));
        file_put_contents(DB_NAME, serialize($students), LOCK_EX);
        return true;
    } else {
        return false;
    }
}

function updateStudent($id, $fname, $lname, $roll)
{
    // printf("Update Student Running: %s %s\n", $id, $roll);
    $students = unserialize(file_get_contents(DB_NAME));
    $index = -1;
    $duplicateRollIndex = -1;

    for ($i = 0; $i < count($students); $i++) {
        if ($students[$i]['id'] == $id) {
            $index = $i;
        }
        if ($students[$i]['roll'] == $roll) {
            if ($students[$i]['id'] != $id) {
                $duplicateRollIndex = $i;
            }
        }
    }

    if (($duplicateRollIndex >= 0 && $index === $duplicateRollIndex) || $duplicateRollIndex == -1) {
        $students[$index]['fname'] = $fname;
        $students[$index]['lname'] = $lname;
        $students[$index]['roll'] = $roll;
        file_put_contents(DB_NAME, serialize($students), LOCK_EX);
        return true;
    } else {
        return false;
    }
}

function deleteStudent($id)
{
    $students = unserialize(file_get_contents(DB_NAME));
    $filteredStudents = [];
    for ($i = 0; $i < count($students); $i++) {
        if ($students[$i]['id'] != $id) {
            array_push($filteredStudents, $students[$i]);
        }
    }
    file_put_contents(DB_NAME, serialize($filteredStudents), LOCK_EX);
    return true;
}

function getStudent($id)
{
    $students = unserialize(file_get_contents(DB_NAME));
    foreach ($students as $student) {
        if ($student['id'] == $id) {
            return $student;
        }
    }
    return false;
}


function validRoll($students, $roll)
{
    foreach ($students as $student) {
        if ($student['roll'] == $roll) {
            return false;
        }
    }
    return true;
}


function isAdmin()
{
    if (isset($_SESSION['role'])) {
        if ($_SESSION['role'] != null) {
            return ('admin' == $_SESSION['role']);
        }
    }
    return false;
}

function hasPrivilages()
{
    if (isset($_SESSION['role'])) {
        if ($_SESSION['role'] != null) {
            return ('admin' == $_SESSION['role'] || 'editor' == $_SESSION['role']);
        }
    }
    return false;
}
