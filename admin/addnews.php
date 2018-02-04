<?php require_once 'header.php'; ?>
<div class="form-group">
    <form id="file_attachment_slider" method="post" enctype="multipart/form-data" action="javascript:void(0);" autocomplete="on">
        <label><?php echo BROWSE; ?> </label><input type="file" name="browsed_file" id="browsed_file" class="btn btn-warning">
        <a href="javascript:void(0);" onclick="slider_form_script();" class="btn btn-info" required><?php echo UPLOAD; ?></a> 
    </form>

    <form action="process/addnews.php" method="post" >
        <br />
        <div id="vpb_upload_status"></div>
        <br />




        <label for="naslov">Внесете наслов на новоста: </label>
        <input type="text" name="naslov" class="form-control" id="naslov">


        <label for="date">Изберете датум пр. 01/23/2014 (MM/DD/YYYY):</label>
        <input type="date" name="date" class="form-control" id="date">
        <br /><br />
        <textarea class="ckeditor" name="rte"></textarea>





        <div class="clearfix"><br /></div>

        <button type="submit" class="pull-right btn btn-success"> <span class="glyphicon glyphicon-check"></span> Додади  </button>
    </form>
</div>
  <table class="table col-md-12">
        <tr>
            <th><?php echo PAGE_TITLE; ?></th><th><?php echo PAGE_TEXT; ?></th><th><?php echo DELETE_PAGE; ?></th>
        </tr>
        <?php
        echo'<div class="col-md-8">';
        $news_id = $_GET['page'];
        $sql = mysqli_query($con, "SELECT * FROM profesori");
        while ($row = mysqli_fetch_array($sql)) {
            echo '<tr><td>'.$row['naslov'].'</td><td><pre>'.$row['rte'].'</pre></td><td>
            <form action="process/deletenews.php" method="post">
                <input type="hidden" value="'.$row['id'].'" name="id" />
                <button type="submit" class="btn btn-danger btn-xs">'.DELETE.'</button>
            </form>
            <br />
            <form action="editnews.php" method="post">
                <input type="hidden" value="'.$row['id'].'" name="id" />
                <button type="submit" class="btn btn-warning btn-xs">'.EDIT.'</button>
            </form>
        </td></tr>';
        echo'</div>';
    }
    ?>
</table>

<script>
function slider_form_script() 
{
	//alert('COOL');
	$("#file_attachment_slider").vPB({
		url: 'vpb_small_image.php',
		beforeSubmit: function() 
		{
			$("#vpb_upload_status").html('<div style="font-family: Verdana, Geneva, sans-serif; font-size:12px; color:black;" align="center">Please wait <img src="images/loadings.gif" align="absmiddle" title="Upload...."/></div><br clear="all">');
		},
		success: function(response) 
		{
			$("#vpb_upload_status").hide().fadeIn('slow').html(response);
		}
	}).submit(); 
}

</script>


<?php require_once 'footer.php'; ?>
