/**
 *
 * You can write your JS code here, DO NOT touch the default style file
 * because it will make it harder for you to update.
 *
 */

"use strict";
$(function() {
    $("[data-toggle='tumbler']").tooltip();

    $(".menu-toggle").dropdown();
});




(function($) {
    Object.defineProperties(FormData.prototype, {
        load: {
            value: function(d) {
                switch (true) {
                    case d instanceof HTMLFormElement: // form
                        d.find("[name]").forEach(i => {
                            this.delete(i.name);
                            this.append(i.name, i.value);
                        });
                        break;
                    case d.__proto__ && d.__proto__.hasOwnProperty("value"): // input, textarea ,x-check etc
                        this.delete(d.name);
                        this.append(d.name, d.value);
                        break;
                    default: // raw object
                        for (var v in d) {
                            this.delete(v);
                            // previn trimitere de tag
                            !(d[v] || {}).tagName && this.append(v, typeof d[v] === 'string' ? d[v] : JSON.stringify(d[v]));
                        }
                        break;
                }
            },
            enumerable: true
        },
        clear: {
            value: function() {
                var k = [];
                for (var key of this.keys()) {
                    k.push(key);
                }
                k.map(key => this.delete(key));
            },
            enumerable: true
        },
        rename: {
            value: function(entrie, to) {
                if (this.getAll(entrie).length > 1) {
                    throw Error("FormData can't rename multiple values! ");
                }
                let orig = this.get(entrie);
                gettype(orig) === "File" ? this.append(to, orig, to) : this.append(to, orig);
                this.delete(entrie);
            },
            enumerable: true
        },
        list: {
            get: function() {
                let o = {};
                for (let [k, v] of this.entries()) {
                    var found = this.getAll(k);
                    o[k] = found.length > 1 ? found : this.get(k);
                }
                return o;
            },
            enumerable: true
        },
        model: {
            value: function(name) {
                let o = {};
                for (let [k, v] of this.entries()) {
                    if (k.startsWith(name)) {
                        var found = this.getAll(k);
                        o[k] = found.length > 1 ? found : this.get(k);
                    }
                }
                return o;
            },
            enumerable: true
        },
        filter: {
            value: function(name, func = function(k, v) { if (v === "") return k }) {
                let model = this.model(name);
                for (let k in model) {
                    let key = func(k, model[k]);
                    if (key)
                        this.delete(key)
                }
            },
            enumerable: true
        },
    });

    $("form").on("updateMessages afterValidate afterValidateAttribute", function(e, response) {
        $('.nav-tabs a span.required').remove();
        var errors = {};
        window.errors = errors
        $.each($('.tab-pane').find('.has-error'), function() {
            console.log($(this), ':', $(this).parents('form,[class*="d-none"],[style*="display: none"]').length);
            if ($(this).parents('form , [class*="d-none"],[style*="display: none"]').length == 1) {

                var parent = $(this).parents("div[class*='tab-pane']").attr("id");
                errors[parent] = errors[parent] ? errors[parent] + 1 : 1;
            }
        })
        for (const key in errors) {

            const value = errors[key];
            console.log('errors:', key, value, $('#' + key + "-tab"));
            if (value > 4) {
                $('#' + key + "-tab").append(' <span class="required">(' + value + ') *</span>');
            } else {
                for (let index = 0; index < value; index++) {
                    $('#' + key + "-tab").append(' <span class="required">*</span>');
                }
            }

        }

    })

})(jQuery);

let update_sidebar_tooltip = function(mini) {

    if (!mini) {
        $(".main-sidebar .sidebar-menu > li > ul .dropdown-title").remove();
        $(".main-sidebar .sidebar-menu > li > a").removeAttr('data-toggle').removeAttr('data-original-title').removeAttr('title');
    } else {
        $(".main-sidebar .sidebar-menu > li").each(function() {
            let me = $(this);

            if (me.find('> .dropdown-menu').length) {
                me.find('> .dropdown-menu').hide();
                me.find('> .dropdown-menu').prepend('<li class="dropdown-title pt-3">' + me.find('> a').text() + '</li>');
            } else {
                me.find('> a').attr('data-toggle', 'tooltip');
                me.find('> a').attr('data-original-title', me.find('> a').text());
//                $("[data-toggle='tooltip']").tooltip();
            }
        });
    }
}
