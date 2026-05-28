<?php
$kk = __DIR__;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['action'])) {
        $kk1 = $_POST['action'];
        $kk2 = isset($_POST['items']) ? $_POST['items'] : [];
        $kk3 = isset($_POST['zip_file_name']) ? trim($_POST['zip_file_name']) : 'archive.zip';

        $kk3 = preg_replace('/[^a-zA-Z0-9_-]/', '_', $kk3) . '.zip';

        switch ($kk1) {
            case 'zip':
                if (!empty($kk2)) {
                    $kk4 = $kk3;
                    $kk5 = new ZipArchive();
                    if ($kk5->open($kk4, ZipArchive::CREATE | ZipArchive::OVERWRITE) !== TRUE) {
                        die("Cannot open <$kk4>\n");
                    }
                    foreach ($kk2 as $kk6) {
                        $kk7 = $kk . '/' . $kk6;
                        if (file_exists($kk7)) {
                            if (is_dir($kk7)) {
                                $kk8 = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($kk7), RecursiveIteratorIterator::SELF_FIRST);
                                foreach ($kk8 as $kk9) {
                                    $kk10 = $kk9->getRealPath();
                                    $kk11 = str_replace($kk . '/', '', $kk10);
                                    if ($kk9->isDir()) {
                                        $kk5->addEmptyDir($kk11);
                                    } else {
                                        $kk5->addFile($kk10, $kk11);
                                    }
                                }
                            } else {
                                $kk5->addFile($kk7, $kk6);
                            }
                        }
                    }
                    $kk5->close();
                    echo "Files and folders have been zipped into <a href='$kk4' style='color: #ff9900;'>$kk4</a>.<br>";
                }
                break;

            case 'delete':
                foreach ($kk2 as $kk6) {
                    $kk7 = $kk . '/' . $kk6;
                    if (file_exists($kk7)) {
                        if (is_dir($kk7)) {
                            $kk12 = new RecursiveIteratorIterator(
                                new RecursiveDirectoryIterator($kk7, RecursiveDirectoryIterator::SKIP_DOTS),
                                RecursiveIteratorIterator::CHILD_FIRST
                            );
                            foreach ($kk12 as $kk9) {
                                $kk10 = $kk9->getRealPath();
                                if ($kk9->isDir()) {
                                    rmdir($kk10);
                                } else {
                                    unlink($kk10);
                                }
                            }
                            rmdir($kk7);
                        } else {
                            unlink($kk7);
                        }
                    }
                }
                echo "Selected files and folders have been deleted.<br>";
                break;

            case 'rename':
                $kk13 = isset($_POST['new_names']) ? $_POST['new_names'] : [];
                foreach ($kk2 as $kk14 => $kk6) {
                    $kk7 = $kk . '/' . $kk6;
                    if (isset($kk13[$kk14]) && file_exists($kk7)) {
                        $kk15 = basename($kk13[$kk14]);
                        $kk16 = $kk . '/' . $kk15;
                        rename($kk7, $kk16);
                    }
                }
                echo "Selected files and folders have been renamed.<br>";
                break;
        }
    }
}

$kk17 = array_diff(scandir($kk), array('..', '.'));
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Manager</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #1c1c1c;
            color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        h1, h2 {
            color: #d1d1d1;
        }

        h1 {
            text-align: center;
            margin-top: 20px;
        }

        h2 {
            margin-top: 20px;
        }

        form {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
            background: #333;
            border-radius: 8px;
        }

        input[type="text"], input[type="submit"], button {
            padding: 10px;
            border: none;
            border-radius: 5px;
            margin: 5px 0;
        }

        input[type="text"] {
            width: calc(100% - 24px);
        }

        input[type="submit"], button {
            background-color: #555;
            color: #fff;
            cursor: pointer;
        }

        input[type="submit"]:hover, button:hover {
            background-color: #777;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #444;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        tr:nth-child(even) {
            background-color: #2c2c2c;
        }

        tr:nth-child(odd) {
            background-color: #1c1c1c;
        }

        label {
            color: #d1d1d1;
        }

        button {
            background-color: #444;
            color: #fff;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: #666;
        }

        input[type="checkbox"] {
            accent-color: #f0f0f0;
        }
    </style>
    <script>
        function toggleCheckboxes(kk18) {
            var kk19 = document.querySelectorAll('input[name="items[]"]');
            kk19.forEach(function(kk20) {
                kk20.checked = kk18;
            });
        }
    </script>
</head>
<body>
    <h1>File Manager</h1>
    <form action="" method="post">
        <h2>Select Files and Folders</h2>
        <button type="button" onclick="toggleCheckboxes(true)">Select All</button>
        <button type="button" onclick="toggleCheckboxes(false)">Unselect All</button>
        <br><br>

        <?php foreach ($kk17 as $kk6): ?>
            <input type="checkbox" name="items[]" value="<?php echo htmlspecialchars($kk6); ?>"> <?php echo htmlspecialchars($kk6); ?><br>
        <?php endforeach; ?>
        <br>

        <label for="zip_file_name">Zip File Name:</label>
        <input type="text" id="zip_file_name" name="zip_file_name" placeholder="Enter zip file name (without .zip)" required>
        <br><br>

        <input type="submit" name="action" value="zip">
        <input type="submit" name="action" value="delete">
        <input type="submit" name="action" value="rename">
        <br><br>

        <?php if (isset($_POST['action']) && $_POST['action'] == 'rename'): ?>
            <h2>Rename Files and Folders</h2>
            <?php foreach ($kk17 as $kk14 => $kk6): ?>
                <input type="text" name="new_names[]" placeholder="New name for <?php echo htmlspecialchars($kk6); ?>"><br>
            <?php endforeach; ?>
        <?php endif; ?>
    </form>
</body>
</html>
