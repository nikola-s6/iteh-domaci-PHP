<?php

use function PHPSTORM_META\type;

class Beer
{
    private $beerID;
    private $name;
    private $country;
    private $type;
    private $size;
    private $alcohol;
    private $rating;

    public function __construct(
        $beerID = null,
        $name = null,
        $country = null,
        $type = null,
        $size = null,
        $alcohol = null,
        $rating = null
    ) {
        $this->beerID = $beerID;
        $this->name = $name;
        $this->country = $country;
        $this->type = $type;
        $this->size = $size;
        $this->alcohol = $alcohol;
        $this->rating = $rating;
    }

    public function getBeerID()
    {
        return $this->beerID;
    }
    public function setBeerID($beerID)
    {
        $this->beerID  = $beerID;
    }

    public function getName()
    {
        return $this->name;
    }
    public function setName($name)
    {
        $this->name = $name;
    }

    public function getCountry()
    {
        return $this->country;
    }
    public function setCountry($country)
    {
        $this->country = $country;
    }

    public function getType()
    {
        return $this->type;
    }
    public function setType($type)
    {
        $this->type = $type;
    }

    public function getSize()
    {
        return $this->size;
    }
    public function setSize($size)
    {
        $this->size = $size;
    }

    public function getAlcohol()
    {
        return $this->alcohol;
    }
    public function setAlcohol($alcohol)
    {
        $this->alcohol = $alcohol;
    }

    public function getRating()
    {
        return $this->rating;
    }
    public function setRating($rating)
    {
        $this->rating = $rating;
    }


    public static function getAllBeers($userID, mysqli $conn)
    {
        $q = "select * from beer where userID = '" . $userID . "';";
        return $conn->query($q);
    }

    public static function addBeer($name, $country, $type, $alcohol, $size, $rating, $userID, mysqli $conn)
    {
        // $q = "insert into beer(name, country, type, alcohol, size, rating, userID) values('" . $name . "', '" . $country . "', '" . $type . "', '" . $alcohol . "', '" . $size . "', '" . $rating . "', '" . $userID . "';";
        $q = "insert into beer(name, country, type, alcohol, size, rating, userID) values('$name', '$country', '$type', '$alcohol', '$size', '$rating', '$userID');";

        return $conn->query($q);
    }

    public static function getLastAdded($userID, mysqli $conn)
    {
        $q = "select * from beer where userID='$userID' order by beerID desc limit 1;";
        return $conn->query($q);
    }

    public static function delete($beerID, mysqli $conn)
    {
        $q = "delete from beer where beerID=$beerID;";
        return $conn->query($q);
    }

    public static function getBeersByName($userID, $name, mysqli $conn)
    {
        $q = "select * from beer where userID = '$userID' and lower(name) like lower('%$name%');";
        return $conn->query($q);
    }

    public static function getBeerById($userID, $beerID, mysqli $conn)
    {
        $q = "select * from beer where userID = '$userID' and beerID = '$beerID';";
        return $conn->query($q);
    }

    public static function updateBeer($beerID, $name, $country, $type, $alcohol, $size, $rating, mysqli $conn)
    {
        $q = "update beer set name='$name', country='$country', type='$type', alcohol='$alcohol', size='$size', rating='$rating' where beerID='$beerID';";
        return $conn->query($q);
    }
}
