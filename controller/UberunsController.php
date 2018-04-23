<?php
class UberunsController {
    public function index() {
        $view = new View('uberuns_index');
        $view->title = 'Über uns';
        $view->heading = '';
        $view->display();
    }
}
?>