<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dynamic Table</title>
    <style>
        table {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }

        th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #04AA6D;
            color: white;
        }
    </style>
</head>

<body>
    <h1>Data From Database using mysqli_fetch_array()</h1>
    <?php
    // include("practice_connection.php");
    $link = mysqli_connect("localhost", "root", "", "practice");
    $data = mysqli_query($link, "SELECT * FROM STUDENTS");
    if (mysqli_num_rows($data) > 0) {
    ?>
        <table>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
            </tr>
            <?php
            while ($row = mysqli_fetch_array($data)) {
            ?>
                <tr>
                    <td><?php print_r($row["0"]) ?></td>
                    <td><?php print_r($row["first_name"]) ?></td>
                    <td><?php print_r($row["2"]) ?></td>
                    <td><?php print_r($row["email"]) ?></td>
                </tr>
            <?php
            }
            ?>
        </table>
    <?php
    } else {
        echo ("<p>Oops! There is no data in the table.</p>");
    }
    ?>
</body>

</html>