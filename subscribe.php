<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["newsletter"])) {
    $email = $_POST["newsletter"];
    
    // Валидация адреса электронной почты
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Если адрес недействителен, выведите сообщение об ошибке
        echo "Некорректно введен адрес электронной почты.";
    } else {
        // Настройка параметров письма
        $to = $email; // Отправить письмо на введенный адрес электронной почты
        $subject = 'Подписка на новостную рассылку';
        $message = "Спасибо за подписку на нашу рассылку!";
        $headers = 'From: noreply@example.com' . "rn" .
            'X-Mailer: PHP/' . phpversion();
        
        // Отправка письма
        mail($to, $subject, $message, $headers);
        
        echo "Спасибо за подписку!";
    }
} else {
    // Если форма не была отправлена, выводим сообщение об ошибке или возвращаемся к форме
    echo "Пожалуйста, зарегистрируйтесь через форму подписки.";
}
?>