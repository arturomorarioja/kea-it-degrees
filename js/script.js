/* eslint-disable no-undef */
/**
 * DOM management (menus, dropdown menus, content pages)
 * 
 * @author  Arturo Mora-Rioja
 * @version 1.0 July 2020
 */
"use strict";
$(document).ready(function() {

    // Subject content expands or collapses when its header is clicked on
    $("article > header").on("click", function() {
        const articleContent = $(this).siblings(":eq(0)");
        if (!articleContent.is(":visible")) {
            $("article.subject > main").slideUp();  // Subject info is hidden for all subjects
            articleContent.slideDown();             // Subject info for the present subject is shown
        } else {
            articleContent.slideUp();               // Subject info for the present subject is hidden
        }
    });

    // Positioning of secondary menus, only in computer mode   
    if ($(window).width() > 480) {
        const aAP = $("a#aAP");
        $("div#APMenu")
            .css({
                "top": aAP.offset().top + aAP.height(),
                "left": aAP.offset().left - 10,
                "width": aAP.outerWidth()
            });        
        const aPBA = $("a#aPBA");
        $("div#PBAMenu")
            .css({
                "top": aPBA.offset().top + aPBA.height(),
                "left": aPBA.offset().left - 10,
                "width": aPBA.outerWidth()
            });
    }

    // Display of secondary menus
    $("a#aAP").on("mouseenter", function() {   
        $("#APMenu").slideDown("fast");
    }).on("mouseleave", function() {
        $("#APMenu").hide();
    });
    $("a#aPBA").on("mouseenter", function() {   
        $("div#PBAMenu").slideDown("fast");
    }).on("mouseleave", function() {
        $("div#PBAMenu").hide();
    });
    $("div.dropDownMenu").on("mouseenter", function() {
        $(this).show();
    }).on("mouseleave", function() {
        $(this).hide();
    });
});