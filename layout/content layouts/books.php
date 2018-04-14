<?php 
    // require '././model.php';
    // require_once '././classes/Book.classes.php';

    require_once '././categ_component.php';
    require_once '././search_component.php';

    $commonarr = $categoryArr ?? $authorArr ?? $pageArr;
?>


<div class="container-fluid">
    <?php foreach($commonarr as $chunk) :?>
        <div class="row mb-3">
            
            <?php foreach ($chunk as $book) :?>
            <div class="col-4">
                <div class="card">
                    <img class="card-img-top" src="<?= $book->imgUrl?>" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title"><?= $book->title?></h5>
                        </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><?= $book->author?></li>
                        <li class="list-group-item"><?= $book->category?></li>
                    </ul>
                    <div class="card-body">
                        <?php if(isset($_SESSION['adminSuccess']) &&  $_SESSION['adminSuccess'] === 'success') :?>
                            <a class='btn btn-warning' href='http://localhost/layout/edit.view.php?id=<?=$book->id?>'>Edit</a>
                            <a class='btn btn-danger' href='http://localhost/layout/delete.view.php?id=<?=$book->id?>'>Delete</a>
                        <?php endif ;?>
                    </div>
                </div>

            </div>
            <?php endforeach ;?>
        </div>
        
    <?php endforeach ;?>
</div>