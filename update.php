<?php 
	include 'connect.php';

	$id = $_GET['updatid'];

	if(isset($_POST['update'])){
	    $naam = $_POST['naam_student'];
	    $klas = $_POST['klas'];
	    $minuten = $_POST['te-laat'];
	    $reden = $_POST['reden_student'];

	    $sql = "UPDATE studenten1 SET naam=:naam, klas=:klas, minuten=:minuten, reden=:reden WHERE id=:id";
	    $stmt = $conn->prepare($sql);

	    $stmt->bindParam(':naam', $naam);
	    $stmt->bindParam(':klas', $klas);
	    $stmt->bindParam(':minuten', $minuten);
	    $stmt->bindParam(':reden', $reden);
	    $stmt->bindParam(':id', $id);

	    if ($stmt->execute()) {
	        header("Location: tabel.php");
	    }
	}

	$sql = "SELECT * FROM studenten1 WHERE id=:id";
	$stmt = $conn->prepare($sql);
	$stmt->bindParam(':id', $id);
	$stmt->execute();
	$result = $stmt->fetch();

?>


<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Update Melding</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
	<main style="width: 600px; margin: 20px auto;">
		<h4 style="text-align:center;">Update melding te late student</h4>
		<div class="container">
			<form method="post">
				<div class="form-group">
					<label for="naam_student">Naam student</label>
					<input type="text" class="form-control" id="naam_student" name="naam_student" value="<?php echo $result['naam']; ?>" required>
				</div>
				<div class="form-group">
					<label for="klas">Klas</label>
					<select class="form-control" id="klas" name="klas">
						<option <?php if($result['klas']=="2A") echo 'selected="selected"'; ?>>2A</option>
						<option <?php if($result['klas']=="2B") echo 'selected="selected"'; ?>>2B</option>
						<option <?php if($result['klas']=="2C") echo 'selected="selected"'; ?>>2C</option>
						<option <?php if($result['klas']=="2D") echo 'selected="selected"'; ?>>2D</option>
					</select>
				</div>
				<div class="form-group">
					<label for="te-laat">Aantal minuten te laat</label>
					<input type="number" class="form-control" id="te-laat" name="te-laat" value="<?php echo $result['minuten']; ?>" required>
				</div>
				<div class="form-group">
					<label for="reden_student">Reden te laat komen:</label>
					<textarea class="form-control" rows="5" id="reden_student" name="reden_student"><?php echo $result['reden']; ?></textarea>
				</div>
				<button type="submit" class="btn btn-success" name="update">update</button>
            </div>
        </form>
    </main>
</div>
  </body>
</html>