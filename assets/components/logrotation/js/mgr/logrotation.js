var logRotation = function (config) {
    config = config || {};
    logRotation.superclass.constructor.call(this, config);
};
Ext.extend(logRotation, Ext.Component, {
    page: {}, window: {}, grid: {}, tree: {}, panel: {}, combo: {}, config: {}, view: {}, utils: {}
});
Ext.reg('logrotation', logRotation);

logRotation = new logRotation();