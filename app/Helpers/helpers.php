<?php

if (!function_exists('formatCLP')) {
    function formatCLP($amount)
    {
        return '$' . number_format($amount, 0, ',', '.');
    }
}
