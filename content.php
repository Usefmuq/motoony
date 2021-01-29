<?php
    include 'header.php';
?>

<!-- code -->

<div class="my-2 container">
<?php
    include 'alerts.php';
    // error_message();
?>
</div>
<div class="my-4 container">
<?php
// show_books();
// $Content_cont = new ContentContr();
// $Content_cont->job_check();
$Content_obj = new ContentView();
$Content_obj->add_button();
$Content_obj->show_content();
?>
</div>

<!-- end code -->
<?php
    include 'footer.php';
?>
<script type="text/javascript" src="js/hilitor.js"></script>
<script type="text/javascript">
    var TRange=null;

    function case_search(str) {
        if (parseInt(navigator.appVersion)<4) return;
        var strFound;
        if (window.find) {
            // CODE FOR BROWSERS THAT SUPPORT window.find
            strFound=self.find(str);
            if (!strFound) {
                strFound=self.find(str,0,1);
                while (self.find(str,0,1)) continue;
            }
        }
        else if (navigator.appName.indexOf("Microsoft")!=-1) {
            // EXPLORER-SPECIFIC CODE 
            if (TRange!=null) {
                TRange.collapse(false);
                strFound=TRange.findText(str);
                if (strFound) {
                    TRange.select();
                    // TRange.replace(str,`<span style="background-color: yellow">${str}</span>`);
                    var editor = document.getElementById('content');
                    var content = editor.innerHTML;
                    editor.innerHTML = content.replace(str, '<span style="color:red">var</span>;');


                }
            }
            if (TRange==null || strFound==0) {
                TRange=self.document.body.createTextRange();
                strFound=TRange.findText(str);
                if (strFound) {
                    TRange.select();
                    // TRange.replace(str,'`<span style="background-color: yellow">${str}</span>`');
                    var editor = document.getElementById('content');
                    var content = editor.innerHTML;
                    editor.innerHTML = content.replace(str, 'ss');
                }
            }
        }
        else if (navigator.appName=="Opera") {
            alert ("Opera browsers not supported, sorry...")
            return;
        }
        if (!strFound) alert ("String '"+str+"' not found!")
        return;
}
</script>
