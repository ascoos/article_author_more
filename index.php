<?php
/**
 *   __ _  ___  ___ ___   ___   ___     ____ _ __ ___   ___
 *  / _` |/  / / __/ _ \ / _ \ /  /    / __/| '_ ` _ \ /  /
 * | (_| |\  \| (_| (_) | (_) |\  \   | (__ | | | | | |\  \
 *  \__,_|/__/ \___\___/ \___/ /__/    \___\|_| |_| |_|/__/
 * 
 * 
 ************************************************************************************
 * @ASCOOS-NAME        	: ASCOOS CMS 24'                                            *
 * @ASCOOS-VERSION     	: 24.0.0                                                    *
 * @ASCOOS-CATEGORY    	: Block (Frontend and Administrator Side)                   *
 * @ASCOOS-CREATOR     	: Drogidis Christos                                         *
 * @ASCOOS-SITE        	: www.ascoos.com                                            *
 * @ASCOOS-LICENSE     	: [Commercial] http://docs.ascoos.com/lics/ascoos/AGL.html  *
 * @ASCOOS-COPYRIGHT   	: Copyright (c) 2007 - 2024, AlexSoft Software.             *
 ************************************************************************************
 *
 * @package            	: Block Manager - More Author Articles
 * @subpackage         	: Main Frontend file
 * @source             	: /[BLOCKS PATH]/article_author_more/index.php
 * @fileNo             	: 
 * @version            	: 1.0.3
 * @created            	: 2007-05-11 17:49:31 UTC+3
 * @updated            	: 2024-10-10 07:00:00 UTC+3
 * @author             	: Drogidis Christos
 * @authorSite         	: www.alexsoft.gr
 * @license 			: AGL-F
 * 
 * @since PHP 8.2.0
 */

defined ("ALEXSOFT_RUN_CMS") or die("Prohibition of Access.");

global $cms_site, $objDatabase, $objLang, $ASCOOS, $app, $my, $option, $task, $aid, $objDual;

// If we are in article view mode
if ( ($option == 'articles') && ($task == 'view') )
{
	$article_id = $aid;

	// We get from the database, the ID of the author.
	$query = "SELECT created_by FROM #__articles WHERE article_id=".$article_id." AND lang_id = ".$ASCOOS['lang']->id." LIMIT 1";
	$objDatabase->setSQLQuery( $query );
	$author_id = $objDatabase->getResult();
	unset($query);
	
	// If an author has been identified.
	if ($author_id)
	{
		// Get Value Block Parameters
		$count 			= $block->getParam('int', 'count', 5 );				// How many articles will be displayed.
		$all_lang		= $block->getParam('bool', 'all_lang', false );		// Articles regardless of language
		$show_hits		= $block->getParam('bool', 'show_hits', false );	// Show visits
		$type 			= $block->getParam('lstr', 'type', '');				// The types of articles for which data will be requested.
		$cat_ids 		= $block->getParam('lstr', 'cat_ids', '' );			// Article categories for which data will be requested.
		$except_cat_ids = $block->getParam('lstr', 'except_cat_ids', '' );	// Categories of articles to be excluded
		$theme		 	= $block->getParam('lstr', 'theme', 'default' );	// The Block theme

		// load Block Theme
		$block->loadTheme($theme);

		$where = [];

		if (!$all_lang) $where[] = "a.lang_id = ".$ASCOOS['lang']->id;					// In all languages or current
		if ($type != '') $where[] = "a.type IN (".$type.")";							// Type of article
		if ($cat_ids != '') $where[] = "a.cat_id IN (".$cat_ids.")";					// Article categories included
		if ($except_cat_ids != '') $where[] = "a.cat_id NOT IN (".$except_cat_ids.")"; 	// Excluded article categories
		
		$where[] = "a.created_by = ".$author_id;		// We select articles only by the specific author.
		$where[] = "a.approved=1";						// If the article is approved
		$where[] = "a.published=1"; 					// If the article is published
		$where[] = "a.groupid <= ".$my->groupid; 		// If the user group is inferior to or equal to the author's.
		$where[] = "a.article_id <> ".$article_id; 		// We exclude the current article from the database search.			


		$query = "SELECT a.id, a.article_id, a.title, a.lang_id, a.cat_id, a.created, a.hits, a.access, a.groupid, l.domain AS flag"
		. "\nFROM #__articles AS a"
		. "\n LEFT JOIN #__languages AS l ON l.id = a.lang_id"
		. (count( $where ) ? "\nWHERE " . implode( ' AND ', $where ) : "")
		. "\nORDER BY a.created, a.article_id DESC"
		. "\nLIMIT ".$count;
		$objDatabase->setSQLQuery( $query );
		$rows = $objDatabase->getObjects();	
		unset($query);
		unset($where);

		if (count($rows)) {
			$text = '';
			$text .= "<div class=\"block-article-author-more-".$theme."\">";
			if ($block->getVar('show_title')) { 
				$text .= "<div class=\"header\"><h3>".$block->getTitle()."</h3></div><div class=\"clear\"></div>";
			}
			$text .= "<div class=\"text\"><div class=\"table\">";
			foreach ( $rows as $row ) { 
				// If you do not have the user permissions to read the article $row, then dodging article.
				if (!$objDual->checkAccess($row)) {
					continue;
				} else { // .... else view article link
					$text .= "<div class=\"row\">";
						if ($all_lang) $text .= "<div class=\"cell\"><img src=\"".$cms_site."/images/kernel/flags/".$row->flag.".png\" alt=\"".$row->title."\" border=\"0\" /></div>";
						$text .= "<div class=\"cell\"><a href=\"".asc2seo('index.php?p=articles&amp;t=view&amp;id='.$row->article_id)."\">".$row->title."</a></div>";
						if ($show_hits) $text .= "<div class=\"cell right\">".$row->hits."</div>";
					$text .= "</div>";
				}
			}
			$text .= "</div></div>";
			$text .= "<div class=\"more\"><a href=\"".asc2seo("index.php?p=articles&amp;uid=".$author_id)."\"><strong>...".$objLang->more."</strong></a></div>";
			$text .= "</div>";
			echo $text;
			unset($text);
			unset($rows);
		}
	} 
	unset($author_id);
}
?>