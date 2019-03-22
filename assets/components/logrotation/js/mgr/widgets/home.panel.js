logRotation.panel.Home = function (config) {
    config = config || {};
    Ext.apply(config, {
        baseCls: 'modx-formpanel',
        layout: 'anchor',
        /*
         stateful: true,
         stateId: 'logrotation-panel-home',
         stateEvents: ['tabchange'],
         getState:function() {return {activeTab:this.items.indexOf(this.getActiveTab())};},
         */
        hideMode: 'offsets',
        items: [{
            html: '<h2>' + _('logrotation') + '</h2>',
            cls: '',
            style: {margin: '15px 0'}
        }, {
            xtype: 'modx-tabs',
            defaults: {border: false, autoHeight: true},
            border: true,
            hideMode: 'offsets',
            items: [{
                title: _('logrotation_items'),
                layout: 'anchor',
                items: [{
                    html: _('logrotation_intro_msg'),
                    cls: 'panel-desc',
                }, {
                    xtype: 'logrotation-grid-items',
                    cls: 'main-wrapper',
                }]
            }]
        }]
    });
    logRotation.panel.Home.superclass.constructor.call(this, config);
};
Ext.extend(logRotation.panel.Home, MODx.Panel);
Ext.reg('logrotation-panel-home', logRotation.panel.Home);
