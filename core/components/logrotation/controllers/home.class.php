<?php

/**
 * The home manager controller for logRotation.
 *
 */
class logRotationHomeManagerController extends modExtraManagerController
{
    /** @var logRotation $logRotation */
    public $logRotation;


    /**
     *
     */
    public function initialize()
    {
        $this->logRotation = $this->modx->getService('logRotation', 'logRotation', MODX_CORE_PATH . 'components/logrotation/model/');
        parent::initialize();
    }


    /**
     * @return array
     */
    public function getLanguageTopics()
    {
        return ['logrotation:default'];
    }


    /**
     * @return bool
     */
    public function checkPermissions()
    {
        return true;
    }


    /**
     * @return null|string
     */
    public function getPageTitle()
    {
        return $this->modx->lexicon('logrotation');
    }


    /**
     * @return void
     */
    public function loadCustomCssJs()
    {
        $this->addCss($this->logRotation->config['cssUrl'] . 'mgr/main.css');
        $this->addJavascript($this->logRotation->config['jsUrl'] . 'mgr/logrotation.js');
        $this->addJavascript($this->logRotation->config['jsUrl'] . 'mgr/misc/utils.js');
        $this->addJavascript($this->logRotation->config['jsUrl'] . 'mgr/misc/combo.js');
        $this->addJavascript($this->logRotation->config['jsUrl'] . 'mgr/widgets/items.grid.js');
        $this->addJavascript($this->logRotation->config['jsUrl'] . 'mgr/widgets/items.windows.js');
        $this->addJavascript($this->logRotation->config['jsUrl'] . 'mgr/widgets/home.panel.js');
        $this->addJavascript($this->logRotation->config['jsUrl'] . 'mgr/sections/home.js');

        $this->addHtml('<script type="text/javascript">
        logRotation.config = ' . json_encode($this->logRotation->config) . ';
        logRotation.config.connector_url = "' . $this->logRotation->config['connectorUrl'] . '";
        Ext.onReady(function() {MODx.load({ xtype: "logrotation-page-home"});});
        </script>');
    }


    /**
     * @return string
     */
    public function getTemplateFile()
    {
        $this->content .= '<div id="logrotation-panel-home-div"></div>';

        return '';
    }
}