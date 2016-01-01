<form action="<?=$config['base_url'].'dashboard'?>" method="POST" enctype="multipart/form-data">

<div class="row">
  <div class="col-lg-6">
    <div class="input-group">
      <span class="input-group-addon">
        Title
      </span>
      <input type="text" name="title" placeholder="New Title" class="form-control" aria-label="..." required>
    </div><!-- /input-group -->
  </div><!-- /.col-lg-6 -->
  <div class="col-lg-6">
    <div class="input-group">
      <span class="input-group-addon">
       Artist
      </span>
      <input type="text" name="artist" placeholder="New Artist" class="form-control" aria-label="..." required>
    </div><!-- /input-group -->
  </div><!-- /.col-lg-6 -->
</div><!-- /.row -->
<p></p>
<div class="input-group">
      <span class="input-group-addon">
       Url Source
      </span>
      <input type="text" name="url" placeholder="[optional] an mp3 url OR you can upload it yourself and leave this empty" class="form-control" aria-label="...">
    </div><!-- /input-group -->
<p></p>
<div class="form-group">
   <button type="submit" name="submit" class="btn btn-success btn-block" >Upload</button>
</div>
<center>
<div class="form-group">
<span class="btn btn-default btn-file">
    Browse <input type="file" name="mp3">
</span>
</div>
</center>

</form>