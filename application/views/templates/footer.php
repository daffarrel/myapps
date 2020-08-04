<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
  <style type="text/css">
    #footer {
      position:fixed;
      left:0px;
      bottom:0px;
      width:100%;
    }

    /* IE 6 */
    * html #footer {
      position:absolute;
      top:expression((0-(footer.offsetHeight)+(document.documentElement.clientHeight ? document.documentElement.clientHeight : document.body.clientHeight)+(ignoreMe = document.documentElement.scrollTop ? document.documentElement.scrollTop : document.body.scrollTop))+'px');
    }
  </style>
  <br><br>
  <footer id="footer" class="main-footer">
    <div class="container-fluid">
      <div class="pull-right hidden-xs">
        <b>Version</b> 2.4.13
      </div>
      <strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE</a>.</strong> All rights
      reserved.
    </div>
    <!-- /.container -->
  </footer>
</div>