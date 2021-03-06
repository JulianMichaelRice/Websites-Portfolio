function loadXMLDoc() {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            ranking(this);
        }
    };
    xmlhttp.open("GET", "https://www.entropiagold.com/tourn/output.xml", true);
    xmlhttp.send();
    setInterval(checkTime, 1000);
}

function loadXMLDocBonus() {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            daily(this);
            weekly(this);
            monthly(this);
        }
    };
    xmlhttp.open("GET", "https://www.entropiagold.com/tourn/output.xml", true);
    xmlhttp.send();
    setTimeout(checkTimeBonus, 1000);
}

function loadXMLDocPrize() {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            getGlobalScore(this);
        }
    };
    xmlhttp.open("GET", "https://www.entropiagold.com/tourn/output.xml", true);
    xmlhttp.send();
}

function organizeArray(array) {
    array.sort(function(a, b) {
        return a-b;
    });
    array.reverse();
    return array;
}

function sleep(milliseconds) {
    const date = Date.now();
    let currentDate = null;
    do {
    currentDate = Date.now();
    } while (currentDate - date < milliseconds);
}

function getGlobalString(array) {
    var result = "";
    for (i = 0; i < array.length; i++) {
        if (i+1 >= array.length) {
            result += array[i];
        } else {
            result += array[i] + ", ";
        }
    }
    return result;
}

function getGlobalScore(xml) {
    var xmlDoc = xml.responseXML;
    document.getElementById("tscore").innerHTML = "<h4 class='text-center' style='color: white; font-size: 60px'>" + xmlDoc.getElementsByTagName("global_total")[0].childNodes[0].nodeValue + "</h4>";
}

function daily(xml) {
    var xmlDoc = xml.responseXML;
    var parentTag = xmlDoc.getElementsByTagName("daily")[0].getElementsByTagName("bonus");
    var table="<tr><th>Date</th><th>Avatar</th><th>Mob | Resource Value</th><th>Bonus Points</th></tr>";
    var bonus, avatar, value, date;
    for (var i = parentTag.length-1; i >= 0; i--) {
        var fullText = parentTag[i].childNodes[0].nodeValue;
        bonus = parentTag[i].getAttribute("value");
        avatar = parentTag[i].childNodes[0].nodeValue.substring(fullText.indexOf("<"), fullText.indexOf("</a>"));
        value = fullText.substring(fullText.indexOf("- ")+2, fullText.indexOf(")")+1);
        date = parentTag[i].getAttribute("date").substring(0, 10);

        table += "<tr class=\"opac\"><td>" + date + "</td><td>" + avatar + "</td><td>" + value + "</td><td>" + bonus + "</td></tr>"
    }
    document.getElementById("daily").innerHTML = table;
}

function weekly(xml) {
    var xmlDoc = xml.responseXML;
    var parentTag = xmlDoc.getElementsByTagName("weekly")[0].getElementsByTagName("bonus");
    var table="<tr><th>Date</th><th>Avatar</th><th>Mob | Resource Value</th><th>Bonus Points</th></tr>";
    var bonus, avatar, value, date;
    for (var i = parentTag.length-1; i >= 0; i--) {
        var fullText = parentTag[i].childNodes[0].nodeValue;
        bonus = parentTag[i].getAttribute("value");
        avatar = parentTag[i].childNodes[0].nodeValue.substring(fullText.indexOf("<"), fullText.indexOf("</a>"));
        value = fullText.substring(fullText.indexOf("- ")+2, fullText.indexOf(")")+1);
        date = parentTag[i].getAttribute("date").substring(0, 10);

        table += "<tr class=\"opac\"><td>" + date + "</td><td>" + avatar + "</td><td>" + value + "</td><td>" + bonus + "</td></tr>"
    }
    document.getElementById("weekly").innerHTML = table;
}

function monthly(xml) {
    var xmlDoc = xml.responseXML;
    var parentTag = xmlDoc.getElementsByTagName("monthly")[0].getElementsByTagName("bonus");
    var table="<tr><th>Date</th><th>Avatar</th><th>Mob | Resource Value</th><th>Bonus Points</th></tr>";
    var bonus, avatar, value, date;
    for (var i = 0; i < parentTag.length; i++) {
        var fullText = parentTag[i].childNodes[0].nodeValue;
        bonus = parentTag[i].getAttribute("value");
        avatar = parentTag[i].childNodes[0].nodeValue.substring(fullText.indexOf("<"), fullText.indexOf("</a>"));
        value = fullText.substring(fullText.indexOf("- ")+2, fullText.indexOf(")")+1);
        date = parentTag[i].getAttribute("date").substring(0, 10);

        table += "<tr class=\"opac\"><td>" + date + "</td><td>" + avatar + "</td><td>" + value + "</td><td>" + bonus + "</td></tr>"
    }
    document.getElementById("monthly").innerHTML = table;
}

//Not sure if this works yet... we'll have to wait till Sunday and see probably
function checkTime() {
    var seconds = parseInt(new Date().getTime() / 1000);
    // console.log("ran checktime " + seconds + " % 300 => " + parseInt(seconds % 300));
    if (parseInt(seconds % 300) == 0) {
        
        $.get("https://www.entropiagold.com/tourn/lootius.php");
        sleep(10000);
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                ranking(this);
            }
        };
        // console.log("Sent a request to update the leaderboard");
        xmlhttp.open("GET", "https://www.entropiagold.com/tourn/output.xml", true);
        xmlhttp.send();
    }
}

//Not sure if this works yet... we'll have to wait till Sunday and see probably
function checkTimeBonus() {
    var seconds = new Date().getTime() / 1000;
    if (seconds % 300 == 0) {
        
        $.get("https://www.entropiagold.com/tourn/lootius.php");
        sleep(10000);
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                daily(this);
                weekly(this);
                monthly(this);
            }
        };
        xmlhttp.open("GET", "https://www.entropiagold.com/tourn/output.xml", true);
        xmlhttp.send();
    }
}

function ranking(xml) {
    //Variable Declaration
    var i;
    var xmlDoc = xml.responseXML;
    var table="<tr><th>Class</th><th>Rank</th><th>Avatar</th><th width='18%'>Score</th><th width='18%'>Atrox Globals</th><th width='22%'>Scipulor Globals</th><th width='15%'>Neconu Globals</th></tr>";
    var x = xmlDoc.getElementsByTagName("player");
    var p_class, rank, total_score, avatar, atrox_globals, scip_globals, neconu_globals, atrox_string, scip_string, neconu_string;

    for (i = 0; i < 100; i++) { //x.length
        p_class = x[i].getAttribute("class");   //What class is the player?
        rank = i+1;                             //What's the player's rank?
        total_score = x[i].getElementsByTagName("total_score")[0].childNodes[0].nodeValue;  //What is the player's final score?
        avatar = x[i].getAttribute("name");     //What is the player's avatar/name?
        atrox_globals = [];                     //List of atrox globals
        scip_globals = [];                      //List of scipular globals
        neconu_globals = [];                    //List of neconu globals
        atrox_string = "";                      //Final output for atrox values
        scip_string = "";                       //Final output for scipular values
        neconu_string = "";                     //Final output for neconu values

        //Get every EVENT in the XML for the player, then add the values to a global array
        for (atrox = 0; atrox < x[i].getElementsByTagName("atrox")[0].getElementsByTagName("event").length; atrox++) {
            atrox_globals.push(x[i].getElementsByTagName("atrox")[0].getElementsByTagName("event")[atrox].getAttribute("value"));
        }

        //Organize the array so that it's descending order (100, 90, 80, etc.)
        atrox_globals = organizeArray(atrox_globals);

        for (scip = 0; scip < x[i].getElementsByTagName("scipulor")[0].getElementsByTagName("event").length; scip++) {
            scip_globals.push(x[i].getElementsByTagName("scipulor")[0].getElementsByTagName("event")[scip].getAttribute("value"));
        }
        scip_globals = organizeArray(scip_globals);

        for (neco = 0; neco < x[i].getElementsByTagName("neconu")[0].getElementsByTagName("event").length; neco++) {
            neconu_globals.push(x[i].getElementsByTagName("neconu")[0].getElementsByTagName("event")[neco].getAttribute("value"));
        }
        neconu_globals = organizeArray(neconu_globals);

        //Get a string of the numbers for each player's Atrox / Scipulor / Neconu globals
        //Ex: 185, 74, 54, 51
        atrox_string = getGlobalString(atrox_globals);
        scip_string = getGlobalString(scip_globals);
        neconu_string = getGlobalString(neconu_globals);

        var source = "";
        var class_name = "";
        if (p_class == "Scipulor") {
            source = "i_fixer2.png";
            class_name = "Fixer";
        } else if (p_class == "Atrox") {
            source = "i_nomad2.png";
            class_name = "Nomad";
        } else {
            source = "i_neconu2.png";
            class_name = "Techie";
        }
        rank = rank.toString();
        var lastNum = rank[rank.length-1];
        if (lastNum == "1" && rank != "11") {
            rank += "st";
        } else if (lastNum == "2" && rank != "12") {
            rank += "nd";
        } else if (lastNum == "3" && rank != "13") {
            rank += "rd";
        } else {
            rank += "th";
        }
        //Final output for ONE player to the table pure html
        if (parseInt(rank) <= 15) {
            table += "<tr class=\"opac\"><td><img src=\"img/" + source + "\" style=\"width:100px\"></td><td style='font-size: 32px; font-weight: 500'>" + rank + "</td><td>" + avatar + "</td><td style='font-size: 28px;'>" + parseFloat(total_score).toFixed(2) + "</td><td>" + atrox_string + "</td><td>" + scip_string + "</td><td>" + neconu_string + "</td></tr>"
        } else {
            table += "<tr class=\"opac\"><td>" + class_name + "</td><td style='font-size: 22px'>" + rank + "</td><td>" + avatar + "</td><td>" + parseFloat(total_score).toFixed(2) + "</td><td>" + atrox_string + "</td><td>" + scip_string + "</td><td>" + neconu_string + "</td></tr>"
        }
    }
    document.getElementById("goomba").innerHTML = table;
}