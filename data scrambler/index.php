<?php
include_once "functions.php";
$task = 'encode';
if (isset($_GET['task']) && $_GET['task'] != '') {
    $task = $_GET['task'];
}

$key = "abcdefghijklmnopqrstuvwxyz1234567890";
if ('key' == $task) {
    $key_original = str_split($key);
    shuffle($key_original);
    $key = join('', $key_original);
} elseif (isset($_POST['key']) && $_POST['key'] != '') {
    $key = $_POST['key'];
}

$scrabled_data = '';
if ('encode' == $task) {
    $data = $_POST['data'] ?? '';
    if ($data != '') {
        $scrabled_data = scrableData($data, $key);
    }
}

if ('decode' == $task) {
    $data = $_POST['data'] ?? '';
    if ($data != '') {
        $scrabled_data = decodeData($data, $key);
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/style.css">
    <title>Data Scrambler</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col">
                <h2>Data Scrambler</h2>
                <p>Use The Application To Scramble Your Data</p>
                <p>
                    <a href="/?task=encode">Encode</a>
                    <a href="/?task=decode">Decode</a>
                    <a href="/?task=key">Generate Key</a>
                </p>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <form method="POST" action="index.php<?php if ('decode' == $task) {
                                                            echo "?task=decode";
                                                        } ?>">
                    <p>
                        <label for="key">Key</label> <br>
                        <input type="text" name="key" id="key" <?php displayKey($key); ?>>
                    </p>
                    <p>
                        <label for="data">Text</label>
                        <br>
                        <textarea rows="5" name="data" id="data"><?php if (isset($_POST['data'])) {
                                                                        echo $_POST['data'];
                                                                    } ?></textarea>
                    </p>
                    <p>
                        <label for="result">Result</label>
                        <br>
                        <textarea rows="5" name="result" id="result"><?php echo $scrabled_data; ?></textarea>
                    </p>

                    <div>
                        <button type="submit">Submit</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</body>

</html>