<?php
  $path = $_SERVER['DOCUMENT_ROOT'];
  include_once($path."/gchart-display/template/header.php");
?>
<article class="mw9 center ph3 ph4-ns dt-l w-100 mv4">
  <!--We have a chart on this page-->
  <? include_once($path."/gchart-display/inc/js/gdashboard.php"); ?>
  <!--Div that will hold the charts-->
    <div id="dashboard_div" class="ba b--near-black bg-white">
      <div id="filter_div"></div>
      <div id="chart_div"></div>
    </div>
</article>
<?php
  include_once($path."/gchart-display/template/footer.php");
?>
