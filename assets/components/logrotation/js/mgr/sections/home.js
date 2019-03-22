logRotation.page.Home = function (config) {
    config = config || {};
    Ext.applyIf(config, {
        components: [{
            xtype: 'logrotation-panel-home',
            renderTo: 'logrotation-panel-home-div'
        }]
    });
    logRotation.page.Home.superclass.constructor.call(this, config);
};
Ext.extend(logRotation.page.Home, MODx.Component);
Ext.reg('logrotation-page-home', logRotation.page.Home);