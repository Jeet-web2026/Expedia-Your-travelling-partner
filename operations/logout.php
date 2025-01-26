<?php
session_start();
if (session_status() === PHP_SESSION_ACTIVE && !empty($_SESSION)) {
    session_unset();
    if (session_destroy()) {
        echo "Logout successfully!";
    } else {
        echo "Failed to log out!";
    }
} else {
    echo "You are not logged in.";
}
