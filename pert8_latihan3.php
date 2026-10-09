<?php
function repeat($text, $num = 10)
{
    echo "<ol>\r\n";
    for ($i = 0; $i < $num; $i++) {
        echo "<li>$text</li>\r\n";
    }
    echo "</ol>";
}

// Memanggil fungsi dengan dua argumen (diulang 15 kali)
repeat("I'm the best", 15);

// Memanggil fungsi dengan satu argumen (otomatis default 10 kali)
repeat("You're the man");
?>