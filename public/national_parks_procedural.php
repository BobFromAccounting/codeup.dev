<?php
    require_once '../include/parks_config.php';
    require_once '../include/Input.php';
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
        exit();
    }
    
    $query = 'SELECT * FROM national_parks LIMIT :limit OFFSET :offset';

    $stmt = $dbc->prepare($query);
    $stmt->fetchAll(PDO::FETCH_ASSOC);

    $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
    $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
    
    $stmt->execute();
    $parks = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (!empty($_POST)) {
        if (Input::has($name) && Input::has($location) && Input::has($inputDate) && Input::has($area) && Input::has($description)) {

            $name = Input::get('name');
            $location = Input::get('location');
            $inputDate = Input::get('date');
            $area = Input::get('area');
            $description = Input::get('description');

            $formatDate = date("Y-m-d", strtotime($inputDate));

            $insertQuery = "INSERT INTO national_parks (name, location, date_established, area_in_acres, description) VALUES (:name, :location, :date, :area, :description)";

            $stmt = $dbc->prepare($insertQuery);

            $stmt->bindValue(':name', $name, PDO::PARAM_STR);
            $stmt->bindValue(':location', $location, PDO::PARAM_STR);
            $stmt->bindValue(':date', $formatDate, PDO::PARAM_STR);
            $stmt->bindValue(':area', $area, PDO::PARAM_STR);
            $stmt->bindValue(':description', $description, PDO::PARAM_STR);

            $stmt->execute();

        } else {
            header("Location: ?page=$totalPages");
            exit();
        }
    }
?>