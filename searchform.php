<form role="search" method="get" id="searchform" action="<?php bloginfo('url');?>">
  <div class="input-group add-on">
    <input style="padding:20px 15px;" class="form-control" placeholder="Search for cafes, city guides or articles" name="s" id="s" type="text" value="<?php _e( get_search_query() );?>" />
    <div class="input-group-btn">
      <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
    </div>
  </div>
</form>
