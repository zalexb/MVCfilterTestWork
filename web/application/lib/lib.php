<?
class Lib 
{
		function clearRequest($req){
			return trim(strip_tags(htmlspecialchars($req)));		
		}

		function mysqli_fetch_all_my($rows){
			$arr=[];
			while ($row = mysqli_fetch_assoc($rows)) {
				$arr[] = $row;
			}
			return $arr;
		}

		function mysqli_fetch_all_my_one($rows){
			return mysqli_fetch_assoc($rows);
		}

}
?>