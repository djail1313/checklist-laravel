<?php


namespace App\Http\V1\QueryBuilder\Concerns;


trait CustomAddsFieldsToQuery
{

    protected function addRequestedModelFieldsToQuery()
    {
        $modelTableName = $this->getModel()->getTable();

        $modelFields = $this->request->fields()->get($modelTableName);

        if (empty($modelFields)) {
            $modelFields = $this->request->fields()->get(0);
        }

        $prependedFields = $this->prependFieldsWithTableName($modelFields, $modelTableName);

        $this->select($prependedFields);
    }

}
