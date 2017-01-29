<?php

$configurationFilePaths = glob('data/scenarios/remote-mappings/{*,**/*}.xml', GLOB_BRACE);


$projectConfigurationDocument = new DOMDocument();
$projectConfigurationDocument->load('data/scenarios/remote-mappings/remote-mappings.iml');
$moduleNode = $projectConfigurationDocument->getElementsByTagName('module')->item(0);


foreach ($configurationFilePaths as $configurationFilePath) {
    $configurationDocument = new DOMDocument();
    $configurationDocument->load($configurationFilePath);

    $components = $configurationDocument->getElementsByTagName('component');
    for ($i = 0; $i < $components->length; $i++) {
        $component = $components->item($i);
        $moduleNode->appendChild($projectConfigurationDocument->importNode($component, true));
        echo $component->getAttribute('name') . " imported\n";
    }
}


$projectConfigurationDocument->save('build/module.xml');