<?php
//*******************************************************************************
// Classe & Methoden zur Implementierung von Templates
//
// autor: Karsten Gerhard
// datum: 2003-04-10
//
// Update v2 - Umstellung auf static [2010-08-12]
//******************************************************************************

class Tpl{

	/*
	 * Einlesen der Template Datei
	 * Param 1:
	 */
	public static function get_tpl($tpl_file){
		if(!is_readable($tpl_file)) die($tpl_file.": Template nicht gefunden!!");
		return file_get_contents($tpl_file);
	}

	public static function write($template){
		 echo trim($template);
	}

	public static function replace_tpl($template, $out_vars){
		if(sizeof($out_vars) > 0)
			foreach($out_vars as $key=>$value){
				$template = str_replace("{".$key."}", $value, $template);
			}
		return $template;
	}

	public static function get_vars_tpl($template){
		preg_match_all( '/\{.*?\}/', $template, $vars);
		$trans = array("{"=>"", "}"=>"");
		$out_vars = array();
		foreach ($vars[0] as $value) {
			$value = strtr($value, $trans);
			$out_vars[$value] = '';
		}
		return $out_vars;
	}
}


?>