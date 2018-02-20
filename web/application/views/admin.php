
<div id="books">
    <ul class="books_list">
        <?foreach ($data['items'] as $book){?>
            <li>
                <div class="book">
                    <h3 class="book_name"><?= $book['name']?></h3>
                    <h4 class="book_author">Author: <?= $book['author']?></h4>
                    <h4 class="book_genre">Genre:  <?= $book['genre']?></h4>
                    <p>Year: <?= $book['year']?></p>
                    <p >Pages: <?= $book['pages']?></p>
                    <a href="/books/edit/<?=$book['id']?>"><button class="btn btn-default">Edit</button></a>
                    <a href="/books/delete/<?=$book['id']?>"><button class="btn btn-danger">DELETE</button></a>
                </div>
            </li>
        <?}?>
    </ul>
    <div id="pagination">
        <?include './web/application/views/pagination.php'?>
    </div>
</div>
<a href="/books/create"><button class="btn btn-default">Create Book</button></a>