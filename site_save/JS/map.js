//Création de la carte leafLet
var map = L.map('map').setView([45.833619, 1.261105], 13);  // d'abord latitude et ensuite longitude

L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
}).addTo(map);

var marker1 = L.marker([45.799999, 1.33333]).addTo(map);
var marker2 = L.marker([45.832501, 1.258722]).addTo(map);
var marker3 = L.marker([45.831768, 1.258298]).addTo(map);
var marker4 = L.marker([45.826861, 1.170630]).addTo(map);

marker1.bindPopup("Hello je suis un PopUp !").openPopup();
marker2.bindPopup("Hello je suis un PopUp !").openPopup();
marker3.bindPopup("Hello je suis un PopUp !").openPopup();
marker4.bindPopup("Hello je suis un PopUp !").openPopup();