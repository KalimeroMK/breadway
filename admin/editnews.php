<?php require_once 'header.php'; ?>



<div class="clearfix"><br /></div>

<?php  

$id = $_POST['id'];
        

    $sql = mysqli_query($con, "SELECT * FROM profesori WHERE id = $id");
    if (mysqli_connect_errno($con)) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    while ($row = mysqli_fetch_array($sql)) {



        echo '
        

<div class="form-group">
    <form action="process/profesoriupdate.php" method="post" >
    
<input type="hidden" name="id" value="'.$id.'" />
    
        <label for="naslov">Внесете наслов на "артиклот" (Село Небрегово, Манастир Св. Ѓорѓија,...):</label>
        <input type="text" name="naslov" class="form-control" id="naslov" value="'.$row['naslov'].'">

        <br />
        <textarea class="ckeditor" name="rte">'.$row['rte'].'</textarea>
  

        <div class="clearfix"><br /></div>

        <button type="submit" class="pull-right btn btn-success"> <span class="glyphicon glyphicon-check"></span> Додади  </button>
    </form>
</div>';
}
?>        

<?php require_once 'footer.php'; ?>
