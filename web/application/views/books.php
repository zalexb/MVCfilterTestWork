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
                </div>
            </li>
            <?}?>
        </ul>
     <div id="pagination">
            <?include './web/application/views/pagination.php'?>
       </div>
</div>
<div class="col-md-3 prdt-right">
    <div class="w_sidebar">
        <form action="/" method="GET">
            <div id="sort">
                 <h4>Сортировка</h4>
                 <select style="" class="sort" name="sort">
                    <option value="old" <? echo($_GET['sort']=='old' ? 'selected' : '')?>>Old to new</option>
                    <option value="" <? echo(empty($_GET['sort']) ? 'selected' : '')?>>New to Old</option>
                </select>
            </div>
        <section  class="sky-form">
            <h4>Author</h4>
            <div class="row1 scroll-pane">
                <div class="col col-4">
                    <?foreach ($data['authors'] as $author){?>
                    <label class="checkbox"><input type="checkbox" name="author[]" value="<?=$author['name']?>" ><i></i><?=$author['name']?></label>
                    <?}?>
                </div>
            </div>
        </section>
        <section  class="sky-form">
            <h4>Genres</h4>
            <div class="row1 row2 scroll-pane">
                <div class="col col-4">
                    <?foreach ($data['genres'] as $genre){?>
                    <label class="checkbox"><input type="checkbox" name="genre[]" value="<?=$genre['name']?>"><i></i><?=$genre['name']?></label>
                    <?}?>
                </div>
            </div>
        </section>
            <button type="submit" class="btn btn-default">Sort</button>
        </form>
    </div>
</div>
<div class="clearfix"></div>