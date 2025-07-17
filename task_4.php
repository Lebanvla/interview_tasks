<?php
$text = <<<TXT
<p class="big">
	Год основания:<b>1589 г.</b> Волгоград отмечает день города в <b>2-е воскресенье сентября</b>. <br>В <b>2023 году</b> эта дата - <b>10 сентября</b>.
</p>
<p class="float">
	<img src="https://www.calend.ru/img/content_events/i0/961.jpg" alt="Волгоград" width="300" height="200" itemprop="image">
	<span class="caption gray">Скульптура «Родина-мать зовет!» входит в число семи чудес России (Фото: Art Konovalov, по лицензии shutterstock.com)</span>
</p>
<p>
	<i><b>Великая Отечественная война в истории города</b></i></p><p><i>Важнейшей операцией Советской Армии в Великой Отечественной войне стала <a href="https://www.calend.ru/holidays/0/0/1869/">Сталинградская битва</a> (17.07.1942 - 02.02.1943). Целью боевых действий советских войск являлись оборона  Сталинграда и разгром действовавшей на сталинградском направлении группировки противника. Победа советских войск в Сталинградской битве имела решающее значение для победы Советского Союза в Великой Отечественной войне.</i>
</p>
TXT;

function is_punct_or_space($symbol): bool {
    return preg_match('/[\p{P}\s]/u', $symbol);
}
$output = "";
$chars = mb_str_split($text);
$in_tag = false;
$word_count = 0;
$in_word = false;
$last_word_is_30 = false;

for ($i = 0; $i < count($chars); $i++) {

    $char = $chars[$i];
    $output .= $char;
    // Обработка тегов
    if ($char === '<') {
        $in_tag = true;
        continue;
    } elseif ($char === '>') {
        $in_tag = false;
        continue;
    }

    // Пропускаем обработку внутри тегов
    if ($in_tag) {
        continue;
    }

    // Логика подсчета слов
    if (is_punct_or_space($char)) {
        if ($in_word) {
            $word_count++;
            $in_word = false;
        }
    } else {
        // Начало слова, если предыдущий символ - разделитель или это первый символ
        if ($i === 0 || !$in_word && is_punct_or_space($chars[$i - 1])) {
            $in_word = true;
        }
    }
    if($word_count === 30){
        $last_word_is_30 = true;
        break;
    }
}

// Учет последнего слова
if ($in_word && !$last_word_is_30) {
    $word_count++;
}

$dom = new DOMDocument();
libxml_use_internal_errors(true); // Игнорировать ошибки парсинга

$dom->loadHTML('<?xml encoding="UTF-8">' . $output, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
$output = $dom->saveHTML();

echo $output . "...";

?>