<?php 
    require_once 'includes/connect.php';

    function _upload($preview) {
        if (isset($preview) && $preview['error'] == UPLOAD_ERR_OK) {
            $directory = 'model/previews/';
            $tpm_file = $preview['tmp_name'];
            $preview_name = _rename(basename($preview['name']));
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

        return;
    }

    function _replace($preview, $product) {
        if (isset($preview) && $preview['error'] == UPLOAD_ERR_OK) {
            $directory = 'model/previews/';
            $file_name = _preview($product);
            $path = $directory . $file_name;

            if (file_exists($path)) {
                unlink($path);
            }

            return _upload($preview);
        }

        return _preview($product);
    }

    function _rename($current_name) {
        $extension = pathinfo($current_name, PATHINFO_EXTENSION);
        $new_name = uniqid('preview_', false) . '.' . $extension;

        return $new_name;
    }

    function _preview($id) {
        $pdo = connectDB();
        $stmt = $pdo -> prepare("SELECT preview FROM products WHERE id = :id");
        $stmt -> execute([':id' => $id]);
        $preview = $stmt -> fetchAll(PDO::FETCH_ASSOC)[0]['preview'];

        return $preview;
    }
?>