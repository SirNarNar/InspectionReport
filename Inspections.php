<?php
// changing the timezone to ours
date_default_timezone_set('America/Toronto');
// pulling the data from the index.html form into variables
$sDate = new DateTime($_POST['date']);
$eDate = clone($sDate);
$truck = $_POST['truck'];

// creating inspection class that will organize and hold the data we will pull from the API
class Inspection
{
    // creating variables for each piece of info we're going to pull
    private $vehicle;
    private $division;
    private $driver;
    private $type;
    private $time;
    private $airBrake;
    private $cab;
    private $cargo;
    private $coupling;
    private $dangerous;
    private $seat;
    private $controls;
    private $ebs;
    private $emergen;
    private $exhaust;
    private $frame;
    private $fuel;
    private $general;
    private $glass;
    private $heater;
    private $horn;
    private $hydraulic;
    private $lamps;
    private $steering;
    private $suspension;
    private $tires;
    private $wheels;
    private $wipers;
    private $plate;
    private $juri;
    private $loc;
    private $defect;
    private $oReg;
    private $odo;
    private $status;

    #region getters and setters
    public function setVehicle ($vehicle)
    {$this->vehicle = $vehicle;}
    public function getVehicle()
    {return $this->vehicle;}

    public function setDivision ($division)
    {$this->division = $division;}
    public function getDivision()
    {
        switch ($this->division) 
            {
                case -762496764: 
                    return "Front End";
                    break;
                case -488398130:
                    return "Roll Off";
                    break;
                case 1168592360:
                    return "Walking Floor";
                    break;
                case 102226412:
                    return "Tractor";
                    break;
                case 827746938:
                    return "Rear Packer";
                    break;
                case -711615004:
                    return "Rear Packer";
                    break;
                default:
                    return "Peter Wyroba";
                    break;
            }
    }

    public function setDriver ($driver)
    {$this->driver = $driver;}
    public function getDriver()
    {return $this->driver;}

    public function setType ($type)
    {$this->type = $type;}
    public function getType()
    {return $this->type;}

    public function setTime ($time)
    {$this->time = $time;}
    public function getTime()
    {return $this->time;}
    
    public function setAirBrake ($airBrake)
    {$this->airBrake = $airBrake;}
    public function getAirBrake ()
    {
        if ($this->airBrake == "Undefined")
        return "N/A";
        return $this->airBrake;
    }

    public function setCab ($cab)
    {$this->cab = $cab;}
    public function getCab ()
    {
        if ($this->cab == "Undefined")
        return "N/A";
        return $this->cab;
    }

    public function setCargo ($cargo)
    {$this->cargo = $cargo;}
    public function getCargo ()
    {
        if ($this->cargo == "Undefined")
        return "N/A";
        return $this->cargo;
    }

    public function setCoupling ($coupling)
    {$this->coupling = $coupling;}
    public function getCoupling ()
    {
        if ($this->coupling == "Undefined")
        return "N/A";
        return $this->coupling;
    }

    public function setDangerous ($dangerous)
    {$this->dangerous = $dangerous;}
    public function getDangerous ()
    {
        if ($this->dangerous == "Undefined")
        {
            return "N/A";
        }
        return $this->dangerous;
    }

    public function setControls ($controls)
    {$this->controls = $controls;}
    public function getControls ()
    {
        if($this->controls == "Undefined")
        {
            return "N/A";
        }
        return $this->controls;
    }

    public function setSeat ($seat)
    {$this->seat = $seat;}
    public function getSeat ()
    {
        if ($this->seat == "Undefined")
        return "N/A";
        return $this->seat;
    }

    public function setEbs ($ebs)
    {$this->ebs = $ebs;}
    public function getEbs ()
    {
        if ($this->ebs == "Undefined")
        return "N/A";
        return $this->ebs;
    }

    public function setEmergen ($emergen)
    {$this->emergen = $emergen;}
    public function getEmergen ()
    {
        if ($this->emergen == "Undefined")
        return "N/A";
        return $this->emergen;
    }

    public function setExhaust ($exhaust)
    {$this->exhaust = $exhaust;}
    public function getExhaust ()
    {
        if ($this->exhaust == "Undefined")
        return "N/A";
        return $this->exhaust;
    }

    public function setFrame ($frame)
    {$this->frame = $frame;}
    public function getFrame ()
    {
        if ($this->frame == "Undefined")
        return "N/A";
        return $this->frame;
    }

    public function setFuel ($fuel)
    {$this->fuel = $fuel;}
    public function getFuel ()
    {
        if ($this->fuel == "Undefined")
        return "N/A";
        return $this->fuel;
    }

    public function setGeneral ($general)
    {$this->general = $general;}
    public function getGeneral ()
    {
        if ($this->general == "Undefined")
        return "N/A";
        return $this->general;
    }

    public function setGlass ($glass)
    {$this->glass = $glass;}
    public function getGlass ()
    {
        if ($this->glass == "Undefined")
        return "N/A";
        return $this->glass;
    }

    public function setHeater ($heater)
    {$this->heater = $heater;}
    public function getHeater ()
    {
        if ($this->heater == "Undefined")
        return "N/A";
        return $this->heater;
    }


    public function setHorn ($horn)
    {$this->horn = $horn;}
    public function getHorn ()
    {
        if ($this->horn == "Undefined")
        return "N/A";
        return $this->horn;
    }

    public function setHydraulic ($hydraulic)
    {$this->hydraulic = $hydraulic;}
    public function getHydraulic ()
    {
        if ($this->hydraulic == "Undefined")
        return "N/A";
        return $this->hydraulic;
    }

    public function setLamps ($lamps)
    {$this->lamps = $lamps;}
    public function getLamps ()
    {
        if ($this->lamps == "Undefined")
        return "N/A";
        return $this->lamps;
    }

    public function setSteering ($steering)
    {$this->steering = $steering;}
    public function getSteering ()
    {if ($this->steering == "Undefined")
        return "N/A";
        return $this->steering;
    }

    public function setSuspension ($suspension)
    {$this->suspension = $suspension;}
    public function getSuspension ()
    {
        if ($this->suspension == "Undefined")
        return "N/A";
        return $this->suspension;
    }
    public function setTires ($tires)
    {$this->tires = $tires;}
    public function getTires ()
    {
        if ($this->tires == "Undefined")
        return "N/A";
        return $this->tires;
    }

    public function setWheels ($wheels)
    {$this->wheels = $wheels;}
    public function getWheels ()
    {
        if ($this->wheels == "Undefined")
        return "N/A";
        return $this->wheels;
    }

    public function setWipers ($wipers)
    {$this->wipers = $wipers;}
    public function getWipers ()
    {
        if ($this->wipers == "Undefined")
        return "N/A";
        return $this->wipers;
    }

    public function setPlate ($plate)
    {$this->plate = $plate;}
    public function getPlate ()
    {
        if ($this->plate == "")
        return "ERROR NOTHING ENTERED";
        return $this->plate;
    }

    public function setJuri ($juri)
    {$this->juri = $juri;}
    public function getJuri ()
    {
        if ($this->juri == "")
        return "ERROR NOTHING ENTERED";
        return $this->juri;
    }

    public function setLoc ($loc)
    {$this->loc = $loc;}
    public function getLoc ()
    {
        if ($this->loc == "")
        return "ERROR NOTHING SELECTED";
        return $this->loc;
    }

    public function setDefect ($defect)
    {$this->defect = $defect;}
    public function getDefect ()
    {
        if ($this->defect == "Undefined")
        return "ERROR NOTHING SELECTED";
        return $this->defect;
    }

    public function setOReg ($oReg)
    {$this->oReg = $oReg;}
    public function getOReg ()
    {
        if ($this->oReg == "Undefined")
        return "N/A";
        elseif ($this->oReg == "Passed")
        return "Driver Confirmed";
        return "ERROR NOTHING SELECTED";
    }

    public function setOdo ($odo)
    {$this->odo = $odo;}
    public function getOdo()
    {return $this->odo;}

    public function setStatus ($status)
    {$this->status = $status;}
    public function getStatus()
    {
        if ($this->status == false)
        return "Passed";
        else
        return "Failed";
    }
    #endregion
}

// API Pull
$inspectionArray = array(); //will store the activities
error_reporting(1);
$startDate = $sDate->format('Y-m-d');
$endDate = $eDate->format('Y-m-d');
$searchCriteria = "{\"minDate\": \"" . $startDate . "\",\"maxDate\": \"" . $endDate . "\"}";
$apiKey = '******';
$url = '******' . $startDate . '******' . $startDate . "******" . $truck;
$headers = array();
$headers[] = 'Accept: application/json';
$headers[] = 'X-Apikey: ' . $apiKey;

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_TIMEOUT, 3);

$jsonExec = curl_exec($ch);
if(curl_errno($ch))
{
	echo 'Error:' . curl_error($ch);
}

curl_close($ch);


$json = json_decode($jsonExec, true); 
$length = count($json['Data'], 0);

$j = 0;
if ($length > 0)
{
    for ($i = 0; $i < $length; $i++) // create new activity object for each seperate entry pulled from API
    {
        $inspectionArray[$j] = new Inspection();
        $inspectionArray[$j]->setVehicle ($json['Data'][$j]['vehicleName']);
        $inspectionArray[$j]->setDivision ($json['Data'][$j]['divisionId']);
        $inspectionArray[$j]->setDriver ($json['Data'][$j]['driverCode']);
        $inspectionArray[$j]->settype ($json['Data'][$j]['type']);
        $inspectionArray[$j]->setTime ($json['Data'][$j]['CreatedTimestamp']);
        $inspectionArray[$j]->setAirBrake ($json['Data'][$j]['inspectionData'][0]["UnitGroups"][0]["Units"][0]["Value"]);
        $inspectionArray[$j]->setCab ($json['Data'][$j]['inspectionData'][0]["UnitGroups"][0]["Units"][1]["Value"]);
        $inspectionArray[$j]->setCargo ($json['Data'][$j]['inspectionData'][0]["UnitGroups"][0]["Units"][2]["Value"]);
        $inspectionArray[$j]->setCoupling ($json['Data'][$j]['inspectionData'][0]["UnitGroups"][0]["Units"][3]["Value"]);
        $inspectionArray[$j]->setDangerous ($json['Data'][$j]['inspectionData'][0]["UnitGroups"][0]["Units"][4]["Value"]);
        $inspectionArray[$j]->setControls ($json['Data'][$j]['inspectionData'][0]["UnitGroups"][0]["Units"][5]["Value"]);
        $inspectionArray[$j]->setSeat ($json['Data'][$j]['inspectionData'][0]["UnitGroups"][0]["Units"][6]["Value"]);
        $inspectionArray[$j]->setEbs ($json['Data'][$j]['inspectionData'][0]["UnitGroups"][0]["Units"][7]["Value"]);
        $inspectionArray[$j]->setEmergen ($json['Data'][$j]['inspectionData'][0]["UnitGroups"][0]["Units"][8]["Value"]);
        $inspectionArray[$j]->setExhaust ($json['Data'][$j]['inspectionData'][0]["UnitGroups"][0]["Units"][9]["Value"]);
        $inspectionArray[$j]->setFrame ($json['Data'][$j]['inspectionData'][0]["UnitGroups"][0]["Units"][10]["Value"]);
        $inspectionArray[$j]->setFuel ($json['Data'][$j]['inspectionData'][0]["UnitGroups"][0]["Units"][11]["Value"]);
        $inspectionArray[$j]->setGeneral ($json['Data'][$j]['inspectionData'][0]["UnitGroups"][0]["Units"][12]["Value"]);
        $inspectionArray[$j]->setGlass ($json['Data'][$j]['inspectionData'][0]["UnitGroups"][0]["Units"][13]["Value"]);
        $inspectionArray[$j]->setHeater ($json['Data'][$j]['inspectionData'][0]["UnitGroups"][0]["Units"][14]["Value"]);
        $inspectionArray[$j]->setHorn ($json['Data'][$j]['inspectionData'][0]["UnitGroups"][0]["Units"][15]["Value"]);
        $inspectionArray[$j]->setHydraulic ($json['Data'][$j]['inspectionData'][0]["UnitGroups"][0]["Units"][16]["Value"]);
        $inspectionArray[$j]->setLamps ($json['Data'][$j]['inspectionData'][0]["UnitGroups"][0]["Units"][17]["Value"]);
        $inspectionArray[$j]->setSteering ($json['Data'][$j]['inspectionData'][0]["UnitGroups"][0]["Units"][18]["Value"]);
        $inspectionArray[$j]->setSuspension ($json['Data'][$j]['inspectionData'][0]["UnitGroups"][0]["Units"][19]["Value"]);
        $inspectionArray[$j]->setTires ($json['Data'][$j]['inspectionData'][0]["UnitGroups"][0]["Units"][20]["Value"]);
        $inspectionArray[$j]->setWheels ($json['Data'][$j]['inspectionData'][0]["UnitGroups"][0]["Units"][21]["Value"]);
        $inspectionArray[$j]->setWipers ($json['Data'][$j]['inspectionData'][0]["UnitGroups"][0]["Units"][22]["Value"]);
        $inspectionArray[$j]->setPlate ($json['Data'][$j]['inspectionData'][0]["UnitGroups"][1]["Units"][0]["Note"]);
        $inspectionArray[$j]->setJuri ($json['Data'][$j]['inspectionData'][0]["UnitGroups"][1]["Units"][1]["Note"]);
        $inspectionArray[$j]->setLoc ($json['Data'][$j]['inspectionData'][0]["UnitGroups"][1]["Units"][2]["Note"]);
        $inspectionArray[$j]->setDefect ($json['Data'][$j]['inspectionData'][0]["UnitGroups"][1]["Units"][3]["Value"]);
        $inspectionArray[$j]->setOReg ($json['Data'][$j]['inspectionData'][0]["UnitGroups"][1]["Units"][4]["Value"]);
        $inspectionArray[$j]->setOdo ($json['Data'][$j]['startOdometer']);
        $inspectionArray[$j]->setStatus ($json['Data'][$j]['isFailed']);
        $j++;
    }
}
?>
<!-- HTML code to display the inf0 -->
<head>
<link rel="stylesheet" href="style.css">
</head>
<body>
<h1> Vehicle <?php echo ucwords($_POST['type']) ?>-trip Inspection Report </h1>

<?php
$count = 0;
//go through each object in the array and print it
foreach($inspectionArray as $inspection)
{
    // make sure onject matches the da we actually want
    if (substr($inspection->getTime(), 0, 10) != substr($startDate,0,10))
    continue;

    // check if it's the type we want from the selection made in the form
    if ($inspection->gettype() == "PRE" && ($_POST['type'] == "pre")){
    makeReport($inspection);
    $count++;
    }

    // check if it's the type we want from the selection made in the form
    if ($inspection->gettype() == "POST" && ($_POST['type'] == "post")){
    makeReport($inspection);
    $count++;
    }
}

// function used to print the info
function makeReport($obj) 
{
    echo "<table class = \"intro\" width=\"90%\">
            <tr>
                <td><strong>Vehicle ID:<strong></td>
                <td>" . substr($obj->getVehicle(),3) . "</td>
                <td><strong>Employee:<strong></td>
                <td>" . $obj->getDriver() . "</td>
            </tr>
            <tr>
                <td><strong>Time:<strong></td>
                <td>" . str_replace("T", " ", $obj->getTime()) . "</td>
                <td><strong>Odometer:<strong></td>
                <td>" . $obj->getOdo() . "</td>
            </tr>
            <tr>
                <td><strong>Status:<strong></td>
                <td class = \"stat\">" . $obj->getStatus() . "</td>
                <td><strong>Plate:</strong></td>
                <td>" . $obj->getPlate() . "</td>
            </tr>
            <tr>
                <td><strong>Location:<strong></td>
                <td>" . $obj->getLoc() . "</td>
                <td><strong>Plate Jurisdiction:</strong></td>
                <td>" . $obj->getJuri() . "</td>
            </tr>
          </table>
          <h1>Truck</h1>
          <table width=\"90%\">
            <tr>
                <td class = \"left\">Air Brake</td>
                <td class = \"right\">" . $obj->getAirBrake() . "</td>
                <td class = \"left\">Cab</td>
                <td class = \"right\">" . $obj->getCab()  . "</td>
                <td class = \"left\">Cargo Securement</td>
                <td class = \"right\">" . $obj->getCargo()  . "</td>
            </tr>
            <tr>
                <td class = \"left\">Coupling Devices</td>
                <td class = \"right\">" . $obj->getCoupling() . "</td>
                <td class = \"left\">Dangerous Goods</td>
                <td class = \"right\">" . $obj->getDangerous()  . "</td>
                <td class = \"left\">Driver Controls</td>
                <td class = \"right\">" . $obj->getControls()  . "</td>
            </tr>
            <tr>
                <td class = \"left\">Driver Seat</td>
                <td class = \"right\">" . $obj->getSeat() . "</td>
                <td class = \"left\">Electric Brake System</td>
                <td class = \"right\">" . $obj->getEbs()  . "</td>
                <td class = \"left\">Emergency Equipment</td>
                <td class = \"right\">" . $obj->getEmergen()  . "</td>
            </tr>
            <tr>
                <td class = \"left\">Exhaust System</td>
                <td class = \"right\">" . $obj->getExhaust() . "</td>
                <td class = \"left\">Frame and Cargo Body</td>
                <td class = \"right\">" . $obj->getFrame()  . "</td>
                <td class = \"left\">Fuel Sysyem</td>
                <td class = \"right\">" . $obj->getFuel()  . "</td>
            </tr>
            <tr>
                <td class = \"left\">General</td>
                <td class = \"right\">" . $obj->getGeneral() . "</td>
                <td class = \"left\">Glass and Mirrors</td>
                <td class = \"right\">" . $obj->getGlass()  . "</td>
                <td class = \"left\">Heater / Defroster</td>
                <td class = \"right\">" . $obj->getHeater()  . "</td>
            </tr>
            <tr>
                <td class = \"left\">Horn</td>
                <td class = \"right\">" . $obj->getHorn() . "</td>
                <td class = \"left\">Hydraulic Cylinder / Lines</td>
                <td class = \"right\">" . $obj->getHydraulic()  . "</td>
                <td class = \"left\">Lamps and Reflectors</td>
                <td class = \"right\">" . $obj->getLamps()  . "</td>
            </tr>
            <tr>
                <td class = \"left\">Steering</td>
                <td class = \"right\">" . $obj->getSteering() . "</td>
                <td class = \"left\">Suspension System</td>
                <td class = \"right\">" . $obj->getSuspension()  . "</td>
                <td class = \"left\">Tires</td>
                <td class = \"right\">" . $obj->getTires()  . "</td>
            </tr>
            <tr>
                <td class = \"left\">Wheels, Hubs and Fasteners</td>
                <td class = \"right\">" . $obj->getWheels() . "</td>
                <td class = \"left\">Windshield/Wiper Washer</td>
                <td class = \"right\">" . $obj->getWipers()  . "</td>
                <td class = \"left\">No Defects</td>
                <td class = \"right\">" . $obj->getDefect()  . "</td>
            </tr>
          </table>";
          echo "<h3>Done according to O. Reg 199/07: <div>" . $obj->getOReg() . "</div></h3>";
}

//a bunch of java code to change the colour of the text
echo "<script>
    document.querySelectorAll('.left').forEach(i => {
    i.textContent.indexOf(\"Failed\") !== -1 ?
      i.classList.add('red') :
      i.innerText.indexOf(\"Passed\") !== -1 ?
      i.classList.add('green') :
      null;
  });
  document.querySelectorAll('.right').forEach(i => {
    i.textContent.indexOf(\"Failed\") !== -1 ?
      i.classList.add('red') :
      i.innerText.indexOf(\"Passed\") !== -1 ?
      i.classList.add('green') :
      null;
  });
  document.querySelectorAll('.stat').forEach(i => {
    i.textContent.indexOf(\"Failed\") !== -1 ?
      i.classList.add('red') :
      i.innerText.indexOf(\"Passed\") !== -1 ?
      i.classList.add('green') :
      null;
  });
  document.querySelectorAll('div').forEach(i => {
    i.textContent.indexOf(\"ERROR NOTHING SELECTED\") !== -1 ?
      i.classList.add('red') : null;
  });
  document.querySelectorAll('td').forEach(i => {
    i.textContent.indexOf(\"ERROR NOTHING ENTERED\") !== -1 ?
      i.classList.add('red') : null;
  });
  document.querySelectorAll('td').forEach(i => {
    i.textContent.indexOf(\"ERROR NOTHING SELECTED\") !== -1 ?
      i.classList.add('red') : null;
  });
  </script>"
  
?>