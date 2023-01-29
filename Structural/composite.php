<?php

interface Renderable
{
    public function render();
}

class Mail implements Renderable
{
    private array $parts = [];

    public function render()
    {
        $result = '';
        foreach ($this->parts as $part) {
            $result .= $part->render() . PHP_EOL;
        }
        return $result;
    }

    public function addPart(Renderable $part)
    {
        $this->parts[] = $part;
    }
}

abstract class Part
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
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * @param string $text
     */
    public function setText(string $text): void
    {
        $this->text = $text;
    }

}

class Header extends Part implements Renderable
{

    public function render()
    {
        return $this->getText();
    }
}

class Body extends Part implements Renderable
{

    public function render()
    {
        return $this->getText();
    }
}

$mail = new Mail();
$mail->addPart(new Header('Header'));
$mail->addPart(new Body('Body'));
var_dump($mail->render());
