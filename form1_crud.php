<?php 
	include 'connect.php';
	if(isset($_POST['opslaan'])){
		$naam=$_POST['naam_student'];
		$klas=$_POST['klas'];
		$minuten=$_POST['te-laat'];
		$reden=$_POST['reden_student'];

		$sql = "INSERT INTO studenten1 (naam, klas, minuten, reden) VALUES ('$naam','$klas','$minuten','$reden')";
		$conn->exec($sql);
    if ($conn){
      header('location:tabel.php');
  }
	}

  
?>

<!-- form for late students -->
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>overzicht melding</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
   
    <main style="width: 600px; margin: 20px auto;">
        <h4 style="text-align:center;">Nieuwe melding te late student</h4>
        <div class="container">
        <form method="post" >
            <div class="form-group">
                <label for="naam_student">Naam student</label>
                <input type="text" class="form-control" id="naam_student" name="naam_student" required>
            </div>
            <div class="form-group">
                <label for="klas">Klas</label>

                <select class="form-control" id="klas" name="klas">
                    <option>2A</option><option>2B</option><option>2C</option><option>2D</option>                </select>
            </div>
            <div class="form-group">
                <label for="aantal_minuten">Aantal minuten te laat</label>

                <input type="number" class="form-control" id="aantal-minuten-te-laat" name="te-laat" required>
           </div>
            <div class="form-group">
                <label for="reden_student">Reden te laat komen:</label>
                <textarea class="form-control" rows="5" id="reden_student" name="reden_student"></textarea>
            </div>
            <button type="submit" class="btn btn-success" name="opslaan">Opslaan</button>
            </div>
        </form>
    </main>
</div>
  </body>
</html>