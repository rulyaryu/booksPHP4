<?php
    require '././functions/link.php';
?>

<div class="coontainer d-flex justify-content-center mt-5 mb-5">
	<nav aria-label="Books Page Navigation">
	  <ul class="pagination">
	    <li class="page-item <?= $pagObj->getPage() == 1 ? 'disabled' : '' ?>">
	      <a class="page-link" href="index.php?page=1<?= doOrDoNotLink('cat') . doOrDoNotLink('q')?>" aria-label="Previous">
	        <span aria-hidden="true">&laquo;</span>
	        <span class="sr-only">Previous</span>
	      </a>
	    </li>

			<li class="page-item <?= $pagObj->getPage() == 1 ? 'disabled' : '' ?>">
				<a class="page-link" href="index.php?page=<?=$current - 1?><?=doOrDoNotLink('cat')	. doOrDoNotLink('q')?>">Previous</a>
    	</li>

	    <li class="page-item active">
	    	<a class="page-link" href="#!"><?= $pagObj->getPage()?></a>
	    </li>

	    <li class="page-item <?= $pagObj->getPage() == $pagObj->getLimitPage() ? 'disabled' : '' ?>">
			<a class="page-link" href="index.php?page=<?=$current + 1?><?=doOrDoNotLink('cat') . doOrDoNotLink('q')?>">Next</a>
    	</li>

	    <li class="page-item <?= $pagObj->getPage() == $pagObj->getLimitPage() ? 'disabled' : '' ?>">
			<a class="page-link" href="index.php?page=<?=$pagObj->getLimitPage()?><?=doOrDoNotLink('cat') . doOrDoNotLink('q')?>" aria-label="Next">
	        <span aria-hidden="true">&raquo;</span>
	        <span class="sr-only">Next</span>   
	      </a>
	    </li>
	  </ul>
</nav>
</div>