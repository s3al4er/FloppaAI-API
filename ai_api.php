<?php

// Функция для получения ответа на вопрос
function getAnswer($question)
{
    // Загрузка содержимого файла с вопросами и ответами
    $data = file_get_contents('quesans.txt');

    // Разделение строк файла по переводу строки
    $lines = explode("\n", $data);

    // Поиск соответствующего ответа на вопрос
    foreach ($lines as $line) {
        list($ques, $ans) = explode('::', $line);

        // Проверка соответствия вопроса
        if (trim($ques) == trim($question)) {
            return trim($ans);
        }
    }

    // Если ответ не найден
    return 'Извините, ответ на ваш вопрос не найден.';
}

// Получение вопроса из параметра URL
$question = isset($_GET['ques']) ? $_GET['ques'] : '';

if ($question) {
    // Получение ответа
    $response = getAnswer($question);

    // Вывод ответа
    echo $response;
} else {
    // Если параметр "ques" отсутствует
    echo "Пожалуйста, укажите вопрос в параметре 'ques'.";
}
?>
