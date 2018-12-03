<?php
header('Content-Type: text/html; charset=utf-8');
$correctNumbers = [
    '84951234567',  '+74951234567', '8-495-1-234-567',
    ' 8 (8122) 56-56-56', '8-911-1234567', '8 (911) 12 345 67',
    '8-911 12 345 67', '8 (911) - 123 - 45 - 67', '+ 7 999 123 4567',
    '8 ( 999 ) 1234567', '8 999 123 4567'
];

$incorrectNumbers = [
    '02', '84951234567 позвать люсю', '849512345', '849512345678',
    '8 (409) 123-123-123', '7900123467', '5005005001', '8888-8888-88',
    '84951a234567', '8495123456a',
    '+1 234 5678901', /* неверный код страны */
    '+8 234 5678901', /* либо 8 либо +7 */
    '7 234 5678901' /* нет + */
];

$regex = '/^ *(\\+ *7|8)([-() ]*[0-9]){10}$/';

function checkNumbers($numbers, $regex)
{
    foreach ($numbers as $number)
    {
        echo "$number - ";
        if (preg_match($regex, $number))
        {
            echo "верно - ";

            $number = preg_replace("/[-() ]/", "", $number);
            $number = preg_replace("/^\\+7/", "8", $number);
            echo $number;
        }
        else
        {
            echo "не верно";
        }
        echo "</br>";
    }
}

echo "Правильные номера телефонов:</br>";
checkNumbers($correctNumbers, $regex);
echo "</br>Не правильные номара талефонов:</br>";
checkNumbers($incorrectNumbers, $regex);