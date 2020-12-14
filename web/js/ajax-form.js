"use strict";

function firstError(arr) {
    for (let i in arr) {
        console.log(i, arr[i].length, $('#' + i).length)
        if (arr[i].length && $('#' + i).length)
            return i;
    }
}


function findInTab($form, attributes) {
    var $tab = null
    $.each($form.find('.nav.nav-tabs').first().find('li>a.active'), function(i, tabLink) {
        $tab = $($(tabLink).attr('href'))
        console.log('tab:', $tab)
        for (let i in attributes) {
            console.log($tab.attr('id'), '#' + i, $tab.find('#' + i).length)
            if ($tab.find('#' + i).length)
                return false
        }
        $tab = null;
    })
    if ($tab)
        return $tab.attr('id');
    else {
        $.each($form.find('.nav li>a').not('.active'), function(i, tabLink) {
            $tab = $($(tabLink).attr('href'))
            console.log('tab:', $tab)
            for (let i in attributes) {
                console.log($tab.attr('id'), '#' + i, $tab.find('#' + i).length)
                if ($tab.find('#' + i).length)
                    return false
            }
            $tab = null;
        });
    }

    return $tab && $tab.attr('id');
}


function errorTab($form, response) {
    if ($form.find('.nav.nav-tabs').length) {
        $.each($form.find('.tab-pane'), function() {
            errorTab($(this), response)
        })

    }
    var tabId = findInTab($form, response.data)
    if (tabId) {
        activaTab(tabId);

    }
    console.log('error on Tab:', tabId)
    return tabId;

}

function shakeModal($tabpane) {
    $($tabpane).addClass("shake");
    setTimeout(function() { $($tabpane).removeClass("shake"); }, 1000);
}

function activaTab(tab) {
    $('.nav-tabs a[href="#' + tab + '"]').tab('show');
};

function existAttribute($form, attribute) {
    for (const key in object) {
        if (arr[i].length && $('#' + i).length)
            return i;
    }
}


function updateAttributes($form, response) {
    for (const i in response.data) {
        var $el = $('#' + i);
        if ($el.length && !$form.yiiActiveForm('find', i)) { //if exist add to yiiActiveForm
            $form.yiiActiveForm('add', {
                id: i,
                name: $el.attr('name'),
                container: '.field-' + i,
                input: '#' + $el.attr('id'),
                error: '.help-block',
                validate: function(attribute, value, messages, deferred, $form) {
                    // yii.validation.required(value, messages, { message: "Validation Message Here" });
                }
            });
        }
    }
}




$(document).ready(function() {


    $(".ajax-form").on("afterAjax", function(e, response) {

        console.log('reponse,', response)
        updateAttributes($(this), response)
        if ($(this).find('.nav.nav-tabs').length) {
            // tabsError($(this), response);
            errorTab($(this), response);
        }

    });

    $('[data-validate]').on('blur', function() {

        var $form = $(this).parents('form');
        $form.yiiActiveForm("validateAttribute", $(this).data('validate'), true)
        console.log('data-validate', $(this).data('validate'), $form, $form.find('.has-error'));
        setTimeout(() => {
            console.log('trigger afterValidate')
            $form.trigger('afterValidate')
        }, 300);

    })

    $('.ajax-form').on('submit', function(e) {
        e.preventDefault();
        e.stopImmediatePropagation();


        var $form = $(this)


        var data = new FormData($form[0]);
        var filter = $form.data('form-filter')
        if (filter) {
            let filters = filter.split(" ");
            filters.forEach(filter => {
                data.filter(filter)
            });
        }

        console.log($form, data);
        $.ajax({
            type: "POST",
            enctype: $form.attr('enctype'),
            processData: false, // Important!
            contentType: false,
            cache: false,
            url: $form.attr('action'),
            data: data
        }).done(function(response) {

            if (!response.success) {
                window.response = response
                $form.trigger('afterAjax', response)
                if (response.data) {
                    $form.yiiActiveForm('updateMessages', response.data);
                    $form.trigger('updateMessages')
                }


            }

        }).fail(function() {
            console.log("error");
        });
    })
});