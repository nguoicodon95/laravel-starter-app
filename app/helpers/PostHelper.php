<?php

class PostHelper {

	public static function prepare($post) {
		$ParsedownHelper = new ParsedownHelper();
		$sanitized = htmlspecialchars($post, ENT_QUOTES);
		$parseText = $ParsedownHelper->line($sanitized);
		return $parseText;
	}

	public static function summary($post) {
		$prepare = PostHelper::prepare($post);
		$stripTags = strip_tags($prepare);
		$prepPost = str_limit($stripTags, $limit = 350, $end = '...');
		return $prepPost;
	}

	public static function detail($post) {
		$prepare = PostHelper::prepare($post);
		$prepPost = str_replace(array("\r\n", "\n"),array("<br />", "<br />"), $prepare);	
		return $prepPost;
	}

	public static function description($post) {
		$prepare = PostHelper::prepare($post);
		$stripTags = strip_tags($prepare);
		$removeLineBreaks = preg_replace( "/\r|\n/", "", $stripTags);
		$prepPost = str_limit($removeLineBreaks, $limit = 350, $end = '');
		return $prepPost;
	}

}