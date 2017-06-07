<!--Load the AJAX API-->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
  // Load the Visualization API and the corechart package; set a callback to run when the API is loaded.
  google.charts.load('current', { packages: [ 'corechart', 'table'] });

//Set callbacks to run when the API is loaded

  google.charts.setOnLoadCallback(
    function() { // Anonymous function that calls our callbacks
      drawTable();
      drawPie();
    });

  // Get the titles of each poem
  function drawTable() {
    var query = new google.visualization.Query(
        'https://docs.google.com/spreadsheets/d/1TWQ11MrXIGnVjoc76iV8uI9GEUZCR9a-R4nMQWil52k/gviz/tq?headers=1');

    // Apply query language statement.
   query.setQuery('SELECT A ORDER BY A');

    // Send the query with a callback function.
    query.send(handleQueryResponse);

    //If something goes wrong with the query, we want to know about it
    //Monkey'd from API docs
    function handleQueryResponse(response) {
      if (response.isError()) {
        alert('Error in query: ' + response.getMessage() + ' ' + response.getDetailedMessage());
        return;
      }
      var data = response.getDataTable();
      table = new google.visualization.Table(document.getElementById('poetry-table'));
      table.draw(data, {width: '100%', height: '100%'});
    }
  }

  // Get the distribution of line amounts
  function drawPie() {
    var query = new google.visualization.Query(
        'https://docs.google.com/spreadsheets/d/1TWQ11MrXIGnVjoc76iV8uI9GEUZCR9a-R4nMQWil52k/gviz/tq?headers=1');

    // Apply query language statement.
   query.setQuery('SELECT count(D) group by C pivot E');

    // Send the query with a callback function.
    query.send(handleQueryResponse);

    //If something goes wrong with the query, we want to know about it
    //Monkey'd from API docs
    function handleQueryResponse(response) {
      if (response.isError()) {
        alert('Error in query: ' + response.getMessage() + ' ' + response.getDetailedMessage());
        return;
      }
      var data = response.getDataTable();
      pie = new google.visualization.PieChart(document.getElementById('poetry-pie'));
      pie.draw(data, {width: '100%', height: '100%'});
    }
  }

</script>
