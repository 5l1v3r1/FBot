<?php
 
 // Color
$blue="\033[1;34m";
$cyan="\033[1;36m";
$okegreen="\033[92m";
$lightgreen="\033[1;32m";
$white="\033[1;37m";
$purple="\033[1;35m";
$red="\033[1;31m";
$yellow="\033[1;33m";

@system("clear");

print "$cyan Token$red >$white ";
$token = trim(fgets(STDIN));
print "$cyan Jumlah Status$red >$white ";
$jumlah = trim(fgets(STDIN));
print "$cyan Delay$red >$white ";
$delay = trim(fgets(STDIN));
print "\n";

for ($i=0; $i < $jumlah; $i++){
    $url = "https://graph.facebook.com/me/feed?method=POST";
    if(!empty($_GET['x'])){
        $status = $_GET['x'];
    } else {
        $send = file("https://putragans.000webhostapp.com/quote_gen/bucin.php");
    }
    sleep($delay);
    $ch = curl_init();
    $a = array(   'access_token'  => $token,
                  'message'       => $send[array_rand($send)],
              );
    curl_setopt($ch, CURLOPT_URL,$url);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $a);
    curl_exec($ch);
    curl_close ($ch);
    $o = $i+1;
    print "$cyan [$yellow *$cyan ]$white Posting $o status ...\n";
}
print "\n";
?>
