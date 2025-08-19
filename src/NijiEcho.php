<?php

namespace FunkyDuck\NijiEcho;

class NijiEcho 
{
    protected string $text = '';
    protected ?string $foregroundColor = null;
    protected ?string $backgroundColor = null;
    protected array $options = [];

    private static $foregroundColors = [
        'black'         => '0;30', 'dark_gray'      => '1;30',
        'red'           => '0;31', 'light_red'      => '1;31',
        'green'         => '0;32', 'light_green'    => '1;32',
        'brown'         => '0;33', 'yellow'         => '1;33',
        'blue'          => '0;34', 'light_blue'     => '1;34',
        'magenta'       => '0;35', 'light_purple'   => '1;35',
        'cyan'          => '0;36', 'light_cyan'     => '1;36',
        'light_gray'    => '0;37', 'white'          => '1;37',
    ];
    private static $backgroundColors = [
        'black' => '40', 'red'          => '41',
        'green' => '42', 'yellow'       => '43',
        'blue'  => '44', 'magenta'      => '45',
        'cyan'  => '46', 'light_gray'   => '47',
    ];
    private static $optionCodes = [];

    public static function success(string $text): self
    {
        return self::text($text)->color('light_green');
    }

    public static function error(string $text): self
    {
        return self::text($text)->color('white')->background('red');
    }

    public static function warning(string $text): self
    {
        return self::text($text)->color('yellow');
    }

    public static function info(string $text): self
    {
        return self::text($text)->color('light_cyan');
    }

    public static function text(string $text): self 
    {
        $instance = new self();
        $instance->text = $text;
        return $instance;
    }

    public function color(string $color): self 
    {
        $this->foregroundColor = $color;
        return $this;
    }

    public function background(string $color): self 
    {
        $this->backgroundColor = $color;
        return $this;
    }

    public function __toString()
    {
        $codes = [];

        if(isset(self::$foregroundColors[$this->foregroundColor])) {
            $codes[] = self::$foregroundColors[$this->foregroundColor];
        }
        if(isset(self::$backgroundColors[$this->backgroundColor])) {
            $codes[] = self::$backgroundColors[$this->backgroundColor];
        }

        if(empty($codes)) {
            return $this->text;
        }

        return "\033[" . implode(';', $codes) . "m" . $this->text . "\033[0m";
    }
}