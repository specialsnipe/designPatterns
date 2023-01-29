<?php

class Operator
{
    public static function make(Builder $builder)
    {
        $builder->makeHeader();
        $builder->makeBody();
        $builder->makeFooter();
        return $builder->getMessage();
    }
}

interface Builder
{
    public function makeHeader();
    public function makeBody();
    public function makeFooter();

    public function getMessage();
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
        $this->message->addText(new Header('head'));
    }

    public function makeBody()
    {
        $this->message->addText(new Body('body'));
    }

    public function makeFooter()
    {
       $this->message->addText(new Footer('footer'));
    }

    public function getMessage(): string
    {
        return $this->message->getText();
    }
}


class Content
{
    private string $text;

    /**
     * @param string $text
     */
    public function __construct(string $text)
    {
        $this->text = $text;
    }

    /**
     * @return mixed
     */
    public function getText(): string
    {
        return $this->text;
    }


    public function __toString(): string
    {
        return $this->text;
    }
}

class Header extends Content
{

}
class Body extends Content
{

}
class Footer extends Content
{

}

class Message
{
    private $fullText;

    public function addText(string $content)
    {
        $this->fullText .= $content.PHP_EOL;
    }

    public function getText(): string
    {
        return $this->fullText;
    }
}

$textBuilder = new TextBuilder();
$textBuilder->make();
print_r(Operator::make($textBuilder));