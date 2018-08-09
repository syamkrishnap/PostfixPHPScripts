    <?php
function getGUIDnoHash(){
		$unique = str_replace(".","",microtime(true)).rand(000,999);
		$date = DateTime.Now.ToString("ddMMyyyyHHmmssfff") ;
		return $date;
    }


echo getGUIDnoHash();
?>
