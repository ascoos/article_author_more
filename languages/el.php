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
 * @subpackage         	: Greek Language file
 * @source             	: /[BLOCKS PATH]/article_author_more/languages/el.php
 * @fileNo             	: 
 * @version            	: 1.0.2
 * @created            	: 2007-05-11 17:49:31 UTC+3
 * @updated            	: 2024-10-09 07:00:00 UTC+3
 * @author             	: Drogidis Christos
 * @authorSite         	: www.alexsoft.gr
 * @translator         	:
 * @translatorSite 		: 
 * @translateDate		:  
 */


defined ("ALEXSOFT_RUN_CMS") or die("Prohibition of Access.");

class TBlock_article_author_more_Language extends TObject
{
	public $blockname = "Άλλα άρθρα του συντάκτη";

	public $APL_license = "Ascoos General License (AGL)";
	public $APL_author = "ΔΡΟΓΚΙΔΗΣ ΧΡΗΣΤΟΣ";
	public $APL_creation = "";
	public $APL_copyright = "ALEXSOFT ΛΟΓΙΣΜΙΚΟ";
	public $APL_translator = "";
	public $APL_translatorEmail = "";
	public $APL_translatorUrl = "";
	public $APL_desc = "Εμφανίζει ένα πλαίσιο που περιέχει άλλα άρθρα του συντάκτη.";

	public $APL_paramgroup_general_label = "▼ &nbsp; Επιλογές Γενικών Παραμέτρων";
	public $APL_paramgroup_general_label_info = "<strong>ΕΠΙΛΟΓΕΣ ΓΕΝΙΚΩΝ ΠΑΡΑΜΕΤΡΩΝ</strong><br />--------------------------------------<br /><br />Στο πλαίσιο αυτό μπορείτε να επιλέξετε από διάφορες γενικές παραμέτρους και να διαμορφώσετε δυναμικά την ενότητα";
	public $APL_paramgroup_categories_label = "▼ &nbsp; Επιλογές Κατηγοριών";
	public $APL_paramgroup_categories_label_info = "<strong>ΕΠΙΛΟΓΕΣ ΚΑΤΗΓΟΡΙΩΝ</strong><br />--------------------------------------<br /><br />Στο πλαίσιο αυτό μπορείτε να διαμορφώσετε τις παραμέτρους προέλευσης των περιεχομένων της ενότητας";
	public $APL_count_label = "Αριθμός άρθρων";
	public $APL_count_desc = "<strong>ΑΡΙΘΜΟΣ ΑΡΘΡΩΝ</strong><br />--------------------------------------<br /><br />Εδώ πρέπει να επιλέξετε τον αριθμό των άρθρων που θα εμφανιστούν";
	public $APL_all_lang_label = "Εμφάνιση ανεξαρτήτως γλώσσας";
	public $APL_all_lang_desc = "<strong>ΕΜΦΑΝΙΣΗ ΑΝΕΞΑΡΤΗΤΑ ΑΠΟ ΓΛΩΣΣΑ ΣΥΝΤΑΞΗΣ</strong><br />--------------------------------------<br /><br />Θέλετε να περιληφθούν όλα τα άρθρα, ανεξάρτητα από την γλώσσα που συντάχθηκαν;<br /><br />Αυτό θα έχει ως αποτέλεσμα να εμφανιστούν όλα τα άρθρα ανεξάρτητα από την γλώσσα σύνταξης τους.<br /><br />Για καλύτερη ενημέρωση στα αριστερά θα εμφανίζεται μια σημαία για να προσδιορίζει την γλώσσα σύνταξης.";
	public $APL_show_hits_label = "Εμφάνιση Προβολών";
	public $APL_show_hits_desc = "<strong>ΕΜΦΑΝΙΣΗ ΠΡΟΒΟΛΩΝ</strong><br />--------------------------------------<br /><br />Θέλετε να εμφανίζεται στήλη με τις συνολικές προβολές του περιεχομένου;";
	public $APL_theme_label = "Θέμα εμφάνισης Ενότητας";
	public $APL_theme_placeholder = "Επιλέξτε θέμα εμφάνισης της ενότητας";
	public $APL_theme_desc = "<strong>ΘΕΜΑ ΕΜΦΑΝΙΣΗΣ ΕΝΟΤΗΤΑΣ</strong><br />--------------------------------------<br /><br />Επιλέξτε το θέμα εμφάνισης που θα υλοποιηθεί η ενότητα &laquo;%s&raquo;.<br /><br />Κάθε ενότητα έχει τουλάχιστο το προκαθορισμένο θέμα εμφάνισης με την ονομασία &laquo;Default&raquo;";
	
	public $APL_type_label = "Τύποι άρθρων";
	public $APL_type_placeholder = "Επιλέξτε τύπους άρθρων";
	public $APL_type_desc = "<strong>ΤΥΠΟΙ ΑΡΘΡΩΝ</strong><br />--------------------------------------<br /><br />Ποιοι τύποι άρθρων θέλετε να συμπεριληφθούν; Αυτό θα έχει ως αποτέλεσμα την εμφάνιση μόνο των άρθρων που έχουν ώς τύπο έναν από τους οριζόμενους.";
	public $APL_cat_ids_label = "Κατηγορίες που θα περιληφθούν";
	public $APL_cat_ids_placeholder = "Επιλέξτε Κατηγορίες Άρθρων";
	public $APL_cat_ids_desc = "<strong>ΚΑΤΗΓΟΡΙΕΣ ΠΟΥ ΘΑ ΠΕΡΙΛΗΦΘΟΥΝ</strong><br />--------------------------------------<br /><br />Ποιες κατηγορίες θέλετε να περιληφθούν;<br /><br />Αυτό θα έχει ως αποτέλεσμα μόνο τα άρθρα που έχουν μια από τις κατηγορίες αυτές να εμφανιστούν στην λίστα των πρόσφατων άρθρων.";
	public $APL_except_cat_ids_label = "Κατηγορίες που θα εξαιρεθούν";
	public $APL_except_cat_ids_placeholder = "Επιλέξτε Κατηγορίες Άρθρων";
	public $APL_except_cat_ids_desc = "<strong>ΚΑΤΗΓΟΡΙΕΣ ΠΟΥ ΘΑ ΕΞΑΙΡΕΘΟΥΝ</strong><br />--------------------------------------<br /><br />Ποιες κατηγορίες θέλετε να εξαιρεθούν;<br /><br />Αυτό θα έχει ως αποτέλεσμα να παρακαμφθούν όλα τα άρθρα που ανήκουν στις κατηγορίες αυτές.<br /><br />Η επιλογή αυτή αναιρεί την κατηγορία από την παραπάνω παράμετρο (περιλαμβανόμενες κατηγορίες), εάν δοθεί και σε αυτή.";
}
?>