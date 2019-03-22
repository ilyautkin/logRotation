<?php
/** @var modX $modx */
switch ($modx->event->name) {
    case 'OnHandleRequest':
        $filepath = $modx->getOption('error_log_filepath', null, MODX_CORE_PATH . 'cache/logs/', true);
        $filename = $modx->getOption('error_log_filename', null, 'error.log', true);
        $max_size = $modx->getOption('logrotation_size',   null, 102400, true);
        
        $log_file = $filepath . $filename;
        
        if (filesize($log_file) > $max_size) {
            $offset = -1 * $max_size;
            
            $read = fopen($log_file, 'r');
            if ($read === false) return;
            fseek($read, $offset, SEEK_END);
            
            fgets($read);
            $content = '';
            while(!feof($read)) {
                $content .= fgets($read);
            }
            fclose($read);
            
            $write = fopen($log_file, 'w');
            fwrite($write, $content);
            fclose($write);
        }
        break;
}