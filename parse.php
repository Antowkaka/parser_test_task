<?php

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

$rss = simplexml_load_file('http://www.ixbt.com/export/news.rss');


foreach ($rss->channel->item as $item) {
    $title = $item->title;
    $description = $item->description;
    $regexp = "/<br><br>\n\t\t<a href=\".{1,}\">Комментировать<\/a>\n\t\t<br><br>/" ;
    $description = preg_replace($regexp,'', $description);

    echo "<article><h2>". $title. "</h2><p>". $description . "</p></article>";
    echo "";
}