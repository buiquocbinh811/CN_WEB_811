<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kết quả kiểm tra</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h1 class="text-center">Kết quả kiểm tra</h1>
    <?php
    // Đường dẫn đến tệp câu hỏi
    $filename = "questions.txt";

    // Đọc tệp câu hỏi
    $questions = file($filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    $currentQuestion = [];
    $answers = [];
    foreach ($questions as $line) {
        if (strpos($line, "Câu") === 0) {
            if (!empty($currentQuestion)) {
                $answers[] = substr(end($currentQuestion), -1); // Lấy đáp án cuối cùng
            }
            $currentQuestion = [$line];
        } else {
            $currentQuestion[] = $line;
        }
    }
    if (!empty($currentQuestion)) {
        $answers[] = substr(end($currentQuestion), -1);
    }

    // Tính điểm
    $score = 0;
    foreach ($_POST as $key => $value) {
        $questionIndex = (int)filter_var($key, FILTER_SANITIZE_NUMBER_INT);
        if (isset($answers[$questionIndex]) && $answers[$questionIndex] === $value) {
            $score++;
        }
    }

    // Hiển thị kết quả
    echo "<div class='alert alert-success text-center'>";
    echo "<p>Bạn đã trả lời đúng <strong>$score</strong>/" . count($answers) . " câu.</p>";
    echo "</div>";
    ?>
    <div class="text-center">
        <a href="index.php" class="btn btn-primary">Làm lại</a>
    </div>
</div>
</body>
</html>
