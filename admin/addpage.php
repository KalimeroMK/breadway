<? require_once 'header.php';
require_once'conf/conf.php'; ?>
<div class="container">
    <form action="process/processpage.php" method="post" >
        <div class="form-group">
            <label for="inputNaslov"><?php echo PAGE_NAME ; ?> </label>
            <input type="text" class="form-control" id="inputNaslov" placeholder="<?php echo ENTER_TITLE; ?>" name="pagetitle">
        </div>
        <br />
        <div class="form-group">
            <textarea name="rte" class="ckeditor"></textarea>
        </div>
        <button type="submit" class="btn btn-default"><?php echo SUBMIT; ?></button>
    </form>  
    <table class="table col-md-12">
        <tr>
            <th><?php echo PAGE_TITLE; ?></th><th><?php echo PAGE_TEXT; ?></th><th><?php echo DELETE_PAGE; ?></th>
        </tr>
        <?php
        echo'<div class="col-md-8">';
        $pageid = $_GET['page'];
        $sql = mysqli_query($con, "SELECT * FROM pages");
        while ($row = mysqli_fetch_array($sql)) {
            echo '<tr><td>'.$row['pagetitle'].'</td><td><pre>'.$row['pagerte'].'</pre></td><td>
            <form action="process/deletepage.php" method="post">
                <input type="hidden" value="'.$row['pageid'].'" name="pageid" />
                <button type="submit" class="btn btn-danger btn-xs">'.DELETE.'</button>
            </form>
            <br />
            <form action="editpage.php" method="post">
                <input type="hidden" value="'.$row['pageid'].'" name="pageid" />
                <button type="submit" class="btn btn-warning btn-xs">'.EDIT.'</button>
            </form>
        </td></tr>';
        echo'</div>';
    }
    ?>
</table>
</div>
<? require_once 'footer.php'; ?>