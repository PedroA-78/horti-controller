<?php 
    function connectDB() {
        try {
            $pdo = new PDO("sqlite:database/matriz.db");
            $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (PDOException $e) {
            echo json_encode($e);
        }
    }
?>
<!-- 
rowid	id	name	            amount	unit	preview
1	    1	Alface Crespa	    69	    UN	    alface_crespa.png
2	    2	Abacaxi Perola	    17	    UN	    abacaxi_perola.png
3	    3	Banana Naninca	    71,1	KG	    banana_nanica.png
4	    4	Pepino Japonês	    10,7	KG	    pepino_japones.png
5	    5	Batata	            91,8	KG	    batata.png
6	    6	Laranja Pera	    141,9	KG	    laranja_pera.png
9	    9	Abobrinha Italiana	10,44	KG	    abobrinha_italiana.png
12	    12	Abacate	            56,6	KG	    abacate.png
17	    17	Hortelã	            44	    UN	    hortela.png 
-->
