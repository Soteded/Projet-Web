<?php
require_once "_scripts/jbbcode/Parser.php";
$parser = new JBBCode\Parser();
$parser->addCodeDefinitionSet(new JBBCode\DefaultCodeDefinitionSet());