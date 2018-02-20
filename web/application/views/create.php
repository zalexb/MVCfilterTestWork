<form id="create_post" method="POST" action="/books/create">
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
        <input name="name" style="width: 200px" type="text" class="form-control" required maxlength="50">
    </div>
    <div class="form-group">
        <label for="email">Author:</label>
        <input name="author" style="width: 200px" type="text" class="form-control" id="email" required maxlength="50">
    </div>
    <div class="form-group">
        <label for="email">Genre:</label>
        <input name="genre" style="width: 200px" type="text" class="form-control" id="email" required maxlength="50">
    </div>
    <div class="form-group">
        <label for="email">Year:</label>
        <input name="year" style="width: 200px" type="number" class="form-control" id="email" required>
    </div>
    <div class="form-group">
        <label for="email">Pages:</label>
        <input name="pages" style="width: 200px" type="number" class="form-control" id="email" required>
    </div>
    <button type="submit" class="btn btn-default">Create</button>
</form>