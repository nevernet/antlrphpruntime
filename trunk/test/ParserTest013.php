<?php

require 'PHPUnit/Framework.php';
require "antlr.php";
require "t013parserLexer.php";
require "t013parserParser.php";
class ParserTest013 extends PHPUnit_Framework_TestCase{
	protected function setUp(){
	}
	
	protected function tearDown(){
	}
    
	function test1(){
		
			$parser = $this->parser('foobar');
			$parser->document();

	        self::assertTrue(sizeof($parser->reportedErrors) == 0);
	        self::assertEquals($parser->identifiers, array('foobar'));
	}

	function parser($expr){
		$ass = new ANTLRStringStream($expr);
		$lex = new t013parserLexer($ass);
		$cts = new CommonTokenStream($lex);
		$tap = new t013parserParser($cts);
		return $tap;
	}
	
	function readFile($filename){
		$handle = fopen($filename, "r");
		$contents = fread($handle, filesize($filename));
		fclose($handle);
		return $contents;
	}
}

?>