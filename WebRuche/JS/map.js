var map = L.map('map').setView([45.833619, 1.261105], 13);  // d'abord latitude et ensuite longitude

L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
}).addTo(map);