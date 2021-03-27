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
        this.globals = globals;
    }
}

var weeklyHtml = {
    'Prefix': `<div class="col-md-1">
    <button class="btn btn-gold" type="button" data-toggle="collapse" data-target="#weekCollapse`,
    'Suffix': `</button>
    </div>`,
    'PrefixCollapse': `<div class="collapse text-center spacer" id ="weekCollapse`,
    'SuffixCollapse': `</table>
    </div>`
}
var weeklyDict = {}

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

function displaySilver(xml) {
    // Weekly
    var i;
    var xmlDoc = xml.responseXML;
    var weeklyWinners = xmlDoc.getElementsByTagName("Weekly-Distribution")[0].getElementsByTagName("week");
    var oneWeek = [];

    var tableBase = `<tr>
                        <th>Rank</th>
                        <th>Avatar</th>
                        <th>Globals</th>
                        <th>Silver Awarded</th>
                    </tr>`

    for (i = weeklyWinners.length-1; i >= 0; i--) {
        oneWeek = [];
        for (w = 0; w < weeklyWinners[i].getElementsByTagName("rank").length; w++) {
            specificWinner = weeklyWinners[i].getElementsByTagName("rank")[w];
            var user = new Winner(
                specificWinner.childNodes[0].nodeValue,
                true,
                specificWinner.getElementsByTagName("user")[0].childNodes[0].nodeValue,
                specificWinner.getElementsByTagName("Karma-Points")[0].childNodes[0].nodeValue,
            );
            oneWeek.push(user);
        }
        weeklyDict[weeklyWinners[i].childNodes[0].nodeValue] = oneWeek;
        console.log("Added Week " + weeklyWinners[i].childNodes[0].nodeValue);
        
        // Display only First Week
        if (i == weeklyWinners.length-1) {
            document.getElementById("weeklyNowTitle").innerHTML = "Week Ending on " + weeklyWinners[i].childNodes[0].nodeValue;
            for (s = 0; s < oneWeek.length; s++) {
                tableBase += `<tr>`
                tableBase += `<th class="standardFont">` + (s+1) + `</th>`;
                tableBase += `<th class="standardFont">` + oneWeek[s].user + `</th>`;
                tableBase += `<th class="standardFont">` + oneWeek[s].globals + `</th>`;
                tableBase += `<th class="standardFont">` + (oneWeek[s].isWeekly ? 500 : 1000) + `</th>`;
                tableBase += `</tr>`
            }
        }
        document.getElementById("weeklyNow").innerHTML = tableBase;
    }

    // Setup buttons for every week
    var weeklyWinnerHTML = ``;
    var counter = 0;
    for (var key in weeklyDict) {
        console.log(key);
        if (weeklyDict.hasOwnProperty(key)) {
            weeklyWinnerHTML += weeklyHtml['Prefix'];
            weeklyWinnerHTML += counter + `" aria-expanded="false" >` + key + weeklyHtml['Suffix'];
        }
        counter += 1;
    }
    document.getElementById("weeklyWinners").innerHTML = weeklyWinnerHTML;

    // Setup collapses for every week
    var weeklyCollapseHTML = ``;
    var counter = 0;
    for (var key in weeklyDict) {
        console.log(key);
        if (weeklyDict.hasOwnProperty(key)) {
            weeklyCollapseHTML += weeklyHtml['PrefixCollapse'] + counter + `"><table class="mx-auto">`;
            weeklyCollapseHTML += getWeekTable(key, weeklyDict[key]) + weeklyHtml['SuffixCollapse'];
        }
        counter += 1;
    }
    document.getElementById("weeklyTables").innerHTML = weeklyCollapseHTML;

    // Monthly
}

function displayWinners(xml) {
    var i;
    var xmlDoc = xml.responseXML;
}