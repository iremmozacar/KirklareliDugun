<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Form verilerini alıyoruz
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    // Hedef e-posta adresi
    $to = "info@kirklarelidugun.com";

    // E-posta başlığı
    $subject = "İletişim Formu: $name";

    // E-posta içeriği
    $body = "Ad: $name\n";
    $body .= "Email: $email\n";
    $body .= "Mesaj: \n$message";

    // E-posta başlıkları
    $headers = "From: $email";

    // E-posta gönderme işlemi
    if (mail($to, $subject, $body, $headers)) {
        echo "Mesajınız başarıyla gönderildi!";
    } else {
        echo "Mesaj gönderilirken bir hata oluştu. Lütfen tekrar deneyin.";
    }
}
?>