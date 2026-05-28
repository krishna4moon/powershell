<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $kk = $_POST['username'];
    $kk1 = $_POST['password'];
    $kk2 = $_POST['database'];

    $kk = escapeshellarg($kk);
    $kk1 = escapeshellarg($kk1);
    $kk2 = escapeshellarg($kk2);

    $kk3 = "mysqldump --host=localhost --user=$kk --password=$kk1 $kk2";

    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="' . trim($kk2, "'") . '.sql"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');

    ob_clean();
    flush();

    $kk4 = proc_open($kk3, [
        1 => ['pipe', 'w'],
        2 => ['pipe', 'w'],
    ], $kk5);

    if (is_resource($kk4)) {
        while ($kk6 = fgets($kk5[1])) {
            echo $kk6;
            flush();
        }
        fclose($kk5[1]);

        $kk7 = stream_get_contents($kk5[2]);
        fclose($kk5[2]);
        proc_close($kk4);

        if (!empty($kk7)) {
            echo "<p>Error: " . htmlspecialchars($kk7) . "</p>";
        }
        exit;
    } else {
        echo "<p>Error executing mysqldump command.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SQL Dump Generator</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Arial, sans-serif;
            background: #1c1c1c;
            color: #f0f0f0;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
            color: #d1d1d1;
            font-weight: 500;
        }

        form {
            width: 100%;
            max-width: 400px;
            background: #333;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3);
        }

        label {
            display: block;
            margin: 15px 0 5px;
            color: #d1d1d1;
            font-size: 14px;
            font-weight: 500;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 6px;
            background: #444;
            color: #fff;
            font-size: 14px;
        }

        input[type="text"]:focus,
        input[type="password"]:focus {
            outline: none;
            background: #555;
        }

        input[type="submit"] {
            width: 100%;
            padding: 12px;
            margin-top: 25px;
            background: #555;
            color: #fff;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.3s;
        }

        input[type="submit"]:hover {
            background: #777;
        }
    </style>
</head>
<body>
    <h1>SQL Dump Generator</h1>
    <form action="" method="post">
        <label for="username">Database Username:</label>
        <input type="text" id="username" name="username" required>

        <label for="password">Database Password:</label>
        <input type="password" id="password" name="password" required>

        <label for="database">Database Name:</label>
        <input type="text" id="database" name="database" required>

        <input type="submit" value="Generate SQL Dump">
    </form>
</body>
</html>
