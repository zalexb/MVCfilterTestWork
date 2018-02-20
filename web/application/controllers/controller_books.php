<?php

class Controller_Books extends Controller
{

    function __construct($db){
        $this->model = new Model_Books($db);
        $this->view = new View();
    }


    function action_index()
	{
	    $data = $this->model->paginate(4);
		$this->view->generate('books.php', 'layout/template_view.php',$data);
	}

	function action_admin()
    {
        $data = $this->model->paginate(4,'/books/admin');
        $this->view->generate('admin.php', 'layout/template_view.php',$data);
    }

    function action_delete()
    {
        $uri = parse_url($_SERVER['REQUEST_URI']);

        $routes = explode('/', $uri[path]);

        $id = is_numeric($routes[3]) ? Lib::clearRequest($routes[3]) : Route::ErrorPage404();

        $this->model->delete($id);
    }
    public function action_create()
    {
        if(!empty($_POST)){
           return $this->model->create();
        }
        $this->view->generate('create.php', 'layout/template_view.php');
    }

    public function action_edit()
    {
        $uri = parse_url($_SERVER['REQUEST_URI']);

        $routes = explode('/', $uri[path]);

        $id = is_numeric($routes[3]) ? Lib::clearRequest($routes[3]) : Route::ErrorPage404();

        if(!empty($_POST)){
            return $this->model->edit($id);
        }

        $data = $this->model->single($id);

        $this->view->generate('edit.php', 'layout/template_view.php',$data);
    }

}