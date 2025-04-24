<?php 
    // Base Url 
    function base_url($path, $project_dir = false) {
        $protocol = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? "https://" : "http://";
        $host = isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : "";
    
        // যদি $project_dir = true হয়, তখন PROJECT_DIR যোগ করো
        $project = $project_dir ? trim(PROJECT_DIR, '/') : '';
    
        // প্রটোকল, হোস্ট আর প্রজেক্ট ডির একত্রে করে
        $baseUrl = rtrim($protocol . $host . '/' . $project, '/');
    
        return $baseUrl . '/' . ltrim($path, '/');
    }
    
    // Base Path
    function base_path($path, $project_dir = false) {
        $project = $project_dir ? trim(PROJECT_DIR, DIRECTORY_SEPARATOR) : '';
        $rootPath = dirname(__DIR__) . DIRECTORY_SEPARATOR . $project;
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

    function isPostRequest() {
        return $_SERVER['REQUEST_METHOD'] === 'POST';
    }    

    function getValue($field, $default = null) {
        if (isPostRequest()) {
            return isset($_POST[$field]) ? trim(htmlspecialchars($_POST[$field])) : $default;
        }
    
        return $default;
    }
    


?>