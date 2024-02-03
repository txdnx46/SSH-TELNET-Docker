<!DOCTYPE html>
<html>
<head>
    <title>Port Checker</title>
</head>
<body>
    <h2>Port Checker</h2>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="host">Enter Hostname or IP:</label>
        <input type="text" id="host" name="host" required>
        <br>
        <label for="port">Enter Port Number:</label>
        <input type="text" id="port" name="port" required>
        <br>
        <button type="submit">Check Port</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $host = $_POST['host']; // รับค่า IP หรือ Hostname จากฟอร์ม
        $port = $_POST['port']; // รับค่าพอร์ตจากฟอร์ม

        function checkPort($host, $port) {
            $connection = @fsockopen($host, $port);
            if (is_resource($connection)) {
                fclose($connection);
                return true;
            } else {
                return false;
            }
        }

        if (checkPort($host, $port)) {
            echo "Port $port is open";
        } else {
            echo "Port $port is closed";
        }
    }
    ?>
</body>
</html>
