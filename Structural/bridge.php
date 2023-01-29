<?php

interface Formatter
{
    public function format($str): string;
}

class SimpleText implements Formatter
{

    public function format($str): string
    {
        return $str;
    }
}

class HTMLText implements Formatter
{

    public function format($str): string
    {
        return "<p>$str</p>";
    }
}

abstract class Bridge
{
    public function __construct(public Formatter $formatter)
    {
    }

    abstract public function getFormatter();
}

class TextBridge extends Bridge
{
    public function getFormatter()
    {
        return $this->formatter->format('text');
    }
}
class HTMLBridge extends Bridge
{
    public function getFormatter()
    {
        return $this->formatter->format('html');
    }
}

$simple = new SimpleText();
$html = new HTMLText();

$textBridge = new TextBridge($simple);
$htmlBridge = new HTMLBridge($html);

var_dump($textBridge->getFormatter());
var_dump($htmlBridge->getFormatter());