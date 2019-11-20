<?php

function wh_log($log_msg, $msg_type)
{
    $log_time = date('Y-m-d h:i:sa');
    $log_filename = "VFMS_log";
    $log_dir = '/var/log/';
    /*
     * if( ! (file_exists($log_filename))){
     * mkdir($log_dir.$log_filename, 0777, true);
     * }
     */
    $log_file_data = $log_dir . $log_filename . '/log_' . date('d-M-Y') . '.log';
    touch($log_file_data);
    file_put_contents($log_file_data, '------- ' . $log_time . " -------\n", FILE_APPEND);
    file_put_contents($log_file_data, "Type:\t\t" . $msg_type . "\n" . $log_msg . "\n", FILE_APPEND);
    file_put_contents($log_file_data, '------- ' . $log_time . " -------\n", FILE_APPEND);
}

?>
