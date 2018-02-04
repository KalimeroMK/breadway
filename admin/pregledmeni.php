<?php require_once 'header.php'; ?>
<div class="container">
<table class="table table-hover">

    <tr><td>Име</td><td>Цена</td><td>Опис </td><td>Датум </td><td>Избриши </td><td>Промени </td><td>Прегледај </td></tr>

    <?php
   
    $sql = mysqli_query($con, "SELECT * FROM meni");
    if (mysqli_connect_errno($con)) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    while ($row = mysqli_fetch_array($sql)) {
        echo "<tr>";
        echo '<td>' . $row['name'] . '</td>';
        echo '<td>' . $row['cena'] . '</td>';
        echo '<td>' . $row['type'] . '</td>';
        echo '<td>' . $row['date'] . '</td>';
     
        echo '<td> <form action="process/deletemeni.php" method="post"><input type="hidden" name="id" value="' . $row['id'] . '"  /><button class="btn btn-danger btn-xs" type="submit">Избриши</button></form></td>';
        echo '<td> <form action="updatemeni.php" method="post"><input type="hidden" name="id" value="' . $row['id'] . '"  /><button class="btn btn-warning btn-xs" type="submit">Промени</button></form></td>';
        echo '<td> <form action="viewarticle.php" method="get"><input type="hidden" name="id" value="' . $row['id'] . '"  /><button class="btn btn-success btn-xs" type="submit">Прегледај</button></form></td>';
        echo "</tr>";
    }
    ?>
</table>
</div>
<?php require_once 'footer.php'; ?>
