<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="./js/main.js" defer></script>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">
    <title>Document</title>
</head>

<body>

    <div class="container">
        <?
        if (isset($_POST['reg'])) {
            $email = $_POST['email'];
            $name = $_POST['name'];
            $number = $_POST['number'];

            $errEmail = checkEmail($email);
            $errName = checkName($name);
            $errNumber = checkNumber($number);

            if ($errEmail == NULL && $errName == NULL && $errNumber == NULL) {
                $reg = '<p class="text">регистрация прошла успешно</p>';
            } else {
                $reg = '';
            }
        }
        ?>
        
        <div class="regForm">
            <form class="reg" method="POST">
                <h1 class="text">Регистрация</h1>
                <div class="regInput">
                    <input type="text" class="inputName" placeholder="name" name="name">
                    <div class="errorName">
                        <?= $errName ?>
                    </div>
                </div>
                <div class="regInput">
                    <input type="text" class="regInput" placeholder="email" name="email">
                    <div class="errorEmail">
                        <?= $errEmail ?>
                    </div>
                </div>
                <div class="regInput">
                    <input type="number" class="regInput" placeholder="number" name="number">
                    <div class="errorNumber">
                        <?= $errNumber ?>
                    </div>
                </div>
                <button class="btn" name="reg">Зарегистрироваться</button>
                <div class="reg_result">
                    <?= $reg ?>
                </div>
            </form>
           
        </div>
    </div>
</body>

</html>

<?
function checkEmail($email)
{
    $count = iconv_strlen($email);
    if (empty($email)) {
        $error = '<p class="error">*введите email</p>';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = '<p class="error">*неверный формат почты</p>';
    } elseif ($count > 40) {
        $error = '<p class="error">*максимальное количество символов 40</p>';
    }
    return $error;
}
function checkName($name)
{
    $count = iconv_strlen($name);
    if (empty($name)) {
        $error = '<p class="error">*введите имя</p>';
    } elseif ($count > 12) {
        $error = '<p class="error">*слишком длинное имя</p>';
    }
    return $error;
}
function checkNumber($num)
{
    $count = iconv_strlen($num);
    if (empty($num)) {
        $error = '<p class="error">*введите номер телефона</p>';
    } elseif ($count != 11) {
        $error = '<p class="error">*введите 11 символов</p>';
    }
    return $error;
}
?>