    <?php
function getGUIDnoHash(){
            mt_srand((double)microtime()*10000);
            $charid = md5(uniqid(rand(), true));
            $c = unpack("C*",$charid);
            $c = implode("",$c);

            return substr($c,0,20);
    }


echo getGUIDnoHash();
?>
