<?php
include("../dbconnect.php");
include("fusioncharts.php");
//the SQL query to be executed
$query = "SELECT PRE_VA_NO_SPECT_LEFT, COUNT(*) AS freq FROM EYEPATIENT1 GROUP BY PRE_VA_NO_SPECT_LEFT WHERE MONTH(";

//storing the result of the executed query
$result = $mydatabase->query($query);

//initialize the array to store the processed data
$jsonArray = array();

//check if there is any data returned by the SQL Query
if ($result->num_rows > 0) {
  //Converting the results into an associative array
  while($row = $result->fetch_row()) {
    $jsonArrayItem = array();
    $jsonArrayItem['label'] = $row[0];
    $jsonArrayItem['value'] = $row[1];
    //append the above created object into the main array.
    array_push($jsonArray, $jsonArrayItem);
  }
}

//Closing the connection to DB



/*JSON Encode the data to retrieve the string containing the JSON representation of the data in the array. */

        	$jsonEncodedData = json_encode($jsonArray);

	/*Create an object for the column chart using the FusionCharts PHP class constructor. Syntax for the constructor is ` FusionCharts("type of chart", "unique chart id", width of the chart, height of the chart, "div id to render the chart", "data format", "data source")`. Because we are using JSON data to render the chart, the data format will be `json`. The variable `$jsonEncodeData` holds all the JSON data for the chart, and will be passed as the value for the data source parameter of the constructor.*/

        	$columnChart = new FusionCharts("pie2d", "myFirstChart" , 400, 300, "leftpre", "json", $jsonEncodedData);

        	// Render the chart
        	$columnChart->render();

        	// Close the database connection
        	$mydatabase->close();


?>
