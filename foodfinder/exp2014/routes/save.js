
var express = require('express');
var router = express.Router();
var mongoose = require('mongoose');



var db = mongoose.connection;

Schema = require('./schema_model');

var conn = mongoose.createConnection("mongodb://localhost/Restaurants");

/* GET home page. */
/*router.get('/', function(req, res, next) {
  res.render('index', { title: 'Express' });
});*/


var hotel = conn.model('restaurants', Schema);



router.post('/',function(req, res){
	
	
	console.log("reached here");
	console.log(req.body.email);

	var obj = new hotel({
		_id: req.body.email,
		name: req.body.name,
		address: req.body.address,
		contact: req.body.contact,
		email: req.body.email,
		menu: req.body.menu,
		longi_lati: req.body.longi_lati
	});

	console.log("object created");
	obj.save(function(err,doc){
		console.log("saving in!!");
		if(err){
			res.send('error!!');
		}
		else{
			res.render("success");
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
