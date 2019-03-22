<?php

class logRotationItemCreateProcessor extends modObjectCreateProcessor
{
    public $objectType = 'logRotationItem';
    public $classKey = 'logRotationItem';
    public $languageTopics = ['logrotation'];
    //public $permission = 'create';


    /**
     * @return bool
     */
    public function beforeSet()
    {
        $name = trim($this->getProperty('name'));
        if (empty($name)) {
            $this->modx->error->addField('name', $this->modx->lexicon('logrotation_item_err_name'));
        } elseif ($this->modx->getCount($this->classKey, ['name' => $name])) {
            $this->modx->error->addField('name', $this->modx->lexicon('logrotation_item_err_ae'));
        }

        return parent::beforeSet();
    }

}

return 'logRotationItemCreateProcessor';