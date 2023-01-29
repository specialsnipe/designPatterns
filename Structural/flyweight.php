<?php

interface MailF
{
    public function render(): string;
}

abstract class TypeMail
{
    public function __construct(private string $text)
    {
    }

    public function getText()
    {
        return $this->text;
    }
}
class BusinessMail extends TypeMail implements MailF
{

    public function render(): string
    {
        return $this->getText() . 'from businnes';
    }
}

class JobMail extends TypeMail implements MailF
{

    public function render(): string
    {
        return $this->getText() . 'from job';
    }
}

class MailFactory
{
    private array $pool = [];

    public function getMail($id, $service): MailF
    {
        if (!isset($this->pool[$id])) {
            $this->pool[$id] = $this->make($service);
        }
        return $this->pool[$id];
    }

    private function make($typeMail): MailF
    {
        if ($typeMail == 'business') {
            return new BusinessMail('business');
        }
        return new JobMail('job');
    }
}

$factory = new MailFactory();
$mail = $factory->getMail(10, 'buwqes');
var_dump($mail->render());