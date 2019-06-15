<?php

namespace Core;

class Html {
	private static function makeAttributes($attrs) {
		$str = "";
		if (is_array($attrs)) {
			foreach ($attrs as $name => $value) {
				$str .= ' ' . $name;
				if ($value !== null) {
					$str .= '="' . $value . '"'; 
				}
			}
		}
		return $str;
	}
	
	public static function makeTag($tag, $text, $attrs) {
		return sprintf("<%s%s>%s</%s>", $tag, Html::makeAttributes($attrs), $text, $tag);
	}
	
	public static function makeEmptyTag($tag, $attrs) {
		return sprintf("<%s%s/>", $tag, Html::makeAttributes($attrs));
	}
	
	public static function html($text, $attrs = null) {
		return Html::makeTag('html', $text, $attrs);
	}
	
	public static function head($text, $attrs = null) {
		return Html::makeTag('head', $text, $attrs);
	}
	
	public static function body($text, $attrs = null) {
		return Html::makeTag('body', $text, $attrs);
	}
	
	public static function title($text, $attrs = null) {
		return Html::makeTag('title', $text, $attrs);
	}
	
	public static function h2($text, $attrs = null) {
		return Html::makeTag('h2', $text, $attrs);
	}
	
	public static function strong($text, $attrs = null) {
		return Html::makeTag('strong', $text, $attrs);
	}
	
	public static function p($text, $attrs = null) {
		return Html::makeTag('p', $text, $attrs);
	}
	
	public static function hr($attrs = null) {
		return Html::makeEmptyTag('hr', $attrs);
	}
	
	public static function br($attrs = null) {
		return Html::makeEmptyTag('br', $attrs);
	}
	
	public static function pre($text, $attrs = null) {
		return Html::makeTag('pre', $text, $attrs);
	}
	
	public static function li($text, $attrs = null) {
		return Html::makeTag('li', $text, $attrs);
	}
	
	public static function ul($text, $attrs = null) {
		return Html::makeTag('ul', $text, $attrs);
	}
	
	public static function ol($text, $attrs = null) {
		return Html::makeTag('ol', $text, $attrs);
	}
	
	public static function a($text, $attrs = null) {
		return Html::makeTag('a', $text, $attrs);
	}
	
	public static function table($text, $attrs = null) {
		return Html::makeTag('table', $text, $attrs);
	}
	
	public static function tr($text, $attrs = null) {
		return Html::makeTag('tr', $text, $attrs);
	}
	
	public static function th($text, $attrs = null) {
		return Html::makeTag('th', $text, $attrs);
	}
	
	public static function td($text, $attrs = null) {
		return Html::makeTag('td', $text, $attrs);
	}
	
}