<?php 

$ID = 0;

if(isset($_POST['txt_search_ID']) && $_POST['txt_search_ID'] != ''){
$ID = $_POST['txt_search_ID'];
}

if(isset($_GET['txt_search_ID']) && $_GET['txt_search_ID'] != ''){
$ID = $_GET['txt_search_ID'];
}

$download=exec("curl -F 'name=$ID' http://34.239.50.216:8080/iVault/getData");
$split = explode(",", $download);
$down_url = $split[0];
$file_hash = $split[1];
exec("curl $down_url -o meta/mail-header.txt");
exec("sed '/Content-Type:/q' meta/mail-header.txt > meta/mail-header-meta.txt");

?>
<!DOCTYPE html>

<html lang="en">

<head>

    <!-- Required meta tags always come first -->

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>IVault</title>

    <!-- Bootstrap CSS -->

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">

</head>

<body>

    <nav class="navbar navbar-expand-md navbar-light">
        <div class="container">
        <a class="navbar-brand" href="#"><img src="images/vault-logo.png"> iVault</a>
        </div>
    </nav>

    <div class="wrapper py-4 px-2">
        <div class="container">
<?php 
 $from=exec("cat meta/mail-header-meta.txt|grep ^From:|cut -d'<' -f2|cut -d'>' -f1");
 $sub=exec("cat meta/mail-header-meta.txt|grep ^Subject:|cut -d':' -f2|sed -e 's/^[ \t]*//'");

 exec("rm -f /var/www/html/iVault/extracted/*");
// exec("munpack -C /var/www/html/iVault/extracted/ -qtf /var/www/html/iVault/meta/mail-header.txt");
// exec("rm /var/www/html/iVault/body/*");
// exec("mv /var/www/html/iVault/extracted/part* /var/www/html/iVault/body/" );
// $filename=exec("ls -1 /var/www/html/iVault/extracted/");

 exec("ripmime -i /var/www/html/iVault/meta/mail-header.txt -d /var/www/html/iVault/extracted/");
 exec("rm /var/www/html/iVault/body/*");
 exec("mv /var/www/html/iVault/extracted/textfile* /var/www/html/iVault/body/" );
 $filename=exec("ls -1 /var/www/html/iVault/extracted/"); 

 $oldname = "/var/www/html/iVault/body/textfile2";
 $newname = "/var/www/html/iVault/body/$ID";
 rename($oldname, $newname);
?>
            <div class="page">
                <div class="from d-block indv-block mb-3">
                    <label class="mb-0">From :</label> <span class="d-block d-sm-inline-block"><?php echo $from ?></span>
                </div>
                 <div class="from d-block indv-block">
                    <label class="mb-0">Subject :</label> <span class="d-block d-sm-inline-block"><?php echo $sub ?></span>
                </div>
                 <div class="from d-block indv-block">
                    <label class="mb-0">File hash :</label> <span class="d-block d-sm-inline-block"><?php echo $file_hash ?></span>
                </div>
                <div class="page-body mb-4 mt-4">
                    <p class="mb-0">
                        <?php echo file_get_contents("/var/www/html/iVault/body/$ID"); ?>
                    </p>
                </div>
                <div class="action-tools">
                    <i class="fa fa-paperclip d-inline-block mr-2"></i><?php echo $filename; ?> 
                    <a class="download d-inline-block ml-2" href="extracted/<?php echo $filename; ?>" target="_blank"><i class="fa fa-download"></i></a>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery first, then Tether, then Bootstrap JS. -->

    <script src="js/jquery.min.js"></script>

    <!--     <script src="js/tether.min.js"></script> -->

    <script src="js/bootstrap.min.js"></script>

</body>

</html>
