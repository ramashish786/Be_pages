require('./models/db.js');

const express = require('express');
const employeeController = require("./controllers/employeeController.js");
const path = require("path");
const exphbs = require("express-handlebars");
const bodyparser = require("body-parser");
const Handlebars = require('handlebars')


const {allowInsecurePrototypeAccess} = require('@handlebars/allow-prototype-access')


const app = express();
app.use(bodyparser.urlencoded({
    extended: true
}));
app.use(bodyparser.json());
app.use(express.static(__dirname + '/views/image'));
app.set('views',path.join(__dirname,'/views/'));
app.engine('hbs',exphbs({extname:'hbs',defaultLayout:'mainLayout',layoutDir: __dirname+"/views/layouts/", handlebars: allowInsecurePrototypeAccess(Handlebars)}));
app.set("view engine",'hbs');



app.listen(3000,()=>{
    console.log("Server started at 3000.");
});

app.use("/employee",employeeController);