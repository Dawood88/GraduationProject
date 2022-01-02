var car = "Altima";
var id = 16; //modify this
var id_end = id + 5;
var car_id = 2; // modify this 
var brand = "Nissan"; //modify this 
var photo_order = 2;
j = 2;
for (var i = id; i < id_end; i++) {

    console.log("INSERT INTO `cars_photos` (`photo_id`, `car_id`, `photo_order`, `photo_src`) VALUES (" + i + "," + car_id + "," + j + ", 'assets/images/cars-images/Nissan/Altima/" + j + ".jpg');")
    j++;
}