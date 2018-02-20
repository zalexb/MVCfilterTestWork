<form  method="POST" action="/books/edit/<?=$data['id']?>">
    <?  if($_SESSION['errors']){?>
        <div id='alert'>
            <div class=' alert alert-block alert-info fade in center'>
                <?echo $_SESSION['errors']?>
            </div>
        </div>
        <?
        unset($_SESSION['errors']);
    }?>
    <div class="form-group">
        <label>Name:</label>
        <input value="<?=$data['name']?>" name="name" style="width: 200px" type="text" class="form-control" required maxlength="50">
    </div>
    <div class="form-group">
        <label for="email">Author:</label>
        <input value="<?=$data['author']?>" name="author" style="width: 200px" type="text" class="form-control" id="email" required maxlength="50">
    </div>
    <div class="form-group">
        <label for="email">Genre:</label>
        <input value="<?=$data['genre']?>" name="genre" style="width: 200px" type="text" class="form-control" id="email" required maxlength="50">
    </div>
    <div class="form-group">
        <label for="email">Year:</label>
        <input value="<?=$data['year']?>" name="year" style="width: 200px" type="number" class="form-control" id="email" required>
    </div>
    <div class="form-group">
        <label for="email">Pages:</label>
        <input value="<?=$data['pages']?>" name="pages" style="width: 200px" type="number" class="form-control" id="email" required>
    </div>
    <button type="submit" class="btn btn-default">Edit</button>
</form>