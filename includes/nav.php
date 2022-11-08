<ul class="nav navbar-nav">
<?php 

include('liste.php');
          foreach ($navItems as $item) {
            echo "<li> <a href= \" $item[stranica] \" >  $item[naziv]  </a> </li>";
          }

	?>
</ul>