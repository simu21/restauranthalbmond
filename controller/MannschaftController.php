<?php

require_once '../repository/MannschaftRepository.php';

/**
 * Siehe Dokumentation im DefaultController.
 */
class MannschaftController
{

    public function createMannschaft(){

        $view = new View('mannschaft_createMannschaft');
        $view->title = 'Mannschaft hinzufügen';
        $view->heading = 'Mannschaft hinzufügen';
        $view->display();
    }
    public function doCreateMannschaft(){
        if ($_POST['send']) {
            $uid = $_SESSION['user_id'];
            $mannschaftsname = $_POST['mannschaftsname'];
            $coach = $_POST['coach'];
            $mannschaftRepository = new MannschaftRepository();
            $mannschaftRepository->create($mannschaftsname, $coach,$uid);
        }
    }
    public function update(){
        $mannschaftRepository = new MannschaftRepository();
        $view = new View('mannschaft_update');
        $view->title = 'Mannschaft bearbeiten';
        $view->heading = 'Mannschaft bearbeiten';
        if(isset($_GET['id'])) {
            $m_id = $_GET['id'];
            $view->m_id = $m_id;
            $view->mannschaft = $mannschaftRepository->readById($m_id);
        }
        $view->display();
    }
    public function doUpdate(){
        if ($_POST['send']) {
            $m_id = $_GET['id'];
            $mannschaftsname = $_POST['mannschaftsname'];
            $coach = $_POST['coach'];
            $mannschaftRepository = new MannschaftRepository();
            $mannschaftRepository->update($m_id, $mannschaftsname, $coach);
        }
    }
    public function delete()
    {

        $mannschaftRepository = new MannschaftRepository();
        $mannschaftRepository->deleteById($_GET['id']);

        // Anfrage an die URI /user weiterleiten (HTTP 302)
        header('Location: /user/meinVerein');
    }
    public function index() {
        header('Location: /user/meinVerein');
    }
}
