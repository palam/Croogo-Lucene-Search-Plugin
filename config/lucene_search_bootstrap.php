<?php

  Croogo::hookRoutes('LuceneSearch');
  Croogo::hookBehavior('Node', 'LuceneSearch.SearchHook', array());

?>