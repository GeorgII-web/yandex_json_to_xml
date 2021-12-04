<?php
// read json file
$offers = json_decode(file_get_contents('in.json'), true);

// create xml
$xml = new SimpleXMLElement('<xml/>');

//log
global $listError;

// parse src array
foreach ($offers as $offer) {
    $id = $offer['_id']['$oid'] ?? null;
    $location = $offer['location'] ?? null;
    $price = $offer['price'] ?? null;
    $area = $offer['area'] ?? null;
    $livingSpace = $offer['livingSpace'] ?? null;
    $kitchenSpace = $offer['kitchenSpace'] ?? null;
    $roomSpace = $offer['roomSpace'] ?? [];
    $images = $offer['image'] ?? [];
    $isRemote = $offer['isRemote'] ?? null;
    $internalId = $offer['internalId'] ?? null;
    $slug = $offer['slug'] ?? null;
    $type = $offer['type'] ?? null;
    $propertyType = $offer['propertyType'] ?? null;
    $category = $offer['category'] ?? null;
    $url = $offer['url'] ?? null;
    $creationDate = $offer['creationDate']['$date'] ?? null;
    $lastUpdateDate = $offer['lastUpdateDate']['$date'] ?? null;
    $agent = $offer['agent']['$oid'] ?? null;
    $dealStatus = $offer['dealStatus'] ?? null;
    $mortgage = $offer['mortgage'] ?? null;
    $agentFee = $offer['agentFee'] ?? null;
    $description = $offer['description'] ?? null;
    $rooms = $offer['rooms'] ?? null;
    $floor = $offer['floor'] ?? null;
    $roomsType = $offer['roomsType'] ?? null;
    $floorsTotal = $offer['floorsTotal'] ?? null;
    $buildingType = $offer['buildingType'] ?? null;
    $lift = $offer['lift'] ?? null;
    $heatingSupply = $offer['heatingSupply'] ?? null;
    $isElite = $offer['isElite'] ?? null;
    $v = $offer['__v'] ?? null;
    $isPublished = $offer['isPublished'] ?? null;
    $dealStatus = $offer['dealStatus'] ?? null;
    $haggle = $offer['haggle'] ?? null;
    $mortgage = $offer['mortgage'] ?? null;
    $prepayment = $offer['prepayment'] ?? null;
    $agentFee = $offer['agentFee'] ?? null;
    $utilitiesIncluded = $offer['utilitiesIncluded'] ?? null;
    $renovation = $offer['renovation'] ?? null;
    $quality = $offer['quality'] ?? null;
    $rooms = $offer['rooms'] ?? null;
    $floor = $offer['floor'] ?? null;
    $apartments = $offer['apartments'] ?? null;
    $studio = $offer['studio'] ?? null;
    $roomsType = $offer['roomsType'] ?? null;
    $windowView = $offer['windowView'] ?? null;
    $balcony = $offer['balcony'] ?? null;
    $bathroomUnit = $offer['bathroomUnit'] ?? null;
    $phone = $offer['phone'] ?? null;
    $internet = $offer['internet'] ?? null;
    $roomFurniture = $offer['roomFurniture'] ?? null;
    $kitchenFurniture = $offer['kitchenFurniture'] ?? null;
    $television = $offer['television'] ?? null;
    $washingMachine = $offer['washingMachine'] ?? null;
    $dishwasher = $offer['dishwasher'] ?? null;
    $refrigerator = $offer['refrigerator'] ?? null;
    $builtInTech = $offer['builtInTech'] ?? null;
    $floorCovering = $offer['floorCovering'] ?? null;
    $withChildren = $offer['withChildren'] ?? null;
    $withPets = $offer['withPets'] ?? null;

    $floorsTotal = $offer['floorsTotal'] ?? null;
    $buildingName = $offer['buildingName'] ?? null;
    $yandexBuildingId = $offer['yandexBuildingId'] ?? null;
    $yandexHouseId = $offer['yandexHouseId'] ?? null;
    $buildingType = $offer['buildingType'] ?? null;
    $builtYear = $offer['builtYear'] ?? null;
    $ceilingHeight = $offer['ceilingHeight'] ?? null;
    $guardedBuilding = $offer['guardedBuilding'] ?? null;
    $accessControlSystem = $offer['accessControlSystem'] ?? null;
    $lift = $offer['lift'] ?? null;
    $rubbishChute = $offer['rubbishChute'] ?? null;
    $electricitySupply = $offer['electricitySupply'] ?? null;
    $waterSupply = $offer['waterSupply'] ?? null;
    $gasSupply = $offer['gasSupply'] ?? null;
    $sewerageSupply = $offer['sewerageSupply'] ?? null;
    $heatingSupply = $offer['heatingSupply'] ?? null;
    $toilet = $offer['toilet'] ?? null;
    $shower = $offer['shower'] ?? null;
    $sauna = $offer['sauna'] ?? null;
    $parking = $offer['parking'] ?? null;
    $parkingPlaces = $offer['parkingPlaces'] ?? null;
    $alarm = $offer['alarm'] ?? null;
    $flatAlarm = $offer['flatAlarm'] ?? null;
    $security = $offer['security'] ?? null;
    $isElite = $offer['isElite'] ?? null;
    //todo all parameters

    echo "> offer: " . $internalId . "\n";
    $listError[]= "> offer: " . $internalId."\n";
    // xml
    $offer = $xml->addChild('offer');
    $offer->addAttribute('internal-id', $internalId);//internal?
    $offer = addChildRequired($offer, 'type', $type);
    $offer = addChildRequired($offer, 'property-type', $propertyType);
    $offer = addChildRequired($offer, 'category', $category);
    $offer = addChildOptional($offer, 'url', htmlspecialchars($url));
    $offer = addChildRequired($offer, 'creation-date', $creationDate);
    $offer = addChildOptional($offer, 'last-update-date', $lastUpdateDate);

    $locationBlock = $offer->addChild('location');
    $locationBlock = addChildRequired($locationBlock, 'country', $location['country']);
    if ($location['localityName'] == "Санкт-Петербург") {
        $locationBlock = addChildOptional($locationBlock, 'region', $location['region'] ?? null);
        $locationBlock = addChildOptional($locationBlock, 'district', $location['district'] ?? null);
    } else {
        $locationBlock = addChildRequired($locationBlock, 'region', $location['region'] ?? null);
        $locationBlock = addChildRequired($locationBlock, 'district', $location['district'] ?? null);
    }

    $locationBlock = addChildRequired($locationBlock, 'locality-name', $location['localityName'] ?? null);
    $locationBlock = addChildOptional($locationBlock, 'sub-locality-name', $location['subLocalityName'] ?? null);
    $locationBlock = addChildRequired($locationBlock, 'address', $location['address'] ?? null);
    $locationBlock = addChildRequired($locationBlock, 'apartment', $location['apartment'] ?? null);
    $locationBlock = addChildOptional($locationBlock, 'direction', $location['direction'] ?? null);
    $locationBlock = addChildOptional($locationBlock, 'distance', $location['distance'] ?? null);
    $locationBlock = addChildOptional($locationBlock, 'latitude', $location['latitude'] ?? null);
    $locationBlock = addChildOptional($locationBlock, 'longitude', $location['longitude'] ?? null);
    $locationBlock = addChildOptional($locationBlock, 'railway-station', $location['railwayStation'] ?? null);
    foreach (($location['metro'] ?? []) as $metro) {
        $metroBlock = $locationBlock->addChild('metro');
        $metroBlock = addChildOptional($metroBlock, 'name', $metro['name'] ?? null);
        $metroBlock = addChildOptional($metroBlock, 'time-on-transport', $metro['timeOnTransport'] ?? null);
        $metroBlock = addChildOptional($metroBlock, 'time-on-foot', $metro['timeOnFoot'] ?? null);
    }
    $locationBlock = addChildOptional($locationBlock, 'village-name', $location['villageName'] ?? null);
    $locationBlock = addChildOptional($locationBlock, 'yandex-village-id', $location['yandexVillageId'] ?? null);

    $agentBlock = $offer->addChild('sales-agent');//??
    $agentBlock->addChild('name', $agent);

    $priceBlock = $offer->addChild('price');
    $priceBlock = addChildRequired($priceBlock, 'value', $price['value'] ?? null);
    $priceBlock = addChildRequired($priceBlock, 'currency', $price['currency'] ?? null);
    if ($type == 'аренда') {
        $priceBlock = addChildRequired($priceBlock, 'period', $price['period'] ?? null);
    }
    $priceBlock = addChildOptional($priceBlock, 'unit', $price['unit'] ?? null);
    if ($type == 'аренда') {
        $offer = addChildOptional($offer, 'rent-pledge', $price['rentPledge'] ?? null);
    }

    $imagesBlock = $offer->addChild('images');
    foreach ($images as $image) {
        $imagesBlock = addChildRequired($imagesBlock, 'image', htmlspecialchars($image));
    }

    $areaBlock = $offer->addChild('area');
    $areaBlock = addChildRequired($areaBlock, 'value', $area['value'] ?? null);
    $areaBlock = addChildRequired($areaBlock, 'unit', $area['unit'] ?? null);

    foreach ($roomSpace as $room) {
        $roomSpaceBlock = $offer->addChild('room-space');
        $roomSpaceBlock = addChildRequired($roomSpaceBlock, 'value', $room['value'] ?? null);
        $roomSpaceBlock = addChildRequired($roomSpaceBlock, 'unit', $room['unit'] ?? null);
    }

    $livingSpaceBlock = $offer->addChild('living-space');
    $livingSpaceBlock = addChildRequired($livingSpaceBlock, 'value', $area['value'] ?? null);
    $livingSpaceBlock = addChildRequired($livingSpaceBlock, 'unit', $area['unit'] ?? null);

    $kitchenSpaceBlock = $offer->addChild('kitchen-space');
    $kitchenSpaceBlock = addChildOptional($kitchenSpaceBlock, 'value', $area['value'] ?? null);
    $kitchenSpaceBlock = addChildOptional($kitchenSpaceBlock, 'unit', $area['unit'] ?? null);

    if ($type == 'продажа') {
        $offer = addChildRequired($offer, 'deal-status', $dealStatus);
    }
    $offer = addChildOptional($offer, 'description', $description);
    $offer = addChildOptional($offer, 'haggle', $haggle);
    $offer = addChildOptional($offer, 'mortgage', $mortgage);
    $offer = addChildOptional($offer, 'prepayment', $prepayment);
    $offer = addChildOptional($offer, 'agent-fee', $agentFee);
    $offer = addChildOptional($offer, 'utilities-included', $utilitiesIncluded);
    $offer = addChildOptional($offer, 'renovation', $renovation);
    $offer = addChildOptional($offer, 'quality', $quality);
    $offer = addChildRequired($offer, 'rooms', $rooms);
    $offer = addChildRequired($offer, 'floor', $floor);
    $offer = addChildOptional($offer, 'apartments', $apartments);
    $offer = addChildOptional($offer, 'studio', $studio);
    $offer = addChildOptional($offer, 'roomsType', $roomsType);
    $offer = addChildOptional($offer, 'windowView', $windowView);
    $offer = addChildOptional($offer, 'balcony', $balcony);
    $offer = addChildOptional($offer, 'bathroomUnit', $bathroomUnit);
    $offer = addChildOptional($offer, 'phone', $phone);
    $offer = addChildOptional($offer, 'internet', $internet);
    $offer = addChildOptional($offer, 'roomFurniture', $roomFurniture);
    $offer = addChildOptional($offer, 'kitchenFurniture', $kitchenFurniture);
    $offer = addChildOptional($offer, 'television', $television);
    $offer = addChildOptional($offer, 'washingMachine', $washingMachine);
    $offer = addChildOptional($offer, 'dishwasher', $dishwasher);
    $offer = addChildOptional($offer, 'refrigerator', $refrigerator);
    $offer = addChildOptional($offer, 'builtInTech', $builtInTech);
    $offer = addChildOptional($offer, 'floorCovering', $floorCovering);
    $offer = addChildOptional($offer, 'withChildren', $withChildren);
    $offer = addChildOptional($offer, 'withPets', $withPets);
    $offer = addChildOptional($offer, 'floorsTotal', $floorsTotal);
    $offer = addChildOptional($offer, 'buildingName', $buildingName);
    $offer = addChildRequired($offer, 'yandexBuildingId', $yandexBuildingId);
    $offer = addChildRequired($offer, 'yandexHouseId', $yandexHouseId);
    $offer = addChildOptional($offer, 'buildingType', $buildingType);
    $offer = addChildRequired($offer, 'builtYear', $builtYear);
    $offer = addChildOptional($offer, 'ceilingHeight', $ceilingHeight);
    $offer = addChildOptional($offer, 'guardedBuilding', $guardedBuilding);
    $offer = addChildOptional($offer, 'accessControlSystem', $accessControlSystem);
    $offer = addChildOptional($offer, 'lift', $lift);
    $offer = addChildOptional($offer, 'rubbishChute', $rubbishChute);
    $offer = addChildOptional($offer, 'electricitySupply', $electricitySupply);
    $offer = addChildOptional($offer, 'waterSupply', $waterSupply);
    $offer = addChildOptional($offer, 'gasSupply', $gasSupply);
    $offer = addChildOptional($offer, 'sewerageSupply', $sewerageSupply);
    $offer = addChildOptional($offer, 'heatingSupply', $heatingSupply);
    $offer = addChildOptional($offer, 'toilet', $toilet);
    $offer = addChildOptional($offer, 'shower', $shower);
    $offer = addChildOptional($offer, 'sauna', $sauna);
    $offer = addChildOptional($offer, 'parking', $parking);
    $offer = addChildOptional($offer, 'parkingPlaces', $parkingPlaces);
    $offer = addChildOptional($offer, 'alarm', $alarm);
    $offer = addChildOptional($offer, 'flatAlarm', $flatAlarm);
    $offer = addChildOptional($offer, 'security', $security);
    $offer = addChildOptional($offer, 'isElite', $isElite);
}

function addChildRequired($offer, $field, $value)
{
    global $listError;
    if (isset($value)) {
        $value = convertValue($value);
        $offer->addChild($field, $value);
    } else {
        echo "Required field is empty '".$field . "'\n";
        $listError[]="Required field is empty '".$field . "'\n";
    }
    return $offer;
}

function addChildOptional($offer, $field, $value)
{
    if (isset($value)) {
        $value = convertValue($value);
        $offer->addChild($field, $value);
    }
    return $offer;
}

function convertValue($value)
{
    global $listError;
    $result = null;
    if ($value === true) {
        $result = "да";
    } elseif ($value === false) {
        $result = "нет";
    } elseif (is_string($value)) {
        $result = $value;
    } elseif (is_numeric($value)) {
        $result = $value;
    } else {
        echo "Unknown value";
        $listError[]="Unknown value \n";
    }
    return $result;
}

// xml save
//Header('Content-type: text/xml');
$xml->asXML('out.xml');
file_put_contents('logs.txt', $listError);
