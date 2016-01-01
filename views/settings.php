
<?php echo isset($notif) ? $notif : NULL ?>
<h1>Site Settings</h1>
<form action="" method="POST">
<div class="form-group">
  <label for="ttl">Site Title:</label>
  <input type="text" class="form-control" id="ttl" name="site_title" value="<?=$config['site_title']?>" required>
</div>
<div class="form-group">
  <label for="artist">Perage:</label>
  <input type="text" class="form-control" id="artist" name="perpage" value="<?=$config['perpage']?>" required>
</div>
<div class="form-group">
   <button type="submit" name="update" class="btn btn-success btn-block" >Update</button>
</div>
</form>