<?php

require_once '..\repository\LandRepository.php';

/**
 * Siehe Dokumentation im DefaultController.
 */
class LandController
{
    public function index()
    {
        $landRepository = new LandRepository();
        $region = $_GET['region'];
        $view = new View('land_index');
        $view->title = 'Land';
        $view->heading = '';
        $view->countries = $landRepository->read($region);
        $view->display();
    }
}
