<?php
require_once '../../classes/vicepresSubOffices.class.php';
require_once '../../classes/honorifics.class.php';

$honorificsObj = new Honorifics();

if (isset($_POST['submit'])) {
    $office = $_POST['office'];
    $office_head = $_POST['office_head'];
    $office_of_vp_in = $_POST['office_of_vp_in'];
    $honorifics_id = $_POST['honorifics']; // Get the selected honorifics ID

    $vicepresSubOfficesObj = new VicePresSubOffices();

    // Assuming `add_official()` accepts name and title as parameters
    if ($vicepresSubOfficesObj->add_official($office, $office_head, $office_of_vp_in, $honorifics_id)) {
        echo "Official added successfully!";
        header('Location: ../../sample-admin/Home');
    } else {
        echo "Failed to insert into the database.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Officials</title>
    <link rel="stylesheet" href="../../css/insert.css">
</head>
<body>
    <div class="header">
        <img src="../../images/WMSU-Logo.png" alt="WMSU Logo" class="logo">
        <div class="title">WMSU ADMIN</div>
    </div>
    <h1>VICE PRESIDENT’S SUBOFFICES</h1>

    <div class="container">
        <form action="" method="post">
            <div class="form-group">
                <label for="office">Office</label>
                <input type="text" name="office" id="office" required>
            </div>

            <div class="form-group">
    <label for="honorifics">Honorifics</label>
    <select name="honorifics" id="honorifics" required>
        <option value="">Select a Honorifics</option>
        <?php
            $honorific = $honorificsObj->fetchHonorifics();
            foreach ($honorific as $honorifics){
        ?>
            <option value="<?= $honorifics['id'] ?>"><?= htmlspecialchars($honorifics['name']) ?></option>
        <?php
            }
        ?>
    </select>
</div>

            <div class="form-group">
                <label for="office_head">Office Head</label>
                <input type="text" name="office_head" id="office_head" required>
            </div>

            <div class="form-group">
                <label for="office_of_vp_in">Office of Vice President in</label>
                <input type="text" name="office_of_vp_in" id="office_of_vp_in" required>
            </div>

            <button type="submit" name="submit" class="submit-btn">Submit</button>
        </form>
        <a href="../../sample-admin/Home" class="back-link">Back to Administration</a>
    </div>
    
</body>
</html>
