<?php
function parseBBCode($msg){ 
global $DBCON;
	$msg = str_replace("\r",'END_OF_LINE',$msg);
	$msg = str_replace("\n",'START_NEW_LINE',$msg);
	
	$msg = str_replace("<",'OPENING_TAG',$msg);
	$msg = str_replace(">",'CLOSING_TAG',$msg);

	$msg = str_replace("[b]",'BOLD_TEXT_START',$msg);
	$msg = str_replace("[/b]",'BOLD_TEXT_END',$msg);
		
	$msg = str_replace("[i]",'ITALIC_TEXT_START',$msg);
	$msg = str_replace("[/i]",'ITALIC_TEXT_END',$msg);

	$msg = str_replace("[quote]",'QUOTE_START',$msg);
	$msg = str_replace("[/quote]",'QUOTE_END',$msg);
		
	$msg = str_replace("[img]",'IMAGE_START',$msg);
	$msg = str_replace("[/img]",'IMAGE_START',$msg);

	$msg = str_replace("[yt]",'YOUTUBE_START',$msg);
	$msg = str_replace("[/yt]",'YOUTUBE_END',$msg);
		
	$msg = str_replace('\"', 'DOUBLE_QUOTATION', $msg);
	$msg = str_replace('\\\\', 'BACKSLASH', $msg);
		
	$msg = mysqli_real_escape_string($DBCON, $msg);

	$msg = str_replace("END_OF_LINE",'',$msg);
	$msg = str_replace("START_NEW_LINE",'<br />',$msg);
	
	$msg = str_replace("OPENING_TAG",'&lt;',$msg);
	$msg = str_replace("CLOSING_TAG",'&gt;',$msg);

	$msg = str_replace("BOLD_TEXT_START",'<b>',$msg);
	$msg = str_replace("BOLD_TEXT_END",'</b>',$msg);
		
	$msg = str_replace("ITALIC_TEXT_START",'<i>',$msg);
	$msg = str_replace("ITALIC_TEXT_END",'</i>',$msg);

	$msg = str_replace("QUOTE_START",'<span class="post-quote">',$msg);
	$msg = str_replace("QUOTE_END",'</span>',$msg);
		
	$msg = str_replace("IMAGE_START",'<img src="',$msg);
	$msg = str_replace("IMAGE_END",'" style="max-width:550px;" />',$msg);

	$msg = str_replace("YOUTUBE_START",'<iframe width="560" height="315" src="http://www.youtube.com/embed/',$msg);
	$msg = str_replace("YOUTUBE_END",'" frameborder="0" allowfullscreen></iframe>',$msg);
		
	$msg = str_replace('DOUBLE_QUOTATION','&quot;', $msg);
	$msg = str_replace('BACKSLASH', '&#92;', $msg);
		
	$msg = preg_replace('/\[url\]www(.+?)\[\/url\]/', '<a href="http://www$1">www$1</a>', $msg);	
	$msg = preg_replace('/\[url=www(.+?)\](.+?)\[\/url\]/', '<a href="http://www$1">$2</a>', $msg);
	$msg = preg_replace('/\[url\]http:\/\/(.+?)\[\/url\]/', '<a href="http://$1">$1</a>', $msg);	
	$msg = preg_replace('/\[url=http:\/\/(.+?)\](.+?)\[\/url\]/', '<a href="http://$1">$2</a>', $msg);		
	$msg = preg_replace('/\[url\](.+?)\[\/url\]/', '<a href="http://$1">$1</a>', $msg);	
	$msg = preg_replace('/\[url=(.+?)\](.+?)\[\/url\]/', '<a href="http://$1">$2</a>', $msg);

	return $msg;
}

function reverseBBCode($msg)
{
	$msg = str_replace(" <br />",'
',$msg);
	$msg = str_replace("<br />",'
',$msg);
	
	$msg = str_replace("<b>",'[b]',$msg);
	
	$msg = str_replace("</b>",'[/b]',$msg);
	
	$msg = str_replace("<i>",'[i]',$msg);
	
	$msg = str_replace("</i>",'[/i]',$msg);
		
	$msg = str_replace('<span class="post-quote">','[quote]',$msg);
	
	$msg = str_replace("</span>",'[/quote]',$msg);
		
	$msg = str_replace('<img src="','[img]',$msg);
	
	$msg = str_replace('" style="max-width:550px;" />','[/img]',$msg);
	
	
	return $msg;
}
?>