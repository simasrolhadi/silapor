<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type');

// Ambil data dari request
$input = json_decode(file_get_contents('php://input'), true);

if (!$input) {
    http_response_code(400);
    echo json_encode(['error' => 'Invalid input']);
    exit;
}

$app_name = $input['app'] ?? '';
$user = $input['user'] ?? 'Anonymous';

// Log aktivitas (bisa disimpan ke database)
$log_entry = [
    'timestamp' => date('Y-m-d H:i:s'),
    'user' => $user,
    'app' => $app_name,
    'action' => 'app_click'
];

// Simpan ke file log (atau database)
file_put_contents('app_clicks.log', json_encode($log_entry) . "\n", FILE_APPEND);

// Response berdasarkan aplikasi yang diklik
$response = [
    'success' => true,
    'message' => "App '{$app_name}' clicked by {$user}",
    'timestamp' => date('Y-m-d H:i:s'),
    'redirect' => null
];

// Redirect berdasarkan aplikasi
switch($app_name) {
    case 'Phone':
        $response['redirect'] = 'phone.php';
        break;
    case 'Messages':
        $response['redirect'] = 'messages.php';
        break;
    case 'Settings':
        $response['redirect'] = 'settings.php';
        break;
    default:
        $response['message'] = "App '{$app_name}' not implemented yet";
}

echo json_encode($response);
?>
