<?php
// Read the CSV file
$csvFile = 'KTPM2.csv';
$data = [];

if (($handle = fopen($csvFile, 'r')) !== FALSE) {
    while (($row = fgetcsv($handle, 1000, ',')) !== FALSE) {
        $data[] = $row;
    }
    fclose($handle);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CSV Data Table</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>CSV Data Table</h1>
    <table>
        <thead>
            <tr>
                <?php
                // Display table headers
                if (!empty($data)) {
                    foreach ($data[0] as $header) {
                        echo "<th>{$header}</th>";
                    }
                }
                ?>
            </tr>
        </thead>
        <tbody>
            <?php
            // Display table rows
            for ($i = 1; $i < count($data); $i++) {
                echo "<tr>";
                foreach ($data[$i] as $cell) {
                    echo "<td>{$cell}</td>";
                }
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>