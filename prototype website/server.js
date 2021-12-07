
'use strict';
var http = require('http');
var fs = require('fs');
var port = process.env.PORT || 1337;
var index = fs.readFileSync('Page1.html');
http.createServer(function (req, res) {
    res.writeHead(200, { 'Content-Type': 'text/plain' });
    res.end(index);
}).listen(port);

/*
var mysql = require('mysql');

var con = mysql.createConnection({
    host: "localhost",
    user: "root",
    password: "studentplanner321"
});

con.connect(function (err) {
    if (err) throw err;
    console.log("Connected!");
});

*/