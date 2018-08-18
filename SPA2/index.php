<?php header('Content-Type: text/html; charset=UTF-8');
error_reporting(~E_ALL);

//Название файла с данными
$filename = "db.txt";
if(isset($_POST['submit']))
{
    //Получаем данные из формы
    $date_today = explode(".", date("m.d.Y.G.i.s")); 
    $name = trim($_POST['first_name']);
    $surname = trim($_POST['surname']);
    $email = trim($_POST['email']);
    
    //В данных хранятся данные из формы (ФИ, е-mail и сам комментарий)
    //А также количество строк в комментарии
    $comment = trim($_POST['comment']);
    
    $com_arr = explode("<br>", $comment);
    
    unset($_POST['submit']);
    
    //Новая запись в виде строки
    $str = $date_today[1].".".$date_today[0].".".$date_today[2]."\n".$date_today[3].":".$date_today[4].":".$date_today[5]."\n".$name." ".$surname."\n".$email."\n".count($com_arr)."\n".$comment."\n";
    
    //Создаем новый файл, записываем в него новую запись вместе со старыми, удаляем старый файл, переименовываем новыц
    $file = file_get_contents($filename);
    $new_file = file_put_contents("2".$filename, $str.$file);
    unlink("db.txt");
    rename("2".$filename, $filename);
    //После заполнения пользователем формы переходим на страницу с записями
    header('Location: http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'].'#show'); exit();
} 
require_once("main.php");