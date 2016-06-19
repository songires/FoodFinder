var mongoose = require('mongoose');
var Schema = mongoose.Schema;

var userSchema = new Schema({
	_id: String,
	name : String,
	address : String,
	contact : String,
	email : String,
	menu : String,
	longi_lati: String
});
module.exports = mongoose.model('restaurants', userSchema);