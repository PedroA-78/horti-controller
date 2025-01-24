<?php 
    include_once 'model/classes/connect.php';
    $db = new Database('model/database/matriz.db');

    $directory = 'model/previews/';

    class Preview {

        public function upload($preview) {
            if (isset($preview) && $preview['error'] == UPLOAD_ERR_OK) {
                global $directory;
                $tpm_file = $preview['tmp_name'];
                $preview_name = $this -> rename(basename($preview['name']));
                $path = $directory . $preview_name;

                if (!is_dir($directory)) {
                    mkdir($directory, 0775, true);
                }

                $file_type = mime_content_type($tpm_file);
                $permitted_types = ['image/jpeg', 'image/jpg', 'image/png', 'image/svg'];
    
                if (in_array($file_type, $permitted_types)) {
                    if (move_uploaded_file($tpm_file, $path)) {
                        return $preview_name;
                    }
                }
            }
        }

        public function rename($name) {
            $extension = pathinfo($name, PATHINFO_EXTENSION);
            $new_name = uniqid('preview_', false) . '.' . $extension;

            return $new_name;
        }

        public function preview($id) {
            global $db;
    
            return $db -> read('products', ['id' => $id], "preview")[0];
        }

        public function replace($preview, $id) {
            if (isset($preview) && $preview['error'] == UPLOAD_ERR_OK) {
                global $directory;
                $path = $directory . $this -> preview($id)['preview'];
    
                if (file_exists($path)) {
                    unlink($path);
                }
    
                return $this -> upload($preview);
            }
    
            return $this -> preview($id);
        }

        public function remove($id) {
            if (isset($id)) {
                global $directory;
                $path = $directory . $this -> preview($id)['preview'];
                
                if (file_exists($path)) {
                    unlink($path);
                }
            }
        }
    }
?>