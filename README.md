# APROXI
Carte OSM / Leaflet avec découpe des départements + couleurs selon les prix moyens par département.

## Démonstration 
Les données issues de la base de données ne sont pas complètes. Voici l'exemple actuel : https://mon-chatbot.com/aproxi/index.html

## Configuration
### config.php
Il permet de saisir vos identifiants de base de données.<br />

### Table SQL
J'ai rajouté une colonne ("dep" varchar(15)) qui permet de stocker le numero du département de l'EHPAD.

````
CREATE TABLE `infos_ehpad` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `url` varchar(200) NOT NULL,
  `capacite` bigint(100) NOT NULL,
  `telephone` bigint(100) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `adresse` varchar(100) NOT NULL,
  `cp` varchar(100) NOT NULL,
  `dep` varchar(15) NOT NULL,
  `ville` varchar(100) NOT NULL,
  `statut` varchar(100) NOT NULL,
  `gestionnaire` varchar(100) NOT NULL,
  `nb_f1` varchar(100) NOT NULL,
  `nb_f1b` varchar(100) NOT NULL,
  `nb_f2` varchar(100) NOT NULL,
  `prix_f1` varchar(100) NOT NULL,
  `prix_f1e` varchar(100) NOT NULL,
  `prix_f1b` varchar(100) NOT NULL,
  `prix_f1be` varchar(100) NOT NULL,
  `prix_f2` varchar(100) NOT NULL,
  `prix_f2e` varchar(100) NOT NULL,
  `aide1` varchar(100) NOT NULL,
  `aide2` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
````

### Les fichiers GEOJSON
https://mon-chatbot.com/aproxi/dep.json et https://mon-chatbot.com/aproxi/geojson_avec_prix_moyens.json <br />
Ils sont volumineux, je vous laisse les télécharger via ces 2 URLS et les placer dans le même dossier contenant index.html et les autres fichiers.

### Modifier les couleurs de la carte 
Selon les prix moyens, vous pouvez modifier les couleurs des départements en modifiant dans index.html cette partie du code : 

````
if (val <= 50) { return {fillColor: "#66B0C3", fillOpacity: 0.8, weight: 2,color: "#66B0C3",opacity: 1 }; } else
if (val <= 100) { return {fillColor: "#53A6BB", fillOpacity: 0.8, weight: 2,color: "#53A6BB",opacity: 1 }; } else
if (val <= 150) { return {fillColor: "#409CB4", fillOpacity: 0.8, weight: 2,color: "#409CB4",opacity: 1 };} else
if (val <= 200) { return {fillColor: "#2D93AD", fillOpacity: 0.8, weight: 2,color: "#2D93AD",opacity: 1 };} else
if (val <= 250) { return {fillColor: "#29869E", fillOpacity: 0.8, weight: 2,color: "#29869E",opacity: 1 };} else
if (val <= 300) { return {fillColor: "#25798E", fillOpacity: 0.8, weight: 2,color: "#25798E",opacity: 1 };} else
if (val <= 350) { return {fillColor: "#1D5E6F", fillOpacity: 0.8, weight: 2,color: "#1D5E6F",opacity: 1 };}
else { return {weight: 2,color: "#66B0C3",opacity: 1,fillColor: "#fff",fillOpacity: 0.8 }; }
````
