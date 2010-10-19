<?php

App::import('Core', 'Sanitize');

class SearchController extends SearchAppController {
  var $uses = array('Node');
  var $components = array('Lucene');
  
  function beforeFilter(){
    parent::beforeFilter();
  }

  function query() {
    if(isset($this->params['query'])){
      $query = Sanitize::clean($this->params['query']);
      $ids = $this->Lucene->query($query);
      $conditions['Node.id']=$ids;
      $order = 'find_in_set(Node.id, \''.implode(',',$ids).'\')';
      $this->paginate = array( 
        'limit' => 50,
        'conditions' => $conditions,
        'order' => $order
      );
      $nodes = $this->paginate('Node');
      $this->set(compact('nodes', 'query'));
      $this->set('page_heading', 'Search Results');
    }
    else{
      if(!empty($this->data)){
        $this->redirect(array('query' => $this->data['Search']['q']));
      }
      else{
        $this->redirect('/');
      }
    }
  }
}

?>