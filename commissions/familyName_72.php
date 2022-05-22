<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        .output {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            margin: 8px;
        }

        .output td, .output th {
            border: 1px solid #ddd;
            padding: 4px;
            font-size: 14px;
            text-align: center;
            width: 75px;
        }

        .output tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .output tr:hover {
            background-color: #ddd;
        }


        .output th {
            padding-top: 8px;
            padding-bottom: 8px;
            background-color: #50cc93;
            color: white;
            font-size: 12px;
            text-align: center;
        }

        .table-div {
            display: flex;
            flex-wrap: wrap;
        }

        .zui-table {
            border: solid 1px #DDEEEE;
            border-collapse: collapse;
            border-spacing: 0;
            font: normal 13px Arial, sans-serif;
        }

        .zui-table thead th {
            background-color: #DDEFEF;
            border: solid 1px #DDEEEE;
            color: #336B6B;
            padding: 8px;
            text-align: left;
            text-shadow: 1px 1px 1px #fff;
        }

        .zui-table tbody td {
            border: solid 1px #DDEEEE;
            color: #333;
            padding: 8px;
            text-shadow: 1px 1px 1px #fff;
        }

        .zui-table-highlight-all {
            overflow: hidden;
            z-index: 1;
        }

        .zui-table-highlight-all tbody td, .zui-table-highlight-all thead th {
            position: relative;
        }

        .zui-table-highlight-all tbody td:hover::before {
            background-color: #CCE7E7;
            content: '\00a0';
            height: 100%;
            left: -5000px;
            position: absolute;
            top: 0;
            width: 10000px;
            z-index: -1;
        }

        .zui-table-highlight-all tbody td:hover::after {
            background-color: #CCE7E7;
            content: '\00a0';
            height: 10000px;
            left: 0;
            position: absolute;
            top: -5000px;
            width: 100%;
            z-index: -1;
        }

        .zui-table-highlight-all td:hover {
            background: #70e8e8;
        }
    </style>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<form method="post">
    <input type="number" name="input" value="<?php if (isset($_POST['input'])){
        echo $_POST['input'];
    } ?>">
    <input type="submit" name="submit" value="multiply">
    table toggle
    <input type="checkbox" name="type" <?php if (isset($_POST['type'])) {
        echo "checked='checked'";
    } ?>>
</form>
<div class="table-div">
    <?php
    if (isset($_POST['submit'])) {
        $n = $_POST['input'];
        if (!isset($_POST['type'])) {
            for ($i = 1; $i <= $n; $i++) {
                echo "<table class='output'>  
                  <tr>
                  <th>multiplier</th>
                  <th>multiplicand</th>
                  <th>product</th>
                  </tr>";

                for ($j = 1; $j <= $n; $j++) {
                    echo "<tr>";
                    echo "<td> $i </td> <td> $j </td> <td>" . ($i * $j) . "</td>";
                    echo "</tr>";
                }
                echo "</table>";
            }
        } else {
            echo "<table class='zui-table zui-table-highlight-all'>";
            for ($i = 1; $i <= $n; $i++) {
                $k = 0;
                $k = $i;
                echo "<tr>";
                for ($j = 1; $j <= $n; $j++) {
                    echo "<td class='col$j'>" . $j * $k . "</td>";
                }
                echo "</tr>";
            }
            echo "</table>";
        }
    }

    ?>
</div>
</body>
</html>