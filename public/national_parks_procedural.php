<?php
    require_once '../include/parks_config.php';

    require_once '../include/db_connect.php';

    $limit = 4; 
    $offset = 0;
    $stmt = $dbc->query('SELECT count(*) FROM national_parks');
    $totalPages = ceil(($stmt->fetchColumn())/$limit);

    if (!isset($_GET['page']) || !is_numeric($_GET['page']) || $_GET['page'] < 1) 
    {
        $_GET['page'] = 1;
        $page = 1;
    } else
    {
        $offset = ($_GET['page'] - 1) * $limit;
        $page = $_GET['page']; 
    }

    if ($_GET['page'] > $totalPages)
    {
        header("Location: ?page=$totalPages");

    }
    
    $parks = $dbc->query('SELECT * FROM national_parks LIMIT ' . $limit . ' OFFSET ' . $offset)->fetchAll(PDO::FETCH_ASSOC);
?>