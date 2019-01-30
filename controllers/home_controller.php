<?php 

include_once '_classes/Articles.php';
include_once '_classes/Categories.php';

$allArticles = Articles::getAllArticles();
$allCategories = Categories::getAllCategories();
$lastArticle = Articles::getLastArticle();
$lastArticleLeft = Articles::getLastArticle(1);
$lastArticleRight = Articles::getLastArticle(2);


require_once "_scripts/jbbcode/Parser.php";
 
$parser = new JBBCode\Parser();
$parser->addCodeDefinitionSet(new JBBCode\DefaultCodeDefinitionSet());
 
//$text = "The default codes include: [b]bold[/b], [i]italics[/i], [u]underlining[/u], ";
//$text .= "[url=http://jbbcode.com]links[/url], [color=red]color![/color] and more.";
 
