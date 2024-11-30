<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Câu hỏi trắc nghiệm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1 class="text-center">Câu hỏi trắc nghiệm</h1>
    <form action="result.php" method="post">
        <?php
        // Đọc dữ liệu từ file
        $filename = "questions.txt";
        $questions = file($filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        $current_question = [];
        $number = 0;

        foreach ($questions as $line) {
            if (strpos($line, "Câu") === 0) {
                if (!empty($current_question)) {
                    // Hiển thị câu hỏi trước
                    echo "<div class='card mb-4'>";
                    echo "<div class='card-header'><strong>{$current_question[0]}</strong></div>";
                    echo "<div class='card-body'>";
                    for ($i = 1; $i <= 4; $i++) {
                        $answer = substr($current_question[$i], 0, 1);
                        echo "<div class='form-check'>";
                        echo "<input class='form-check-input' type='radio' name='question{$number}' value='{$answer}' id='question{$number}{$answer}'>";
                        echo "<label class='form-check-label' for='question{$number}{$answer}'>{$current_question[$i]}</label>";
                        echo "</div>";
                    }
                    echo "</div>";
                    echo "</div>";
                    $current_question = [];
                }
                $number++;
            }
            $current_question[] = $line;
        }

        // Hiển thị câu hỏi cuối cùng
        if (!empty($current_question)) {
            echo "<div class='card mb-4'>";
            echo "<div class='card-header'><strong>{$current_question[0]}</strong></div>";
            echo "<div class='card-body'>";
            for ($i = 1; $i <= 4; $i++) {
                $answer = substr($current_question[$i], 0, 1);
                echo "<div class='form-check'>";
                echo "<input class='form-check-input' type='radio' name='question{$number}' value='{$answer}' id='question{$number}{$answer}'>";
                echo "<label class='form-check-label' for='question{$number}{$answer}'>{$current_question[$i]}</label>";
                echo "</div>";
            }
            echo "</div>";
            echo "</div>";
        }
        ?>
        <button type="submit" class="btn btn-primary">Nộp bài</button>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>