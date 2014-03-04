<?php
/**
 * Static content controller.
 *
 * @author Daniel, Captiliity
 */

App::uses('AppController', 'Controller');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class PagesController extends AppController
{

    /**
     * Controller name
     *
     * @var string
     */
    public $name = 'Pages';

    /**
     * This controller does not use a model
     *
     * @var array
     */
    public $uses = array();


    public function beforeFilter()
    {
        parent::beforeFilter();
        // Allow users to register and logout.
        $this->Auth->allow('home', 'showcase');
    }

    /**
     * Displays a view
     *
     * @param mixed What page to display
     * @return void
     */
    public function display()
    {

       /* // TODO Enable Landing Page again:
        $this->Session->setFlash(__('Showcase under construction!'), 'flash/info');
        // TODO IMPLEMENT SCHEDULE AND TICKETS FIRST
        return $this->redirect(array('controller' => 'users', 'action' => 'login'));*/


        $this->layout = 'showcase';


        $headline= "";

        $path = func_get_args();

        $count = count($path);
        if (!$count) {
            $this->redirect('/');
        }
        $page = $subpage = $title_for_layout = null;

        if (!empty($path[0])) {
            $page = $path[0];
        }
        if (!empty($path[1])) {
            $subpage = $path[1];
        }
        if (!empty($path[$count - 1])) {
            $title_for_layout = Inflector::humanize($path[$count - 1]);
        }

        $this->set(compact('page', 'subpage', 'title_for_layout'));
        $this->render(implode('/', $path));
    }
}
