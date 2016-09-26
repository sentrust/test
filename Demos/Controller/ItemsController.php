<?php

/**
 * Description of ItemsController
 *
 * Manages the Items in the Database
 */
class ItemsController extends AppController 
{
	// include the session componenet
    public $components = array('Session');
    
	// Search Action
    public function search($search = null)
    {
        if(!$search)
        {
            $data = $this->Item->find('all', array('order' => 'year'));
        }
        else
        {
			//-- Query the database using a Where clause
            $data = $this->Item->find('all', 
				array(
					'order' => 'year',
					'conditions' => array('title LIKE' => '%'.$search.'%')
                )
			);
        }
                
		// Set up your Variables to pass into the view
        $info = array(
            'items' => $data,
            'count' => count($data)
        );
        
        $this->set($info);

		// Use the index template instead of the default rendered search template
        $this->render('index');
    }
    
    public function delete($id = null)
    {
		// set the model to the id that you want to work with.
        $this->Item->id = $id;
        
		// does the item exist? is it set?
        if(!$id || !$this->Item->exists())
        {
            throw new NotFoundException(__("ID was not set."));
        }
        
		// make sure the request came via post
        if($this->request->is('post'))
        {
			// if the delete was a success
            if($this->Item->delete())
            {
				// display a message for the user to see the results
                $this->Session->setFlash(__("The item was deleted."));
            }
            else
            {
                $this->Session->setFlash(__("The ites was not deleted."));
            }
        }
      
		// redirect the user to the correct results page after the deletion
        $this->redirect('index');
    }
    
    public function edit($id = null)
    {
        if(!$id)
        {
			// set a specific error with individual message
            throw new NotFoundException(__("ID was not set."));
        }
        
        $data = $this->Item->findById($id);
        
        if(!$data)
        {
            throw new NotFoundException(__("ID was not in the Database."));
        }
        
        if($this->request->is('post') || $this->request->is('put'))
        {
			// save the data and if it's a success then redirect them to the correct location
            if($this->Item->save($this->request->data))
            {
                $this->Session->setFlash(__('The item was updated.'));
                $this->redirect('index');
            }
            else
            {
                $this->Session->setFlash(__('The item was not updated.'));
            }
        }
        
		// default the form with data from the database
        $this->request->data = $data;
    }
    
    public function add()
    {
        if($this->request->is('post'))
        {
			// prepare the model to insert a new item in the database
            $this->Item->create();

            if($this->Item->save($this->request->data))
            {
                $this->redirect('index');
            }
            else
            {
                // if the data fails do something
            }
        }
    }
    
    public function view($id = null)
    {
        if(!$id)
        {
            throw new NotFoundException(__("ID was not set."));
        }
        
		// search the database based on the id (primary key) of the item 
        $data = $this->Item->findById($id);
        
        if(!$data)
        {
            throw new NotFoundException(__("ID was not in the Database."));
        }
        
		// set the variable to display the query results
        $this->set('item', $data);
    }
    
    public function index()
    {
		// query database and sort results
        $data = $this->Item->find('all', array('order' => 'year'));

		// get a count from the database
        $count = $this->Item->find('count');
        
		// set variables
        $info = array(
            'items' => $data,
            'count' => $count
        );
        
		// pass variables to tempalte
        $this->set($info);
    }
}

?>
