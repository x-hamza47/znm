<?php
require_once 'crud.php';

// Start the session
SessionController::startSession();

// Destroy the session
SessionController::destroySession();

header("Location: http://localhost/znm/admin/index.php");
exit;
?>