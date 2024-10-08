/**
 * Maho
 *
 * @category    Mage
 * @package     Mage_Adminhtml
 * @copyright   Copyright (c) 2006-2020 Magento, Inc. (https://magento.com)
 * @copyright   Copyright (c) 2022-2024 The OpenMage Contributors (https://openmage.org)
 * @license     https://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
 */

var Variables = {
    textareaElementId: null,
    variablesContent: null,
    dialogWindow: null,
    dialogWindowId: 'variables-chooser',
    overlayShowEffectOptions: null,
    overlayHideEffectOptions: null,
    insertFunction: 'Variables.insertVariable',

    init: function(textareaElementId, insertFunction) {
        if (document.getElementById(textareaElementId)) {
            this.textareaElementId = textareaElementId;
        }
        if (insertFunction) {
            this.insertFunction = insertFunction;
        }
    },

    resetData: function() {
        this.variablesContent = null;
        this.dialogWindow = null;
    },

    openVariableChooser: function(variables) {
        if (this.variablesContent == null && variables) {
            this.variablesContent = '<ul>';
            variables.forEach(function(variableGroup) {
                if (variableGroup.label && variableGroup.value) {
                    this.variablesContent += '<li><b>' + variableGroup.label + '</b></li>';
                    variableGroup.value.forEach(function(variable) {
                        if (variable.value && variable.label) {
                            this.variablesContent += '<li style="padding-left: 20px;">' +
                                this.prepareVariableRow(variable.value, variable.label) + '</li>';
                        }
                    }.bind(this));
                }
            }.bind(this));
            this.variablesContent += '</ul>';
        }
        if (this.variablesContent) {
            this.openDialogWindow(this.variablesContent);
        }
    },

    openDialogWindow: function(variablesContent) {
        if (document.getElementById(this.dialogWindowId) && typeof Windows !== 'undefined') {
            Windows.focus(this.dialogWindowId);
            return;
        }

        this.overlayShowEffectOptions = Windows.overlayShowEffectOptions;
        this.overlayHideEffectOptions = Windows.overlayHideEffectOptions;
        Windows.overlayShowEffectOptions = { duration: 0 };
        Windows.overlayHideEffectOptions = { duration: 0 };

        this.dialogWindow = Dialog.info(variablesContent, {
            draggable: true,
            resizable: true,
            closable: true,
            className: "magento",
            windowClassName: "popup-window",
            title: 'Insert Variable...',
            width: 700,
            //height:270,
            zIndex: 9000,
            recenterAuto: false,
            hideEffect: Element.hide,
            showEffect: Element.show,
            id:this.dialogWindowId,
            onClose: this.closeDialogWindow.bind(this)
        });
        variablesContent.evalScripts.bind(variablesContent).defer();
    },

    closeDialogWindow: function(window) {
        if (!window) {
            window = this.dialogWindow;
        }
        if (window) {
            window.close();
            Windows.overlayShowEffectOptions = this.overlayShowEffectOptions;
            Windows.overlayHideEffectOptions = this.overlayHideEffectOptions;
        }
    },

    prepareVariableRow: function(varValue, varLabel) {
        var value = (varValue).replace(/"/g, '&quot;').replace(/\\/g, '\\\\').replace(/'/g, '\\&#39;');
        var content = '<a href="#" onclick="' + this.insertFunction + '(\'' + value + '\');return false;">' + varLabel + '</a>';
        return content;
    },

    insertVariable: function(value) {
        this.closeDialogWindow(this.dialogWindow);
        var textareaElm = document.getElementById(this.textareaElementId);
        if (textareaElm) {
            var scrollPos = textareaElm.scrollTop;
            updateElementAtCursor(textareaElm, value);
            textareaElm.focus();
            textareaElm.scrollTop = scrollPos;
            textareaElm = null;
        }
        return;
    }
};

var OpenmagevariablePlugin = {
    editor: null,
    variables: null,
    textareaId: null,

    setEditor: function(editor) {
        this.editor = editor;
    },

    loadChooser: function(url, textareaId) {
        this.textareaId = textareaId;
        if (this.variables == null) {
            var xhr = new XMLHttpRequest();
            xhr.open("GET", url, true);
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    if (xhr.responseText.isJSON()) {
                        Variables.init(null, 'OpenmagevariablePlugin.insertVariable');
                        this.variables = JSON.parse(xhr.responseText);
                        this.openChooser(this.variables);
                    }
                }
            }.bind(this);
            xhr.send();
        } else {
            this.openChooser(this.variables);
        }
        return;
    },

    openChooser: function(variables) {
        Variables.openVariableChooser(variables);
    },

    insertVariable: function(value) {
        if (this.textareaId) {
            Variables.init(this.textareaId);
            Variables.insertVariable(value);
        } else {
            Variables.closeDialogWindow();
            this.editor.execCommand('mceInsertContent', false, value);
        }
        return;
    }
};
