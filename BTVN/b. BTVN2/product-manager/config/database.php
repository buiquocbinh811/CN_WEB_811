<?php
session_start();
if (!isset($_SESSION['products'])) {
    $_SESSION['products'] = [];
}