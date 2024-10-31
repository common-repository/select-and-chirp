jQuery(document).ready(function ($) {
    "use strict";
    /**
     * Tab show and hide
     */
    $('body').on('click', '.tdt-wrap .nav-tab', function () {
        var settings_ref = $(this).data('settings-ref');
        $('.tdt-wrap .nav-tab').removeClass('nav-tab-active');
        $(this).addClass('nav-tab-active');
        $('.tdt-settings-section').hide();
        $('.tdt-settings-section[data-settings-ref="' + settings_ref + '"]').show();
        if (settings_ref == 'help' || settings_ref == 'about') {
            $('.tdt-settings-action').hide();
        } else {
            $('.tdt-settings-action').show();
        }

    });


    /**
     * Customize setting status event
     */

    $("body").on('change', '#tdt-customize-status', function () {
        if (this.checked) {

            $('.tdt-customize-field').show();
        } else {

            $('.tdt-customize-field').hide();
        }
    });



    /**
     * Basic settings status
     */
    $("body").on('change', '#tdt-basic-status', function () {
        if (this.checked) {

            $('.tdt-basic-wrap').show();
        } else {

            $('.tdt-basic-wrap').hide();
        }
    });


    /**
     * Text Type Dropdown event
     * */
    $('body').on('change', '.tdt-template-dropdown-text', function () {
        var template = $(this).val();

        $('.tdt-each-template-preview-text').hide();
        $('.tdt-each-template-preview-text[data-template-ref="' + template + '"]').show();

    });

    $('body').on('change', '.tdt-template-dropdown-block', function () {
        var btemplate = $(this).val();

        $('.tdt-each-template-preview-block').hide();
        $('.tdt-each-template-preview-block[data-block="' + btemplate + '"]').show();

    });

    $('body').on('change', '.tdt-toggle-trigger', function () {

        var toggle_ref = $(this).val();
        var toggle_class = $(this).data('toggle-class');
        $('.' + toggle_class).hide();
        $('.' + toggle_class + '[data-toggle-ref="' + toggle_ref + '"]').show();

    });


    $('.tdt-field input[type="checkbox"]').each(function () {
        if (!$(this).parent().hasClass('tdt-checkbox-toggle') && !$(this).hasClass('stdl-disable-checkbox-toggle')) {
            var input_name = $(this).attr('name');
            $(this).parent().addClass('tdt-checkbox-toggle');
            $('<label></label>').insertAfter($(this));
        }
    });

    /**
     * template preview tab js
     */

    // Click function
    $('body').on('click', '.tdt-tabs-icon li', function () {

        $('.tdt-tabs-icon li').removeClass('active');
        $(this).addClass('active');
        var selected_text_icon = $(this).closest('.tdt-template-previews-image').find('.active img').attr('data-template');

        $('.tdt-template-dropdown-text option[value="' + selected_text_icon + '"]').prop('selected', true);
        return false;
    });

    $('body').on('click', '.tdt-logo-icon li', function () {

        $('.tdt-logo-icon li').removeClass('active');
        $(this).addClass('active');
        var selected_icon = $('.active img').attr('data-logo');
        if (selected_icon == 'twt-old-logo.png') {
            $('.tdt-old-templ').show();
            $('.tdt-new-templ').hide();

        } else {
            $('.tdt-old-templ').hide();
            $('.tdt-new-templ').show();
        }
        $('.tdt-template-dropdown-logo option[value="' + selected_icon + '"]').prop('selected', true);
        return false;
    });

});
