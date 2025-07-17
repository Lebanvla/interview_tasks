<?php
/**
 * Функция, которая оборачивает содержимое в html-теги
 * @param string $content содержимое, которое оборачивается в тег
 * @param string $tag тег, который используется для обёртки. Необходимо писать имя тега
 * @param string $attributes свойства тега. Необходимо передавать полностью в виде строки
 * @return string
 */
function wrap_tag(string $content, string $tag, string $attributes=''){
    if($attributes === ''){
        return "<$tag>$content</$tag>";
    }
    return "<$tag $attributes>$content</$tag>";
    
}
$data = [
	['Иванов', 'Математика', 5],
	['Иванов', 'Математика', 4],
	['Иванов', 'Математика', 5],
	['Петров', 'Математика', 5],
	['Сидоров', 'Физика', 4],
	['Иванов', 'Физика', 4],
	['Петров', 'ОБЖ', 4],
];

$students = [];
$subjects = [];

// Помещаем данные об оценках студентов в массив, также ведём учёт предметов
foreach($data as $line ){
    if(!isset($students[$line[0]])){
        $students[$line[0]] = [];
    }

    if(!in_array($line[1], $subjects)){
        $subjects[] = $line[1];
    }

    if(!isset($students[$line[0]][$line[1]])){
        $students[$line[0]][$line[1]] = $line[2];
    }
    else{
        $students[$line[0]][$line[1]] += $line[2];
    }
}
ksort($students);
sort($subjects);

$first_row = wrap_tag('', 'td');
// Формируем первую строку таблицы, которая содержит отсортированные имена предметов
foreach($subjects as $subject){
    $first_row = $first_row . wrap_tag($subject, "td");
}
$first_row = wrap_tag($first_row, "tr");
?>
