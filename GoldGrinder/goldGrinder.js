var links = {
    "data": "https://www.entropiagold.com/goldgrinder/data.xml",
    "silver": "https://www.entropiagold.com/goldgrinder/halloffame.xml",
    "winners": "https://www.entropiagold.com/goldgrinder/jackpotwinners.xml"
}

var linksLocal = {
    "data": "goldgrinder/data.xml",
    "silver": "goldgrinder/halloffame.xml",
    "winners": "goldgrinder/jackpotwinners.xml"
}

function loadXML(xmlLink, local) {
    var xmlhttp = new XMLHttpRequest();
    var link = local ? linksLocal[xmlLink] : links[xmlLink];
    xmlhttp.onload = function() {
        switch (xmlLink) {
            case 'data':
                displayData(this);
                break;
            case "silver":
                displaySilver(this);
                break;
            case "winners":
                displayWinners(this);
                break;
        }
        // if (this.readyState == 4 && this.status == 200) {
        //     alert("READY");
        //     switch (xmlLink) {
        //         case 'data':
        //             displayData(this);
        //             break;
        //         case "silver":
        //             displaySilver(this);
        //             break;
        //         case "winners":
        //             displayWinners(this);
        //             break;
        //     }
        // }
    };  
    xmlhttp.open("GET", link, true);
    xmlhttp.send();
}

function loadXMLWinners(local) {
    var xmlhttp = new XMLHttpRequest();
    var link = local ? linksLocal['winners'] : links['winners'];
    xmlhttp.onload = function() {
        displayWinners(this);
        // if (this.readyState == 4 && this.status == 200) {
        //     alert("READY");
        //     switch (xmlLink) {
        //         case 'data':
        //             displayData(this);
        //             break;
        //         case "silver":
        //             displaySilver(this);
        //             break;
        //         case "winners":
        //             displayWinners(this);
        //             break;
        //     }
        // }
    };  
    xmlhttp.open("GET", link, true);
    xmlhttp.send();
}

var jackpotHtml = {
    'Atrox': `<div class="row text-center">
    <div class="col-md-6">
      <img src="img/gif/AtroxJackpot.gif" width="250px"><br>
      <h3 class="spacer-s">`,
    'Scipulor': `<div class="col-md-6">
    <img src="img/gif/ScipulorJackpot.gif" width="250px">
    <h3 class="spacer-s">`,
    'General': `<div class="text-center">
    <img src="img/gif/EntropiaGoldJackpot.gif" width="400px">
    <h3 class="spacer-s">`,
    'Combibo-Berycled': `<div class="col-md-6">
    <img src="img/gif/BibonBeryJackpot.gif" width="250px">
    <h3 class="spacer-s">`,
    'Neconu': `<div class="row text-center">
    <div class="col-md-6">
      <img src="img/gif/NeconuJackpot.gif" width="250px"><br>
      <h3 class="spacer-s">`
}

var jackpotOrderId = {
    'Atrox': 1,
    'Scipulor': 2,
    'General': 0,
    'Combibo-Berycled': 4,
    'Neconu': 3
}

class MobName {
    constructor(name, points) {
        this.mobName = name;
        this.points = points;
    }
}

function displayData(xml) {
    var i;
    var xmlDoc = xml.responseXML;
    var jackpots = xmlDoc.getElementsByTagName("Jackpot");
    var preHtml = "";
    var arrayOfNames = [];
    
    // Handle the Jackpots
    for (i = 0; i < jackpots.length; i++) {
        var mob = new MobName(
            jackpots[i].getElementsByTagName("Name")[0].childNodes[0].nodeValue,
            jackpots[i].getElementsByTagName("Current-Point")[0].childNodes[0].nodeValue
        );
        arrayOfNames.push(mob);
    }

    arrayOfNames = arrayOfNames.sort(function(a, b) {
        return jackpotOrderId[a.mobName] > jackpotOrderId[b.mobName] ? 1 : -1;
    })

    for (i = 0; i < arrayOfNames.length; i++) {
        if (arrayOfNames[i].mobName != "Gokibusagi") {
            preHtml += jackpotHtml[arrayOfNames[i].mobName];
            if (arrayOfNames[i].mobName == "General") {
                arrayOfNames[i].mobName = "EntropiaGold";
            } else {
                arrayOfNames[i].points = parseInt(arrayOfNames[i].points);
            }
            preHtml += `<h2>` + arrayOfNames[i].points + ` Gold </h2>`
            preHtml += `<h3 class="titleText"> Current ` + arrayOfNames[i].mobName + ` Jackpot</h3>
            </div>`
            if (arrayOfNames[i].mobName == "Scipulor")
                preHtml += `</div>`
        }
    }
    preHtml += `</div>`;
    document.getElementById("jackpot").innerHTML = preHtml;
}

class Winner {
    constructor(rank, isWeekly, user, globals) {
        this.rank = rank;
        this.isWeekly = isWeekly;
        this.user = user;
        // If contains decimal, opt for decimal, else turn it into an int
        this.globals = globals % 1 > 0 && globals % 1 < 1 ? globals : parseInt(globals);
    }
}

var weeklyHtml = {
    'Prefix': `<div class="col-md-1 p-1">
    <button class="btn btn-gold w-100" type="button" data-toggle="collapse" data-target="#weekCollapse`,
    'Suffix': `</button>
    </div>`,
    'PrefixCollapse': `<div class="collapse text-center spacer" id ="weekCollapse`,
    'SuffixCollapse': `</table>
    </div>`
}

var monthlyHtml = {
    'Prefix': `<div class="col-md-2 p-1">
    <button class="btn btn-gold w-100" type="button" data-toggle="collapse" data-target="#monthCollapse`,
    'Suffix': `</button>
    </div>`,
    'PrefixCollapse': `<div class="collapse text-center spacer" id ="monthCollapse`,
    'SuffixCollapse': `</table>
    </div>`
}

var weeklyDict = {}
var monthlyDict = {}

function getWeekTable(week, oneArray) {
    var prefix = `<h3>Ranking for ` + week + `</h3>`;
    var tableBase = prefix + `<tr>
                        <th>Rank</th>
                        <th>Avatar</th>
                        <th>Globals</th>
                        <th>Silver Awarded</th>
                    </tr>`
    for (s = 0; s < oneArray.length; s++) {
        tableBase += `<tr>`
        tableBase += `<th class="standardFont">` + (s+1) + `</th>`;
        tableBase += `<th class="standardFont">` + oneArray[s].user + `</th>`;
        tableBase += `<th class="standardFont">` + oneArray[s].globals + `</th>`;
        tableBase += `<th class="standardFont">` + (oneArray[s].isWeekly ? 500 : 1000) + `</th>`;
        tableBase += `</tr>`
    }
    return tableBase;
}

function displayTables(xml, isWeekly) {
    var i;
    var core = isWeekly ? "Weekly-Distribution" : "Monthly-Distribution";
    var coreTag = isWeekly ? "week" : "Month";
    var corePrefix = isWeekly ? "weekly" : "monthly";
    var coreUnit = isWeekly ? "Week" : "Month";
    var selectedDict = isWeekly ? weeklyDict : monthlyDict;
    var xmlDoc = xml.responseXML;
    var allWinners = xmlDoc.getElementsByTagName(core)[0].getElementsByTagName(coreTag);
    var oneSet = [];

    var tableBase = `<tr>
                        <th>Rank</th>
                        <th>Avatar</th>
                        <th>Globals</th>
                        <th>Silver Awarded</th>
                    </tr>`

    for (i = allWinners.length-1 ; i >= 0; i--) {
        oneSet = [];
        for (w = 0; w < allWinners[i].getElementsByTagName("rank").length; w++) {
            specificWinner = allWinners[i].getElementsByTagName("rank")[w];
            var user = new Winner(
                specificWinner.childNodes[0].nodeValue,
                isWeekly,
                specificWinner.getElementsByTagName("user")[0].childNodes[0].nodeValue,
                specificWinner.getElementsByTagName("Karma-Points")[0].childNodes[0].nodeValue,
            );
            oneSet.push(user);
        }
        selectedDict[allWinners[i].childNodes[0].nodeValue] = oneSet;
        
        // Display the most recent week or month
        if (i == allWinners.length-1) {
            document.getElementById(corePrefix + "NowTitle").innerHTML = coreUnit + " Ending on " + allWinners[i].childNodes[0].nodeValue;
            for (s = 0; s < oneSet.length; s++) {
                tableBase += `<tr>`
                tableBase += `<th class="standardFont">` + (s+1) + `</th>`;
                tableBase += `<th class="standardFont">` + oneSet[s].user + `</th>`;
                tableBase += `<th class="standardFont">` + oneSet[s].globals + `</th>`;
                tableBase += `<th class="standardFont">` + (isWeekly ? 500 : 1000) + `</th>`;
                tableBase += `</tr>`
            }
        }
        document.getElementById(corePrefix + "Now").innerHTML = tableBase;
    }

    // Set up buttons for every week or month
    var winnerHTML = ``;
    var htmlDict = isWeekly ? weeklyHtml : monthlyHtml;
    var counter = 0;
    for (var key in selectedDict) {
        if (selectedDict.hasOwnProperty(key)) {
            winnerHTML += htmlDict['Prefix'];
            // Format the date (depending on week or month) for better aesthetics and consistesncy
            var newDate = isWeekly ? key.split('-')[1] + "/" + key.split('-')[2] + "\n" + key.split('-')[0]
                                   : key.split('-')[1] + " / " + key.split('-')[0];
            winnerHTML += counter + `" aria-expanded="false" >` + newDate + htmlDict['Suffix'];
        }
        counter += 1;
    }
    document.getElementById(corePrefix + "Winners").innerHTML = winnerHTML;

    // Set up collapses for every week or month
    var winnerHTML = ``;
    var counter = 0;
    for (var key in selectedDict) {
        if (selectedDict.hasOwnProperty(key)) {
            winnerHTML += htmlDict['PrefixCollapse'] + counter + `"><table class="mx-auto">`;
            winnerHTML += getWeekTable(key, selectedDict[key]) + htmlDict['SuffixCollapse'];
        }
        counter += 1;
    }
    document.getElementById(corePrefix + "Tables").innerHTML = winnerHTML;
}

function displaySilver(xml) {
    displayTables(xml, true);   // Weekly
    displayTables(xml, false);  // Monthly
}

function displayWinners(xml) {
    var i;
    var xmlDoc = xml.responseXML;

    // Handle the Jackpot Winners
    var tableHTML = `<tr>
                        <th>Name</th>
                        <th>Jackpot Paid Out</th>
                    </tr>`;
    var winners = xmlDoc.getElementsByTagName("User");
    for (i = 0; i < winners.length; i++) {
        var name = winners[i].getElementsByTagName("Name")[0].childNodes[0].nodeValue;
        var score = winners[i].getElementsByTagName("Jackpot")[0].childNodes[0].nodeValue;
        score = score % 1 != 0 ? score : parseInt(score);
        tableHTML += `<tr><th class="standardFont">` + name + `</th>`
        tableHTML += `<th class="standardFont">` + score + `</th></tr>`;
    }
    document.getElementById("jackpotWinners").innerHTML = tableHTML;
}