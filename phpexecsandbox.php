<?php
$output = '';
$error = '';
$code = '';  // Initialize $code to an empty string

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $code = $_POST['code'] ?? '';

    if ($code !== '') {
        // Set a timeout in seconds (adjust as needed)
        $timeout = 5;

        // Create a temporary file to store code
        $tempFile = tempnam(sys_get_temp_dir(), 'execsandbox');
        file_put_contents($tempFile, $code);

        // Execute the code with a timeout
        $command = "timeout {$timeout}s php -f {$tempFile}";
        $output = shell_exec($command);

        // Check for errors
        if ($output === null) {
            $error = "Execution timed out after {$timeout} seconds.";
        }

        // Remove the temporary file
        unlink($tempFile);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Exec Sandbox</title>

    <style>
        body {
            font-family: 'Courier New', monospace;
            display: flex;
            flex-direction: column;
            height: 100vh;
            margin: 0;
        }

        #panels-container {
            display: flex;
            flex: 1;
        }

        #input-panel,
        #output-panel {
            flex: 1;
            overflow: auto;
            padding: 10px;
            box-sizing: border-box;
            background-color: #000;
            color: #00ff00;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }

        #input-code {
            width: 100%;
            height: 100%;
            background-color: #000;
            color: #00ff00;
            border: 1px solid #00ff00;
        }

        #output {
            white-space: pre-wrap;
        }

        #run-code-btn {
            margin-top: 10px;
            padding: 8px 16px;
            background-color: #00ff00;
            color: #000;
            border: none;
            cursor: pointer;
            font-size: 16px;
            border-radius: 4px;
        }

        footer {
            text-align: center;
            color: #00ff00;
            padding: 10px;
            background-color: #000;
        }
    </style>
</head>
<body>
    <div id="panels-container">
        <div id="input-panel">
            <h1>PHP Exec Sandbox</h1>
            <form method="post" action="">
                <label for="input-code">Enter PHP Code:</label>
                <textarea id="input-code" name="code" rows="10" required><?php echo htmlspecialchars($code, ENT_QUOTES, 'UTF-8'); ?></textarea>
                <br>
                <button id="run-code-btn" type="submit">Run Code</button>
            </form>
        </div>

        <div id="output-panel">
            <?php if ($error !== ''): ?>
                <h2>Error:</h2>
                <pre id="output"><?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?></pre>
            <?php elseif ($output !== ''): ?>
                <h2>Output:</h2>
                <pre id="output"><?php echo htmlspecialchars($output, ENT_QUOTES, 'UTF-8'); ?></pre>
            <?php endif; ?>
        </div>
    </div>

    <!-- Copyright notice in the footer -->
    <footer>
        &copy; <?php echo date('Y'); ?> Captain Nobody.
    </footer>
</body>
</html>
