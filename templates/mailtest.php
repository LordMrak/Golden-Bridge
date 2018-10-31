<?
echo 
// Читаем настройки config
require_once('lib/phpmailer/config.php');

// Подключаем класс FreakMailer
require_once('templates/FreakMailer.php');

// инициализируем класс
$mailer = new FreakMailer();

// Устанавливаем тему письма
$mailer->Subject = 'Это тест';

// Задаем тело письма
$mailer->Body = 'Это тест моей почтовой системы!';

// Добавляем адрес в список получателей
$mailer->AddAddress('tarakan_2003@mail.ru', 'Suck UP!');

if(!$mailer->Send())
{
  echo 'Не могу отослать письмо!';
}
else
{
  echo 'Письмо отослано!';
}
$mailer->ClearAddresses();
$mailer->ClearAttachments();
?>