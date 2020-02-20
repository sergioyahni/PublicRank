<?php
session_start();

// remove all session variables
session_unset();

// destroy the session
session_destroy();

echo json_encode(array('message' => 'Logout Success',));
