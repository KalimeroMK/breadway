<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<style> 
  p{
    margin-bottom: 7%;
    text-align: justify;
}
</style>
<?php
function get_rss_feed_as_html($feed_url, $max_item_cnt = 20, $show_date = true, $show_description = true, $max_words = 0, $cache_timeout = 7200, $cache_prefix = "/tmp/rss2html-")
{
  $result = "";
    //////////////////////////////////////////////// povlekuva podatoci od rss feed////////////////////////////////////////
  $rss = new DOMDocument();
  $cache_file = $cache_prefix . md5($feed_url);
    ////////////////////////////////////////////////// gi loadira /////////////////////////////////////////////////////
  if ($cache_timeout > 0 &&
    is_file($cache_file) &&
    (filemtime($cache_file) + $cache_timeout > time())) {
    $rss->load($cache_file);
} else {
  $rss->load($feed_url);
  if ($cache_timeout > 0) {
    $rss->save($cache_file);
}
}
$feed = array();
foreach ($rss->getElementsByTagName('item') as $node) {
  $item = array (
    'title' => $node->getElementsByTagName('title')->item(0)->nodeValue,
    'desc' => $node->getElementsByTagName('description')->item(0)->nodeValue,
    'content' => $node->getElementsByTagName('description')->item(0)->nodeValue,
    'link' => $node->getElementsByTagName('link')->item(0)->nodeValue,
    'date' => $node->getElementsByTagName('pubDate')->item(0)->nodeValue,
    );
  $content = $node->getElementsByTagName('encoded'); 
  if ($content->length > 0) {
    $item['content'] = $content->item(0)->nodeValue;
}
array_push($feed, $item);
}
    ///////////////////////////////////broj na postovi/////////////////////////////////////////////
if ($max_item_cnt > count($feed)) {
  $max_item_cnt = count($feed);
}
$result .= '<div class="container">';
$result .= '<div class="row">';
$result .= '<div class="col-md-9">';
for ($x=0;$x<$max_item_cnt;$x++) {
  $title = str_replace(' & ', ' &amp; ', $feed[$x]['title']);
  $link = $feed[$x]['link'];
  $result .= '<div class="thumbnail">';
  $result .= '<div style="text-align: center; " ><strong><a href="'.$link.'" title="'.$title.'">'.$title.'</a></strong></div>';
  $result .= '<br>';

  if ($show_date) {
    $data = date('l F d, Y', strtotime($feed[$x]['date']));
            //$result .= '<br><p class="pull-right">Posted on '.$date.'</p>';
}
if ($show_description) {
    $description = $feed[$x]['desc'];
    $content = $feed[$x]['content'];
            /////////////////////// bara slika/////////////////////////////////////////
    $has_image = preg_match('/<img.+src=[\'"](?P<src>.+?)[\'"].*>/i', $content, $image);
            // no html tags
    $description = strip_tags($description, '');
            // whether cut by number of words
    if ($max_words > 0) {
      $arr = explode(' ', $description);
      if ($max_words < count($arr)) {
        $description = '';
        $w_cnt = 0;
        foreach($arr as $w) {
          $description .= $w . ' ';
          $w_cnt = $w_cnt + 1;
          if ($w_cnt == $max_words) {
            break;
        }
    }
    $description .= " ...";
}
}
            //////////////////// ako postoi slika////////////////////////////////
if ($has_image == 1) {
  $description = '<img class="col-md-4" src="' . $image['src'] . '" />' . $description;
}
$result .= '<p>' . $description .'';
$result .= '<class="pull-right" ><a href="'.$link.'" title="'.$title.'"> Continue Reading &raquo;</a>'.'</p>';
		///////////////////////////// Insert vo Baza ////////////////////
$con = new mysqli("localhost", "rss", "simeon08", "rss1");
mysqli_query($con, "SET NAMES UTF8");

$stmt = $query = mysqli_query($con, "SELECT * FROM rss WHERE title ='".$title."'");

if(mysqli_num_rows($query) > 0){

      //echo "ja ima <br>";
}
else
{
  $stmt = $con->prepare("INSERT INTO rss (title, description, link, data) VALUES('$title', '$description', '$link', '$data')");
  $stmt->bind_param('ssss', $title, $description, $link, $data);
  $stmt->execute(); 
  $con->close();
		/////////////////////////////////////////////////////////////////
}
$result .= '</div>';

}
}
$result .= '<br>';
$result .= '</div>';
$result .= '</row>';
$result .= '</div>'; 
$result .= '</div>'; 

return $result;
}
function output_rss_feed($feed_url, $max_item_cnt = 20, $show_date = true, $show_description = true, $max_words = 0)
{
  echo get_rss_feed_as_html($feed_url, $max_item_cnt, $show_date, $show_description, $max_words);
}
?>
<?php
// output RSS feed to HTML
output_rss_feed('http://pravoslavie.mk/feed/', 20, true, true, 400);
?>