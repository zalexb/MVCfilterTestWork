<?
class Model_Books extends Model
{

    public function paginate($per_page,$path = '/')
    {
        $sort = '';
        $j = 1;

        foreach ($_GET as $key=>$value){
            if($key=='genre'||$key=='author'){
                if($j==1)
                    $sort .= ' WHERE '.$key.' IN (';
                else
                    $sort .= ' AND '.$key.' IN (';

                for($i = 0;$i < count($_GET[$key]);$i++){

                    $sort .= '"'.$_GET[$key][$i].'"';

                    if($i+1!=count($_GET[$key]))
                        $sort.=', ';
                }

                $sort .= ')';
                $j++;
            }
        }

        $total_items = $this->db->makeQuery('SELECT COUNT(*) from `books`'.$sort);

        $total_items = (int)$total_items[0]['COUNT(*)'];

        $query ="SELECT * FROM `books` ".$sort;

        if($_GET['sort']!='old')
            $query.=" GROUP BY id DESC ";

        $data = Paginator::paginate($this->db,$query,$per_page,$total_items,$path);

        $data['genres'] = $this->db->makeQuery('SELECT genre as name FROM `books` GROUP BY genre');
        $data['authors'] = $this->db->makeQuery('SELECT author as name FROM `books` GROUP BY author');

        return $data;

    }

    public function delete($id)
    {
        $query = "DELETE FROM `books` WHERE id=".$id;

        $this->db->makeQuery($query);

        header("location: /books/admin");

        return false;
    }
    public  function create(){
        $name = Lib::clearRequest(mb_strtolower($_POST['name']));
        $author = Lib::clearRequest(mb_strtolower($_POST['author']));
        $genre = Lib::clearRequest(mb_strtolower($_POST['genre']));
        $year = Lib::clearRequest($_POST['year']);
        $pages = Lib::clearRequest($_POST['pages']);

        if(!preg_match("/^[\s\p{L}-]{4,50}$/u",$name)){
            $_SESSION['errors'] = 'Wrong name';
            header("location: /books/create");
            die();
        }
        if(!preg_match("/^[\s\p{L}.-]{4,50}$/u",$author)){
            $_SESSION['errors'] = 'Wrong author';
            header("location: /books/create");
            die();
        }
        if(!preg_match("/^[\s\p{L}-]{4,50}$/u",$genre)){
            $_SESSION['errors'] = 'Wrong genre';
            header("location: /books/create");
            die();
        }
        if(!preg_match("/^[0-9]{4}$/u",$year)){
            $_SESSION['errors'] = 'Wrong year';
            header("location: /books/create");
            die();
        }
        if(!preg_match("/^[0-9]{1,8}$/u",$pages)){
            $_SESSION['errors'] = 'Wrong pages';
            header("location: /books/create");
            die();
        }

        $query = 'INSERT INTO `books`( `name`, `author`, `genre`, `year`,`pages`,`created_at`)
                  VALUES ("'.$name.'","'.$author.'","'.$genre.'",'.$year.','.$pages.',CURRENT_TIMESTAMP())';

        $this->db->makeQuery($query);

        header("location: /books/admin");

        return false;
    }

    public function single($id)
    {
        $query = 'SELECT * FROM `books` WHERE id='.$id;

        $data = $this->db->makeOnceQuery($query);

        return $data;
    }
    public function edit($id){
        $name = Lib::clearRequest(mb_strtolower($_POST['name']));
        $author = Lib::clearRequest(mb_strtolower($_POST['author']));
        $genre = Lib::clearRequest(mb_strtolower($_POST['genre']));
        $year = Lib::clearRequest($_POST['year']);
        $pages = Lib::clearRequest($_POST['pages']);

        if(!preg_match("/^[\s\p{L}-]{4,50}$/u",$name)){
            $_SESSION['errors'] = 'Wrong name';
            header("location: /books/create");
            die();
        }
        if(!preg_match("/^[\s\p{L}.-]{4,50}$/u",$author)){
            $_SESSION['errors'] = 'Wrong author';
            header("location: /books/create");
            die();
        }
        if(!preg_match("/^[\s\p{L}-]{4,50}$/u",$genre)){
            $_SESSION['errors'] = 'Wrong genre';
            header("location: /books/create");
            die();
        }
        if(!preg_match("/^[0-9]{4}$/u",$year)){
            $_SESSION['errors'] = 'Wrong year';
            header("location: /books/create");
            die();
        }
        if(!preg_match("/^[0-9]{1,8}$/u",$pages)){
            $_SESSION['errors'] = 'Wrong pages';
            header("location: /books/create");
            die();
        }

        $query = 'UPDATE `books` SET  `name`="'.$name.'", `author`="'.$author.'", `genre`="'.$genre.'", `year`="'.$year.'",`pages`="'.$pages.'",`created_at`=CURRENT_TIMESTAMP()
                    WHERE id='.$id;
          

        $this->db->makeQuery($query);

        header("location: /books/edit/".$id);

        return false;
    }

}