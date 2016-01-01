</div>
 </div> <!-- /container -->

 <!--
<footer class="footer">
      <div class="container">
        <p class="text-muted">Localhost Powered By Bootstrap</p>
      </div>
</footer>
-->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    
    <script src="<?=$config['base_url']?>assets/js/bootstrap.min.js"></script>
	<!--
	<script type="text/javascript" src="<?=$config['base_url']?>assets/js/jp.js"></script>
	<script type="text/javascript" src="<?=$config['base_url']?>assets/js/my.js"></script>
	-->
<script>
function getUrlVars()
{
    var vars = [], hash;
    var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
    for(var i = 0; i < hashes.length; i++)
    {
        hash = hashes[i].split('=');
        vars.push(hash[0]);
        vars[hash[0]] = hash[1];
    }
    return vars;
}
if(getUrlVars()['msg'] != 'undefined')
{
$("#msg").delay(2000).fadeOut(3000);
}
</script>
<script>
if(/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) )
{
//cool stuff
}
</script>
</body>
</html>