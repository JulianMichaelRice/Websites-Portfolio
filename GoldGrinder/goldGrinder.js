var links = {
    "data": "https://www.entropiagold.com/goldgrinder/data.xml",
    "jackpot": "https://www.entropiagold.com/goldgrinder/data.xml",
    "silver": "https://www.entropiagold.com/goldgrinder/halloffame.xml",
    "winners": "https://www.entropiagold.com/goldgrinder/jackpotwinners.xml"
}

var linksLocal = {
    "data": "goldgrinder/data.xml",
    "jackpot": "goldgrinder/data.xml",
    "silver": "goldgrinder/halloffame.xml",
    "winners": "goldgrinder/jackpotwinners.xml"
}

function loadXML(xmlLink, local) {
    var xmlhttp = new XMLHttpRequest();
    var link = local ? linksLocal[xmlLink] : links[xmlLink];
    xmlhttp.onload = function() {
        switch (xmlLink) {
            case 'data':
                displayRewards(this);
                break;
            case 'jackpot':
                displayData(this);
                break;
            case "silver":
                displaySilver(this);
                break;
            case "winners":
                displayWinners(this);
                break;
        }
        // if (this.readyState == 4 && this.status == 200) 
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
    <div class="col-md-3">
      <img src="img/gif/AtroxJackpot.gif" width="250px" class="gif"><br>
      <h3 class="spacer-s">`,
    'Scipulor': `<div class="col-md-3">
    <img src="img/gif/ScipulorJackpot.gif" width="250px" class="gif">
    <h3 class="spacer-s">`,
    'General': `<div class="text-center spacer">
    <img src="img/gif/EntropiaGoldJackpot.gif" width="400px" class="gif">
    <h3 class="spacer-s">`,
    'Combibo-Berycled': `<div class="col-md-3">
    <img src="img/gif/BibonBeryJackpot.gif" width="250px" class="gif">
    <h3 class="spacer-s">`,
    'Neconu': `
    <div class="col-md-3">
      <img src="img/gif/NeconuJackpot.gif" width="250px" class="gif"><br>
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
            // if (arrayOfNames[i].mobName == "Scipulor")
            //     preHtml += `</div>`
        }
    }
    preHtml += `</div>`;
    if (document.getElementById("jackpot") !== null)
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
        tableBase += `<th class="standardFont">` + (s + 1) + `</th>`;
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

    for (i = allWinners.length - 1; i >= 0; i--) {
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
        if (i == allWinners.length - 1) {
            document.getElementById(corePrefix + "NowTitle").innerHTML = coreUnit + " Ending on " + allWinners[i].childNodes[0].nodeValue;
            for (s = 0; s < oneSet.length; s++) {
                tableBase += `<tr>`
                tableBase += `<th class="standardFont">` + (s + 1) + `</th>`;
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
            var newDate = isWeekly ? key.split('-')[1] + "/" + key.split('-')[2] + "\n" + key.split('-')[0] :
                key.split('-')[1] + " / " + key.split('-')[0];
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
    displayTables(xml, true); // Weekly
    displayTables(xml, false); // Monthly
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
        tableHTML += `<th class="standardFont">` + score + `    Gold</th></tr>`;
    }
    document.getElementById("jackpotWinners").innerHTML = tableHTML;
}

class RankLevel {
    constructor(level, rank) {
        this.level = level;
        this.rank = rank;
    }
}

karmaToRank = {
    0: new RankLevel(1, 1),
    10: new RankLevel(2, 2),
    15: new RankLevel(3, 2),
    20: new RankLevel(4, 3),
    26: new RankLevel(5, 3),
    31: new RankLevel(6, 3),
    37: new RankLevel(7, 4),
    43: new RankLevel(8, 4),
    48: new RankLevel(9, 4),
    54: new RankLevel(10, 5),
    60: new RankLevel(11, 5),
    67: new RankLevel(12, 5),
    73: new RankLevel(13, 6),
    79: new RankLevel(14, 6),
    86: new RankLevel(15, 6),
    93: new RankLevel(16, 7),
    100: new RankLevel(17, 7),
    107: new RankLevel(18, 7),
    114: new RankLevel(19, 8),
    121: new RankLevel(20, 8),
    128: new RankLevel(21, 8),
    136: new RankLevel(22, 9),
    144: new RankLevel(23, 9),
    152: new RankLevel(24, 9),
    160: new RankLevel(25, 10),
    168: new RankLevel(26, 10),
    176: new RankLevel(27, 10),
    185: new RankLevel(28, 11),
    193: new RankLevel(29, 11),
    202: new RankLevel(30, 11),
    211: new RankLevel(31, 12),
    221: new RankLevel(32, 13),
    230: new RankLevel(33, 13),
    240: new RankLevel(34, 13),
    249: new RankLevel(35, 14),
    259: new RankLevel(36, 14),
    270: new RankLevel(37, 14),
    280: new RankLevel(38, 15),
    291: new RankLevel(39, 15),
    301: new RankLevel(40, 15),
    312: new RankLevel(41, 16),
    324: new RankLevel(42, 16),
    335: new RankLevel(43, 16),
    347: new RankLevel(44, 17),
    359: new RankLevel(45, 17),
    371: new RankLevel(46, 17),
    383: new RankLevel(47, 18),
    396: new RankLevel(48, 18),
    409: new RankLevel(49, 18),
    422: new RankLevel(50, 19),
    436: new RankLevel(51, 19),
    449: new RankLevel(52, 19),
    463: new RankLevel(53, 19),
    478: new RankLevel(54, 19),
    492: new RankLevel(55, 19),
    507: new RankLevel(56, 19),
    522: new RankLevel(57, 19),
    538: new RankLevel(58, 19),
    553: new RankLevel(59, 20),
    569: new RankLevel(60, 20),
    586: new RankLevel(61, 20),
    602: new RankLevel(62, 20),
    619: new RankLevel(63, 20),
    637: new RankLevel(64, 20),
    655: new RankLevel(65, 20),
    673: new RankLevel(66, 20),
    691: new RankLevel(67, 20),
    710: new RankLevel(68, 21),
    729: new RankLevel(69, 21),
    749: new RankLevel(70, 21),
    769: new RankLevel(71, 21),
    789: new RankLevel(72, 21),
    810: new RankLevel(73, 21),
    831: new RankLevel(74, 21),
    853: new RankLevel(75, 21),
    875: new RankLevel(76, 21),
    897: new RankLevel(77, 22),
    920: new RankLevel(78, 22),
    944: new RankLevel(79, 22),
    966: new RankLevel(80, 22),
    992: new RankLevel(81, 22),
    1017: new RankLevel(82, 22),
    1042: new RankLevel(83, 22),
    1068: new RankLevel(84, 22),
    1094: new RankLevel(85, 22),
    1121: new RankLevel(86, 23),
    1148: new RankLevel(87, 23),
    1176: new RankLevel(88, 23),
    1205: new RankLevel(89, 23),
    1234: new RankLevel(90, 23),
    1264: new RankLevel(91, 23),
    1294: new RankLevel(92, 23),
    1325: new RankLevel(93, 23),
    1356: new RankLevel(94, 23),
    1389: new RankLevel(95, 24),
    1421: new RankLevel(96, 24),
    1455: new RankLevel(97, 24),
    1489: new RankLevel(98, 24),
    1524: new RankLevel(99, 24),
    1559: new RankLevel(100, 24),
    1595: new RankLevel(101, 24),
    1632: new RankLevel(102, 24),
    1670: new RankLevel(103, 24),
    1708: new RankLevel(104, 25),
    1747: new RankLevel(105, 25),
    1787: new RankLevel(106, 25),
    1828: new RankLevel(107, 25),
    1870: new RankLevel(108, 25),
    1912: new RankLevel(109, 25),
    1955: new RankLevel(110, 25),
    1999: new RankLevel(111, 25),
    2044: new RankLevel(112, 25),
    2090: new RankLevel(113, 26),
    2137: new RankLevel(114, 26),
    2185: new RankLevel(115, 26),
    2234: new RankLevel(116, 26),
    2283: new RankLevel(117, 26),
    2334: new RankLevel(118, 26),
    2386: new RankLevel(119, 26),
    2438: new RankLevel(120, 26),
    2492: new RankLevel(121, 26),
    2547: new RankLevel(122, 26),
    2603: new RankLevel(123, 26),
    2660: new RankLevel(124, 26),
    2718: new RankLevel(125, 27),
    2777: new RankLevel(126, 27),
    2838: new RankLevel(127, 27),
    2900: new RankLevel(128, 27),
    2963: new RankLevel(129, 27),
    3027: new RankLevel(130, 27),
    3092: new RankLevel(131, 27),
    3159: new RankLevel(132, 27),
    3228: new RankLevel(133, 27),
    3297: new RankLevel(134, 27),
    3368: new RankLevel(135, 27),
    3440: new RankLevel(136, 27),
    3514: new RankLevel(137, 27),
    3589: new RankLevel(138, 27),
    3666: new RankLevel(139, 27),
    3745: new RankLevel(140, 27),
    3824: new RankLevel(141, 27),
    3906: new RankLevel(142, 27),
    3989: new RankLevel(143, 27),
    4074: new RankLevel(144, 27),
    4160: new RankLevel(145, 27),
    4249: new RankLevel(146, 27),
    4338: new RankLevel(147, 27),
    4430: new RankLevel(148, 27),
    4524: new RankLevel(149, 27),
    4619: new RankLevel(150, 27),
    4717: new RankLevel(151, 27),
    4816: new RankLevel(152, 27),
    4917: new RankLevel(153, 27),
    5021: new RankLevel(154, 27),
    5126: new RankLevel(155, 27),
    5234: new RankLevel(156, 27),
    5343: new RankLevel(157, 27),
    5455: new RankLevel(158, 27),
    5569: new RankLevel(159, 27),
    5686: new RankLevel(160, 27),
    5804: new RankLevel(161, 27),
    5926: new RankLevel(162, 27),
    6049: new RankLevel(163, 27),
    6175: new RankLevel(164, 27),
    6304: new RankLevel(165, 27),
    6434: new RankLevel(166, 27),
    6568: new RankLevel(167, 27),
    6705: new RankLevel(168, 27),
    6844: new RankLevel(169, 27),
    6986: new RankLevel(170, 27),
    7130: new RankLevel(171, 27),
    7278: new RankLevel(172, 27),
    7428: new RankLevel(173, 27),
    7582: new RankLevel(174, 27),
    7739: new RankLevel(175, 27),
    7898: new RankLevel(176, 27),
    8061: new RankLevel(177, 27),
    8228: new RankLevel(178, 27),
    8397: new RankLevel(179, 27),
    8570: new RankLevel(180, 27),
    8747: new RankLevel(181, 27),
    8926: new RankLevel(182, 27),
    9110: new RankLevel(183, 27),
    9297: new RankLevel(184, 27),
    9488: new RankLevel(185, 27),
    9683: new RankLevel(186, 27),
    9882: new RankLevel(187, 27),
    10084: new RankLevel(188, 27),
    10291: new RankLevel(189, 27),
    10502: new RankLevel(190, 27),
    10717: new RankLevel(191, 27),
    10936: new RankLevel(192, 27),
    11160: new RankLevel(193, 27),
    11388: new RankLevel(194, 27),
    11621: new RankLevel(195, 27),
    11858: new RankLevel(196, 27),
    12100: new RankLevel(197, 27),
    12347: new RankLevel(198, 27),
    12599: new RankLevel(199, 27),
    12856: new RankLevel(200, 27),
}

class RewardWinner {
    constructor(name, gold, karma, silver) {
        this.name = name;
        this.gold = getNum(gold);
        this.karma = getNum(karma);
        this.silver = getNum(silver);
        this.level = this.calculate().level;
        this.rankIconNum = this.calculate().rank;
    }

    calculate() {
        var i;
        for (i = 0; i < Object.keys(karmaToRank).length; i++) {
            if (this.karma > Object.keys(karmaToRank)[i]) {
                continue;
            } else {
                return karmaToRank[Object.keys(karmaToRank)[i]];
            }
        }
    }
}

var allRewards = [];
var visibleRewards = [];

function displayRewards(xml) {
    var i;
    var xmlDoc = xml.responseXML;
    var allWinners = xmlDoc.getElementsByTagName("Player");
    for (i = 0; i < allWinners.length; i++) {
        var name = getTag(allWinners[i], 'Name');
        var gold = getTag(allWinners[i], 'Base-Point');
        var karma = getTag(allWinners[i], 'Karma-Point');
        var silver = getTag(allWinners[i], 'Experience-Point');
        allRewards.push(new RewardWinner(name, gold, karma, silver));
    }
    visibleRewards = allRewards;
    displayRewardsTable(visibleRewards);
}

const filter = function(e) {
    filterRewards('Name', e.target.value);
}

if (document.getElementById('nameSearch') !== null) {
    var nameSearch = document.getElementById('nameSearch');
    nameSearch.addEventListener('input', filter);
    nameSearch.addEventListener('propertychange', filter); // IE
}

function displayRewardsTable(list) {
    // Assume that list is of type RewardWinner
    var tableHTML = `<tr>
                        <th onclick="filterRewards('Rank')" class="sortable">Rank</th>
                        <th onclick="filterRewards('Level')" class="sortable">Level</th>
                        <th onclick="filterRewards('Avatar')" class="sortable">Avatar / Team Name<input</th>
                        <th onclick="filterRewards('Gold')" class="sortable">Gold Balance</th>
                        <th onclick="filterRewards('Silver')" class="sortable">Silver Balance</th>
                    </tr>`
    for (i = 0; i < list.length; i++) {
        tableHTML += `<tr><th class="standardFont"><img src="img/rank/${list[i].rankIconNum}.png" style="width: 70px"></th>`
        tableHTML += `<th class="standardFont">` + list[i].level + `</th>`;
        tableHTML += `<th class="standardFont">` + list[i].name + `</th>`;
        tableHTML += `<th class="standardFont">` + list[i].gold + `</th>`;
        tableHTML += `<th class="standardFont">` + list[i].silver + `</th></tr>`;
    }
    var message = visibleRewards.length == allRewards.length ?
        `Currently displaying all ${allRewards.length} players` : `Currently displaying ${visibleRewards.length} out of ${allRewards.length} players`;
    document.getElementById('displayingCount').innerHTML = message;
    document.getElementById("rewards").innerHTML = tableHTML;
}



var greater = false;

function filterRewards(filterType, name = "") {
    greater = !greater;
    var min = greater ? -1 : 1;
    var max = greater ? 1 : -1;
    switch (filterType) {
        case 'Rank':
            visibleRewards.sort((a, b) => (a.rankIconNum > b.rankIconNum) ? max : min);
            break;
        case 'Level':
            visibleRewards.sort((a, b) => (a.level > b.level) ? max : min);
            break;
        case 'Avatar':
            visibleRewards.sort((a, b) => (a.name > b.name) ? max : min);
            break;
        case 'Gold':
            visibleRewards.sort((a, b) => (getNum(a.gold) > getNum(b.gold)) ? max : min);
            break;
        case 'Silver':
            visibleRewards.sort((a, b) => (a.silver > b.silver) ? max : min);
            break;
        case 'Name':
            if (name == "") {
                visibleRewards = allRewards;
            } else {
                visibleRewards = allRewards.filter(x => x.name.toLowerCase().includes(name.toLowerCase()));
            }
            break;
    }
    displayRewardsTable(visibleRewards);
}

function getNum(num) {
    return parseFloat(num) % 1 != 1 ? parseFloat(num) : parseInt(num);
}

function getTag(parent, id) {
    return parent.getElementsByTagName(id)[0].childNodes[0].nodeValue;
}