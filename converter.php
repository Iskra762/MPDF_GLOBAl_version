<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once __DIR__ . '/vendor/autoload.php';
    // отримання даних з форми html
    $url = $_POST['url'];
    // Ініціальзація класу 
    $mpdf = new \Mpdf\Mpdf();
    // завантаження HTML контетну до pdf 
    $html = file_get_contents($url);
    $mpdf->WriteHTML($html);
    // збереження файлу
    $mpdf->Output('resultat.html', \Mpdf\Output\Destination::FILE);
    // відправлення для користувача 
    header('Contetn-Type: application/pdf');
    header('Content-Desposition: attacment; filename="resultat.html"');
    readfile('resultat.html');
    exit;
}
?>