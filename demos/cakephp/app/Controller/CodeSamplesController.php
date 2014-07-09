<?php

App::uses('AppController', 'Controller');

class CodeSamplesController extends AppController {

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow();
    }

    public function resetSchema() {

        $this->loadModel("Group");

        $cakeConsolePath = APP . "Console/cake";

        $outputs = "";

        $command = 'printf "y\ny\n" | ' . $cakeConsolePath . ' schema create';
        $outputs .= $this->CodeSample->cleanShellExecOutput(shell_exec($command)) . "\n\n";

        $this->set("title", "Resetting the database");
        $this->set("output", $outputs);
    }

    public function tests() {
        $items = array(
            "App\\Test\\Case\\Model\\CodeSampleTest" => Router::url(array(
                    "controller" => "CodeSamples",
                    "action" => "getSource",
                    "Test",
                    "Case\\Model\\CodeSample"
                ))
        );

        $this->set("title", "Sample Source Codes of CakePHP Test Cases");
        $this->set("items", $items);

        $this->render("models");
    }

    public function schemas() {
        $items = array(
            "App\\Config\\Schema\\schema" => Router::url(array(
                    "controller" => "CodeSamples",
                    "action" => "getSource",
                    "Config",
                    "Schema\\schema"
                ))
        );

        $this->set("title", "Sample Source Codes of CakePHP Schema Generators");
        $this->set("items", $items);

        $this->render("models");
    }

    public function controllers() {
        $items = array(
            "App\\Controller\\CodeSamples" => Router::url(array(
                    "controller" => "CodeSamples",
                    "action" => "getSource",
                    "Controller",
                    "CodeSamples"
                )),
            "App\\Controller\\Posts" => Router::url(array(
                    "controller" => "CodeSamples",
                    "action" => "getSource",
                    "Controller",
                    "Posts"
                )),
            "App\\Controller\\Pages" => Router::url(array(
                    "controller" => "CodeSamples",
                    "action" => "getSource",
                    "Controller",
                    "Pages"
                ))
        );

        $this->set("title", "Sample Source Codes of CakePHP Controllers");
        $this->set("items", $items);

        $this->render("models");
    }

    public function views() {
        $items = array(
            "App\\View\\CodeSamples\\get_source" => Router::url(array(
                    "controller" => "CodeSamples",
                    "action" => "getSource",
                    "View",
                    "CodeSamples\\get_source"
                )),
            "App\\View\\models" => Router::url(array(
                    "controller" => "CodeSamples",
                    "action" => "getSource",
                    "View",
                    "CodeSamples\\models"
                ))
        );

        $this->set("title", "Sample Source Codes of CakePHP Views");
        $this->set("items", $items);

        $this->render("models");
    }

    public function models() {
        /*
         * done Create a view source code element
         * done In the element read an array of items to generate an accordion.
         * done The items in the array will hold a friendly file name and a link to the CodeSamplesController::getSource method
         * done Write a jQuery ajax function to load contents from the given URL and the element to populate
         * done Create the view to show all the codes for all the controllers, models and views
         * done Organize each view in an accordion
         * done when the accordion is expanded, the system will make an ajax call to CodeSamplesController::getSource(type, file)
         */

        $items = array(
            "App\\Model\\CodeSample" => Router::url(array(
                    "controller" => "CodeSamples",
                    "action" => "getSource",
                    "Model",
                    "CodeSample"
                )),
            "App\\Model\\Post" => Router::url(array(
                    "controller" => "CodeSamples",
                    "action" => "getSource",
                    "Model",
                    "Post"
                )),
            "App\\Model\\User" => Router::url(array(
                    "controller" => "CodeSamples",
                    "action" => "getSource",
                    "Model",
                    "User"
                ))
        );

        $this->set("title", "Sample Source Codes of CakePHP Models");
        $this->set("items", $items);
    }

    public function getSource($type, $fileName) {
        /*
         * done Write a test case to test this controller
         * done make sure the type is valid allowed types
         * done make sure the fileName is present in the allowed fileName collection
         * done read the sources codes
         * done return the codes as a html document
         * done Load only the contents and disable layout
         */

        $this->layout = false;

        // normally CodeSample model is automatically loaded. But while running PHPUnit it is a little bit tricky
        $this->loadModel("CodeSample");

        if ($this->CodeSample->fileAllowed($type, $fileName)) {
            $this->set("source", $this->CodeSample->getSource($type, $fileName));
        } else {
            $this->set("source", "<h1 style='color:red'>The requested file is not valid!</h1>");
        }
    }

} 