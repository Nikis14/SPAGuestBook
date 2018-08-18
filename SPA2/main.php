<!-- Для создания одностраничного сайта используется HTML и CSS-->
<html>
<head>
    <title>Гостевая книга</title>
    <link rel="stylesheet" href="css/main.css" />
    
</head>
<body>
    <p align="center" style="color:#00008B; font-size:28pt; font-family:Times New Roman; font-weight: 600">Гостевая книга</p>
    <div class="wrapper">
        <menu id="menu">
            <a href="/spa2/index.php#main" data-menu="main" data-link="ajax">На главную страницу</a>
            <a href="/spa2/index.php#show" data-menu="show" data-link="ajax">Перейти к записям</a>
            <a href="/spa2/index.php#add" data-menu="add" data-link="ajax">Добавить запись</a>
        </menu>
    </div>
    
    <div class = "page" id ="main">
        <p style="font-family:Times New Roman; font-size:18; font-weight: 600">Уважаемый пользователь!</p>
        <p style="font-family:Times New Roman; font-size:16">Перед Вами гостевая книга. В ней Вы можете посмотреть записи и отзывы, оставленные другими пользователями о различных Интернет-ресурсах, а также добавить собственные записи.</p>
        <p style="font-family:Times New Roman; font-size:16">Приятной работы!</p>
    </div>
    
    <div class = "page" id ="show">
        <table align="center" border="1" width="80%" cellpadding="5">
            <?php
            $file = fopen("db.txt", 'r');
            while(!feof($file))
            {?>
            <tr>
                <td><?php echo fgets($file)."<br>".fgets($file); ?></td>
                <td align="center"><?php echo fgets($file)."<br>".fgets($file); ?></td>
                <td align="center">
                    <?php
                    $count_str = fgets($file);
                    for($x = 0; $x < (int)$count_str-1; ++$x)
                    {
                        echo fgets($file).'<br>';
                    }
                    echo fgets($file);?>
                </td>
            </tr> 
            <?php 
            } 
            fclose($file);?>
        </table>
    </div>
    
    <div class = "page" id ="add">
        <div class = "add-form">
            <form action="#" method="POST">
                <fieldset>
                    <center><p class="header" >Новая запись</p></center>
                    <div class = "main">
                        <div class = "record-form">
                            <div class="field">
                                <label for="first_name">Имя</label>
                                <input type="text" name="first_name" required>
                            </div>
                            <div class = "field">
                                <label for="last_name">Фамилия</label>
                                <input type="text" name="surname" required>
                            </div>
                            <div class = "field">
                                <label for="email">E-mail</label>
                                <input type="email" name="email" required>
                            </div>

                            <p><b>Введите ваш отзыв</b></p>
                            <p><textarea name = "comment" cols = 30></textarea></p>


                            <div class="buttons">
                                <input type="submit" name = "submit" class="b1" value="Добавить">
                            </div>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>

</body>
</html>