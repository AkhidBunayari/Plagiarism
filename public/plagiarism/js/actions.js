$(document).ready(function () {

    window.onresize = resize;
    function resize() {
        scrollTo(($(document).width() - $(window).width()) / 2, 0);
    }
    
    $('#DivTxTArea').focus();

     //Ajax loading
    body = $("body");
    $(document).on({
        ajaxStart: function() { body.addClass("loading"); $(".modal-loader").show(); },
        ajaxStop : function() { $(".modal-loader").hide(); body.removeClass("loading"); }
    });
    // End ajax loading

    $("#myForm").submit(function (event)
    {
        event.preventDefault();

        if ($('#DivTxTArea').html() !== "") {
            htmlCode = $('#DivTxTArea').html();
            text = $('<div/>').html(htmlCode).text();
            keywords = toArray($("#txtKeyword").val(), ",");
            categorys = toArray($("#txtCategory").val(), ",");

            keywords = replaceAll(" ", "_", keywords.toString());
            categorys = replaceAll(" ", "_", categorys.toString())
            debug = _Debug;

            if ($("#cBox1").is(':checked') || $("#cBox1").prop("checked")) {
                source = "DTU";
            }
            else if ($("#cBox2").is(':checked') || $("#cBox2").prop("checked")) {
                source = "Google";
            }
            else if ($("#cBox3").is(':checked') || $("#cBox3").prop("checked"))
                source = "Wikipedia";
            else
                source = "NULL";
            
            if (_Debug || _Action_Debug) {
                console.log(keywords);
                console.log(categorys);
            }

            PlagiarismChecker(text, keywords, categorys, source, debug);
        }
    });
        
    $("#btnContinue").click(function() {
        $('#DivTxTArea').html("");
        $('#DivTxTArea').text("");

        $("#DivTxTArea").attr("contenteditable", "true");
        $(".Times").text("Times: 0.00s");

        $("#btnContinue").hide();
        $("#btnSubmit").show();
    });
    
    // Error can't paste text in IE !!!!
    // TypeError: $(...)[0] is undefined with firefox
    // Modify paste event in my TextArea
    if (!isIE && !isFirefox) {
        $("#DivTxTArea").on("paste", function (e) {
            e.preventDefault();
            text = (e.originalEvent || e).clipboardData.getData('text/plain') || prompt('Paste something..');
            text = "\n" + addSpaceNewLine(text);
            window.document.execCommand('insertText', false, text);

            // Remove all <br> tag or new line
            // TypeError: $(...)[0] is undefined with firefox
            // Work with chrome & opera
            while ($('#DivTxTArea *')[0].outerHTML === "<br>" ||
                   $('#DivTxTArea *')[0].outerHTML === "<div><br></div>")
                $('#DivTxTArea *').first().remove();

            if (_Debug || _Action_Debug) {
                console.log("Outer html of first element :" + $('#DivTxTArea *')[0].outerHTML);
                console.log("Inner html of first element :" + $('#DivTxTArea *').first().html());
            }
        });
    }
});

function PlagiarismChecker(text, keywords, categorys, source, debug) {
    $.ajax({
        url: "PlagiarismChecker.aspx",
        method: "POST",
        //dataType: "application/json; charset=utf-8",
        data: {
            text      : text,
            keywords  : keywords,
            categorys : categorys,
            source    : source,
            debug     : debug,
        },
        success: function (msg) {
            if (_Debug || _Action_Debug) console.log("Data return: \n" + msg + "\nEnd data return!.");
            $("#DivTxTArea").text("");    
            $("#DivTxTArea").attr("contenteditable", "false");
            
            msg = replaceAll("\\[", "<mark>" , msg);
            msg = replaceAll("\\]", "</mark>", msg);
            $("#DivTxTArea").append(msg);
            $(".Times").text("Times: " + $(".ExeTimes").text());


            $("[class^='score_']").click(function () {
                idx = $(this).attr("class");
                k = idx.substring(6);
                origin = $("[class^='paraS_"   + k + "']").html();
                result = $("[class^='paraR_" + k + "']").html();

                temp = $("[class^='titleR_" + k + "']").text();
                title = temp.substring(0, temp.indexOf("url:"));
                url = temp.substring(temp.indexOf("url:") + 4, temp.length);
                idPara = $("[class^='idParaR_" + k + "']").text();
                
                $("[id^='urlRef']").click(function () { this.focusout(); });

                modalHTML = 
                    "<div class='modal fade' id='my-modal' role='dialog'>" +
                        "<div class='modal-dialog'>" +
                            "<div class='modal-content'>" +
                                "<div class='modal-header'>" +                                        
                                    "<table>" +
                                        "<tr>" +
                                            "<td class='left'><h4><strong>So khớp với:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a id='urlRef' href=" + url + " target='_blank'>" + title + "</a></strong></h4></td>" +
                                            "<td class='midd'></td>" +
                                            "<td class='right'><b>" + $(this).text() + "%</b>" +
                                                "<button type='button' class='close' data-dismiss='modal'>&times;</button>" +
                                            "</td>" +
                                        "</tr>" +
                                    "</table>" +
                                "</div>" +
                                "<div class='modal-body'>" +
                                    "<table>" + 
                                        "<tr>" + 
                                            "<td class='left'>" + origin + "</td>" +
                                            "<td class='midd'></td>" +
                                            "<td class='right'>" + result + "</td>" +
                                        "</tr>" +
                                    "</table>" +
                                "</div>"
                                "<div class='modal-footer'>" +
                                    "<button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>" +
                                "</div>" +
                            "</div>" +
                        "</div>" +
                    "</div>";

            $("#contain-my-modal").html(modalHTML);
            $("#my-modal").modal();
            });
                                  
            $("#btnSubmit").hide();
            $("#btnContinue").show();
        },
        error: function (xhr, status, error) {
            err = xhr.responseText;
            console.log(err);
            console.log(status);
            console.log(error);
            console.log(err.Message);
        }
    }).done(function (msg) {
        console.log("Done! Plagiarism Checker." + msg);
    }).fail(function (msg) {
        console.log("Error! Plagiarism Checker." + msg);
    });
}

// review
function addSpaceNewLine(str) {
    return replaceAll("\n", "\n\n", replaceAll("\r\n\r\n", "\r\n", str));
}