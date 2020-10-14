<?php
require_once 'config.php';

function checkRepeater($db, $post_title) {
    $query = "SELECT * FROM content WHERE `post_title` LIKE '$post_title'";
    $query_res = mysqli_query($db, $query) or die("Error" . mysqli_error($db));
    return boolval(mysqli_fetch_array($query_res));
}

function checkCategory($content) {
    if (stristr($content, 'apple'))
    {
        return 'apple';
    } elseif (stristr($content, 'google'))
    {
        return 'google';
    } else
    {
        return false;
    }
}

$rss = simplexml_load_file('http://www.ixbt.com/export/news.rss');


foreach ($rss->channel->item as $item) {

    if (!checkRepeater($database, $item->title) && checkCategory($item->description))
    {
        $category = checkCategory($item->title);
        $post_to_db_query = "INSERT INTO content (`post_title`, `post_content`, `post_category`) VALUES ('$item->title', '$item->description', '$category')";
        mysqli_query($database, $post_to_db_query) or die("Error" . mysqli_error($database));
        $title = $item->title;
        $description = $item->description;
        $regexp = "/<br><br>\n\t\t<a href=\".{1,}\">Комментировать<\/a>\n\t\t<br><br>/" ;
        $description = preg_replace($regexp,'', $description);

        echo "<article><h2>". $title. "</h2><p>". $description . "</p></article>";
        echo "";
    } else
    {
        continue;
    }
}
