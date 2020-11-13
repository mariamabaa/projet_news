<div id="menu">
	<ul>
		<li class="col-26 liste article"><a href="index.php">Tout</a></li>
		<?php
			$controller= new Controller();
			$categories = $controller->allCategories;
			foreach ($categories as $categorie):?>
			<li class="col-26 liste article"><a href="categorie/<?= $categorie->id ?>"><?= mb_convert_encoding($categorie->libelle,"utf-8") ?></a></li>
		<?php endforeach ?>
	</ul>
</div>