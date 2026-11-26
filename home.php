<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patients Tracker</title>
    <link rel="stylesheet" href="style2.css">
</head>
<body>
    <header>
        <div class = "content">
           <h1>Clinic Queue Monitor</h1>
            <div class = "btn-grp">
                <button class="add">+ Add Patient</button>
                <a class="admin" href="admin.php">Admin Panel</a>
            </div>
        </div>
    </header>
<?php 
    include 'db.php';

    $sql1 = "SELECT * FROM patients where status = 'Waiting'";
    $waiting = $conn->query($sql1);

    $sql2 = "SELECT * FROM patients where status = 'Done'";
    $done = $conn->query($sql2);

    $sql3 = "SELECT * FROM patients where status = 'Serving'";
    $serving = $conn->query($sql3);
?>

    <div class = "table-grp">
        <div class = "table-content">
            <div class = "tables">
                <h1>Done</h1>
    <table border = "1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            </tr>
            <?php while ($patient = $done -> fetch_assoc()){ ?>
            <tr>
                <td><?php echo $patient['patient_id']; ?></td>
                <td><?php echo $patient['patient_name']; ?></td>
            </tr>
            <?php }?>
    </table>
</div>
    <div class = "tables">
    <h1>Waiting</h1>
    <table border = "1">
        <tr>
            <th>ID</th>
            <th>Name</th>
        </tr>
            <?php while ($patient = $waiting -> fetch_assoc()){ ?>
            <tr>
                <td><?php echo $patient['patient_id']; ?></td>
                <td><?php echo $patient['patient_name']; ?></td>
            </tr>
            <?php }?>
    </table>
</div>

    <div class = "tables">
        <h1>Serving</h1>
    <table border = "1">
        <tr>
            <th>ID</th>
            <th>Name</th>
        </tr>
            <?php while ($patient = $serving -> fetch_assoc()){ ?>
            <tr>
                <td><?php echo $patient['patient_id']; ?></td>
                <td><?php echo $patient['patient_name']; ?></td>    
            </tr>
            <?php }?>
</div>
    </table>
    </div>
    </div>
</body>
        <script src = "script.js" defer></script>
</html>