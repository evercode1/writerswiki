<?php

namespace App\Console\Commands\Tokens;

use App\Console\Commands\Tokens\TokenTraits\FormatsModel;

class Tokens
{
    use FormatsModel;

    public $front;
    public $model;
    public $masterPageName;
    public $appName;
    public $parent;
    public $child;
    public $configName;
    public $seedsName;
    public $namespace;
    public $tokens = [];

    public function __construct(array $tokens)
    {
        $this->setProperties($tokens);

        $this->setAndFormatModel();

        $this->tokens = $this->formatTokens();

    }


    public function formatTokens()
    {

        $allControllerName = $this->formatAllControllerName($this->tableName());

        $allViewFolder = 'all-' . str_plural($this->formatModelPath($this->model));

        $allGetRoute = 'all-' . str_plural($this->formatModelPath($this->model));

        $allGridComponentName = $this->formatAllGridComponentName($this->tableName());

        $allEndGridName = '/all-' . str_plural($this->formatModelPath($this->model));

        $allGridName = 'all-' . str_plural($this->formatModelPath($this->model));

        $allGridTitle = 'All ' . str_plural(ucwords($this->model));

        $allApiControllerMethod = $this->formatAllApiControllerMethod($this->tableName());

        $allApiDataPath = 'api/' . 'all-' . str_plural($this->formatModelPath($this->model)) . '-data';

        $allQueryName = 'All' . str_plural(ucwords($this->model));

        $appName = $this->appName;

        $apiControllerMethod = $this->formatApiControllerMethod();

        $apiDataPath = 'api/' . $this->formatModelPath($this->model) . '-data';

        $chartApiRoute = 'api/' . $this->formatModelPath($this->model) . '-chart';

        $chartApiControllerMethod = $this->formatChartApiControllerMethod();

        $child = $this->child;

        $childsTableName = $this->childTableName();

        $childMigrationModel = $this->formatMigrationModel($this->child);

        $childRelation = $this->formatChildRelation($this->child);

        $configName = $this->configName;

        $controllerName = $this->model . 'Controller';

        $createdAt = $this->formatInstanceVariable() . '->created_at';

        $endGridName = '/' . $this->formatVueGridName() . '-grid';

        $field_name = 'name';

        $folderName = $this->formatFolderName();

        $front = $this->front;

        $gridApiRoute = 'api/' . $this->formatFolderName() . '-data';

        $gridComponentName = $this->model . 'Grid';

        $gridName = $this->formatVueGridName() . '-grid';

        $imageFolderName = $this->formatImageFolderName($this->model);

        $masterPageName = $this->masterPageName;

        $masterAuthName = 'masters.master-auth';

        $migrationModel = $this->formatMigrationModel($this->model);

        $model = $this->formatModel($this->model);

        $modelAttribute = $this->formatInstanceVariable() . '->' . 'name';

        $modelId = $this->formatInstanceVariable() . '->id';

        $modelInstance = $this->formatInstanceVariable();

        $modelPath = $this->formatModelPath($this->model);

        $modelResults = $this->formatModelResults();

        $modelRoute = '/' . $this->formatFolderName();

        $modelsUpperCase = ucwords(str_plural($this->model));

        $namespace = ucwords($this->namespace);

        $parent = $this->parent;

        $parentFieldName = 'name';

        $parent_id = strtolower(snake_case($this->parent)) . '_id';

        $parentId = $this->formatParentInstanceVariable() . '->id';

        $parentInstance = $this->formatParentInstanceVariable();

        $parentInstances = $this->formatParents($this->parent);

        $parentModelPath = $this->formatModelPath($this->parent);

        $parentsTableName = $this->formatParentsTableName($this->parent);

        $seedsName = $this->seedsName;

        $tableName = $this->tableName();

        $upperCaseModelName = ucwords($this->model);

        $useModel = 'use App\\' . $upperCaseModelName;

        $useParent = 'use App\\' . $this->formatModel($this->parent);

        $vueApiControllerMethod = $this->formatVueApiControllerMethod();

        //create token array using compact

        $tokens = compact('allControllerName',
                          'allViewFolder',
                          'allGetRoute',
                          'allGridComponentName',
                          'allEndGridName',
                          'allGridName',
                          'allGridTitle',
                          'allApiControllerMethod',
                          'allApiDataPath',
                          'allQueryName',
                          'apiControllerMethod',
                          'apiDataPath',
                          'appName',
                          'chartApiRoute',
                          'chartApiControllerMethod',
                          'child',
                          'childMigrationModel',
                          'childRelation',
                          'childsTableName',
                          'createdAt',
                          'configName',
                          'controllerName',
                          'endGridName',
                          'field_name',
                          'folderName',
                          'front',
                          'gridApiRoute',
                          'gridComponentName',
                          'gridName',
                          'imageFolderName',
                          'masterAuthName',
                          'masterPageName',
                          'migrationModel',
                          'model',
                          'modelAttribute',
                          'modelId',
                          'modelInstance',
                          'modelPath',
                          'modelResults',
                          'modelRoute',
                          'modelsUpperCase',
                          'namespace',
                          'parent',
                          'parentFieldName',
                          'parentId',
                          'parent_id',
                          'parentInstance',
                          'parentInstances',
                          'parentModelPath',
                          'parentsTableName',
                          'seedsName',
                          'slug',
                          'tableName',
                          'upperCaseModelName',
                          'useModel',
                          'useParent',
                          'vueApiControllerMethod');

        return $tokens;

    }

    private function setProperties(array $tokens)
    {
        foreach ($tokens as $propertyName => $propertyValue) {

            if (property_exists($this, $propertyName)) {

                $this->$propertyName = $propertyValue;

            }


        }
    }

    private function formatAllGridComponentName($string)
    {

        $string = str_replace('_', ' ', $string);

        $allGridComponentName = 'All' . ucwords($string);

        return str_replace(' ', '', $allGridComponentName);


    }

    private function formatImageFolderName($model)
    {

        $model = preg_split('/(?=[A-Z])/',$model);

        $model = implode('', $model);

        $model = ltrim($model, '');

        return $model = strtolower($model);

    }

    private function formatAllControllerName($string)
    {

        $string = str_replace('_', ' ', $string);

        $allControllerName = 'All' . ucwords($string) . 'Controller';

        return str_replace(' ', '', $allControllerName);


    }

    private function formatAllApiControllerMethod($string)
    {

        $string = str_replace('_', ' ', $string);

        $allControllerName = 'all' . ucwords($string) . 'Data';

        return str_replace(' ', '', $allControllerName);


    }

    private function setAndFormatModel()
    {

        $this->model = $this->formatModel($this->model);

    }

    private function tableName()
    {
        $tableName = strtolower(snake_case($this->model));

        return str_plural($tableName);


    }

    private function childTableName()
    {
        $tableName = strtolower(snake_case($this->child));

        return str_plural($tableName);


    }



    private function formatInstanceVariable()
    {

        return camel_case($this->model);
    }

    private function formatModelResults()
    {

        $model = $this->formatInstanceVariable();

        return $model = str_plural($model);
    }

    private function formatParentInstanceVariable()
    {

        return camel_case($this->parent);
    }

    private function formatChartApiControllerMethod()
    {
        $modelMethod = $this->formatInstanceVariable();

        return $modelMethod . 'ChartData';

    }

    private function formatVueGridName()
    {
        $gridName = preg_split('/(?=[A-Z])/',$this->model);

        $gridName = implode('-', $gridName);

        $gridName = ltrim($gridName, '-');

        return $gridName = strtolower($gridName);

    }

    private function formatParents($parent)
    {

        $parent = strtolower($parent);

        return str_plural($parent);


    }



    private function formatFolderName()
    {

        return $this->formatModelPath($this->model);

    }

    private function formatMigrationModel($model)
    {
        $model = $this->formatModel($model);

        return $model = str_plural($model);

    }

    private function formatParentsTableName($parent)
    {

        $parent = snake_case($parent);

        return str_plural($parent);



    }

    private function formatChildRelation($child)
    {

        $child = camel_case($child);

        return str_plural($child);


    }

    private function formatApiControllerMethod()
    {
        $modelMethod = $this->formatInstanceVariable();

        return $modelMethod . 'Data';

    }

    private function formatVueApiControllerMethod()
    {
        $modelMethod = $this->formatInstanceVariable();

        return 'vue' . $modelMethod . 'Data';

    }

}