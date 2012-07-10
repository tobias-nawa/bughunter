<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
        <meta http-equiv="Page-Enter" content="blendTrans(Duration=0.2)">
        <meta http-equiv="Page-Exit" content="blendTrans(Duration=0.2)">
        <title></title>
        <style type="text/css">
            html, body {
                background-color: #333333;
                margin: 0;
                padding: 0;
                height: 100%;
            }
            
            html {
                overflow-y: scroll;
            }
            
            a {
                outline: none;
                color: black;
            }
            
            #main {
                background-color: #FFFFFF;
                width: 80%;
                margin: auto;
                min-height: 100%; /* Mindesthöhe für moderne Browser */
                height:auto !important; /* Important Regel für moderne Browser */
                height:100%; /* Mindesthöhe für den IE */
                overflow: hidden !important; /* FF Scroll-leiste */ 
                font-family: Verdana;
            }
            
            #header {
                width: 100%;
                text-align: center;
                margin-top: 1em;
            }
            
            #header h3 {
                font-family: Gill Sans, Verdana;
                font-size: 11px;
                line-height: 14px;
                text-transform: uppercase;
                letter-spacing: 2px;
                font-weight: bold;
            }
            
            #header h3 span { color: #c30; }

            #header h2 { font-family: times, Times New Roman, times-roman, georgia, serif;
                    color: #444;
                    margin: 0;
                    padding: 0px 0px 6px 0px;
                    font-size: 51px;
                    line-height: 44px;
                    letter-spacing: -2px;
                    font-weight: bold;
            }
            
            #menubar {
                width: 100%;
                text-align: center;
                margin: 1em;
            }
            
            #menubar > span:hover {
                cursor: pointer;
                text-decoration: underline;
            }
            
            #menubar a {
                text-decoration: underline;
            }
            
            #content {
                width: 100%;
                text-align: center;
                margin-top: 2em;
            }
            
            #content table {
                border: #333333;
                text-align: left;
                margin: auto;
            }
            
            #content table tr > td:first-of-type {
                vertical-align: top;
            }
            
            div#footnote {
                width:100%;
                margin-top: 2em;
                padding: 20px;
                color: dimgrey;
                text-align: center;
                font-size: 12px;
            }
            
        </style>
        
        <!--[if IE]>
        
        <style type="text/css">
            .title img {
                margin-top: -1em;
            }
        </style>
        
        <script src="hacks/IE8.js" type="text/javascript"></script>
        
        <![endif]-->
        <script src="frameworks/jquery-1.7.2.min.js" type="text/javascript"></script>
        <script>
            $(document).ready(function(){
                
                $('#abort').click(function(){
                    window.history.back();
                });
                
                $('#bugreport').submit(function(e){
                    if(!$('#title').val())
                    {
                        e.preventDefault();
                        alert('Es muss ein Titel angegeben werden.');
                        $('#title').focus();
                        return false;
                    }
                    if(!$('#description').val())
                    {
                        e.preventDefault();
                        alert('Es muss eine Beschreibung angegeben werden.');
                        $('#description').focus();
                        return false;
                    }
                    return true;
                });
            });
        </script>
    </head>
    <body onLoad="document.getElementById('title').focus()">
        <div id="main">
            <div id="header">
                <h2>Bugtracker</h2>
            </div>
            
            <div id="content">
                <form id="bugreport" action="addBug.php" method="POST">
                    <table>
                        <tr><td>Titel</td><td><input type="text" size="50" maxlength="50" id="title" /></td></tr>
                        <tr><td>Beschreibung</td><td><textarea rows="10" cols="50"id="description"></textarea></td></tr>
                        <tr><td>Priorität</td>
                            <td>
                                <select name="priority">
                                    <option value="low">Niedrig</option>
                                    <option value="normal" selected>Normal</option>
                                    <option value="high">Hoch</option>
                                </select>
                            </td></tr>
                        <tr><td></td><td><input type="submit" value="Eintragen" /><input type="button" value="Abbrechen" id="abort"</td></tr>
                    </table>
                </form>
            </div>
            
            <div id="footnote">Bei Fragen bitte an <a href="mailto:tobias.nawa@trane-muenchen.de">Tobias Nawa</a> wenden.</div>
        </div>
    </body>
</html>