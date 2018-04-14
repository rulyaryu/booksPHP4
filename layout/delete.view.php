<?php 
    require 'head.view.php';
    require_once '../delete_component.php';
?>

<div class="container">
	<div class="row">
		<div class="col">
			<form method="post" action="<?php $_SERVER['PHP_SELF'];?>">

                <div class="alert alert-warning">
                    <h3>Вы уверены что хотите удалить эту книгу?</h3>
                    <div class="card">
						<img src="<?= $deleteBook->imgUrl ?>" alt="<?= $deleteBook->title?>" class="card-img-top">
						<div class="card-body">
							<h5 class="card-title"><?= $deleteBook->title?></h5>
							<p class="card-subtitle"><?= $deleteBook->author?></p>
						</div>
						<div class="card-footer text-muted">
                            <p><?= $deleteBook->category?></p>
                        </div>
					</div>
                </div>



			<input type="submit" name='deleteSubmit' class="btn btn-success" value="Delete">
		</form>
		</div>
	</div>

	<a href="index.php" class="btn btn-success mt-4">Вернуться на главную</a>
</div>


<?php 
    require 'foot.view.php';
?>