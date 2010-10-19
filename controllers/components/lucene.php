<?php  

ini_set('include_path', ini_get('include_path') . PATH_SEPARATOR . APP . 'plugins' . DS . 'lucene_search' . DS . 'vendors'); 
App::import('Vendor', 'LuceneSearchPlugin.lucene', array('file' => 'Zend'.DS.'Search'.DS.'Lucene.php'));

class LuceneComponent extends Object { 
  var $controller = true; 
  var $index = null; 
   
  function startup(&$controller) {
  }
  
  function &getIndex(){
    $dir = APP . 'plugins' . DS . 'lucene_search' . DS . 'search_index';
    if(is_dir($dir)){
      $this->index = Zend_Search_Lucene::open($dir);
    }
    else{
      $this->index = Zend_Search_Lucene::create($dir);
    }
    return $this->index;
  }
  
  function query($query) { 
    $index =& $this->getIndex();
    $results = $index->find($query);
    $ids = array();
    foreach($results as $result){
      $ids[] = $result->node_id;
    }
    return $ids;
  } 
  
  function addNode($id, $title, $body){
    $index =& $this->getIndex();
    
    $lucene_node = new Zend_Search_Lucene_Index_Term($id, 'node_id');
    $query = new Zend_Search_Lucene_Search_Query_Term($lucene_node);
    $hits  = array();
    $hits  = $index->find($query);
    foreach($hits as $hit){
      $index->delete($hit->id);
    }
    
    $doc = new Zend_Search_Lucene_Document();
    $doc->addField(Zend_Search_Lucene_Field::Keyword('node_id', $id));
    $doc->addField(Zend_Search_Lucene_Field::UnStored('node_body', strip_tags($body))); 
    $doc->addField(Zend_Search_Lucene_Field::UnStored('node_title', strip_tags($title))); 
    $index->addDocument($doc);
    $index->commit();
    
    return true;
  }
  
  function deleteNode($id){
    $index =& $this->getIndex();
    $lucene_node = new Zend_Search_Lucene_Index_Term($id, 'node_id');
    $query = new Zend_Search_Lucene_Search_Query_Term($lucene_node);
    $hits  = array();
    $hits  = $index->find($query);
    foreach($hits as $hit){
      $index->delete($hit->id);
    }
    $index->commit();
    return true;
  }
}

?>