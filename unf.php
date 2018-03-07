<?
    include 'epi.php';
$consumerKey = "jn6LehTFDmdFjf9n8SC3ZMcGZ";
$consumerSecret = "8MsySqbwTX72odGlASPKi8yUE1tjCgCirdbWZFF2WOIS3zH66l";
$tokenKey = "2342278116-pc60T2THjz7leo0TTqV5CX9D7ji9wogXqdV4ihf";
$tokenSecret = "qXLizbeXbu2bDr8IsimspjbmyfS88zBz198xUYEhpyfYp";

$oTwitter = new TwitterOAuth($consumerKey, $consumerSecret, $tokenKey, $tokenSecret);
$aFollowing = $oTwitter->get('friends/ids');
$aFollowing = $aFollowing->ids;

 $aFollowers = $oTwitter->get('followers/ids');
 $aFollowers = $aFollowers->ids;


$i=0;
  foreach( $aFollowing as $iFollowing )
 {
 	$isFollowing = in_array( $iFollowing, $aFollowers );
 
 	
 	
 	if( !$isFollowing )
	{

 		$parameters = array( 'user_id' => $iFollowing );
 		$status = $oTwitter->post('friendships/destroy', $parameters);
 		$i++;
 		if($i>1000){
 			break;
 		}

 	}
 }

echo 'Baþarýyla '.$i.' Kiþiyi unfollow ettiniz.';

?>