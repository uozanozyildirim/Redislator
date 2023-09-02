<?php
use PHPUnit\Framework\TestCase;
use App\Translator;

class TranslationTest extends TestCase
{
    public function testInitClass()
    {
        $translator = new Translator();
        $this->assertInstanceOf(Translator::class, $translator);
    }


    public function testTranslate()
    {
        $translator = new Translator();
        $result = $translator->translate('Hello');

        $this->assertEquals('Merhaba', $result);
    }


    public function testTranslateWithInvalidKey()
    {
        $translator = new Translator();
        $result = $translator->translate('InvalidKey');

        $this->assertEquals('InvalidKey', $result);
    }

    public function testTranslateWithInvalidLanguage()
    {
        $translator = new Translator();
        $result = $translator->translate('InvalidKey', 'en');

        $this->assertEquals('Invalid Language', $result);
    }

    public function testTranslateWithoutCache()
    {
        $translator = new Translator();
        $result = $translator->translate('InvalidKey', 'en');

        $this->assertEquals('Invalid Language', $result);
    }

    public function testTranslateWithCache()
    {
        $translator = new Translator();
        $result = $translator->translate('InvalidKey', 'en');

        $this->assertEquals('Invalid Language', $result);
    }

    public function testTranslateWithCacheAndInvalidKey()
    {
        $translator = new Translator();
        $result = $translator->translate('InvalidKey', 'en');

        $this->assertEquals('Invalid Language', $result);
    }

    public function testTranslateWithDefaultLanguage()
    {
        $translator = new Translator();
        $result = $translator->translate('InvalidKey', 'en');

        $this->assertEquals('Invalid Language', $result);
    }











}