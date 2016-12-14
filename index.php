<!DOCTYPE html>
<html>

<head>
	<link rel="stylesheet" href="css/style.css" />
	<script src="js/javascript.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<title>Space Exploration Site</title>
</head>

<body>
	<?php

function test_input($data)
{
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

// define variables and set to empty values

$nameErr = $emailErr = $securityErr = "";
$name = $email = $security = "";
$file = "forms.xml";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if (empty($_POST["uName"])) {
		$nameErr = "Name is required";
	}
	else {
		$name = test_input($_POST["uName"]);

		// check if name only contains letters

		if (!preg_match("/^[a-zA-Z]*$/", $name)) {
			$nameErr = "Only letters allowed (no whitespace)";
		}
	}

	if (empty($_POST["uEmail"])) {
		$emailErr = "Email is required";
	}
	else {
		$email = test_input($_POST["uEmail"]);

		// check if e-mail address is well-formed

		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$emailErr = "Invalid email format";
		}
	}

	if (empty($_POST["security"])) {
		$securityErr = "Security question is required";
	}
	else {
		$security = strtoupper(test_input($_POST["security"]));

		// checking if question was answered correctly

		if ($security != "EARTH") {
			$securityErr = "Please answer the security question correctly";
		}
		//Else if the security question was answered correctly, store in XML
		else {
			if (file_exists($file)) {
				$xml = simplexml_load_file($file);
				$formEntry = $xml;
				$submission = $formEntry->addChild('submission');
				$submission->addChild('name', test_input($_POST["uName"]));
				$submission->addChild('email', test_input($_POST["uEmail"]));
				$xml->asXML($file);
			}
			//If XML file does not yet already exist, create it first
			else {
				$domtree = new DOMDocument('1.0', 'UTF-8');
				$xmlRoot = $domtree->createElement("forms");
				$xmlRoot = $domtree->appendChild($xmlRoot);
				echo $domtree->save('forms.xml');
				$file = "forms.xml";
				$xml = simplexml_load_file($file);
				$formEntry = $xml;
				$submission = $formEntry->addChild('submission');
				$submission->addChild('name', test_input($_POST["uName"]));
				$submission->addChild('email', test_input($_POST["uEmail"]));
				$xml->asXML($file);
			}
		}
	}
}
?>
	<div id="container">
		<div id="main">
			<div id="mySidenav" class="sidenav">
				<button class="closebtn" onclick="navBar(); vidplay();">&times;</button>
				<button onclick="fadeClick('#newsletterContainer');vidplay();" class='planetButton'>Newsletter</button>
				<button onclick="fadeClick('#mercuryContainer');vidplay();" class='planetButton'>Mercury</button>
				<button onclick="fadeClick('#venusContainer');vidplay();" class='planetButton'>Venus</button>
				<button onclick="fadeClick('#earthContainer');vidplay();" class='planetButton'>Earth</button>
				<button onclick="fadeClick('#marsContainer');vidplay();" class='planetButton'>Mars</button>
				<button onclick="fadeClick('#jupiterContainer');vidplay();" class='planetButton'>Jupiter</button>
				<button onclick="fadeClick('#saturnContainer');vidplay();" class='planetButton'>Saturn</button>
				<button onclick="fadeClick('#uranusContainer');vidplay();" class='planetButton'>Uranus</button>
				<button onclick="fadeClick('#neptuneContainer');vidplay();" class='planetButton'>Neptune</button>
			</div>
			<h2>Space Information Website</h2>
			<p>Welcome to space info site</p>
			<span style="font-size:2em;cursor:pointer;font-weight:bold" onclick="navBar()">&#9776; Explore</span>
			<div id="mercuryContainer" class='fade planet' style="background-color:black;">


				<div class="Header">Welcome to Mercury</div>

				<div class="background">
					<img src="img/Mercury.png" alt="Mercury">
				</div>

				<div class='TextOuterDiv'>
					<div class='TextInnerDiv'>

						<div class ="Title"> Mercury Info  </div>
						<div class="Content">
							Mercury is the closest planet to the sun and in turn, circles the the sun faster than any other planet.
							It's named mercury after the Roman messenger God.
							The planets surface can reach up to 450 degrees Celsius, however, it has no atmosphere to trap any heat 
							and therefore during the night the temperature plummets to 170 degrees Celsius.
							Mercury is the smallest planet in our solar system, being only slightly bigger than Earth's moon.
							<br />
						</div>
						
						<div class="Title"><br /> Significant Information </div>
						<div class="Content">
							4 billion years ago, Mercury was hit by an asteroid roughly 100km wide, the impact was the equivalent to that of 1 trillion 1-megaton bombs.
							It left a crater large enough to fit the entire state of Texas.<br /><br />
							Even though the planet is so close to the sun, in 2012, The MESSENGER spacecraft discovered water ice in one of the craters near its north pole.<br /> <br />
							Mercury is constantly shrinking as the planet is made up of a single continental plate over a cooling iron core. as the core cools and solidifies, the planets volume shrinks.<br /><br />
							Mercury is also the second densest planet due to its huge metalic core.
							<br />
						</div>

						<div class="Title"><br /> Current Missions </div>
						<div class="Content">
							This is a new mission under development by the European Space Agency and the Japan Aerospace Exploration Agency to the planet Mercury.<br /><br />
							It’s still in the planning stages, but the ESA and JAXA intend to build a spacecraft that can split into two portions: a planetary orbiter and a magnetospheric orbiter.
							<br />
						</div>
					</div>
				</div>  

				<div class="VideoOuter">
					<div class="VideoInner">
					<video id="video1" width="100%" height="100%" controls>
						<source src="vid/mercury.mp4" type="video/mp4">

					</div>
				</div>

			</div>

			<div id="venusContainer" class='fade planet' style="background-color:black;">


				<div class="Header">Welcome to Venus</div>

				<div class="background">
					<img src="img/Venus.png" alt="Venus">
				</div>

				<div class='TextOuterDiv'>
					<div class='TextInnerDiv'>

						<div class ="Title"> Venus info  </div>
						<div class="Content">
							
							Venus is the second farthest planet from the sun.<br /><br />
							The planet is named after the Roman goddess of love.<br /><br />
							The planet has the hotest surface in all the solar system. 
							Temperatures on Venus can reach up to 465 degrees Celsius, its dense atmosphere traps in heat like a greenhouse.<br /><br />
							Venus and Earth are sometimes called twins because they are of similar mass, density and gravity however the similarites end there.<br /><br />
							Venus does not have any moons.
							<br />
						</div>
						
						<div class="Title"><br /> Significant Information </div>
						<div class="Content">
								Venus has a hellish atmosphere, consisting mainly of carbon dioxide with clouds of sulfuric acid, and scientists have only detected trace amounts of water in the atmosphere. 
								The atmosphere is heavier than that of any other planet, leading to a surface pressure 90 times that of Earth.<br /><br />
								The surface of Venus is extremely dry. During its evolution, ultraviolet rays from the sun evaporated water quickly, keeping it in a prolonged molten state.
								There is no more water left today due to the heat boiling any water away.<br /><br />
								Six mountainous regions make up about one-third of the Venusian surface. One mountain range, called Maxwell, is about 540 miles (870 km) long and reaches up to some 7 miles (11.3 km) high, making it the highest feature on the planet.
							
							<br />
						</div>
						
						<div class="Title"><br /> Current Missions </div>
						<div class="Content">
	
						Akatsuki, formerly known as the Venus Climate Orbiter (VCO) and Planet-C, is a Japanese space probe which was intended to explore Venus.<br /><br />
						It was Launched in May 20 of 2010 and went into orbit in December 7 of 2015.
						

							<br />
						</div>
					</div>
				</div>  

				<div class="VideoOuter">
					<div class="VideoInner">
					<video id="video2" width="100%" height="100%" controls>
						<source src="vid/venus.mp4" type="video/mp4">
					</div>
				</div>

			</div>

			<div id="earthContainer" class='fade planet' style="background-color:black; ">

				
				<div class="Header">Welcome to Earth</div>

				<div class="background">
					<img src="img/Earth.png" alt="Earth">
				</div>

				<div class='TextOuterDiv'>
					<div class='TextInnerDiv'>

						<div class ="Title"> Earth info  </div>
						<div class="Content">

							Earth is the third farthest planet from the sun, its the only planet known to have an atmosphere containing free oxygen, oceans of liquid water on its surface, and life. <br /><br />
							Earth is the only planet not name after a Greek/Roman God. 
							The name Earth is an English/German name which simply means "The ground".<br /><br />
							Earth is the fifth largest planet in the solar system, smaller than all the gass planets, but bigger than the other rocky planets.<br /><br />
							Earth only has one moon, named Luna, it takes 27.3 days to orbit the Earth.
						</div>

						<div class="Title"><br /> Significant Information </div>
						<div class="Content">

							Earth has a diameter of roughly 8,000 miles (13,000 kilometers), and is round because gravity pulls matter into a ball, although it is not perfectly round, instead being more of an "oblate spheroid".<br /><br />
							Roughly 71 percent of Earth's surface is covered by water, most of it in the oceans. About a fifth of Earth's atmosphereis made up of oxygen, produced by plants
							<br />
						</div>

						<div class="Title"><br /> Current Missions </div>
						<div class="Content">
							Aqua is a major international Earth Science satellite mission centered at NASA. Launched on May 4, 2002, the satellite has six differrent Earth-observing instruments on board and is named for the large amount of information it collects about water in the Earth system.<br /><br />
							Aura's four instruments study the atmosphere's chemistry and dynamics. Aura's measurements enable us to investigate questions about ozone trends, air-quality changes and their linkage to climate change.<br /><br />
							The Cloud-Aerosol Lidar and Infrared Pathfinder Satellite Observation (CALIPSO) spacecraft is a joint U.S. (NASA) / French (Centre National d’Etudes Spatiales/CNES) mission. Observations from spaceborne lidar, combined with passive imagery, will lead to improved understanding of the role aerosols and clouds play in regulating the Earth’s climate, in particular, how aerosols and clouds interact with one another.
							<br />
						</div>
					</div>
				</div>
				
				<div class="VideoOuter">
					<div class="VideoInner">
					<video id="video3" width="100%" height="100%" controls>
						<source src="vid/earth.mp4" type="video/mp4">
					</div>
				</div>

			</div>

			<div id="marsContainer" class='fade planet' style="background-color:black; ">

				<div class="Header">Welcome to Mercury</div>

				<div class="background">
					<img src="img/Mars.png" alt="Mars Image">
				</div>

				<div class='TextOuterDiv'>
					<div class='TextInnerDiv'>

						<div class ="Title"> Mars info  </div>
						<div class="Content">
							
							Mars is the fourth farthest planet from the sun.<br /><br />
							The planet is named after the Roman god of war.<br /><br /> 
							Mars can't retain any heat energy due to its lack of a "thermal blanket". On average, the temperature on Mars is about minus 60 degrees celsius during winter and 20 degrees Celsius during the summer.<br /><br />
							Compared to Earth, Mars has a mass that is 10 times lower.<br /><br />
							Mars has two moons, Phobos and Deimos but they hold more resemblance to asteroids than moons.
							
							<br />
						</div>
						
						<div class="Title"><br /> Significant Information </div>
						<div class="Content">
							The bright rust color Mars is known for is due to iron-rich minerals in its regolith, the iron minerals oxidize, or rust, causing the soil to look red.<br /><br />
							The red planet is home to both the highest mountain and the deepest, longest valley in the solar system. Olympus Mons is roughly 17 miles (27 kilometers) high, about three times as tall as Mount Everest.<br /><br />
							Mars has the largest volcanoes in the solar system. Including Olympus Mons, which is about 370 miles (600 km) in diameter, it is wide enough to cover the entire state of New Mexico.
							<br />
						</div>

						<div class="Title"><br /> Current Missions </div>
						<div class="Content">
							NASA's Mars Reconnaissance Orbiter is capturing unique views of Mars with the most powerful telescopic camera ever to another planet. Its five other scientific instruments are collecting data about the Red Planet.<br /><br />
							Spirit and Opportunity, two powerful Mars rovers are on the red planet. They have far greater mobility than the 1997 Mars Pathfinder rover. Each rover carries a sophisticated set of instruments to search for evidence of liquid water that may have been present in the planet's past.
							The rovers are identical to each other, but are exploring different regions of Mars.<br /><br />
							NASA is participating in Mars Express, a mission planned by the European Space Agency (ESA) and the Italian Space Agency. The mission is focused on exploring the atmosphere and surface of Mars from polar orbit.
							<br />
						</div>
					</div>
				</div>  
				<div class="VideoOuter">
					<div class="VideoInner">
					<video id="video4" width="100%" height="100%" controls>
						<source src="vid/mars.mp4" type="video/mp4">
						
					</div>
				</div>

			</div>

			<div id="jupiterContainer" class='fade planet' style="background-color:black; ">
				<div class="Header">Welcome to Jupiter</div>

				<div class="background">
					<img src="img/Jupiter.png" alt="Jupiter Image">
				</div>

				<div class='TextOuterDiv'>
					<div class='TextInnerDiv'>

						<div class ="Title"> Jupiter info  </div>
						<div class="Content">
							
							Jupiter is the fifth planet from the sun. It has short days of 10 hours, and completes an orbit in 12 Earth years.
							It is named Jupiter after the king of ancient Roman gods.
							Jupiter is a gas giant so it does not have a surface, it is mostly comprised gasses and liquids. Where a core may be could be up to 50,000 degrees Celsius.
							Jupiter is about 11 times wider than the Earth.
							<br />
						</div>
						
						<div class="Title"><br /> Significant Information </div>
						<div class="Content">

							The planet Jupiter formed 4.5 billion years ago when gravity pulled gas and dust to become the gas giant it is. Jupiter has the same ingredients as a star, but did not grow large enough to ignite.<br /><br />
							A storm called the Great Red Spot has been observed on the planet for more than 300 years. The swirling oval of clouds is twice as wide as Earth.<br /> <br />
							Jupiter is surrounded by 53 moons. The four largest moons, Europa, Callisto, Ganymede and Io, were discovered by Galileo Galilei in 1610.<br /><br />
							<br />
						</div>

						<div class="Title"><br /> Current Missions </div>
						<div class="Content">
							
							NASA launched Juno on August 5th 2011 to orbit the gas giant. It will determine the quantity of water in Jupiter's atmosphere, map magnetic fields and how they affect the atmosphere. 
							<br />
						</div>
					</div>
				</div>  

				<div class="VideoOuter">
					<div class="VideoInner">
					<video id="video5" width="100%" height="100%" controls>
						<source src="vid/jupiter.mp4" type="video/mp4">

					</div>
				</div>
			</div>

			<div id="saturnContainer" class='fade planet' style="background-color:black; ">


				<div class="Header">Welcome to Saturn</div>

				<div class="background">
					<img src="img/Saturn.png" alt="Saturn Image">
				</div>

				<div class='TextOuterDiv'>
					<div class='TextInnerDiv'>

						<div class ="Title"> Saturn info  </div>
						<div class="Content">
							
							Saturn is the sixth planet from the sun, and is the second largest in our solar system.
							Saturn was the Roman name for Cronus, the lord of the titans in Greek mythology.
							The average temperature on Saturn is minus 178 degrees Celsius, and a core between 10 and 20 times the size of Earth.
							Saturn is big enough to hold 760 Earths and is roughly 95 times Earth's mass. It's density is so low that if there was a bathtub big enough to hold it, Saturn could float in the water.
							<br />
						</div>
						
						<div class="Title"><br /> Significant Information </div>
						<div class="Content">

							Saturn appears to have a hot solid inner core of iron and an outer core composed of ammonia, methane, and water. The next layer is of liquid metallic hydrogen, followed by viscous hydrogen and helium. They become gaseous and merge with the atmosphere.<br /><br />
							Galileo Galilei was the first to see Saturn's rings in 1610. The rings are composed of ice and rock. The largest ring spans up to 200 times the diameter of the planet.<br /> <br />
							Saturn has at least 62 moons. As Saturn is named after the lord of the Titans, the majority of the moons are names after other Titans. The largest moon, Titan, is slightly larger than Mercury.
							<br />
						</div>

						<div class="Title"><br /> Current Missions </div>
						<div class="Content">
							
							The Cassini spacecraft in orbit around Saturn is the largest interplanetary spacecraft ever built. It discovered plumes on the icy moon Enceladus, and carried the Huygens probe which successfully landed on Titan.
							<br />
						</div>
					</div>
				</div>

				<div class="VideoOuter">
					<div class="VideoInner">
					<video id="video6" width="100%" height="100%" controls>
						<source src="vid/saturn.mp4" type="video/mp4">

					</div>
				</div>
			</div> 

			<div id="uranusContainer" class='fade planet' style="background-color:black; ">


				<div class="Header">Welcome to Uranus</div>

				<div class="background">
					<img src="img/Uranus.png" alt="Uranus Image">
				</div>

				<div class='TextOuterDiv'>
					<div class='TextInnerDiv'>

						<div class ="Title"> Uranus info  </div>
						<div class="Content">
							
							Uranus is the seventh planet from the sun.
							Uranus is named after the Greek sky deity, Ouranos.
							The average temperature on the planet is minus 193 degrees Celsius.
							Uranus is the third largest planet of the solar system. It is four times the diameter of Earth and is 63 times the volume.
							<br />
						</div>
						
						<div class="Title"><br /> Significant Information </div>
						<div class="Content">

							The planet was accidentally discovered by William Herschel in 1781, it was believed to be a star prior to this.<br /><br />
							The rings of Uranus were the first to be seen after Saturn's. This helped astronomers understand that rings were not just a peculiarity of Saturn. There are two sets of rings, and 13 rings have been identified.<br /> <br />
							Uranus has 27 moons, named after works of William Shakespeare and Alexander Pope. Oberon and Titania are the largest of Uranus's moons.<br /><br />
							The composition of Uranus is thought to be about 25% rock, 60 to 70% ice, and 5 to 15% hydrogen and helium.
							<br />
						</div>

						<div class="Title"><br /> Current Missions </div>
						<div class="Content">
							
							The first and only NASA spacecraft to visit Uranus was NASA's Voyager 2. It discovered 10 moons and investigated its unusually tilted magnetic field.
							<br />
						</div>
					</div>
				</div>

				<div class="VideoOuter">
					<div class="VideoInner">
					<video id="video7" width="100%" height="100%" controls>
						<source src="vid/uranus.mp4" type="video/mp4">
						
					</div>
				</div>
			</div>

			<div id="neptuneContainer" class='fade planet' style="background-color:black; ">

				<div class="Header">Welcome to Neptune</div>

				<div class="background">
					<img src="img/Neptune.png" alt="Neptune Image">
				</div>

				<div class='TextOuterDiv'>
					<div class='TextInnerDiv'>

						<div class ="Title"> Neptune info  </div>
						<div class="Content">
							
							Neptune is the eighth planet from the sun. It was predicted to exist by mathematical calculations before it was discovered.
							It's named after the Roman god of the sea.
							The average temperature of the planet is minus 200 degrees Celsius.
							The diameter of Neptune is four times that of Earths, and is 17 times heavier than it.
							<br />
						</div>
						
						<div class="Title"><br /> Significant Information </div>
						<div class="Content">

							Despite its great distance from the sun, Neptune's winds are the fastest detected in the solar system at 1,500 mph.<br /><br />
							Neptune's rings are not uniform and possess bring thick clumps of dust called arcs. They are unstable and dwindle away rapidly.<br /> <br />
							Neptune has 14 known moons, named after lesser sea gods of Greek mythology. The largest of which is Triton, which has a retrograde obit.<br /><br />
							<br />
						</div>

						<div class="Title"><br /> Current Missions </div>
						<div class="Content">
							
							NASA's Voyager 2 satellite was the first and as yet only spacecraft to visit Neptune.
							<br />
						</div>
					</div>
				</div>

				<div class="VideoOuter">
					<div class="VideoInner">
					<video id="video8" width="100%" height="100%" controls>
						<source src="vid/neptune.mp4" type="video/mp4">
					</div>
				</div>
			</div>
		</div>
		<div id="newsletterContainer" class = 'fade planet'>
			<div id='newsletterForm'>
				<h1>Sign up for our free newsletter here for literally no reason at all.</h1>
				<form name='signup' method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
					<p>
						Name <br/>
						<input type='text' name="uName" class='formInput' value="<?php echo $name;?>" required/><br/>
						<p><span class="error"><?php echo $nameErr;?></span></p><br/>
						E-mail Address <br/>
						<input type="email" name="uEmail" class='formInput' value="<?php echo $email;?>" required/><br/>
						<p><span class="error"><?php echo $emailErr; ?></span></p><br/>
						<span id='captchafordummies'>To protect ourselves from spam bots, please answer this simple question to complete your sign up.<br/>
						From which planet do humans come from?</span><br/>
						<input type='text' id="captchaInput" name="security" class='formInput'" required/><br/>
						<p><span class="error"><?php echo $securityErr;?></span></p><br/>
						<input type='submit' class='formInput' onclick=validation()/><br/>
					</p>
					</form>
				</div>
			</div>

	</body>

</html>