<?php 

include 'connect.php';

if(isset($_GET['deleteid'])){
    $id=$_GET['deleteid'];

    echo "<script>
        var result = confirm('ben je zeker dat wil je deze verwijderen?');
        if(result){
            window.location.href = 'delete.php?confirmed=yes&id=$id';
        } else {
            window.location.href = 'tabel.php';
        }
    </script>";

}
//if they are sure to delete this item
if(isset($_GET['confirmed']) && $_GET['confirmed'] == 'yes'){
    $id=$_GET['id'];

    $sql="DELETE FROM studenten1 WHERE id = $id";
    $conn->exec($sql);

    if ($conn){
        header('location:tabel.php');
    }
}
?>