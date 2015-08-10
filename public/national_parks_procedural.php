<?php
    require_once '../include/parks_config.php';
    require_once '../include/Input.php';
    require_once '../include/db_connect.php';

    // Authenticating Data from Input form in national_parks.php
    $errors = array();

    if (!empty($_POST))
    {
            try {
                $name = Input::getString('name', 1, 255);
            } catch (Exception $e) {
                $errors[] = $e->getMessage();
            }

            try {
                $location = Input::getString('location', 1, 255);
            } catch (Exception $e) {
                $errors[] = $e->getMessage();
            }

            try {
                $inputDate = Input::getDate('date');
            } catch (Exception $e) {
                $errors[] = $e->getMessage();
            }

            try {
                $area = Input::getNumber('area', 0, 10000000);
            } catch (Exception $e) {
                $errors[] = $e->getMessage();
            }

            try {
                $description = Input::getString('description', 1, 1500);                
            } catch (Exception $e) {
                $errors[] = $e->getMessage();
            }


            if (empty($errors)) {
                $insertQuery = "INSERT INTO national_parks (name, location, date_established, area_in_acres, description) 
                    VALUES (:name, :location, :date, :area, :description)";

                $stmt = $dbc->prepare($insertQuery);

                $stmt->bindValue(':name', $name, PDO::PARAM_STR);
                $stmt->bindValue(':location', $location, PDO::PARAM_STR);
                $stmt->bindValue(':date', $inputDate, PDO::PARAM_STR);
                $stmt->bindValue(':area', $area, PDO::PARAM_STR);
                $stmt->bindValue(':description', $description, PDO::PARAM_STR);

                $stmt->execute();

                $_POST = [];
            }
    }
    // end of Authentication and post to DB
    // start of display and pagination logic
    $limit = 4; 
    $offset = 0;
    $stmt = $dbc->query('SELECT count(*) FROM national_parks');
    $totalPages = ceil(($stmt->fetchColumn())/$limit);

    if (!isset($_GET['page']) ||
        !is_numeric($_GET['page']) ||
        $_GET['page'] < 1) {

        $_GET['page'] = 1;
        $page = 1;

    } else {

        $offset = ($_GET['page'] - 1) * $limit;
        $page = $_GET['page']; 
    }

    if ($_GET['page'] > $totalPages) {

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
    // end of display and pagination logic
?>