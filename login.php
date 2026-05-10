<?php
// POST verilerini güvenli alıyoruz
$email = isset($_POST['email']) ? $_POST['email'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';

// Mailden öğrenci numarasını çekiyoruz (b2412100001@sakarya.edu.tr -> b2412100001)
$parts = explode('@', $email);
$studentNo = $parts[0];

// Ödevdeki doğrulama kuralı: 
// Kullanıcı adı tam mail, şifre ise sadece öğrenci numarası olacak.
if ($email === $studentNo . "@sakarya.edu.tr" && $password === $studentNo && !empty($studentNo)) {
    // BAŞARILI GİRİŞ
    echo "<!DOCTYPE html>
    <html lang='tr'>
    <head>
        <meta charset='UTF-8'>
        <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css' rel='stylesheet'>
        <title>Başarılı</title>
        <style>
            body { background: #f8f9fa; height: 100vh; display: flex; align-items: center; justify-content: center; font-family: sans-serif; }
            .msg-card { background: white; padding: 40px; border-radius: 20px; box-shadow: 0 10px 30px rgba(0,0,0,0.1); text-align: center; }
        </style>
    </head>
    <body>
        <div class='msg-card'>
            <h1 class='text-success fw-bold'>Hoşgeldiniz $studentNo</h1>
            <p class='text-muted mt-2'>Başarıyla giriş yaptınız.</p>
            <a href='index.html' class='btn btn-dark mt-3'>Anasayfaya Git</a>
        </div>
    </body>
    </html>";
} else {
    // HATALI GİRİŞ: Uyarı ver ve giriş sayfasına geri gönder (Döküman kuralı)
    echo "<script>
            alert('Hatalı giriş yaptınız veya alanları boş bıraktınız!');
            window.location.href = 'login.html';
          </script>";
}
?>