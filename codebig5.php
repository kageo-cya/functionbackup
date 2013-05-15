<?php
function Fix_Backslash($org_str) {
	//if ( mysql_client_encoding() != "latin1" ) return $org_str;
	$tmp_length = strlen($org_str);
	for ( $tmp_i=0; $tmp_i<$tmp_length; $tmp_i++ ) {
		$ascii_str_a = substr($org_str, $tmp_i , 1);
		$ascii_str_b = substr($org_str, $tmp_i+1, 1);
		$ascii_value_a = ord($ascii_str_a);
		$ascii_value_b = ord($ascii_str_b);
		if ( $ascii_value_a > 128 ) {
			if ( $ascii_value_b == 92 ) {
				$org_str = substr($org_str, 0, $tmp_i+2) . substr($org_str,$tmp_i+3);
				$tmp_length = strlen($org_str);
			}
			$tmp_i++;
		}
	}
	$tmp_length = strlen($org_str);
	if ( substr($org_str, ($tmp_length-1), 1) == "" ) $org_str .= chr(32);
	$org_str = str_replace("", " 0", $org_str);
	return $org_str;
}
?>