<?php require_once 'header.php'; ?>

<form action="process/addregion.php" method="post" >
    <label for="reon">Додади реон</label>
    <input type="text" name="reon" id="reon" class="form-control" />
    <br />
    <textarea class="ckeditor" name="rte"></textarea>

    <label for="youtube">Youtube Link</label>
    <input type="text" name="youtube" class="form-control" id="youtube" />

    <br />    <br />
    <button type="submit" class="btn btn-success pull-right" id="submit"><span class="glyphicon glyphicon-check"> </span> Додади</button>
    <br />
</form>

<br /><br />


<table class="table">

    <tr>
        <th>Реон</th><th>Избриши</th>
    </tr>


    <?php
    require_once 'conf/conf.php';

    $sql = mysqli_query($con, "SELECT * FROM region");
    if (mysqli_connect_errno($con)) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    while ($row = mysqli_fetch_array($sql)) {
        echo "<tr>";
        echo '<td> ' . $row['region_name'] . '</td>';
        echo '<td><form action="process/deleteregion.php" method="post"><input type="hidden" name="reon" value="' . $row['reg_id'] . '" /><button type="submit" class="btn btn-danger btn-sm">Избриши</button></form></td>';
        echo "</tr>";
    }
    ?>

</table>
<?php require_once 'footer.php'; ?>

