<?php
/** @var xPDOTransport $transport */
/** @var array $options */
/** @var modX $modx */
if ($transport->xpdo) {
    $modx =& $transport->xpdo;

    $dev = MODX_BASE_PATH . 'Extras/logRotation/';
    /** @var xPDOCacheManager $cache */
    $cache = $modx->getCacheManager();
    if (file_exists($dev) && $cache) {
        if (!is_link($dev . 'assets/components/logrotation')) {
            $cache->deleteTree(
                $dev . 'assets/components/logrotation/',
                ['deleteTop' => true, 'skipDirs' => false, 'extensions' => []]
            );
            symlink(MODX_ASSETS_PATH . 'components/logrotation/', $dev . 'assets/components/logrotation');
        }
        if (!is_link($dev . 'core/components/logrotation')) {
            $cache->deleteTree(
                $dev . 'core/components/logrotation/',
                ['deleteTop' => true, 'skipDirs' => false, 'extensions' => []]
            );
            symlink(MODX_CORE_PATH . 'components/logrotation/', $dev . 'core/components/logrotation');
        }
    }
}

return true;