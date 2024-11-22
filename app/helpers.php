<?php 

// function formatToBdTime($dateTime, $format = 'Y-m-d H:i') {
//     return $dateTime->setTimezone('Asia/Dhaka')->format($format);
// }





if (!function_exists('formatToBdTime')) {
    function formatToBdTime($dateTime, $dateFormat = 'F j, Y', $timeFormat = 'h:i A') {
        // Set timezone to Asia/Dhaka
        $date = $dateTime->setTimezone('Asia/Dhaka');
        
        // Return both date and time in the specified formats
        return [
            'long_date' => $date->format($dateFormat), // Full month name (e.g., November 19, 2024)
            'time' => $date->format($timeFormat), // Time in 'h:i A' format (e.g., 04:17 PM)
        ];
    }
}




?>