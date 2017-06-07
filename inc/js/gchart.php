<!--Load the AJAX API-->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
  // Load the Visualization API and the corechart package; set a callback to run when the API is loaded.
  google.charts.load('current', { packages: [ 'corechart'], callback: drawVisualization });

  /*Might need a more complicated callback in the future, like this:
  google.charts.setOnLoadCallback(drawChart1);
  google.charts.setOnLoadCallback(drawChart2);

 //OR

  google.charts.setOnLoadCallback(
    function() { // Anonymous function that calls drawChart1 and drawChart2
      drawChart1();
      drawChart2();
    });
  */

  // Callback that creates and populates a data table,
  // instantiates the chart, passes in the data and
  // draws it.
  function drawVisualization() {
    var query = new google.visualization.Query(
        'http://spreadsheets.google.com/tq?key=pCQbetd-CptGXxxQIG7VFIQ&pub=1');

    // Apply query language statement.
    query.setQuery('SELECT A,D WHERE D > 100 ORDER BY D');

    // Send the query with a callback function.
    query.send(handleQueryResponse);
  }

  function handleQueryResponse(response) {
    if (response.isError()) {
      alert('Error in query: ' + response.getMessage() + ' ' + response.getDetailedMessage());
      return;
    }

    var data = response.getDataTable();
    visualization = new google.visualization.LineChart(document.getElementById('visualization'));
    visualization.draw(data, {legend: 'bottom'});
  }
</script>
