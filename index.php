<?php
require_once 'helpers.php';
$is_auth = rand(0, 1);

function pruning($word_content, $limit = 300){
    $words = explode(" ", $word_content);
    $length = 0;
    $counter = 0;
    $word_total = array();
    foreach($words as $word){
        $length += mb_strlen($word);
        array_push($word_total, $word);
        $counter++;
        if($length > $limit){
            $word_content = implode(' ',$word_total);
            $word_content .= '...<br><a class="post-text__more-link" href="#">Читать далее</a>';
            break;
        }
        if($counter === count($words)){
            $word_content = implode(' ',$word_total);
            break;
        }
    }
    return $word_content;
}

$card_posts = [
    [
        'title' => 'Цитата',
        'type' => 'post-quote',
        'content' => 'Мы в жизни любим только раз, а после ищем лишь похожих',
        'name' => 'Лариса',
        'avatar' => 'userpic-larisa-small.jpg'
    ],
    [
        'title' => 'Игра престолов',
        'type' => 'post-text',
        'content' => 'Не могу дождаться начала финального сезона своего любимого сериала!',
        'name' => 'Владик',
        'avatar' => 'userpic.jpg'
    ],
    [
        'title' => 'Наконец, обработал фотки!',
        'type' => 'post-photo',
        'content' => 'rock-medium.jpg',
        'name' => 'Виктор',
        'avatar' => 'userpic-mark.jpg'
    ],
    [
        'title' => 'Моя мечта',
        'type' => 'post-photo',
        'content' => 'coast-medium.jpg',
        'name' => 'Лариса',
        'avatar' => 'userpic-larisa-small.jpg'
    ],
    [
        'title' => 'Лучшие курсы',
        'type' => 'post-link',
        'content' => 'www.htmlacademy.ru',
        'name' => 'Владик',
        'avatar' => 'userpic.jpg'
    ]

];

$user_name = 'Arsen';
    
        $page_content = include_template('../templates/main.php', ['card_posts' => $card_posts]);

        $layout_content = include_template('../templates/layout.php', ['content' => $page_content, 'title' => 'Главная','is_auth' => $is_auth]);

        print($layout_content);


?>

