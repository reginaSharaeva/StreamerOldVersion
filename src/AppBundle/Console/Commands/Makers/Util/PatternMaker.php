<?php
namespace App\Console\Commands\Makers\Util;


use App\Console\Commands\Makers\Util\TemplateMaker;
use Artisan;

class PatternMaker
{

    private $pathToApp;


    public function __construct($pathToApp)
    {
        $this->pathToApp = $pathToApp;
    }


    public function MakePatternByName(string $name, string $modelName):array
    {

        $templateMaker = new TemplateMaker($name, $modelName, "App");

        $interfaceFileName = $templateMaker->getInterfaceFileName();
        $classFileName = $templateMaker->getClassFileName();
        $classTemplate = $templateMaker->getClassTempalte();
        $interfaceTemplate = $templateMaker->getInterfaceTempalte();

        $pathToClassfile = $this->pathToApp . $name . "/Impl/" . $classFileName;
        $pathToInterfacefile = $this->pathToApp . $name . "/" . $interfaceFileName;

        if (!file_exists($this->pathToApp . $name)) {
            mkdir($this->pathToApp . $name);
        }
        if (!file_exists($this->pathToApp . $name . '/Impl')) {
            mkdir($this->pathToApp . $name . '/Impl');
        }

        if (!file_exists($pathToInterfacefile)) {

            $fp = fopen($pathToInterfacefile, "w");
            fwrite($fp, $interfaceTemplate);
            fclose($fp);

            if (!file_exists($pathToClassfile)) {

                $fp = fopen($pathToClassfile, "w");
                fwrite($fp, $classTemplate);
                fclose($fp);

            } else {
                return [
                    "message" => "Реализация данного паттерна уже существует",
                    "type" => "error"
                ];
            }

        } else {
            return [
                "message" => "Интерфес данного паттерна уже существует",
                "type" => "error"
            ];
        }

        Artisan::call('make:provider', ["name" => $modelName . $name . "Provider"]);

        return [
            "message" => "Паттерн создан",
            "type" => "info"
        ];

    }
}