<?php   
    require 'head.view.php';
    require_once '../edit_component.php';
?>


<h1>Editing page</h1>

<div class="container">
	<div class="row">
		<div class="col">
			<form method="post" action="<?php $_SERVER['PHP_SELF'];?>">
			<div class="form-group">
				<label for="bookName">
					Введите название книги:
				</label>
				<input type="text" name="edit-book" id='bookName' class="form-control" value='<?=$editedFields['title'] ?? $editBook->title?>' placeholder='<?= $editBook->title?>'>
			</div>
			<div class="form-group">
				<label for="author">
					Введите имя автора книги:
				</label>
				<input type="text" name="edit-writer" id='author' class="form-control" value='<?=$editedFields['author'] ?? $editBook->author?>' placeholder='<?= $editBook->author?>'>
			</div>
			<div class="form-group">
				<label for="imgUrl">
					Введите ссылку на изображение:
				</label>
				<input type="text" id='imgUrl' name="edit-src" class="form-control" value='<?=$editedFields['imgUrl'] ?? $editBook->imgUrl?>' placeholder='<?= $editBook->imgUrl?>'>
			</div>
			<div class="form-group">
				<label for="category">
					Введите категорию
				</label>
				<input type='text' class="form-control" name="edit-category" id="category" value='<?=$editedFields['category'] ?? $editBook->category?>' placeholder='<?= $editBook->category?>'>
			</div>
			<input type="submit" name='editSubmit' class="btn btn-success">
		</form>
		</div>
	</div>

	<a href="../index.php" class="btn btn-success mt-4">Вернуться на главную</a>
</div>


<?php 
    require 'foot.view.php';
?>