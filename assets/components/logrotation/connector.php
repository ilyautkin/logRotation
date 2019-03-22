<?php
if (file_exists(dirname(dirname(dirname(dirname(__FILE__)))) . '/config.core.php')) {
    /** @noinspection PhpIncludeInspection */
    require_once dirname(dirname(dirname(dirname(__FILE__)))) . '/config.core.php';
} else {
    require_once dirname(dirname(dirname(dirname(dirname(__FILE__))))) . '/config.core.php';
}
/** @noinspection PhpIncludeInspection */
require_once MODX_CORE_PATH . 'config/' . MODX_CONFIG_KEY . '.inc.php';
/** @noinspection PhpIncludeInspection */
require_once MODX_CONNECTORS_PATH . 'index.php';
/** @var logRotation $logRotation */
$logRotation = $modx->getService('logRotation', 'logRotation', MODX_CORE_PATH . 'components/logrotation/model/');
$modx->lexicon->load('logrotation:default');

// handle request
$corePath = $modx->getOption('logrotation_core_path', null, $modx->getOption('core_path') . 'components/logrotation/');
$path = $modx->getOption('processorsPath', $logRotation->config, $corePath . 'processors/');
$modx->getRequest();

/** @var modConnectorRequest $request */
$request = $modx->request;
$request->handleRequest([
    'processors_path' => $path,
    'location' => '',
]);