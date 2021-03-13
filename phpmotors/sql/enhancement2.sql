INSERT INTO `client` (`clientFirstName`, `clientLastName`, `clientEmail`, `clientPassword`,`comment`) VALUES ('Tony', 'Stark', 'tony@starkent.com', 'Iam1ronM@n', 'I am the real Ironman');

UPDATE client
   set `clientLevel` = 3
 where client = 7;
 
UPDATE inventory 
   SET invDescription = REPLACE(invDescription,'small interior','spacious interior')
 where invMake = 'GM' and invModel = 'Hummer'; 
 
 DELETE FROM inventory WHERE invMake = 'Jeep' and invModel = 'Wrangler';
 
 UPDATE inventory 
    SET invImage = concat('/phpmotors','',invImage), 
        invThumbnail = concat('/phpmotors','',invThumbnail);
 
