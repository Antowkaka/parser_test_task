<?php

<<<<<<< HEAD
require_once 'config.php';
=======
//$doc = new DOMDocument;
//$content_rss = file_get_contents('https://www.liga.net/news/sport/rss.xml');
//$items_rss = new SimpleXmlElement($content_rss);


//echo $rss->channel->title;

//foreach ($items_rss->channel->item as $key => $item_rss) {
//
/*    preg_match_all('/type="?\'?image\/jpg"?\'?>\surl="?\'?([^"\']+)"?\'?[^>]*>\/?/i', $item_rss->description, $images);*/
//    $link = preg_replace('/[a-z]+\.liga\.net/', 'sports.ru', $item_rss->link);
//
//    echo '<img src="' . $item_rss->enclosure['url'] . '"><br>';
//    echo '<h2>' . $item_rss->title . '</h2>';
//    echo '<p>' . $item_rss->description . '</p><br>';
//    echo 'Статья по ссылке: ' . '<a href="' . $item_rss->link . '">' . $link . '</a>';
//    echo '<hr>';
//}
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

>>>>>>> 9a7cfc6a9d29535db8801bf2565350d4b10e59c8
$rss = simplexml_load_file('http://www.ixbt.com/export/news.rss');

foreach ($rss->channel->item as $item) {

    if (!checkRepeater($database, $item->title) && checkCategory($item->description))
    {
        $category = checkCategory($item->title);
        $post_to_db_query = "INSERT INTO content (`post_title`, `post_content`, `category`) VALUES ('$item->title', '$item->description', '$category')";
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
<<<<<<< HEAD

function sendEmail(){
    $send = mail (
        $admin_email,
        'Статья на News Parser',
        'Опубликована новая статья на сайте News Parser.',
        "Content-type:text/plain; charset = utf-8\r\nFrom:<NewsParser.com>"
    );
}
=======
>>>>>>> 9a7cfc6a9d29535db8801bf2565350d4b10e59c8
