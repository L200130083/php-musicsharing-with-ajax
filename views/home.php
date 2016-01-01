<table class="table table-hover">
    <thead>
      <tr>
        <th>Artist</th>
		<th>Title</th>
        <th>Stream</th>
        <th>Uploader</th>
		<th>Action</th>
      </tr>
    </thead>
    <tbody>
<?php if ($res->num_rows < 1) : ?>
	<tr><td>N/A</td>
		<td>N/A</td>
		<td>N/A</td>
		<td>N/A</td>
		<td>N/A</td></tr>
<?php endif ?>
<?php while($i = $res->fetch_assoc()) : ?>
		<tr>
		<td><a href="<?=$config['base_url']?>artist/<?=urlencode($i['artist']);?>" class="ajax" title="<?=htmlentities(ucwords(strtolower($i['artist'])));?>"><?=htmlentities(ucwords(strtolower($i['artist'])));?></a></td>
		<td><a href="<?=get_mp3_src($i['path'])?>" class="track" title="<?=htmlentities(ucwords(strtolower($i['artist'].' - '.$i['title'])));?>"><?=htmlentities(ucwords(strtolower($i['title'])));?></a></td>
		<td><a href="<?=get_mp3_src($i['path'])?>" class="track"  title="<?=htmlentities(ucwords(strtolower($i['artist'].' - '.$i['title'])));?>"><i class="glyphicon glyphicon-play-circle"></i> Play</a></td>
	<?php if (is_logged() AND $i['username'] === $_SESSION['username']) : ?>
		<td><a class="ajax" title="<?=ucfirst($i['username'])?>" href="<?=$config['base_url']?>dashboard">You</a></td>
	<?php else : ?>
		<td><a class="ajax" title="<?=ucfirst($i['username'])?>" href="<?=$config['base_url']?>author/<?=$i['owner']?>"><?=ucfirst($i['username'])?></a></td>
	<?php endif ?>
		
		<td>
		<a class="btn btn-success btn-xs" target="_BLANK" href="<?=$config['base_url']?>download?id=<?=$i['id']?>&path=<?=base64_encode($i['path'])?>">Download</a>
		<?php if ((is_logged() AND $i['username'] == $_SESSION['username']) OR is_admin()) : ?>
		<a onclick="return confirm('Are You Sure?');"class="btn btn-danger btn-xs ajax" href="<?=$config['base_url']?>delete?id=<?=$i['id']?>&path=<?=base64_encode($i['path'])?>">Delete</a>
		<a class="btn btn-warning btn-xs ajax" href="<?=$config['base_url']?>update/<?=$i['id']?>" title="Update <?=$i['artist'].' - '.$i['title']?>">Edit</a>
		<?php endif ?>
		</td>
		</tr>
<?php endwhile ?>
    </tbody>
  </table>
  
 <?php if ($pagina['is_needed']) : ?>
	<!-- pagination -->
  <nav>
	<ul class="pagination">
		<?php if ($pagina['number']['firstpage']) : ?><li><a class='ajax' title="<?=$title?>" href="<?=$pagina['link']['firstpage']?>"><?=$pagina['number']['firstpage']?></a></li><?php endif ?>
		<?php if ($pagina['number']['firstbutton']) : ?><li><a class='ajax' title="<?=$title?>" href="<?=$pagina['link']['firstbutton']?>"><?=$pagina['number']['firstbutton']?></a></li><?php endif ?>
		<?php if ($pagina['number']['secondbutton']) : ?><li><a class='ajax' title="<?=$title?>" href="<?=$pagina['link']['secondbutton']?>"><?=$pagina['number']['secondbutton']?></a></li><?php endif ?>
		<?php if ($pagina['number']['lastpage']) : ?><li><a class='ajax' title="<?=$title?>" href="<?=$pagina['link']['lastpage']?>"><?=$pagina['number']['lastpage']?></a></li><?php endif ?>
	</ul>
	</nav>
	<div class="clear"></div>
	 <!-- /pagination -->
	 
<?php endif ?>