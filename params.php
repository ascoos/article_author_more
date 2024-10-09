<?php
/**
 *   __ _  ___  ___ ___   ___   ___     ____ _ __ ___   ___
 *  / _` |/  / / __/ _ \ / _ \ /  /    / __/| '_ ` _ \ /  /
 * | (_| |\  \| (_| (_) | (_) |\  \   | (__ | | | | | |\  \
 *  \__,_|/__/ \___\___/ \___/ /__/    \___\|_| |_| |_|/__/
 * 
 * 
 ***********************************************************************************
 * @ASCOOS-NAME        : ASCOOS CMS 24'                                            *
 * @ASCOOS-VERSION     : 24.0.0                                                    *
 * @ASCOOS-CATEGORY    : Block (Frontend and Administrator Side)                   *
 * @ASCOOS-CREATOR     : Drogidis Christos                                         *
 * @ASCOOS-SITE        : www.ascoos.com                                            *
 * @ASCOOS-LICENSE     : [Commercial] http://docs.ascoos.com/lics/ascoos/AGL.html  *
 * @ASCOOS-COPYRIGHT   : Copyright (c) 2007 - 2024, AlexSoft Software.             *
 ***********************************************************************************
 *
 * @package            : Block Manager - More Author Articles 
 * @subpackage         : Pamameters Manager file
 * @source             : /[BLOCKS PATH]/article_author_more/params.php
 * @fileNo             : 
 * @version            : 1.0.2
 * @created            : 2007-05-11 17:49:31 UTC+3
 * @updated            : 2024-10-09 07:00:00 UTC+3
 * @author             : Drogidis Christos
 * @authorSite         : www.alexsoft.gr
*/

defined ("ALEXSOFT_RUN_CMS") or die("Prohibition of Access.");

global $ASCOOS, $apps_path /** OR FOR ASCOOS 24' = [, $objCategory] */;


/**
 * This Function in ASCOOS CMS 24' have removed and replacement by the $objCategory->getCategories('articles');
 * 
 * He stays here for educational purposes only.
 * In the next version of Block it will be removed and only the global object $objCategory will remain
 */ 
//--![DEPRECATED-ASCOOS-240000]
function getCategories($owner='articles', $fields='cat_id, title, access, groupid')
{
	global $ASCOOS, $my, $objDatabase;

	$where = array();
	$where[] = "owner = ''.$owner.''";
	$where[] = "groupid <= ".$my->groupid;
  	$where[] = "published=1";

	$query = "SELECT ".$fields.""
		. "\nFROM #__categories"
	   	. (count( $where ) ? "\nWHERE " . implode( ' AND ', $where ) : "")
		. "\nORDER BY cat_id ASC"
	;

	$objDatabase->setSQLQuery( $query );	// We query the database
	$rows = $objDatabase->getObjects();		// We get the result as an array of objects
	unset($where);

	// Get the table of Article Categories with the multilingual title corrected based on the user language.
	$arr = array();
	foreach ($rows as $row)	$arr[$row->cat_id] = ascoos_langCorrectItem( $row->title, 'topic', true );

	unset($rows);
	return $arr;
}

/**
 * We get the article types from the Language object of the Articles program.
 */ 
require_once($apps_path."/articles/languages/".$ASCOOS['alang']->filename.".php");
$lngArticleTypes = new TArticleLanguage; 
$ASCOOS['extraParamFields']['ArticleTypes'] = $lngArticleTypes->article_types;

/**
 * We pass to the global table $ASCOOS the additional parameters of the block concerning the article categories.
 */
$cat = getCategories(); /** OR FOR ASCOOS 24' = $objCategory->getCategories('articles'); */
$ASCOOS['extraParamFields']['ArticleCategories'] = $cat;
$ASCOOS['extraParamFields']['ArticleExceptCategories'] = $cat;
unset($cat);
?>