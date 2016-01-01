$(function ()
{
    String.prototype.decodeHTML = function ()
    {
        return $("<div>",
        {
            html: "" + this
        }).html();
    };
    String.prototype.capitalize = function ()
    {
        return this.toLowerCase().replace(/\b\w/g, function (m)
        {
            return m.toUpperCase();
        });
    };

    var $main = $("div#loader"),

        init = function ()
        {
            // Do this when a page loads.
            //$.getScript(mscbaseurl+"/assets/js/jp.js"); 
            $.getScript(mscbaseurl + "/assets/js/my.js");
        },

        ajaxLoad = function ()
        {
            init();
            $('#loadingDiv').hide();
            $('#loader').show();
        },

        loadPage = function (href)
        {
            $main.load(href, ajaxLoad);
        };

    init();

    $(window).on("popstate", function (e)
    {
        if (e.originalEvent.state !== null)
        {
            loadPage(location.href);
        }
    });

    $(document).on("click", ".ajax", function ()
    {
        var href = $(this).attr("href");

        if (href.indexOf(document.domain) > -1 || href.indexOf(':') === -1)
        {
            history.pushState(
            {}, '', href);
            loadPage(href);
            document.title = $(this).attr("title") + ' | ' + mscsitetitle.capitalize();
            $('#loader').hide();
            $('#loadingDiv').show();
            return false;
        }
    });
});
