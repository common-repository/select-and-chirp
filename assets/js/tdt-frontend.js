jQuery(document).ready(function ($) {
    "use strict";
    
    

    var tdttwitterShareBtn = jQuery('#twt-js')[0];

    function getSelectionText() {
        var text = "";
        if (window.getSelection) {
            var sel = window.getSelection();
            if (sel.rangeCount > 0) {
                var range = sel.getRangeAt(0);
                if (range.toString()) {
                    var selParentEl = range.commonAncestorContainer;

                    // if (selParentEl.nodeType == 3) {
                    //     selParentEl = selParentEl.parentNode;

                    // }
                   
                    text = window.getSelection().toString();
                    // if (jQuery.inArray(selParentEl.nodeName, selecting_tags) != '-1') {
                    //     text = window.getSelection().toString();
                    // }
                }
            }
            text = window.getSelection().toString();
        }

        return text;
    }


    jQuery(document).on("mouseup", function (event) {
        var tdttwitterShareBtn = jQuery('#twt-js')[0];
        setTimeout(() => {
            var selectedText = getSelectionText();
           
            if (selectedText != '') {

                const x = event.pageX;
                const y = event.pageY;
               
                const tdttwitterShareBtnWidth = Number(getComputedStyle(tdttwitterShareBtn).width.slice(0, -2));
                const tdttwitterShareBtnHeight = Number(getComputedStyle(tdttwitterShareBtn).height.slice(0, -2));

                if (document.activeElement !== tdttwitterShareBtn) {
                    tdttwitterShareBtn.style.left = `${x - tdttwitterShareBtnWidth * 0.80}px`;
                    tdttwitterShareBtn.style.top = `${y - tdttwitterShareBtnHeight * 0.90}px`;
                   
                     tdttwitterShareBtn.style.display = "flex";
                    
                    tdttwitterShareBtn.classList.add("btnEntrance");

                }


            }

        }, 0);
    });

    document.addEventListener('touchmove', function(e) {
        e.preventDefault();
        var touch = e.touches[0];
        var tdttwitterShareBtn = jQuery('#twt-js')[0];
        setTimeout(() => {
            var selectedText = getSelectionText();
            
            if (selectedText != '') {

                var x = touch.pageX;
                var y = touch.pageY;
             
                var tdttwitterShareBtnWidth = Number(getComputedStyle(tdttwitterShareBtn).width.slice(0, -2));
                var tdttwitterShareBtnHeight = Number(getComputedStyle(tdttwitterShareBtn).height.slice(0, -2));

                if (document.activeElement !== tdttwitterShareBtn) {
                    tdttwitterShareBtn.style.left = `${x - tdttwitterShareBtnWidth * 0.5}px`;
                    tdttwitterShareBtn.style.top = `${y - tdttwitterShareBtnHeight * 1.25}px`;
                    if (twd_js_obj3.display_type == 'icon') {
                        tdttwitterShareBtn.style.display = "block";
                    } else {
                        tdttwitterShareBtn.style.display = "flex";
                    }
                    tdttwitterShareBtn.classList.add("btnEntrance");

                }


            }

        }, 0);
    }, false);

    jQuery(document).on("mouseup", function (event) {
        var tdttwitterShareBtn = jQuery('#twt-js')[0];
        setTimeout(() => {
            var selectedText = getSelectionText();

            if (selectedText == '') {

                if (event.target.id !== "twt-js" && getComputedStyle(tdttwitterShareBtn).display === "block" || tdttwitterShareBtn.style.display == "flex") {
                    tdttwitterShareBtn.style.display = "none";
                    tdttwitterShareBtn.classList.remove("btnEntrance");
                    window.getSelection().empty();
                }
            }
        }, 0);
    });
    jQuery(document).on("mousedown", function (event) {
        var tdttwitterShareBtn = jQuery('#twt-js')[0];
        var selectedText = getSelectionText();
        if (selectedText == '') {

            if (event.target.id !== "twt-js" && getComputedStyle(tdttwitterShareBtn).display === "block" || tdttwitterShareBtn.style.display == "flex") {
                tdttwitterShareBtn.style.display = "none";
                tdttwitterShareBtn.classList.remove("btnEntrance");
                window.getSelection().empty();
            }
        }
    });

    jQuery('body').on('click', '#twt-js', function () {
        tdttwitterShareBtnClick();
    });
});

function tdttwitterShareBtnClick(event) {

    const selectedText = window.getSelection().toString().trim();
    if (selectedText.length) {
       
        const twitterShareUrl = "https://twitter.com/intent/tweet";
        const text = `${encodeURIComponent(selectedText)}`;

        if (twd_js_obj2.pagelink == 1) {
            var currentUrl = encodeURIComponent(window.location.href);

        } else {
            var currentUrl = '';
        }
        const hashtags = twd_js_obj.hashtags;
        const via = twd_js_obj1.via;
        window.open(`${twitterShareUrl}?text="${text}"&url=${currentUrl}&hashtags=${hashtags}&via=${via}`);
        window.open(`${twitterShareUrl}?text="${text}"`);

    }
}
