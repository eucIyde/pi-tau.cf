<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<h1 style='color:red'>Liste des utilisateurs ayant une médaille du mérite</h1>
<?php require('config.php');
//write sql query
$sql = "SELECT * FROM users WHERE medaille=1 ORDER BY nom ASC";
echo '<table class="table table-striped table-dark">';
echo '<thead>';
echo '<tr>';
echo '<th scope="col">Username</th>';
echo '<th scope="col">Nom</th>';
echo '<th scope="col">Prénom</th>';
echo '<th scope="col">Grade</th>';
echo '<th scope="col">Date de début de médaille</th>';
echo '<th scope="col">Date de fin de médaille</th>';

echo '</tr>';
//execute query
$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_assoc($result)) {
    $date=$row['date_medaille'];
    $month = substr($date, 4, 2);
    $year = substr($date, 0, 4);
    $month = $month + 6;
    if ($month > 12) {
        $month = $month - 12;
        $year = $year + 1;
    }
    if ($month < 10) {
        $month = '0' . $month;
    }
    $date = $year . $month . substr($date, 6, 2);
    $today=date('Ymd');
    if ($date < $today) {
        $medaille='non';
    }
    else{
        $medaille='oui';
    }
    echo '<tbody>';
    echo '<tr>';
    echo '<td>' . $row['username'] . '</td>';
    echo '<td>' . $row['nom'] . '</td>';
    echo '<td>' . $row['prenom'] . '</td>';
    $grade=$row['grade']+1;
    if ($medaille=='non'){$grade--;echo '<td style="color:red">' . $row['grade'].'+0=' .$grade.'</td>';}
    else{echo '<td style="color:green">' . $row['grade'].'+1=<p style="display:inline;background-color:white;font-size:large;margin:5px;">' .$grade. '</p></td>';}
    $date=$row['date_medaille'];
    //date sous la forme YYYYMMDD, mettre en DD/MM/YYYY
    $date = substr($date, 6, 2) . '/' . substr($date, 4, 2) . '/' . substr($date, 0, 4);
    echo '<td>' . $date . '</td>';
    //mettre cette date + 6 mois
    $date = substr($date, 6, 4) . substr($date, 2, 4) . substr($date, 0, 2);
    $date = strtotime($date);
    $date = strtotime("+6 month", $date);
    $date = date('d/m/Y', $date);
    echo '<td>' . $date . '</td>';
    //vérifier si la date est dépassée
    $date=$row['date_medaille'];
    $month = substr($date, 4, 2);
    $year = substr($date, 0, 4);
    $month = $month + 6;
    if ($month > 12) {
        $month = $month - 12;
        $year = $year + 1;
    }
    if ($month < 10) {
        $month = '0' . $month;
    }
    $date = $year . $month . substr($date, 6, 2);
    $today=date('Ymd');
    if ($date < $today) {
        echo '<td style="color:red">Médaille expirée</td>';
        $medaille='non';
    } else {
        echo '<td style="color:green">Médaille en cours</td>';
    }
    echo '</tr>';
}
echo '</tbody>';
echo '</table>';

?>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
