<?
class CCrons
{
	function CCrons($db)
	{
		$this->kern=$db;
	}
	
	function checkTrending()
	{
		// Delete trending
		$query="DELETE FROM trending";
		$this->kern->execute($query);
		
		$query="SELECT * 
		          FROM tweets 
				 WHERE received>".(time()-864000);
		$result=$this->kern->execute($query);	
	    
		while ($row = mysql_fetch_array($result, MYSQL_ASSOC))
        {
			$mes=explode(" ", base64_decode($mes));
			
			for ($a=0; $a<=sizeof($mes); $a++)
			{
				// --------------------------------- Hashtags ----------------------------------------------- 
				if (substr($mes[$a], 0, 1)=="#")
				{
					$query="SELECT * 
					          FROM tweets_trends 
							 WHERE term='".$mes[$a]."' 
							   AND type='ID_HASHTAG'";
				    $res=$this->kern->execute($query);
					
					if (mysql_num_rows($res)>0)
					  $query="UPDATE tweets_trends 
					             SET tweets=tweets+5, 
								     retweets=retweets+".$row['retweets'].", 
									 comments=comments+".$row['comments'].", 
									 likes=likes+".$row['likes']." 
							   WHERE ID='".$row['ID']."'";
					else
					  $query="INSERT INTO tweets_trends 
					                  SET term='".$mes[$a]."', 
									      type='ID_HASHTAG', 
										  tweets='5', 
										  retweets='1', 
										  comments='1', 
										  likes='1'";
										  
					// Execute
					$this->kern->execute($query);
				}
			}
		}
	}
}
?>