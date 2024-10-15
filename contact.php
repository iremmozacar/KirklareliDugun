<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Formdan gelen bilgileri değişkenlere alıyoruz
    $name = htmlspecialchars(trim($_POST['cf_name']));
    $email = htmlspecialchars(trim($_POST['cf_email']));
    $subject = htmlspecialchars(trim($_POST['cf_subject']));
    $message = htmlspecialchars(trim($_POST['cf_message']));

    // Gerekli alanların boş olup olmadığını kontrol et
    if (empty($name) || empty($email) || empty($subject) || empty($message)) {
        echo "Lütfen tüm alanları doldurunuz.";
        exit;
    }

    // Geçerli bir e-posta olup olmadığını kontrol et
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Geçerli bir e-posta adresi giriniz.";
        exit;
    }

    // Alıcı e-posta adresi
    $to = "info@kirklarelidugun.com"; 

    // E-posta başlıkları
    $headers = "From: $name <$email>\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

    // E-posta içeriği
    $email_body = "<h2>İletişim Formu Mesajı</h2>";
    $email_body .= "<p><strong>Ad:</strong> {$name}</p>";
    $email_body .= "<p><strong>E-posta:</strong> {$email}</p>";
    $email_body .= "<p><strong>Konu:</strong> {$subject}</p>";
    $email_body .= "<p><strong>Mesaj:</strong><br>{$message}</p>";

    // E-postayı gönderme
    if (mail($to, $subject, $email_body, $headers)) {
        echo "Mesajınız başarıyla gönderildi.";
    } else {
        echo "Mesaj gönderilirken bir hata oluştu.";
    }
}
?>