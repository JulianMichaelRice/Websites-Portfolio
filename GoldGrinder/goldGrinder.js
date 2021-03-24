var links = {
    "data": "https://www.entropiagold.com/goldgrinder/data.xml",
    "silver": "https://www.entropiagold.com/goldgrinder/halloffame.xml",
    "winners": "https://www.entropiagold.com/goldgrinder/jackpotwinners.xml"
}

function loadXML(xmlLink) {
    var xmlhttp = new XMLHttpRequest();
    if (xmlhttp.withCredentials !== undefined) {
        xmlhttp.open("GET", "https://www.entropiagold.com/goldgrinder/data.xml", true);
        xmlhttp.send();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                switch (xmlLink) {
                    case "data":
                        displayData(this);
                        break;
                    case "silver":
                        displaySilver(this);
                        break;
                    case "winners":
                        displayWinners(this);
                        break;
                }
            }
        };  
    }  
}

function displayData(xml) {
    var i;
    var xmlDoc = xml.responseXML;
    var jackpots = xmlDoc.getElementsByTagName("Jackpot");
    var table=` <tr class="gifImage">
                    <th><img src="img/gif/AtroxJackpot.gif"></th>
                    <th><img src="img/gif/ScipulorJackpot.gif"></th>
                    <th><img src="img/gif/NeconuJackpot.gif"></th>
                    <th><img src="img/gif/BibonBeryJackpot.gif"></th>
                    <th><img src="img/gif/EntropiaGoldJackpot.gif"></th>
                </tr>
                <tr>`;
    for (i = 0; i < jackpots.length; i++) {
        var name = jackpots[i].getAttribute("Name");
        var points = jackpots[i].getAttribute("Current-Point");
        table += `<td>` + name + `: ` + points + `</td>`
    }
    table += `</tr>`
    document.getElementById("kuribo").innerHTML = table;
}

function displaySilver(xml) {
    var i;
    var xmlDoc = xml.responseXML;
}

function displayWinners(xml) {
    var i;
    var xmlDoc = xml.responseXML;
}