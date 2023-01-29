<?php

class Operator
{
    public function make(Builder $builder): Message
    {
        $builder->makeHeader();
        $builder->makeBody();
        $builder->makeFooter();
        $builder->makeCustom();
        return $builder->getText();
    }
}

interface Builder
{
    public function makeHeader();
    public function makeBody();
    public function makeFooter();
    public function makeCustom();

    public function getText();
}

class TextBuilder implements Builder
{

    private Message $message;

    public function make()
    {
        $this->message = new Message();
    }

    public function makeHeader()
    {
        $this->message->setPart(new Header('Header'));
    }

    public function makeBody()
    {
        $this->message->setPart(new Body('Body'));
    }

    public function makeFooter()
    {
        $this->message->setPart(new Footer('Footer'));
    }

    public function makeCustom()
    {
        $this->message->setPart(new Custom('Custom'));
    }

    public function getText():Message
    {
        return $this->message;
    }
}

class Section
{
    private string $text;

    /**
     * @param string $text
     */
    public function __construct(string $text)
    {
        $this->text = $text;
    }

    public function __toString(): string
    {
        return $this->text;
    }
}

class Header extends Section
{

}
class Body extends Section
{

}
class Footer extends Section
{

}
class Custom extends Section
{

}

class Message
{
    private $text;

    public function setPart($part)
    {
        $this->text .= $part . PHP_EOL;
    }

    public function getText(): string
    {
        return $this->text;
    }
}

$operator = new Operator();
$builder = new TextBuilder();
$builder->make();
$message = $operator->make($builder);
print_r($message->getText());
