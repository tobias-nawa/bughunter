<div id="header">
    <h2>Bugtracker</h2>
</div>

<div id="menubar"><span id="showall">Alle aufklappen</span> | <span>Neue Meldung eintragen</span></div>

<div id="content">
    <table>
        <?php
            mysql_connect("localhost","bugtracker","bugtracker") or die(mysql_error());
            mysql_select_db("bugtracker") or die(mysql_error());

            $result = mysql_query("SELECT * FROM bugs ORDER BY changedAt,createdAt DESC") or die(mysql_error());
            while($line = mysql_fetch_array($result))
            {
                print "<tr><td class=\"".$line["priority"]."\"><a href=\"bug.php?id=".$line["bugId"]."\">".sprintf("%05d", $line["bugId"])."</a></td><td class=\"text\" id=\"".$line["status"]."\"><div class=\"title\">".$line["title"]."<img src=\"buidln/down.png\" alt=\"aufklappen\" title=\"aufklappen\" /></div><div class=\"description\">".$line["description"]."</div><div id=\"author\">".$line["author"]." - ".date("d.m.Y H:i:s", strtotime($line["createdAt"]))." - ".$line["status"]."</div></td></tr>";
            }
        ?>
    </table>
</div>

<div id="footnote">Bei Fragen bitte an <a href="mailto:tobias.nawa@trane-muenchen.de">Tobias Nawa</a> wenden.</div>