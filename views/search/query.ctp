<?php
	echo '<h2>Search results for the term: '.$query.'</h2>';
	if(!empty($nodes)){
		echo '<ul>';
		foreach($nodes as $node){
			echo '<li>'.$html->link($node['Node']['title'], array('controller' => 'nodes', 'type' => 'page', 'action' => 'view', 'slug' => $node['Node']['slug'], 'plugin' => false)).'</li>';
		}
		echo '</ul>';
	}
	else{
		echo '<p>No results found.</p>';
	}
?>