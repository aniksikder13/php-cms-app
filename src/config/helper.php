<?php 
    // Base Url 
    function base_url($path) {
        $protocol = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? "https://" : "http://";
        $host = isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] :"";

        $baseUrl = $protocol . $host;
        return $baseUrl . "/" . ltrim($path, "/");
    }

    // Base Path
    function base_path($path) {
        $rootPath = dirname(__FILE__);
        return $rootPath . DIRECTORY_SEPARATOR . ltrim($path, DIRECTORY_SEPARATOR);
    }

    function upload_path($filename) {
        return base_path('uploads' . DIRECTORY_SEPARATOR . $filename);
    }

    function upload_url($path) {
        return base_path('uploads/' . ltrim($path, '/'));
    }

    function assets_url($path) {
        return base_path('assets/' . ltrim($path, '/'));
    }

    function redirect($path) {
        header('Location:'. base_url($path));
        exit;
    }

?>