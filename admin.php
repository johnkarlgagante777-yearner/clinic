<?php 
    include 'db.php';

    $sql = "SELECT * FROM patients";
    $result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patients Tracker</title>
    <link rel="stylesheet" href="style1.css">
</head>
<body>
    <header>
        <div class = "content">
           <h1>Clinic Queue Monitor</h1>
            <div class = "btn-grp">
                <button class="add">+ Add Patient</button>
                <a class="admin" href="home.php">Admin Panel</a>
            </div>
        </div>
    </header>

    <section>
    <div class="table">
        <div class="table-content">
            <table>
                <thead>
                    <tr>
                        <th>Patient ID</th>
                        <th>Patient Name</th>
                        <th>Symptoms</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>           
                <tbody>
                    <?php 
                if($result && $result -> num_rows > 0){
                    while($patient = $result -> fetch_assoc()){
                ?>     
                    <tr>
                        <td><?php echo $patient['patient_id']; ?></td>
                        <td><?php echo $patient['patient_name']; ?></td>
                        <td><?php echo $patient['symptom']; ?></td>
                        <td><?php echo $patient['status']; ?></td>
                        <td>
                            <div class = "btn-grp">
                            <a href="process.php">Serving</a>
                            <a href="process.php">Done</a>
                            <a href="process.php?delete=<?php echo $patient['patient_id']; ?>">Archive</a>
                            </div>
                        </td>
                    </tr>
                </tbody>
                   <?php 
        }
        }else{
            echo("NO PATIENTS");
        }
        $conn->close();
        ?>
            </table>
        </div>  
    </div>
</section>

    <form id = "patientForm" action = "process.php" method = "POST">
        <div class="form-content">
            <div class="form-head">
                <h1>Patient</h1>
                <button>X</button>
            </div>

            <div class = "form-grp">
                <label for="name">Patient Name: 
                    <input type="text"
                    id="name"
                    name="name"
                    placeholder="Enter Patient Name"
                    required>
            </div>

            <div class = "form-grp">
                <label for="symptom">Symptom:</label>
                    <textarea 
                    name="symptom" 
                    id="symptom"
                    placeholder="e.g Fever and cough"
                    value = ""
                    required>
                    </textarea>
            </div>

             <div class = "form-grp" >
                <label for="status"></label>
                <select name="status" id="status">
                <option value="Waiting">Waiting</option>
                <option value="Done">Done</option>
                <option value="Serving">Serving</option>
            </select>
            </div>

            <p id = "Error"></p>

            <div class = "form-grp">
               <button >Cancel</button>
               <button type = "submit" id = "add_patient" name = "add_patient">Submit</button>
            </div>
        </div>
    </form>

</body>
</html>