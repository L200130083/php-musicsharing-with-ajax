<?php echo isset($notif) ? $notif : NULL ?>
<h1>Edit Music Info</h1>
<form action="" method="POST">
<div class="form-group">
  <label for="ttl">Title:</label>
  <input type="text" class="form-control" id="ttl" name="title" value="<?=$row['title']?>" required>
</div>
<div class="form-group">
  <label for="artist">Artist:</label>
  <input type="text" class="form-control" id="artist" name="artist" value="<?=$row['artist']?>" required>
</div>

<div class="form-group">
  <label for="url">Url:</label>
  <input type="text" class="form-control" id="url" name="url" value="<?=$row['path']?>" required>
</div>

<div class="form-group">
   <button type="submit" name="update" class="btn btn-success btn-block" >Update</button>
</div>
<input type="hidden" name="id" value="<?=$row['id']?>" />
</form>
<a href="<?=get_mp3_src($row['path'])?>" style="display:none" class="track track-default"><?=$row['title']?></a>