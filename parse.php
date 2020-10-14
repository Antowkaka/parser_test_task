<?php

require_once 'config.php';
$rss = simplexml_load_file('http://www.ixbt.com/export/news.rss');

foreach ($rss->channel->item as $item) {

    $post_to_db_query = "INSERT INTO 'content' ('post_title', 'post_content', 'post_image', 'post_category') VALUES ('$item->title', '$item->description')";
    $title = $item->title;
    $description = $item->description;
    $regexp = "/<br><br>\n\t\t<a href=\".{1,}\">Комментировать<\/a>\n\t\t<br><br>/" ;
    $description = preg_replace($regexp,'', $description);
    echo "<article><h2>". $title. "</h2><p>". $description . "</p></article>";
}

function sendEmail(){
    $send = mail (
        $admin_email,
        'Статья на News Parser',
        'Опубликована новая статья на сайте News Parser.',
        "Content-type:text/plain; charset = utf-8\r\nFrom:<NewsParser.com>"
    );
}