<?php

App::uses("App", "Model");

/*
 * done write a testcase for the codesample model
 */

class CodeSample extends AppModel {

    public $useTable = false;

    /**
     * Method to determine if the given file type and name is allowed in the pool
     * @param $type
     * @param $fileName
     * @return bool
     */
    public function fileAllowed($type, $fileName) {

        $allowedFiles = array(
            "Controller" => array(
                "CodeSamples" => true,
                "Posts" => true,
                "Pages" => true,
                "Users" => true
            ),
            "Model" => array(
                "CodeSample" => true,
                "Post" => true,
                "User" => true
            ),
            "View" => array(
                "CodeSamples\\get_source" => true,
                "CodeSamples\\models" => true
            ),
            "Config" => array(
                "Schema\\schema" => true
            ),
            "Test" => array(
                "Case\\Model\\CodeSample" => true
            )
        );

        if (isset($allowedFiles[$type][$fileName])) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Method to find return its source as HTML
     * @param $type
     * @param $fileName
     * @return bool|string
     */
    public function getSource($type, $fileName) {
        $fileEnding = "";
        switch ($type) {
            case "Controller":
                $fileEnding = "Controller.php";
                break;
            case "Model":
                $fileEnding = ".php";
                break;
            case "View":
                $fileEnding = ".ctp";
                break;
            case "Config":
                $fileEnding = ".php";
                break;
            case "Test":
                $fileEnding = "Test.php";
                break;
        }

        $filePath = APP . $type . DS . $fileName . $fileEnding;
        $filePath = str_replace("\\", "/", $filePath);

        if (!file_exists($filePath)) {
            return false;
        } else {
            return htmlentities(file_get_contents($filePath));
        }
    }

    public function cleanShellExecOutput($output) {
        /*
         * todo write a test case
         */
        $output = str_replace("[36m", "", $output);
        $output = str_replace("[35m", "", $output);
        $output = str_replace("[0m", "", $output);

        $lines = explode("\n", trim($output));

        $cleanOutput = "";

        foreach($lines as $line) {
            if (strpos($line, "Path:") !== false) {
                $cleanOutput .= "Path: /hidden/for/security/purposes/\n";
            } else {
                $cleanOutput .= $line . "\n";
            }
        }

        return $cleanOutput;
    }

} 