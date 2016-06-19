
var express = require('express');
var router = express.Router();
var mongoose = require('mongoose');



var db = mongoose.connection;

Schema1 = require('./schema_model');

var conn1 = mongoose.createConnection("mongodb://localhost/Restaurants");

/* GET home page. */
/*router.get('/', function(req, res, next) {
  res.render('index', { title: 'Express' });
});*/


var hotel1 = conn1.model('restaurants', Schema1);



router.get('/',function(req, res){
	hotel1.findOne({},function(err,doc){
		console.log("----------->"+doc.longi_lati);
		if(err){
			res.send("error");
		}
		else{
			res.render('hotel',{doc})
		}
	});

});
/*
router.use('/', function(req, res){
	console.log("reached here");
	res.render("success");
});
*/



module.exports = router;
