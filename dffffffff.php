<?php
if (isset($_POST['submit'])) {
    // رابط الطلب
    $url = 'https://api.telegram.org/bot6889028993:AAF6k21E9ZKMZ8SH-WDxVl8P9AHOcljMHmE/sendMessage';
    
    // بيانات الطلب
    $chatId = '5694585021';
    $text = 'Hello World';
    
    // بناء بيانات الطلب
    $data = array(
        'chat_id' => $chatId,
        'text' => $text
    );
    
    // إعداد الخيارات للطلب
    $options = array(
        'http' => array(
            'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
            'method'  => 'POST',
            'content' => http_build_query($data),
        ),
    );
    
    // إنشاء سياق البيانات
    $context = stream_context_create($options);
    
    // إرسال الطلب واستلام الاستجابة
    $response = file_get_contents($url, false, $context);
    
    // التحقق من الاستجابة
    if ($response !== false) {
        echo "تم تنفيذ الرابط بنجاح!";
    } else {
        echo "حدث خطأ أثناء تنفيذ الرابط.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">

    <title>تنفيذ الرابط عند الضغط على زر إرسال</title>
</head>
<body>
    <h2>اضغط على زر "إرسال" لتنفيذ الرابط:</h2>
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <input type="submit" name="submit" value="إرسال">
    </form>
</body>
</html>