<?php
$dataFile = 'data.json';

// Đọc dữ liệu hiện tại (nếu có)
$currentData = file_exists($dataFile) ? json_decode(file_get_contents($dataFile), true) : [];

// Lấy dữ liệu mới từ JS
$input = json_decode(file_get_contents('php://input'), true);

if (!$input) {
  http_response_code(400);
  echo json_encode(['status' => 'error', 'message' => 'Không có dữ liệu gửi lên']);
  exit;
}

// Ghi đè toàn bộ dữ liệu
file_put_contents($dataFile, json_encode($input, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
echo json_encode(['status' => 'success']);
?>
