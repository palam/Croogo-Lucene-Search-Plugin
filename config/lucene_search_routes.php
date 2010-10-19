<?php
    CroogoRouter::connect('/lsearch/:query', array('plugin' => 'lucene_search', 'controller' => 'search', 'action' => 'query'));
?>