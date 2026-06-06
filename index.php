<?php
$x_start = -4;        // нач знач арг
$encounting = 20;     // кол-во  выч зна
$step = 2;            // Шаг изм арг
$type = 'D';          // Тип 

$min_value = -100;      
$max_value = 10000;   
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Трушников Михаил | 241-353 | ЛР № 2 | Вариант 10</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

    <header>
        <img src="logo.png" alt="Логотип университета">
        <div>
            <strong>Студент:</strong> Трушников Михаил | 
            <strong>Группа:</strong> 241-353 | 
            <strong>ЛР:</strong> № 2 | 
            <strong>Вариант:</strong> 10
        </div>
    </header>

    <main>
        <h3>Табулирование математической функции (Вариант 10)</h3>
        <?php
        $max_f = null;
        $min_f = null;
        $sum = 0;
        $valid_count = 0; 

        $x = $x_start; 

        // теги
        switch ($type) {
            case 'B': echo '<ul>'; break;
            case 'C': echo '<ol>'; break;
            case 'D': echo '<table><tr><th>№ итерации</th><th>Аргумент (x)</th><th>Функция f(x)</th></tr>'; break;
            case 'E': echo '<div class="layout-e-container">'; break;
        }

        for ($i = 0; $i < $encounting; $i++) {
            
            // фкнция
            if ($x <= 10) {
                if ($x == 0) {
                    $f = 'error'; // дел на ноль в дроби 3/x
                } else {
                    $f = 3 / $x + $x / 3 - 5;
                }
            } elseif ($x > 10 && $x < 20) {
                $f = ($x - 7) * ($x / 8);
            } else { // x >= 20
                $f = 3 * $x + 2;
            }

            if ($f !== 'error') {
                $f = round($f, 3);
            }

            // break
            if ($f !== 'error' && ($f >= $max_value || $f < $min_value)) {
                
                break; 
            }

            switch ($type) {
                case 'A': 
                    echo 'f(' . $x . ')=' . $f . '<br>'; 
                    break;
                case 'B': 
                case 'C': 
                    echo '<li>f(' . $x . ')=' . $f . '</li>'; 
                    break;
                case 'D': 
                    echo '<tr><td>' . ($i + 1) . '</td><td>' . $x . '</td><td>' . $f . '</td></tr>'; 
                    break;
                case 'E': 
                    echo '<div class="layout-e-block">f(' . $x . ')=' . $f . '</div>'; 
                    break;
            }

            // макс мин сум
            if ($f !== 'error') {
                $sum += $f;
                $valid_count++;
                
                if ($max_f === null || $f > $max_f) { $max_f = $f; }
                if ($min_f === null || $f < $min_f) { $min_f = $f; }
            }

            $x += $step;
        }

        switch ($type) {
            case 'B': echo '</ul>'; break;
            case 'C': echo '</ol>'; break;
            case 'D': echo '</table>'; break;
            case 'E': echo '</div>'; break;
        }

        echo "<h4>Статистика вычислений:</h4>";
        if ($valid_count > 0) {
            $avg = round($sum / $valid_count, 3);
            echo "<p>Максимальное значение: <b>$max_f</b></p>";
            echo "<p>Минимальное значение: <b>$min_f</b></p>";
            echo "<p>Сумма всех значений: <b>$sum</b></p>";
            echo "<p>Среднее арифметическое: <b>$avg</b></p>";
        } else {
            echo "<p>Нет данных для расчета статистики.</p>";
        }
        ?>
    </main>

    <footer>
        Тип верстки на данной странице: <strong><?php echo $type; ?></strong>
    </footer>

</body>
</html>