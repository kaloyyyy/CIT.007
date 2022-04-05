<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Temperature</title>
    <style>
        * {
            box-sizing: border-box;
        }
        .row {
            display: flex;
            margin-left:-5px;
            margin-right:-5px;
        }
        .column {
            padding: 1px;
        }
        table {
            border-collapse: collapse;
            border-spacing: 0;
            border: 1px solid #ddd;
        }
        th, td {
            text-align: left;
            padding: 5px;
            min-width: 100px;
        }
        td:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <div class="row">
        <?php
        echo "<div class='column'><table>
        <tr>
        <td>Celsius</td>
        <td>Fahrenheit</td>
        </tr>";
        foreach (range(0, 15) as $cel) {
            $far = (($cel*9/5)+32);
            echo "<tr>
            <td>".$cel." °C</td>
            <td>".$far." °F</td>
            </tr>";
        }
        echo "</table></div>";
        $i = 16;
        $j = $i+16;
        foreach (range(16,100,27)as $cel){
            echo "<div class='column'><table>";
            foreach (range($i, $j) as $cel) {
                $far = (($cel*9/5)+32);
                echo "<tr>
                <td>".$cel." °C</td>
                <td>".$far." °F</td>
                </tr>";
                $i++;
                $j++;
            }
            echo "</table></div>";
        }
        ?>
    </div>
</body>
</html>