<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = json_decode(file_get_contents('php://input'), true);

    if (isset($input['id'])) {
        $productId = $input['id'];

        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }

        if (!in_array($productId, $_SESSION['cart'])) {
            $_SESSION['cart'][] = $productId;
        }

        echo json_encode(['success' => true]);
        exit;
    }
}

echo json_encode(['success' => false]);
exit;
?>
