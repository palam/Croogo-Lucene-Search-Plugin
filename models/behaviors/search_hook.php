<?php

class SearchHookBehavior extends ModelBehavior {
    
  public function setup(&$model, $config = array()) {
    if (is_string($config)) {
      $config = array($config);
    }

    $this->settings[$model->alias] = $config;
  }
  
  public function afterSave(&$model){
    App::import('Component', 'LuceneSearch.Lucene');
    $lucene = new LuceneComponent();
    if($model->data['Node']['status'] == 1){
      $lucene->addNode($model->id, $model->data['Node']['title'], $model->data['Node']['body']);
    }
    else{
      if(isset($model->data['Node']['id'])){
        $lucene->deleteNode($model->data['Node']['id']);
      }
    }
  }
  
  public function afterDelete(&$model){
    App::import('Component', 'LuceneSearch.Lucene');
    $lucene = new LuceneComponent();
    $lucene->deleteNode($model->data['Node']['id']);
  }

}

?>