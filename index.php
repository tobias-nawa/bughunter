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
                text-decoration: none;
            }
            
            #menubar a {
                text-decoration: none;
            }
            
            #menubar > span:hover {
                cursor: pointer;
                text-decoration: underline;
            }
            
            #filterbar {
                width: 100%;
                text-align: center;
                margin: 1em;
                text-decoration: none;
            }
            
            #content {
                width: 100%;
                text-align: center;
                margin-top: 1em;
            }
            
            #content table {
                width: 80%;
                border: #333333;
                text-align: left;
                margin: auto;
            }
            
            div#footnote {
                width:100%;
                margin-top: 2em;
                padding: 20px;
                color: dimgrey;
                text-align: center;
                font-size: 12px;
            }
            
            table .text, table .high, table .normal, table .low {
                padding: 8px;
            }
            
            table .text {
                width: 100%;
                background-color: beige;
            }
            
            table .high, table .normal, table .low {
                width: 100px;
                text-align: center;
            }
            
            table .high {
                background-color: #c30;
            }
            
            table .normal {
                background-color: #ffcc00;
            }
            
            table .low {
                background-color:  #ffff99;
            }
            
            table #resolved {
                background-color: #d2f5b0;
            }
            
            table #cancelled {
                background-color: #ff9966;
            }
            
            table .title:hover {
                cursor: pointer;
            }
            
            .description {
                margin: 1em;
                display: none;
            }
            
            #author {
                font-size: small;
                font-weight: bold;
            }
            
            .title {
                font-family: serif;
                width: 100%;
            }
            
            .title img {
                text-align: right;
                float:right;
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
                $('.title').click(function(){
                    $(this).next('.description').toggle('slow');
                    if($(this).children('img').attr('src') == 'pics/up.png'){
                        $(this).children('img').attr('src', 'pics/down.png');
                        $(this).children('img').attr('alt', 'aufklappen');
                        $(this).children('img').attr('title', 'aufklappen');
                    }
                    else{
                        $(this).children('img').attr('src', 'pics/up.png');
                        $(this).children('img').attr('alt', 'zuklappen');
                        $(this).children('img').attr('title', 'zuklappen');
                    }
                });
                
                var showAll = false;
                
                $('#showall').click(function(){
                    if(!showAll){
                        $('.description').show('slow');
                        $('#showall').html('Alle zuklappen');
                        $('.title img').attr('src', 'pics/up.png');
                        $('.title img').attr('alt', 'zuklappen');
                        $('.title img').attr('title', 'zuklappen');
                        showAll=true;
                    }
                    else{
                        $('.description').hide('slow');
                        $('#showall').html('Alle aufklappen');
                        $('.title img').attr('src', 'pics/down.png');
                        $('.title img').attr('alt', 'aufklappen');
                        $('.title img').attr('title', 'aufklappen');
                        showAll=false;
                    }
                });
            });
        </script>
    </head>
    <body>
        <div id="main">
            <div id="header">
                <h2>Bugtracker</h2>
            </div>
            
            <div id="menubar"><span id="showall">Alle aufklappen</span> | <span><a href="newBug.php">Neue Meldung eintragen</a></span></div>
            
            <div id="filterbar">
                <form action="index.php" method="GET"> 
                    Priorität: 
                    <select name="priority">
                        <option value="all" <?php if(!isset($_GET["priority"]) OR $_GET["priority"] == "all") print "selected"; ?>>Alle</option>
                        <option value="low" <?php if(isset($_GET["priority"]) AND $_GET["priority"] == "low") print "selected"; ?>>Niedrig</option>
                        <option value="normal" <?php if(isset($_GET["priority"]) AND $_GET["priority"] == "normal") print "selected"; ?>>Normal</option>
                        <option value="high" <?php if(isset($_GET["priority"]) AND $_GET["priority"] == "high") print "selected"; ?>>Hoch</option>
                    </select>

                    Status: 
                    <select name="status">
                        <option value="all" <?php if(!isset($_GET["status"]) OR $_GET["status"] == "all") print "selected"; ?>>Alle</option>
                        <option value="open" <?php if(isset($_GET["status"]) AND $_GET["status"] == "open") print "selected"; ?>>Offen</option>
                        <option value="assigned" <?php if(isset($_GET["status"]) AND $_GET["status"] == "assigned") print "selected"; ?>>Zugeteilt</option>
                        <option value="inWork" <?php if(isset($_GET["status"]) AND $_GET["status"] == "inWork") print "selected"; ?>>In Bearbeitung</option>
                        <option value="resolved" <?php if(isset($_GET["status"]) AND $_GET["status"] == "resolved") print "selected"; ?>>Abgeschlossen</option>
                        <option value="cancelled" <?php if(isset($_GET["status"]) AND $_GET["status"] == "cancelled") print "selected"; ?>>Abgebrochen</option>
                    </select>
                    
                    Sortierung: 
                    <select name="sort">
                        <option value="createdAt" <?php if(isset($_GET["sort"]) AND $_GET["sort"] == "createdAt") print "selected"; ?>>Erstellungszeit</option>
                        <option value="changedAt" <?php if(!isset($_GET["sort"]) OR $_GET["sort"] == "changedAt") print "selected"; ?>>Änderungszeit</option>
                        <option value="author" <?php if(isset($_GET["sort"]) AND $_GET["sort"] == "author") print "selected"; ?>>Ersteller</option>
                        <option value="status" <?php if(isset($_GET["sort"]) AND $_GET["sort"] == "status") print "selected"; ?>>Status</option>
                    </select>
                    <select name="direction">
                        <option value="DESC" <?php if(!isset($_GET["direction"]) OR $_GET["direction"] == "DESC") print "selected"; ?>>Rückwärts</option>
                        <option value="ASC" <?php if(isset($_GET["direction"]) AND $_GET["direction"] == "ASC") print "selected"; ?>>Vorwärts</option>
                    </select>

                    <input type="submit" value="Filer setzen" />
                </form>
            </div>
            
            <div id="content">
                <table>
                    <?php
                        mysql_connect("localhost","bugtracker","bugtracker") or die(mysql_error());
                        mysql_select_db("bugtracker") or die(mysql_error());
                        
                        $request = "SELECT * FROM bugs";
                        $sort = "changedAt";
                        $direction = "DESC";
                        
                        if((isset($_GET["direction"]) AND $_GET["direction"] == "DESC") OR !isset($_GET["direction"]))
                        {
                            $direction = "DESC";
                        }
                        else
                        {
                            $direction = "ASC";
                        }
                        
                        if((isset($_GET["sort"]) AND $_GET["sort"] == "changedAt") OR !isset($_GET["sort"]))
                        {
                            $sort = "changedAt,createdAt";
                        }
                        else
                        {
                            $sort = $_GET["sort"];
                        }
                        
                        if(isset($_GET["priority"]) AND isset($_GET["status"]))
                        {
                            if(($_GET["priority"] == "all" AND $_GET["status"] == "all"))
                            {
                                $request = "SELECT * FROM bugs";
                            }
                            
                            if(($_GET["priority"] != "all" AND $_GET["status"] != "all"))
                            {
                                $request = "SELECT * FROM bugs WHERE priority='".$_GET["priority"]."' AND status='".$_GET["status"]."'";
                            }
                            
                            if(($_GET["priority"] != "all" AND $_GET["status"] == "all"))
                            {
                                $request = "SELECT * FROM bugs WHERE priority='".$_GET["priority"]."'";
                            }
                            
                            if(($_GET["priority"] == "all" AND $_GET["status"] != "all"))
                            {
                                $request = "SELECT * FROM bugs WHERE status='".$_GET["status"]."'";
                            }
                        }
                        
                        $request .= " ORDER BY ".$sort." ".$direction;
                        
                        $result = mysql_query($request) or die(mysql_error());
                        while($line = mysql_fetch_array($result))
                        {
                            print "<tr><td class=\"".$line["priority"]."\"><a href=\"bug.php?id=".$line["bugId"]."\">".sprintf("%05d", $line["bugId"])."</a></td><td class=\"text\" id=\"".$line["status"]."\"><div class=\"title\">".$line["title"]."<img src=\"pics/down.png\" alt=\"aufklappen\" title=\"aufklappen\" /></div><div class=\"description\">".$line["description"]."</div><div id=\"author\">".$line["author"]." - ".date("d.m.Y H:i:s", strtotime($line["createdAt"]))." - ".$line["status"]."</div></td></tr>";
                        }
                    ?>
                </table>
            </div>
            
            <div id="footnote">Bei Fragen bitte an <a href="mailto:tobias.nawa@trane-muenchen.de">Tobias Nawa</a> wenden.</div>
        </div>
    </body>
</html>
