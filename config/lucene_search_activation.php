<?php
class LuceneSearchActivation {
  
  public function beforeActivation(&$controller) {
    return true;
  }

  public function onActivation(&$controller) {
    $nodes = $controller->Node->find('all', array(
      'conditions' => array('Node.status' => 1)
    ));
    App::import('Component', 'LuceneSearch.Lucene');
    $lucene = new LuceneComponent();
    foreach($nodes as $node){
      $lucene->addNode($node['Node']['id'], $node['Node']['title'], $node['Node']['body']);
    }
    $controller->Croogo->addAco('Search/query', array('registered', 'public'));
  }

  public function beforeDeactivation(&$controller) {
    return true;
  }

  public function onDeactivation(&$controller) {
    $controller->Croogo->removeAco('Search');
  }
}
?>