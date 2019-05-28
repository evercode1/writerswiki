<?php

namespace App\Console\Commands\Builders\Seeds;


class AppendSeedsBuilder
{

    public $initialValues = [];

    public $syllables = [];

    public $fileAppendPaths = [];




    public function appendSeedsFiles($input)
    {
        $this->setConfig($input);

        $this->writeFiles();

        return true;


    }



    private function setConfig($input)
    {

        $this->setInput($input);


    }


    /**
     * @param $input
     */

    private function setInput($input)
    {
        $this->initialValues['seedsName'] = $input['SeedsName'];
        $this->initialValues['groupTitle'] = $input['GroupTitle'];
        $this->syllables = $input['syllables'];



    }

    private function writeFiles()
    {

        $this->writeSeeds();


        $this->writeForm();



    }


    private function writeSeeds()
    {


        $groupTitle =$this->initialValues['groupTitle'];

        $configName = $this->initialValues['seedsName'];

        $words = $this->syllables;

        // set filename to the temporary flat file

        $tempFile = base_path('seeds/array-format-values.txt');

        // select template and insert to $filename, the temporary file

        $template = base_path('app/Console/Commands/Templates/SeedsTemplates/templates/appendSeedsTemplate.txt');
        $textContents = file($template);
        file_put_contents($tempFile, implode('', $textContents));

        //  iterate through each word in array and copy to tempfile

        foreach( $words as $key => $value){

            $contents = file($tempFile);
            $contents[2] = $contents[2] . "\n\n"; // Gives a new line
            file_put_contents($tempFile, implode('',$contents));

            $contents = file($tempFile);
            $contents[3] = "'" . $value . "',";
            file_put_contents($tempFile, implode('',$contents));

        }


        // get array from temp

        $txt =  file_get_contents(base_path('seeds/array-format-values.txt'));

        // open destination file

        $config = base_path('config/' . $configName . '.php');

        $contents = file_get_contents($config);

        // divide into parts

        $classParts = explode('[', $contents, 2);

        // inside destination file, insert array

        $txt = $classParts[0] . "[\n\n" . "'" . $groupTitle . "'" .  $txt . "\n\n" . $classParts[1];

        // write file

        $handle = fopen($config, "w");

        fwrite($handle, $txt);

        fclose($handle);


        // eliminate temp file

        unlink(base_path('seeds/array-format-values.txt'));



    }


    private function writeForm()
    {

        // open destination file

        $form = base_path('resources/views/seeder/create-form.blade.php');


        // dtermine vowel or consonants

        switch($this->initialValues['seedsName']){

            case 'vowels' :

                $contents = file($form);
                $contents[90] = $contents[90] . "\n\n"; // Gives a new line
                file_put_contents($form, implode('',$contents));

                $contents = file($form);
                $contents[91] = '<option value="'.
                    $this->initialValues['groupTitle'] .'">'
                    . $this->initialValues['groupTitle'] . '</option>';
                file_put_contents($form, implode('',$contents));
                break;

            case 'consonants' :

                $contents = file($form);
                $contents[122] = $contents[122] . "\n\n"; // Gives a new line
                file_put_contents($form, implode('',$contents));

                $contents = file($form);
                $contents[123] = '<option value="'.
                    $this->initialValues['groupTitle'] .'">'
                    . $this->initialValues['groupTitle'] . '</option>';
                file_put_contents($form, implode('',$contents));
                break;

            default:

                return;


        }





    }


}